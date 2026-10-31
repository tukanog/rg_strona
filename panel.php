<?php session_start();
    if (empty($_SESSION)) {
        header("Location: logowanie.php");
    } 
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dark.css">
    <link rel="shortcut icon" href="assets/img/favicon.svg" type="image/x-icon">
    <script defer src="script.js"></script>
    <title>Kino NOVA</title>
</head>
<body>
    <?php
        $baza_danych= new mysqli('127.0.0.1', 'root', '', 'kino_nova');
    ?>
    <header>
        <div id="logo">
            <a href="index.php">
                <img src="assets/img/logo_white.svg" id="logo_img" alt="Logo strony">
            </a>
            <div>
                <h1>Kino NOVA</h1>
                <p>Twoje najlepsze doświadczenia z filmów</p>
            </div>
        </div>
        <div id="accessibility">
            <label>
                <span id="motyw">Przełącz motyw (na jasny)</span>
                <input type="checkbox" id="przycisk_motywu" onchange="przelaczMotyw()">
            </label>

            <label>
                Zmień rozmiar czcionki:
                <input type="range" id="czcionka" min="100" max="200" step="25" value="100">
                <span id="wartosc_czcionka">100%</span>   
            </label>
        </div>
    </header>
    <nav>
        <ul id="logbar">
            <li>
                <?php if(empty($_SESSION)) { ?>
                <a href="logowanie.php">
                    <button>Zaloguj</button>
                </a>
                <?php } else { ?> 
                    <a href="wylogowanie.php">
                        <button>Wyloguj</button>
                    </a>
                <?php }; ?>
            </li>
            <li>
                <a href="panel.php" id='panel_zarzadzania'>Panel zarządzania</a>
            </li>
        </ul>
        <ul id="navbar">
            <li><a href="index.php">Repertuar</a></li>
            <li><a href="aktualnosci.php">Aktualności</a></li>
            <li><a href="pomoc.php">Pomoc  &#129095;</a>
                <div class="nav_dropdown">
                    <ul>
                        <li><a href="pomoc.php#cennik">Cennik</a></li>
                        <li><a href="pomoc.php#kontakt">Kontakt</a></li>
                        <li><a href="pomoc.php#inne">Pozostałe FAQ</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>

    <main>

        <form action="panel.php" method="post">
            <label>Usuń film z repertuaru
                <input type="text" name="film_do_usuniecia" required placeholder='Podaj nazwę filmu'>
            </label>
            <button>
                Usuń film
            </button>
        </form>
        <?php 
        if(isset($_POST['film_do_usuniecia'])){
            $film_do_usuniecia=$_POST['film_do_usuniecia'];
            $kwerenda_usun='DELETE FROM filmy_repertuar WHERE nazwa_filmu LIKE "'.$film_do_usuniecia.'"';
            $baza_danych->query($kwerenda_usun);
        }
        ?>
        <form action="" method="post">
            <label>Dodaj film do repertuaru
                <input type="text" name="film_do_wstawienia" placeholder='Podaj nazwę filmu' required>
            </label>
            <label>
                Dodaj opis filmu
                <input type="text" name="opis_wstawiony" required placeholder='Podaj opis filmu'>
            </label>
            <label>
                Dodaj ścieżkę do grafiki filmu
                <input type="text" name="grafika_wstawiony" required placeholder='Podaj ścieżkę w formacie: /grafika.png'>
            </label>
            <button>Dodaj film</button>
        </form>
        <?php 
        if(isset($_POST['film_do_wstawienia'])){
            $film_do_wstawienia=$_POST['film_do_wstawienia'];
            $opis=$_POST['opis_wstawiony'];
            $grafika=$_POST['grafika_wstawiony'];
            $gatunek=$_POST['gatunek'];
            $czas_trwania=$_POST['czas_trwania'];
            $kwerenda_wstaw='INSERT INTO filmy_repertuar (nazwa_filmu, opis, grafika, gatunek, czas_trwania) values ("'.$film_do_wstawienia.'","'.$opis.'","'.$grafika.'","'.$gatunek.'",'.$czas_trwania.')';
            $baza_danych->query($kwerenda_wstaw);
        }
        ?>
            <form action="" method="post">
            <label>Dodaj seans
                <input type="text" name="seans_do_wstawienia" placeholder='Podaj nazwę filmu dla seansu' required>
            </label>
            <label>
                Dodaj godzinę seansu
                <input type="time" name="godzina_seansu" required placeholder='Podaj godzinę seansu'>
            </label>
            <label>
                Dodaj ilość miejsc na seansie
                <input type="number" name="ilosc_miejsc" required placeholder='Podaj ilość miejsc na seansie' min='0'>
            </label>
            <label>
                Dodaj datę seansu
                <input type="date" name="dzien_wstawiony" required placeholder='Podaj datę seansu'>
            </label>
            <button>Dodaj seans</button>
        </form>
        <?php 
        if(isset($_POST['seans_do_wstawienia'])){
            $seans_do_wstawienia=$_POST['seans_do_wstawienia'];
            $godzina=$_POST['godzina_seansu'];
            $ilosc_miejsc=$_POST['ilosc_miejsc'];
            $data=$_POST['dzien_wstawiony'];
            $kwerenda_do_id_filmu='SELECT id FROM filmy_repertuar where nazwa_filmu="'.$seans_do_wstawienia.'"';
            $id_filmu_seans=$baza_danych->query($kwerenda_do_id_filmu)->fetch_assoc();
            $kwerenda_wstaw='INSERT INTO godziny_seansow (id_filmu, ilosc_miejsc, godzina, dzien_seansu) values ('.$id_filmu_seans['id'].','.$ilosc_miejsc.',"'.$godzina.'",'.$data.')';
            $baza_danych->query($kwerenda_wstaw);
        }
        ?>
    </main>

</html>

    <footer>
        <p>
            <small>
                Stronę przygotowali: <strong>Adam Mikołajczyk</strong>, <strong>Paweł Kowal</strong>, <strong>Martyna Szczur</strong>, <strong>Marcel Kotecki</strong> z <strong>5ti2</strong>
            </small>    
        </p>
    </footer>
    <?php 
    $baza_danych ->close()
    ?>
</body>
</html>
