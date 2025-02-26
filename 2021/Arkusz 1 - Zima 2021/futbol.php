<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./styl.css">
    <title>Rozgrywki futbolowe</title>
  </head>
  <body>

    <section id="baner">

      <h2>Światowe rozgrywki piłkarskie</h2>

      <img src="./obraz1.jpg" alt="boisko">

    </section>

    <section id="mecze">
<?php

  $connect = new mysqli("localhost", "root", "", "ee_09_2021_01_01");

  $sql = "SELECT `rozgrywka`.`zespol1`, `rozgrywka`.`zespol2`, `rozgrywka`.`wynik`, `rozgrywka`.`data_rozgrywki` FROM `rozgrywka` WHERE `rozgrywka`.`zespol1` = 'EVG';";

  $result = $connect->query($sql);

  while ($row = $result->fetch_assoc()) {
    echo <<< ROW
      <div id="info">
        <h3>$row[zespol1] - $row[zespol2]</h3>
        <br>
        <h4>$row[wynik]</h4>
        <br>
        <p>w dniu: $row[data_rozgrywki]</p>
      </div>
    ROW;
  }

  $connect->close();

?>

  </section>

    <section id="main">

      <h2>Reprezentacja Polski</h2>

    </section>

    <section id="dol">

    <section id="lewy">

      <p>Podaj pozycję zawodników (1-bramkarze, 2-obrońcy, 3-pomocnicy, 4-napastnicy)</p>

      <form action="futbol.php" method="post">

        <input type="number" name="num">
        <input type="submit" name="sub" value="Sprawdź">

      </form>

      <ul>

<?php

  $connect = new mysqli("localhost", "root", "", "ee_09_2021_01_01");



  if (isset($_POST['num'])) {

    $sql = "SELECT `zawodnik`.`imie`, `zawodnik`.`nazwisko` FROM `zawodnik` WHERE `zawodnik`.`pozycja_id` = '$_POST[num]';";

    $result = $connect->query($sql);

    while ($row = $result->fetch_assoc()) {
      echo <<< ROW
        <li><p>$row[imie] $row[nazwisko]</p></li>
      ROW;
    }

  }

  $connect->close();

?>
      <ul>

    </section>

    <section id="prawy">

      <img src="./zad1.png" alt="piłkarz">

      <p>Autor: Marcin Dziuba 4B</p>

    </section>

  </section>

  </body>
</html>
