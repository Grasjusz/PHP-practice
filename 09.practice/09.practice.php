<?php

/*Saving input to file, getting info fto.m*/

$person['fname'] = isset($_POST['fname']) ? $_POST['fname'] : 'not registered';
$person['lname'] = isset($_POST['lname']) ? $_POST['lname'] : 'not registered';



/*Greet the person from input*/
function hello_person($person)
{
    echo "Hello, $person[fname], and $person[lname]";
}

/*Save details to file*/
hello_person($person);

$database = fopen("newfile.txt", "a") or die("Unable to open file!");
$person_imploded = implode(", ", $person);
$txt = "$person_imploded\n";
fwrite($database, $txt);
fclose($database);


?>