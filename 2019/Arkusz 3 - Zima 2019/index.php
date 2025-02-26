<!DOCTYPE html>
<html lang="pl-PL">
   <head>
      <meta charset="utf-8">
      <title>Filmoteka</title>
      <meta name="description" content="Interbetowa Encyklopedia Filmów">
      <link rel="stylesheet" href="styl3.css">
    </head>

    <body>
        <header>
           <div>
               <img src="klaps.png" alt="Nasze filmy">
           </div>

           <div>
               <h1>BAZA FILMÓW</h1>
           </div>

           <div>
               <form method="get" id="frm">
                   <select name="gatunek" id="gatunek">
                       <option value="Sci-Fi">Sci-Fi</option>
                       <option value="animacja">animacja</option>
                       <option value="dramat">dramat</option>
                       <option value="horror">horror</option>
                       <option value="komedia">komedia</option>
                   </select>
                   <input type="submit" id="btn" value="Filmy">
                   <!--<button id="btn">Filmy</button>-->
                   <!--document.getElementById("btn").onclick=function(){}-->

               </form>
           </div>

           <div>
               <img src="gwiezdneWojny.jpg" alt="szturmowcy">
           </div>
        </header>

        <section>
            <div>
                <h2>Wybrano filmy:</h2>

<?php

  if (isset($_GET['gatunek'])) {
    $connect = new mysqli("localhost", "root", "", "dane");

    $sql = "SELECT `filmy`.`tytul`, `filmy`.`rok`, `filmy`.`ocena`, `gatunki`.`nazwa` FROM `filmy` RIGHT JOIN `gatunki` ON `filmy`.`gatunki_id` = `gatunki`.`id` WHERE `nazwa` ='".$_GET["gatunek"]."';";

    $result = $connect->query($sql);

    while ($row = $result->fetch_assoc()) {
      echo <<< LEWY
        <br> Tytuł: $row[tytul], Rok produkcji: $row[rok], Ocena: $row[ocena] <br>
      LEWY;
    }

    $connect->close();
  }

?>
            </div>

            <div>
                <h2>Wszystkie filmy</h2>

<?php

    $connect = new mysqli("localhost", "root", "", "dane");

    $sql = "SELECT `filmy`.`id`, `filmy`.`tytul`, `rezyserzy`.`imie`, `rezyserzy`.`nazwisko` FROM `filmy` JOIN `rezyserzy` ON `filmy`.`rezyserzy_id` = `rezyserzy`.`id`;";

    $result = $connect->query($sql);

    echo "<ol>";

    while ($row = $result->fetch_assoc()) {
      echo <<< PRAWY
        <br> $row[id]. $row[tytul], reżyseria: $row[imie] $row[nazwisko] <br>
      PRAWY;
    }

    echo "</ol>";

    $connect->close();

?>
            </div>
        </section>

        <footer>
            <p>Autor: Marcin Dziuba 4B</p>
            <br>
            <a href="kwerendy.txt">Zapytania do bazy</a>
            <a href="www.filmy.pl" target="_blank">Przejdź do filmy.pl</a>
        </footer>
