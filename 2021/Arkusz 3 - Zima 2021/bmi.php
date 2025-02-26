<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Twoje BMI</title>
    <link rel="stylesheet" href="./styl3.css">
  </head>
  <body>

    <header>

      <div id="logo">
        <img src="./wzor.png" alt="wzór BMI">
      </div>

      <div id="baner">
        <h1>Oblicz swoje BMI</h1>
      </div>

    </header>

    <main>

      <table>
        <tr>
          <th>Interpretacja BMI</th>
          <th>Wartośc minimalna</th>
          <th>Wartość maksymalna</th>
        </tr>

<?php

  $conn = new mysqli("localhost", "root", "", "ee_09_2021_01_03");

  $sql = "SELECT `bmi`.`informacja`, `bmi`.`wart_min`, `bmi`.`wart_max` FROM `bmi`;";

  $result = $conn->query($sql);

  while ($row = $result->fetch_assoc()) {
    echo <<< ROW
      <tr>
        <td>$row[informacja]</td>
        <td>$row[wart_min]</td>
        <td>$row[wart_max]</td>
      </tr>
    ROW;
  }

  $conn->close();

?>

      </table>

    </main>

    <section id="lr">

      <div id="lewy">

        <h2>Podaj wagę i wzrost</h2>

        <form name="form" action="bmi.php" method="post">
          <label for="waga">Waga:
            <input type="number" name="waga" min="1">
          </label>
          <br>
          <label for="wzrost">Wzrost w cm:
            <input type="number" name="wzrost" min="1">
          </label>
          <input type="submit" name="send" value="Oblicz i zapamiętaj wynik">
        </form>

<?php

  $conn = new mysqli("localhost", "root", "", "ee_09_2021_01_03");

  if (!empty($_POST['waga']) && !empty($_POST['wzrost'])) {

    $bmi = ((($_POST['waga'])/($_POST['wzrost']*$_POST['wzrost']))*10000);

    echo <<< BMI
      Twoja waga: $_POST[waga]; Twój wzrost: $_POST[wzrost]
      <br> BMI wynosi: $bmi
    BMI;

    $data = date("Y-m-d");

    $pbmi = NULL;

    if ($bmi >=0 && $bmi <= 18) {
      $pbmi = 1;
    } else {
      if ($bmi >=19 && $bmi <= 25) {
        $pbmi = 2;
      } else {
        if ($bmi >=26 && $bmi <= 30) {
          $pbmi = 3;
        } else {
          if ($bmi >=31 && $bmi <= 100) {
            $pbmi = 4;
          } else {
            return;
          }
        }
      }
    }

    $sql = "INSERT INTO `wynik` (`id`, `bmi_id`, `data_pomiaru`, `wynik`) VALUES (NULL, '$pbmi', '$data', '$bmi');";

    $conn->query($sql);

    $conn->close();

  }

?>

      </div>

      <div id="prawy">
        <img src="./rys1.png" alt="ćwiczenia">
      </div>

    </section>

    <footer>

      Autor: Marcin Dziuba
      <a href="./kwerendy.txt">Zobacz kwerendy</a>

    </footer>

  </body>
</html>
