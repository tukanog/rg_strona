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
            <img src="assets/img/logo_white.svg" id="logo_img" alt="Logo strony">
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
            $kwerenda_wstaw='INSERT INTO filmy_repertuar (nazwa_filmu, opis, grafika) values ("'.$film_do_wstawienia.'","'.$opis.'","'.$grafika.'")';
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
