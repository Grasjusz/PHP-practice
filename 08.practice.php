<?php

/*Check for how long gas lasts with full tank*/

#set class Motorcycle with elements, set private and public properties

class Motorcycle
{
    public $model = "Yamaha";
    private $tank = 15;
    public $gasLeft = 5;
    public $consumption = 5;

    #set private only to be reachable from this method, cannot be usable from outer
    #get the consumption

    private function getConsumption()
    {
        return $this->consumption;
    }

    #returns the integer value of a variable
    public function setConsuption($consumption)
    {
        $consuptionValue = intval($consumption);
        if ($consuptionValue > 0 && $consuptionValue < 100)
        {
            $this->consumption = $consuptionValue;
        }
    }

    #Count the distance and handle the error if not integer.
    
    public function distance()
    {
        if (is_int($this->consumption))
        {
            return $this->gasLeft / $this->consumption * 100;
        }
        else
        {
            echo "Error occured! consuption is not an integer!";
        }
    } 
}

$motorcycle = new Motorcycle();
$motorcycle->setConsuption("ABCD");
echo $motorcycle->model . ", " . $motorcycle->distance()." kilometers left to empty tank" , "\n";

$motorcycle->consumption = "abc";
echo $motorcycle->distance();



?>