<?php

$input1 = readline("Input your first digit: ");
$input2 = readline("Input operator(+, -, *, /, %): ");
$input3 = readline("Input your second digit: ");

switch ($input2){
    case ("/"):
        switch ($input1 or $input3){
            case ($input1 or $input3 == 0):
                echo "You cannot dive by zero!";
                break;
        }

        break;
}

function operator($input1, $input2, $input3) {
    if ($input2 == "+") {
        return $input1 + $input3;
        }
    elseif ($input2 == "-") {
        return $input1 - $input3;
        }
    elseif ($input2 == "*") {
        return $input1 * $input3;
        }
    elseif ($input2 == "/") {
        return $input1 / $input3;
        }
    elseif ($input2 == "%") {
        return $input1 % $input3;
        }
}

echo operator($input1, $input2, $input3);
var_dump($input3);

