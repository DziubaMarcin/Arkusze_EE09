<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <link rel="stylesheet" href="./styl3.css">
    <meta charset="utf-8">
    <title>Hurtownia</title>
  </head>
  <body>

      <header>

          <div id="baner">

              <h1>ATLAS ZWIERZĄT</h1>

          </div>

          <div id="formularz">

              <h2>Gromady</h2>

              <ol>

                  <li>Ryby</li>
                  <li>Płazy</li>
                  <li>Gady</li>
                  <li>Ptaki</li>
                  <li>Ssaki</li>

              </ol>

              <form method="post">

                  <label for="grom">Wybierz gromadę: </label>
                  <input type="number" id="grom" name="grom">
                  <input type="submit" id="btn" value="Wyświetl">

              </form>

          </div>

      </header>

      <main>

          <div id="lewy">

              <img src="materialy3/zwierzeta.jpg" alt="dzikie zwierzęta">

          </div>

          <div id="srodek">

<?php

  $connect = new mysqli("localhost", "root", "", "baza");

  if (isset($_POST["grom"])) {

    switch ($_POST["grom"]) {
      case '1':
        echo "<h2>RYBY</h2>";
        break;
      case '2':
        echo "<h2>PŁAZY</h2>";
        break;
      case '3':
        echo "<h2>GADY</h2>";
        break;
      case '4':
        echo "<h2>PTAKI</h2>";
        break;
      case '5':
        echo "<h2>SSAKI</h2>";
        break;
      default:
        break;
    }

    $sql = "SELECT `zwierzeta`.`gatunek`, `zwierzeta`.`wystepowanie` FROM `zwierzeta` LEFT JOIN `gromady` ON `zwierzeta`.`Gromady_id` = `gromady`.`id` WHERE `gromady`.`id` = '".$_POST["grom"]."';";

    $result = $connect->query($sql);

    while ($row = $result->fetch_assoc()) {
      echo <<< SKRYPT1
        <br> $row[gatunek], $row[wystepowanie] <br>
      SKRYPT1;
    }
  }

  $connect->close();

?>

          </div>

          <div id="prawy">

              <h2>Wszystkie zwierzęta w bazie</h2>

<?php

  $connect = new mysqli("localhost", "root", "", "baza");

  $sql = "SELECT `zwierzeta`.`id`, `zwierzeta`.`gatunek`, `gromady`.`nazwa` AS `nazwa_gromady` FROM `zwierzeta` LEFT JOIN `gromady` ON `zwierzeta`.`Gromady_id` = `gromady`.`id`;";

  $result = $connect->query($sql);

  while ($row = $result->fetch_assoc()) {
    echo <<< SKRYPT2
      <br> $row[id], $row[gatunek], $row[nazwa_gromady]
    SKRYPT2;
  }

  $connect->close();

?>

          </div>

      </main>

      <footer>

          <a href="atlas-zwierzat.pl" target="_blank">Poznaj inne strony o zwierzętach</a> autor Atlasu zwierząt: Marcin Dziuba 4B Nr 05

      </footer>

  </body>
</html>
