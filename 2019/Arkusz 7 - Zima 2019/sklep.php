<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <link rel="stylesheet" href="./styl1.css">
    <meta charset="utf-8">
    <title>Hurtownia</title>
  </head>
  <body>

      <header>

          <div id="logo">

              <img src="pliki7/komputer.png" alt="hurtownia komputerowa">

          </div>

          <div id="lista">

              <ul>

                  <li>Sprzęt</li>

                  <ol>

                      <li>Procesory</li>
                      <li>Pamięć RAM</li>
                      <li>Monitory</li>
                      <li>Obudowy</li>
                      <li>Karty graficzne</li>
                      <li>Dyski twarde</li>

                  </ol>

                  <li>Oprogramowanie</li>

              </ul>

          </div>

          <div id="formularz">

              <h2>Hurtownia komputerowa</h2>

              <form method="post">

                  <label for="kat">Wybierz kategorię sprzętu</label>
                  <input type="number" id="kat" name="kat">
                  <input type="submit" id="btn" value="SPRAWDŹ">

              </form>

          </div>

      </header>

      <main>

          <h1>Podzespoły we wskazanej kategorii:</h1>

<?php

  $connect = new mysqli("localhost", "root", "", "sklep");

  if (isset($_POST["kat"]) && ($_POST["kat"] == 1 || $_POST["kat"] == 2)) {

    $sql = "SELECT `podzespoly`.`nazwa`, `podzespoly`.`opis`, `podzespoly`.`cena` FROM `podzespoly` WHERE `podzespoly`.`typy_id` = '".$_POST["kat"]."';";

    $result = $connect->query($sql);

    while ($row = $result->fetch_assoc()) {
      echo <<< SKRYPT
        <p> $row[nazwa] $row[opis] CENA: $row[cena] </p>
      SKRYPT;
    }
  } else {
    echo "Wybierz poprawną kategorie szprzętu";
  }

  $connect->close();

?>

      </main>

      <footer>

          <h3>Hurtownia działa od ponidziałku do soboty w godzinach 7<sup>00</sup> - 16<sup>00</sup></h3>

          <a href="mailto:bok@hurtownia.pl">Napisz do nas</a>

          Partnerzy

          <a href="http://intel.pl/" target="_blank">Intel</a>

          <a href="http://amd.pl/" target="_blank">AMD</a>

          <p>Stronę wykonał: Marcin Dziuba 4B</p>

      </footer>

  </body>
</html>
