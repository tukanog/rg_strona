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
       
        $baza_danych = new mysqli('127.0.0.1', 'root', '', 'kino_nova');

        if(isset($_POST['zapisz_rezerwacje'])){
            $ilosc_biletow = $_POST['ile_biletow'];
            $seans_id = $_POST['id_seansu'];
            $imie = $_POST['imie'];
            $nazwisko = $_POST['nazwisko'];
            $email = $_POST['email'];

            $sprawdzanie_ilosci_wolnych='SELECT ilosc_miejsc from godziny_seansow';
            $ile_seansow=$baza_danych->query($sprawdzanie_ilosci_wolnych);
            if($ile_seansow>=$ilosc_biletow){

            $dodaj_rezerwacje = "INSERT INTO rezerwacje (id_seansu, ilosc_biletow, imie, nazwisko, email) VALUES ($seans_id, $ilosc_biletow, '$imie', '$nazwisko', '$email')";
            }else{

            }
            if($baza_danych->query($dodaj_rezerwacje)){
  
                $aktualizuj = "UPDATE godziny_seansow SET ilosc_miejsc = ilosc_miejsc - $ilosc_biletow WHERE id_seansu = $seans_id";
                $baza_danych->query($aktualizuj);
                

                header("Location: " . $_SERVER['PHP_SELF']);
                exit();
            } else {
                echo "Błąd: " . $baza_danych->error;
            }
        }
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
                <form action="repertuar.php" method="post" id='logowanie'>
                    <input type="hidden" name="nazwa_uzytkownika" id="nazwa_uzytkownika">
                    <input type="hidden" name="haslo" id="haslo">
                    <button id="button_login" onclick='PobierzDane()'>Zaloguj</button>
                </form>
            </li>
            <?php 
                if(isset($_POST['nazwa_uzytkownika'])){
                    $nazwa_uzytkownik = $_POST['nazwa_uzytkownika'];
                    $haslo = $_POST['haslo'];
                    $pobierz_uzytkownika = 'SELECT * FROM uzytkownicy WHERE nazwa LIKE "'.$nazwa_uzytkownik.'" AND haslo LIKE "'.$haslo.'"';
                    $sprawdz_uzytkownika = $baza_danych->query($pobierz_uzytkownika);
                    if($sprawdz_uzytkownika && $sprawdz_uzytkownika->num_rows > 0){
                    ?>
                    <li><a href="panel.php" id='panel_zarzadzania'>Panel zarządzania</a></li>
                    <?php
                    }
                }
            ?>
        </ul>
        <ul id="navbar">
            <li><a href="./repertuar.php">Repertuar</a></li>
            <li><a href="./index.php">Aktualności</a></li>
            <li><a href="./rezerwacje.php">Pomoc  &#129095;</a>
                <div class="nav_dropdown">
                    <ul>
                        <li>Cennik</li>
                        <li>Kontakt</li>
                        <li>Pozostałe FAQ</li>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>

    <main>
        <h2>Repertuar</h2>
        <?php 
        $pobierz_filmy_repertuar = 'SELECT id, nazwa_filmu, opis, grafika, czas_trwania, gatunek FROM filmy_repertuar';
        $wszystkie_filmy = $baza_danych->query($pobierz_filmy_repertuar);

        while($film = $wszystkie_filmy->fetch_assoc()){
        ?>
        <div>
            <img src="./assets/img<?=$film['grafika']?>" alt="<?=$film['nazwa_filmu']?>">
            <h3><?=$film['nazwa_filmu']?></h3>
            <p>
                <small>Czas trwania: <?=$film['czas_trwania']?> min.</small><br>
                <small>Gatunek: <?=$film['gatunek']?></small>
            </p>
            <p><?=$film['opis']?></p>
            
            <?php 
            $pobierz_seanse = 'SELECT DISTINCT godzina FROM `godziny_seansow` WHERE id_filmu = '.$film['id'];
            $seans = $baza_danych->query($pobierz_seanse); 
            while($seans1 = $seans->fetch_assoc()){
            ?>
            <div onclick='Rezerwacje(event, this)' >
                <?= $seans1['godzina'] ?>
                <div class='zarezerwuj'>
                    <span onclick='ZamknijRezerwacje(event, this)'  class='zamknij'>[X]</span>
                    <form method="post" onclick="event.stopPropagation()">            
                        <label>
                            Wybierz datę: 
                            <select name="id_seansu" required>
                                <?php 
                                $pobierz_daty = "SELECT id_seansu, dzien_seansu FROM `godziny_seansow` WHERE id_filmu = " . $film['id'] . " AND godzina = '" . $seans1['godzina'] . "'";
                                $wynik_daty = $baza_danych->query($pobierz_daty);
                                
                                while($data = $wynik_daty->fetch_assoc()){
                                ?>
                                    <option value="<?= $data['id_seansu'] ?>"><?= $data['dzien_seansu'] ?></option>
                                <?php } ?>
                            </select>
                        </label><br>
                        <label>
                            Ilość biletów:
                            <input type="number" name="ile_biletow" value="1" min="1" required>
                        </label><br>
                        <label>Podaj imię:
                            <input type="text" name="imie" placeholder='Imię' required>
                        </label><br>
                        <label>Podaj nazwisko:
                            <input type="text" name="nazwisko" placeholder='Nazwisko' required>
                        </label><br>
                        <label>Podaj e-mail:
                            <input type="email" name="email" placeholder='Adres E-mail' required>
                        </label><br>
                        <button type="submit" name="zapisz_rezerwacje">Zarezerwuj</button>
                    </form> 
                </div>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
    </main>

    <footer>
        <p>
            <small>
                Stronę przygotowali <strong>Adam Mikołajczyk</strong>, <strong>Paweł Kowal</strong>, <strong>Martyna Szczur</strong>, <strong>Marcel Kotecki</strong> z <strong>5ti2</strong>
            </small>    
        </p>
    </footer>
    <?php 
        $baza_danych->close();
    ?>
</body>
</html>
