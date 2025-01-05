<?php

class Motorcycle
{
    public $model = "Yamaha";
    public $tank = 15;
    public $gasLeft = 5;
    public $consumption = 5;

    public function getConsumption()
    {
        return $this->consumption;
    }

    public function setConsuption($consumption)
    {
        $consuptionValue = intval($consumption);
        if ($consuptionValue > 0 && $consuptionValue < 100)
        {
            $this->consumption = $consuptionValue;
        }
    }

    public function distance()
    {
        return $this->gasLeft / $this->consumption * 100;
    }

}

$motorcycle = new Motorcycle();
$motorcycle->setConsuption("ABCD");
echo $motorcycle->distance();





?>