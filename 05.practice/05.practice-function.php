<?php
function zdobadz_email($strona) {
    $sprawdz = '/^[a-zA-Z0-9.\-_]+@[a-zA-Z0-9\-.]+\.[a-zA-Z]{2,4}$/';
    $plik = fopen($strona,'r'); // otwarcie pliku strony

    // Sprawdzenie, czy plik został poprawnie otwarty
    if (!$plik) {
        die("Nie można otworzyć pliku: $strona");
    }

    // utworzenie naszego pliku
    $moj_plik = fopen('tymczasowy_index.txt','a');
    flock($moj_plik, LOCK_EX); // blokada pliku

    // przeszukujemy plik dopóki nie znajdziemy się na końcu
    while(!feof($plik)) {
        $linia = fgets($plik); // pobieramy jedną linię
        // sprawdzamy, czy znajduje się tam adres e-mail
        // jeśli tak, zapisujemy do naszego pliku
        if (preg_match($sprawdz, $linia, $wynik)) {
            fputs($moj_plik, $wynik[0] . PHP_EOL); // zapisujemy tylko adres e-mail
        }
    }

    fclose($plik); // zamykamy plik strony

    // po zapisaniu danych, wskaźnik znajduje się na końcu pliku
    rewind($moj_plik); // przewijanie pliku na początek

    // zawartość zapisanego pliku wczytujemy do tablicy adresów
    $adresy = file('tymczasowy_index.txt');

    // procedura wysyłania maila
    $adres = "przyklad@uzycia.pl";
    $tytul = "Adresy e-mail";
    $wiadomosc = "Znalezione adresy e-mail to:\n" . implode(", ", $adresy);
   // mail($adres, $tytul, $wiadomosc); // wysłanie e-maila

    flock($moj_plik, LOCK_UN); // odblokowanie pliku
    fclose($moj_plik); // zamknięcie pliku

    // usunięcie po wysłaniu e-mailem
   // unlink('tymczasowy_index.txt');
}
?>