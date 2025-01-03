<?php

$samochod = new Samochod();

$samochod->marka = 'Opel';
$samochod->model = 'Insignia';
$samochod->rokProdukcji = 2015;

echo $samochod->marka . ' ' . $samochod->model . ' ' . $samochod->rokProdukcji;


$motorcycle = new motorcycle();
$motorcycle ->marka = 'yamaha';
$motorcycle ->model = 'xj600';
$motorcycle ->rokProdukcji = '1995';

echo $motorcycle->marka . " " . $motorcycle->model . " " . $motorcycle->rokProdukcji


?>