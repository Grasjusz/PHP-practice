<?php

echo"Starting for loop";
$int = 0;
for ($int = 0; $int < 20; $int+=2){
    echo "$int\n";
    }

echo"Starting do while loop";
$int2 = 0;
do {
    echo "$int2\n";
    $int2+=2;
}
while ($int2 < 20);

$int3 = readline("Choose beetwen 0 - 10: ");
$int4 = rand(0, 10);
if ($int3 == $int4){
    echo"Congratulations! You guessed well!";
    }
else{
    echo"Unfortunately you missed! :(\nValid digit: $int4";

    }


?>