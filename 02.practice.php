<?php

/* Playing with shell, coloring outout, simpple guessing game  */


echo"Starting for loop, red for even numbers, gold for odd \n";
$int = 0;
for ($int = 0; $int < 20; $int+=1){
    if ($int % 2 == 0){
    echo "\033[31m $int \033[0m \n";
    }
    else{
    echo "\033[33m $int \033[0m \n";
    }
    }

echo"Starting do while loop, if digit /4 then double it\n";
$int2 = 20;
do {
    if ($int2 % 4 ==0){
        echo "$int2 - original integer\n";
        $double = $int2 * $int2;
        echo "\033[31m$double - doubled integer \033[0m \n";
    }
    else{
    echo "\033[36m$int2 - cannot divide by 4!\033[0m \n";
    }
    $int2-=2;
}
while ($int2 > 0);

#Guessing game, type your number and win:
$int3 = readline("Choose beetwen 0 - 10: ");
$int4 = rand(0, 10);
if ($int3 == $int4){
    echo"Congratulations! You guessed well!";
    }
else{
    echo"Unfortunately you missed! :(\nValid digit: $int4";

    }


?>