<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8" lang="pl">
        <title>Odżywianie zwierząt</title>
        <link rel="stylesheet" href="style4.css">

    </head>

    <body>

        <header>

            <div id="banner">

                <h2>DRAPIEŻNIKI I INNE</h2>

            </div>

            <div id="frm">

                <h3>Wybierz styl życia:</h3>

                <form method="post">
                    <select name="pokarm">
                        <option value="1">Drapieżniki</option>
                        <option value="2">Roślinożerne</option>
                        <option value="3">Padlinożerne</option>
                        <option value="4">Wszystkożerne</option>
                    </select>
                    <input type="submit" value="Zobacz">
                </form>

            </div>

        </header>

        <main>

            <div id="left">

                <h3>Lista zwierząt</h3>

<?php

  $connect = new mysqli("localhost", "root", "", "baza");

  $sql = "SELECT `zwierzeta`.`gatunek`, `odzywianie`.`rodzaj` FROM `zwierzeta` LEFT JOIN `odzywianie` ON `zwierzeta`.`Odzywianie_id` = `odzywianie`.`id`;";

  $result = $connect->query($sql);

  echo "<ul>";

  while ($row = $result->fetch_assoc()) {

    echo <<< ROW
      <li>$row[gatunek] -> $row[rodzaj]</li>
    ROW;
  }

  echo "</ul>";

  $connect->close();

?>

            </div>

            <div id="center">

<?php
if (isset($_POST['pokarm'])) {

  $connect = new mysqli("localhost", "root", "", "baza");

  $sql = "SELECT `zwierzeta`.`id`, `zwierzeta`.`gatunek`, `zwierzeta`.`wystepowanie`, `odzywianie`.`id` AS `oid` FROM `zwierzeta` LEFT JOIN `odzywianie` ON `zwierzeta`.`Odzywianie_id` = `odzywianie`.`id` WHERE `odzywianie`.`id` ='".$_POST["pokarm"]."' ;";

  $result = $connect->query($sql);

  while ($row = $result->fetch_assoc()) {

    echo <<< ROW
      $row[id].$row[gatunek], $row[wystepowanie]<br>
    ROW;
  }

  $connect->close();

}

?>

            </div>

            <div id="right">

                <img src="materialy10/drapieznik.jpg" alt="Wilki">

            </div>

        </main>

        <footer>

            <a href="http://pl.wikipedia.org" target="_blank">Poczytaj o zwierzętach na Wikipedii</a>
            autor strony: Marcin Dziuba 4B

        </footer>



    </body>

</html>
