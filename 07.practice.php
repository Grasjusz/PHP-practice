<?php

class motorcycle
{
    public $marka;
    public $model;
    public $rokProdukcji;
}

class motorcycleSpec
{
    public $engine = 'default';
    public $power = 'default';
    public $type = 'default';   
}


$motorcycle = new motorcycle ();
    $motorcycle ->marka = 'yamaha';
    $motorcycle ->model = 'xj600';
    $motorcycle ->rokProdukcji = '1995';


echo $motorcycle->marka . " " . $motorcycle->model . " " . $motorcycle->rokProdukcji, "\n";

$motorcycleSpec = new motorcycleSpec ();
    $motorcycleSpec -> engine = '600';
    $motorcycleSpec -> type = 'V2';

echo "engine: ", $motorcycleSpec->engine . "  |  " . "engine type: ", $motorcycleSpec->type . "  |  " . "engine power: ", $motorcycleSpec->power;

?>