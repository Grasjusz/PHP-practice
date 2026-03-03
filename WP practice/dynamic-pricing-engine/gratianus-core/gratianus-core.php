<?php
/**
 * Plugin Name:   gratanus-core
 * Plugin URI:    
 * Description:   
 * Version:       1.0.0
 * Author:        
 * Author URI:    https://example.com
 * License:       GPL v2 or later
 * License URI:   https://www.gnu.org/licenses/gpl-2.0.html
 */

// Tutaj umieść kod wtyczki


// 1️⃣ Dodanie pola w zakładce "Ogólne"
add_action('woocommerce_product_options_general_product_data', function() {
    woocommerce_wp_text_input([
        'id' => '_production_cost',
        'label' => 'Koszt produkcji',
        'type' => 'number',
        'custom_attributes' => [
            'step' => '0.01',
            'min'  => '0'
        ]
    ]);
});

// 2️⃣ Zapis wartości do postmeta
add_action('woocommerce_process_product_meta', function($post_id) {

    if (isset($_POST['_production_cost'])) {
        update_post_meta(
            $post_id,
            '_production_cost',
            sanitize_text_field($_POST['_production_cost'])
        );
    }

});


add_filter('woocommerce_product_get_price', 'price_based_on_cost', 10, 2);
add_filter('woocommerce_product_get_regular_price', 'price_based_on_cost', 10, 2);

function price_based_on_cost($price, $product) {

    $cost = get_post_meta($product->get_id(), '_production_cost', true);

    if ($cost) {
        $new_price = (float) $cost * 1.3;
        return $new_price;
    }

    return $price;
}

// Pole marży w zakładce Ogólne
add_action('woocommerce_product_options_general_product_data', function() {

    woocommerce_wp_text_input([
        'id' => '_margin_percent',
        'label' => 'Marża (%)',
        'type' => 'number',
        'custom_attributes' => [
            'step' => '0.1',
            'min' => '0'
        ]
    ]);

});

add_action('woocommerce_process_product_meta', function($post_id) {

    if (isset($_POST['_margin_percent'])) {
        update_post_meta(
            $post_id,
            '_margin_percent',
            sanitize_text_field($_POST['_margin_percent'])
        );
    }

});

add_filter('woocommerce_product_get_price', 'advanced_dynamic_price', 999, 2);
add_filter('woocommerce_product_get_regular_price', 'advanced_dynamic_price', 999, 2);

function advanced_dynamic_price($price, $product) {

    $cost = get_post_meta($product->get_id(), '_production_cost', true);
    $product_margin = get_post_meta($product->get_id(), '_margin_percent', true);
    $global_margin = get_option('global_margin_percent');

    if ($cost !== '' && (float)$cost > 0) {

        // Hierarchia:
        // 1. Jeśli produkt ma własną marżę → użyj jej
        // 2. Jeśli nie → użyj globalnej

        if ($product_margin !== '' && (float)$product_margin >= 0) {
            $margin = (float)$product_margin;
        } else {
            $margin = (float)$global_margin;
        }

        $multiplier = 1 + ($margin / 100);
        return (float)$cost * $multiplier;
    }

    return $price;
}

add_action('woocommerce_product_options_pricing', function() {
    echo '<div class="options_group">';
    echo '<p style="background:#eaf7ff;padding:10px; font-size:2rem;">
    Cena jest liczona dynamicznie z kosztu i marży.
    </p>';
    echo '</div>';
});

// Dodanie pola globalnej marży
add_filter('woocommerce_general_settings', function($settings) {

    $settings[] = [
        'title' => 'Globalna marża (%)',
        'id' => 'global_margin_percent',
        'type' => 'number',
        'default' => '50',
        'desc' => 'Domyślna marża używana, gdy produkt nie ma własnej marży',
        'custom_attributes' => [
            'step' => '0.1',
            'min' => '0'
        ]
    ];

    return $settings;

});