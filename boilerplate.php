<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script defer src="script.js"></script>
    <title>Kino NOVA</title>
</head>
<body>
    <header>
        <img src="assets/img/logo.svg" alt="Logo strony">
        <h1>Kino NOVA</h1>
        <form action="index.php" method="post" id='logowanie'>
            <input type="hidden" name="nazwa_uzytkownika" id="nazwa_uzytkownika">
            <input type="hidden" name="haslo" id="haslo">
            <button onclick='PobierzDane()'>Zaloguj</button>
        </form>
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Strona główna</a></li>
            <li><a href="repertuar.php">Repertuar</a></li>
            <li><a href="premiery.php">Premiery</a></li>
            <li><a href="rezerwacje.php">Rezerwacje</a></li>
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
    $baza_danych ->close()
    ?>
</body>
</html>