<?php
/**
 * Plugin Name: Dynamic Pricing Engine
 * Description: Dynamiczne liczenie ceny na podstawie kosztu i marży.
 * Version: 1.0
 */

if (!defined('ABSPATH')) {
    exit;
}

class Dynamic_Pricing_Engine {

    public function __construct() {
        add_filter('woocommerce_product_get_price', [$this, 'calculate_price'], 999, 2);
        add_filter('woocommerce_product_get_regular_price', [$this, 'calculate_price'], 999, 2);
    }

    public function calculate_price($price, $product) {

        $cost = get_post_meta($product->get_id(), '_production_cost', true);
        $product_margin = get_post_meta($product->get_id(), '_margin_percent', true);
        $global_margin = get_option('global_margin_percent');

        if ($cost !== '' && (float)$cost > 0) {

            $margin = ($product_margin !== '' && (float)$product_margin >= 0)
                ? (float)$product_margin
                : (float)$global_margin;

            $multiplier = 1 + ($margin / 100);

            return (float)$cost * $multiplier;
        }

        return $price;
    }
}

new Dynamic_Pricing_Engine();