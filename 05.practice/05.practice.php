<?php

require_once("05.practice-function.php");

?>
<html>
<head>
   <title>Przeszukiwacz stron</title>
</head>
<body>
<?php
   $result = zdobadz_email("https://kursphp.com/");
   if ($result) {
       echo "<p>Wiadomość została wysłana</p>";
   } else {
       echo "<p>Nie znaleziono adresu e-mail lub wystąpił błąd.</p>";
   }
?>
</body>
</html>