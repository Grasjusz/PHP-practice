<?php

session_start();
require_once("function.php");

?>
<html>
<head>
   <title>Logowanie</title>
</head>
<body>
<?php

  $login = htmlspecialchars($_POST['login']);
  $haslo = htmlspecialchars($_POST['haslo']);
  if (isset($_SESSION['zalogowany']))
  {
    echo 'Jesteś już zalogowany, przejdź na stronę wysyłania pliku';
	echo 'klikając <a href="wysylanie.php" >tutaj</a>.';
  }
  if (!empty($login) && !empty($haslo))
  {
	try
	{
	  zaloguj($_POST['login'], $_POST['haslo']);
	}
	catch (Exception $e)
    {
	  echo 'Błąd: '.$e->getMessage();
    }
  }
  else
  {
    echo 'Podano niekompletne dane do logowania.';
	echo '<a href="logowanie.php" >Powrót</a>.';
  }
?>
</body>
</html>