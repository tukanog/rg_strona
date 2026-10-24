<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dark.css">
    <script defer src="script.js"></script>
    <title>Kino NOVA</title>
</head>
<body>
    <header>
        <img src="assets/img/logo.svg" alt="Logo strony">
        <h1>Kino NOVA</h1>
        <div>
            <label>
                <span id="motyw">Przełącz motyw (na jasny)</span><input type="checkbox" id="przycisk_motywu" onchange="przelaczMotyw()">
            </label>
            <form action="index.php" method="post" id='logowanie'>
                <input type="hidden" name="nazwa_uzytkownika" id="nazwa_uzytkownika">
                <input type="hidden" name="haslo" id="haslo">
                <button onclick='PobierzDane()'>Zaloguj</button>
            </form>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Repertuar</a></li>
            <li><a href="rezerwacje.php">Pomoc</a>
                <div class="nav_dropdown">
                    <ul>
                        <li>Cennik</li>
                        <li>Kontakt</li>
                        <li>Pozostałe FAQ</li>
                    </ul>
                </div>
            </li>
            <?php 
                if(isset($_POST['nazwa_uzytkownika'])){
                    $nazwa_uzytkownik=$_POST['nazwa_uzytkownika'];
                    $haslo=$_POST['haslo'];
                    $pobierz_uzytkownika='SELECT * FROM uzytkownicy WHERE nazwa LIKE "'.$nazwa_uzytkownik.'" AND haslo LIKE "'.$haslo.'"';
                    $baza_danych= new mysqli('127.0.0.1', 'root', '', 'kino_nova');
                    $sprawdz_uzytkownika=$baza_danych->query($pobierz_uzytkownika);
                    if($sprawdz_uzytkownika){
                    ?>
                    <li><a href="panel.php" id='panel_zarzadzania'>Panel zarządzania</a></li>
                    <?php
                    }
                }
            ?>
        </ul>
    </nav>

    <main>

    </main>

    <footer>
        <p>
            <small>
                Stronę przygotowali: <strong>Adam Mikołajczyk</strong>, <strong>Paweł Kowal</strong>, <strong>Martyna Szczur</strong>, <strong>Marcel Kotecki</strong> z <strong>5ti2</strong>
            </small>    
        </p>
    </footer>
    <?php 
        $baza_danych->close()
    ?>
</body>
</html>