<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <link rel="stylesheet" href="./styl5.css">
    <meta charset="utf-8">
    <title>Grzybobranie</title>
  </head>
  <body>

      <section>

          <div id="miniatura">

              <img src="./pliki5/borowik-miniatura.jpg" alt="Grzybobranie">

          </div>

          <div id="tytul">

              <h1>Idziemy na grzyby!</h1>

          </div>

      </section>

      <section>

          <div id="lewy">

<?php

  $connect = new mysqli("localhost", "root", "", "dane2");

  $sql = "SELECT `grzyby`.`nazwa_pliku`, `grzyby`.`potoczna` FROM `grzyby`;";

  $result = $connect->query($sql);

  while ($row = $result->fetch_assoc()) {
    echo <<< SKRYPT1
      <img src='./pliki5/$row[nazwa_pliku]' alt="$row[potoczna]" title="$row[potoczna]">
    SKRYPT1;
  }

  $connect->close();

?>

          </div>

          <div id="prawy">

              <h2>Grzyby jadalne</h2>

<?php

  $connect = new mysqli("localhost", "root", "", "dane2");

  $sql = "SELECT `grzyby`.`nazwa`, `grzyby`.`potoczna` FROM `grzyby` WHERE `grzyby`.`jadalny` = 1;";

  $result = $connect->query($sql);

  while ($row = $result->fetch_assoc()) {
    echo <<< SKRYPT2
      <p> $row[nazwa]($row[potoczna]) </p>
    SKRYPT2;
  }

  $connect->close();

?>

              <h2>Polecamy do sosów</h2>

<?php

  $connect = new mysqli("localhost", "root", "", "dane2");

  $sql = "SELECT `grzyby`.`nazwa`, `grzyby`.`potoczna`, `rodzina`.`nazwa` AS `nazwa_rodziny` FROM `grzyby` JOIN `rodzina` ON `grzyby`.`rodzina_id` = `rodzina`.`id` JOIN `potrawy` ON `grzyby`.`potrawy_id` = `potrawy`.`id` WHERE `potrawy`.`nazwa` = 'sos';";

  $result = $connect->query($sql);

  echo "<ol>";

  while ($row = $result->fetch_assoc()) {
    echo <<< SKRYPT3
      <li>$row[nazwa]($row[potoczna]), rodzina: $row[nazwa_rodziny]</li>
    SKRYPT3;
  }

  echo "</ol>";

  $connect->close();

?>

          </div>

      </section>

      <footer>

          <p>Autor: Marcin Dziuba 4B</p>

      </footer>
  </body>
</html>
