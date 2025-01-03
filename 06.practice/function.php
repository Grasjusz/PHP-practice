<?php

// funkcje.php

function zaloguj($login, $haslo)
{
  if ($login == 'admin' && $haslo == 'haslo123')
  {
    $_SESSION['zalogowany'] = strip_tags($login);
	echo 'Zalogowano poprawnie, przejdź na stronę wysyłania pliku';
	echo 'klikając <a href="wysylanie.php" >tutaj</a>.';
  }
  else
    throw new Exception('Podano błędne dane logowania');
}

function sprawdz_plik()
{
  if ($_FILES['plik']['error'] > 0)
    switch ($_FILES['plik']['error'])
    {
      case 1: {Throw new Exception('Plik jest zbyt duży');}

      case 2: {Throw new Exception('Plik jest zbyt duży');}

      case 3: {Throw new
	    Exception('Plik wysłany jedynie częściowo');}

      case 4: {Throw new
	    Exception('Wysyłanie pliku nie powiodło się.');}

      default: {Throw new
	    Exception('Wystąpił problem podczas wysyłania.');}
    }

  if ($_FILES['plik']['type'] != 'text/plain')
    Throw new Exception('Nieprawidłowy typ pliku');

  return true;
}

function zapisz_plik($login)
{
  $lokalizacja = './hasla/haslo_'.$login.'.txt';

  if(is_uploaded_file($_FILES['plik']['tmp_name']))
    if(!move_uploaded_file($_FILES['plik']['tmp_name'], $lokalizacja))
      Throw new Exception('Nieprawidłowy typ pliku');
  else
    Throw new Exception('Nie udało się zapisać pliku.');
  return true;
}

function sprawdz_cookie()
{
  if (isset($_COOKIE['haslo_wyslane']))
    Throw new Exception('Nie można wysłać hasła więcej niż jeden raz.');
  return true;
}

function zapisz_cookie()
{
  if(!setcookie('haslo_wyslane'))
    Throw new Exception('Nie można zapisać ciasteczka.');
  return true;
}

?>