<?php
    session_start();
    $db = new mysqli('localhost', 'root', '', 'kino_nova');

    if(isset($_POST['username'], $_POST['password'])){
        $username = $_POST['username'];
        $password = sha1($_POST['password']);

        // Połączenie z bazą danych
        

        $user = $db->query("SELECT * FROM `uzytkownicy` WHERE `nazwa` LIKE '$username' AND `haslo` LIKE '$password';");

        if ($user->num_rows == 1) {
            $user = $user->fetch_assoc();
            $_SESSION['id'] = $user['id']; // $_SESSION to tablica globalna do sesji
            $_SESSION['username'] = $user['nazwa'];
            header('Location: index.php'); // wysyła do innej strony
        } else { $komunikat = 'Niepoprawne dane'; }
    };

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
                <a href="logowanie.php">
                    <button>Zaloguj</button>
                </a>
            </li>
            </li>
            <?php 
                if(isset($_POST['nazwa_uzytkownika'])){
                    $nazwa_uzytkownik=$_POST['nazwa_uzytkownika'];
                    $haslo=$_POST['haslo'];
                    $pobierz_uzytkownika='SELECT * FROM uzytkownicy WHERE nazwa LIKE "'.$nazwa_uzytkownik.'" AND haslo LIKE "'.$haslo.'"';
                    $sprawdz_uzytkownika=$baza_danych->query($pobierz_uzytkownika);
                    if($sprawdz_uzytkownika){
                    ?>
                    <li><a href="panel.php" id='panel_zarzadzania'>Panel zarządzania</a></li>
                    <?php
                    }
                }
            ?>
        </ul>
        <ul id="navbar">
            <li><a href="index.php">Repertuar</a></li>
            <li><a href="aktualnosci.php">Aktualności</a></li>
            <li><a href="rezerwacje.php">Pomoc  &#129095;</a>
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
        <p><?php if(isset($komunikat)) { echo $komunikat; }; ?></p>
        
        <form action="logowanie.php" method="POST">
            <label for="username">Nazwa użytkownika:</label>
            <input type="text" id="username" name="username" required>


            <label for="password">Hasło:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Zaloguj</button>
        </form>
    </main>

    <footer>
        <p>
            <small>
                Stronę przygotowali <strong>Adam Mikołajczyk</strong>, <strong>Paweł Kowal</strong>, <strong>Martyna Szczur</strong>, <strong>Marcel Kotecki</strong> z <strong>5ti2</strong>
            </small>    
        </p>
    </footer>
    <?php 
        $baza_danych->close()
    ?>
</body>
</html>