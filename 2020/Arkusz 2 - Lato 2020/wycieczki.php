<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./styl3.css">
    <title>Wycieczki i urlopy</title>
  </head>
  <body>
    <header>

      <h1>BIURO PODRÓŻY</h1>

    </header>

    <main>

      <div id="left">

        <h2>KONTAKT</h2>

        <a href="mailto:biuro@wycieczki.pl">napisz do nas</a>

        <p>telefon: 555666777</p>

        <form name="frm" method="post" onsubmit="return validate()">
          <input type="text" name="imie" placeholder="Podaj Imię">
          <input type="text" name="nazwisko" placeholder="Podaj Nazwisko">
          <input type="mail" name="mail" placeholder="adres@domena.pl">
          <input type="submit" name="btn" value="Wyślij">
        </form>

      </div>

      <div id="center">

        <h2>GALERIA</h2>

<?php

$connect = new mysqli("localhost", "root", "", "egzamin3");

$sql = "SELECT `zdjecia`.`nazwaPliku`, `zdjecia`.`podpis` FROM `zdjecia` ORDER BY `zdjecia`.`podpis` ASC;";

$result = $connect->query($sql);

while ($row = $result->fetch_assoc()) {
  echo <<< ROW
    <img src="$row[nazwaPliku]" alt="$row[podpis]">
  ROW;
}

$connect->close();

?>
      </div>

      <div id="right">

        <h2>PROMOCJE</h2>

        <table>
          <tr>
            <th>Jesień</th>
            <th>Grupa 4+</th>
            <th>Grupa 10+</th>
          </tr>
          <tr>
            <td>5%</td>
            <td>10%</td>
            <td>15%</td>
          </tr>
        </table>
      </div>

      <div id="data">

        <h2>LISTA WYCIECZEK</h2>

<?php

$connect = new mysqli("localhost", "root", "", "egzamin3");

$sql = "SELECT `wycieczki`.`id`, `wycieczki`.`dataWyjazdu`, `wycieczki`.`cel`, `wycieczki`.`cena` FROM `wycieczki` WHERE `wycieczki`.`dostepna` = '1';";

$result = $connect->query($sql);

echo <<< TABLE
  <table>
    <tr>
      <th>Lp.</th>
      <th>Data Wyjazdu</th>
      <th>Cel</th>
      <th>Cena</th>
    </tr>
TABLE;

//$row[id]. $row[dataWyjazdu], $row[cel], cena: $row[cena] <br>

while ($row = $result->fetch_assoc()) {
  echo <<< ROW
    <tr>
      <td>$row[id]</td>
      <td>$row[dataWyjazdu]</td>
      <td>$row[cel]</td>
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

      <p>Stronę wykonał: Marcin Dziuba 4B Nr 05</p>

    </footer>

    <script>


      function validate(){
        var imie = document.forms["frm"]["imie"].value;
        var nazwisko = document.forms["frm"]["nazwisko"].value;
        var mail = document.forms["frm"]["mail"].value;

        if (imie == 0 ||  nazwisko == 0 || mail == 0){
          alert("Wypełnij wszystkie pola");
          return false;
        }
      }
    </script>

  </body>
</html>
