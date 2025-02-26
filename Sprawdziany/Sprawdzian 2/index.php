<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styl8.css">
    <title>Nasz sklep komputerowy</title>
  </head>
  <body>

    <header>

      <nav>

        <a href="index.php">Główna</a>
        <a href="procesory.html">Procesory</a>
        <a href="ram.html">RAM</a>
        <a href="grafika.html">Grafika</a>

      </nav>

      <div id="lgo">

        <h2>Podzespoły Komputerowe</h2>

      </div>

    </header>

    <main>

        <h1>Dzisiejsze Promocje</h1>

        <div>
<?php

          $connect = new mysqli("localhost", "root", "", "sklep");

          $sql = "SELECT `podzespoly`.`id`, `podzespoly`.`nazwa`, `podzespoly`.`opis`, `podzespoly`.`cena` FROM `podzespoly` WHERE `podzespoly`.`cena` < '1000';";

          $result = $connect->query($sql);

          echo <<< TABLE
          <table>
            <tr>
              <th>NUMER</th>
              <th>NAZWA PODZEPOŁU</th>
              <th>OPIS</th>
              <th>CENA</th>
            </tr>
          TABLE;

          while ($row = $result->fetch_assoc()) {
            echo <<< ROW
              <tr>
                <td>$row[id]</td>
                <td>$row[nazwa]</td>
                <td>$row[opis]</td>
                <td>$row[cena]</td>
              </tr>
            ROW;
          }

          echo <<< TABLE
            </table>
          TABLE;

          $connect->close();

?>

      </div>

    </main>

    <footer>

      <div id="f1">
        <img src="scalak.jpg" alt="promocje na procesory">
      </div>

      <div id="f2">
        <h4>Nasz sklep komputerowy</h4>
        <p>Współpracujem z hurtownią <a href="http://www.edata.pl/" target="_blank">edata</a></p>
      </div>

      <div id="f3">
        <p>Zadzwoń: 601 602 603</p>
      </div>

      <div id="f4">
        <p>Stronę wykonał: Marcin Dziuba 4B Nr 05</p>
      </div>

    </footer>

  </body>
</html>
