<?php

function wypisz_dzien_tygodnia($data)
{
    $day = date("w", mktime (0,0,0,$data['miesiac'],
    $data['dzien'],$data['rok']));

    $exp = "Dzień tygodnia narodzin: ";
    switch($day){
    case 1:
        echo "$exp Poniedziałek <br>";
        break;
    case 2:
        echo "$exp Wtorek <br>";
        break;
    case 3:
        echo "$exp Środa <br>";
        break;
    case 4:
        echo "$exp Czwartek <br>";
        break;
    case 5:
        echo "$exp Piątek <br>";
        break;
    case 6:
        echo "$exp Sobota <br>";
        break;
    case 0:
        echo "$exp Niedziela <br>";
        break;

    }

}

function oblicz_dni($data)
{
  // 60 sekund to 1 minuta, 60 minut to 1 godzina, 24 godziny to 1 dzień
  $czas = (time() - mktime (0,0,0,$data['miesiac'],
  $data['dzien'],$data['rok']))/60/60/24;
  return "Ile sekund upłynęło od narodzin: $czas";
}

$data['dzien'] = $_POST['dzien'];
$data['miesiac'] = $_POST['miesiac'];
$data['rok'] = $_POST['rok'];

wypisz_dzien_tygodnia($data);

echo oblicz_dni($data);

?>