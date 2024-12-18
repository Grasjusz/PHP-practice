<?php

$input1 = readline("Input your first digit: ");
$input2 = readline("Input operator(+, -, *, /, %): ");
$input3 = readline("Input your second digit: ");

switch ($input2){
    case ("/"):
        switch ($input1 or $input3){
            case (0):
                echo "You cannot dive by zero!";
        }

        break;
}

function operator() {
    if ("+") {
        return '+';
        }
    elseif ("-") {
        return '-';
        }
    elseif ("*") {
        return '*';
        }
    elseif ("/") {
        return '/';
        }
    elseif ("%") {
        return '%';
        }
}

echo $input1, operator($input2), $input3;

