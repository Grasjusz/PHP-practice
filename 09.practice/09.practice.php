<?php

$person['fname'] = isset($_POST['fname']) ? $_POST['fname'] : 'not registered';
$person['lname'] = isset($_POST['lname']) ? $_POST['lname'] : 'not registered';



function hello_person($person)
{
    echo "Hello, $person[fname], and $person[lname]";
}

hello_person($person);


$database = fopen("newfile.txt", "a") or die("Unable to open file!");
$person_imploded = implode(", ", $person);
$txt = "$person_imploded\n";
fwrite($database, $txt);
fclose($database);


?>