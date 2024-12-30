<?php

function sprawdz_email($email)
{
   $spr = '/^[a-zA-Z0-9.\-_]+@[a-zA-Z0-9\-.]+\.[a-zA-Z]{2,4}$/';
   if(preg_match($spr, $email))
      return true;
   else
      return false;
}


function sprawdz_imie($imie)
{
  $sprawdz = '/^[a-zA-ZŁŚĆŹŻĄĘÓŃąęółśżźćń]+$/';
   if(preg_match($sprawdz, $imie))
   {
      $imie = ucwords(strtolower($imie));
      return $imie;
   }
   else
      return false;
}

function sprawdz_telefon($telefon)
{
   $sprawdz = '/^[0-9]{9}$/';
   if(preg_match($sprawdz, $telefon))
      return true;
   else
      return false;
}

function sprawdz_tresc($tresc)
{
   $tresc = trim($tresc);
   if(strlen($tresc) < 10)
      return false;
   else
      return $tresc;
}


function vulgate($data)
{
    $words = array("dupa", "gey", "nigga");
    foreach($words as $el)
    {
        if(str_contains($data, $el))
            return $el;
    }
}

$email = $_POST['email'];
$domain = explode("@", $email);
$imie = $_POST['imie'];
$tel = $_POST['telefon'];
$tresc = $_POST['tresc'];
$blad_danych = false;

if (!sprawdz_email($email))
   {
      echo "Adres e-mail niepoprawny";
      $blad_danych = true;
   }

$imie = sprawdz_imie($imie);
if (!$imie)
   {
      echo "Imię wpisano niepoprawnie";
      $blad_danych = true;
   }
if (!sprawdz_telefon($tel))
   {
      echo "Błędny format telefonu";
      $blad_danych = true;
   }
$tresc = sprawdz_tresc($tresc);
if (!$tresc)
   {
      echo "Niepoprawna treść";
      $blad_danych = true;
   }

$nword = vulgate($tresc);
if ($nword)
    {
    echo "W treści znajdują się słowa zabronione!!!<br> Wulgarne słowo: $nword <br>";
    $blad_danych = true;
    }


if ($blad_danych)
   {
      echo "Wystąpił jeden lub więcej błędów podczas przetwarzania danych.";
   }
else
   {
      echo "Imię klienta: $imie;<br/>";
      echo "Adres e-mail: $email;<br/>";
      echo "Domena jakiej uzywasz: $domain[1]<br/>";
      echo "Numer telefonu: $tel;<br/>";
      echo "Treść: $tresc;<br/>";
   }

?>