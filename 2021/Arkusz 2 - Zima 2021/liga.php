<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>piłka nożna</title>
    <link rel="stylesheet" href="./styl2.css">
  </head>
  <body>

    <div id="baner">

      <h3>Reprezentacja polski w piłce nożnej</h3>

      <img src="./obraz1.jpg" alt="reprezentacja">

    </div>

    <section id="lr">

      <div id="lewy">

        <form action="liga.php" method="post">

          <select name="poz">
            <option value="1">Bramkarze</option>
            <option value="2">Obrońcy</option>
            <option value="3">Pomocnicy</option>
            <option value="4">Napastnicy</option>
          </select>

          <input type="submit" value="Zobacz">

        </form>

        <img src="./zad2.png" alt="piłka">

        <p>Autor: Marcin Dziuba 4B</p>

      </div>

      <div id="prawy">

        <ol>

<?php

  $conn = new mysqli("localhost", "root", "", "ee_09_2021_01_02");

  if (!empty($_POST['poz'])) {

    $sql = "SELECT `zawodnik`.`imie`, `zawodnik`.`nazwisko` FROM `zawodnik` WHERE `zawodnik`.`pozycja_id` = '$_POST[poz]';";

    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
      echo <<< ROW
        <li>
          <p>$row[imie] $row[nazwisko]</p>
        </li>
      ROW;
    }

  }

  $conn->close();

?>

        </ol>

      </div>

    </section>

    <div id="main">

      <h3>Liga mistrzów</h3>

    </div>

    <div id="liga">

<?php

  $conn = new mysqli("localhost", "root", "", "ee_09_2021_01_02");

  $sql = "SELECT `liga`.`zespol`, `liga`.`punkty`, `liga`.`grupa` FROM `liga` ORDER BY `liga`.`punkty` DESC;";

  $result = $conn->query($sql);

  while ($row = $result->fetch_assoc()) {
    echo <<< ROW
      <div id="info">
        <h2>$row[zespol]</h2>
        <h1>$row[punkty]</h1>
        <p>grupa: $row[grupa]</p>
      </div>
    ROW;
  }

  $conn->close();

?>

    </div>

  </body>
</html>
