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
                <form action="boilerplate.php" method="post" id='logowanie'> <!-- action do zmiany -->
                    <input type="hidden" name="nazwa_uzytkownika" id="nazwa_uzytkownika">
                    <input type="hidden" name="haslo" id="haslo">
                    <button id="button_login" onclick='PobierzDane()'>Zaloguj</button>
                </form>
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
                        <li>Cennik</li>
                        <li>Kontakt</li>
                        <li>Pozostałe FAQ</li>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>

    <main>
        <h2>Tablica naszych aktualności!</h2>

        <div class="news_post">
            <h3>Premiera Tygodnia - Zaplanuj swój weekend z NOVA!</h3>
            <p><small>20.06.2025</small> <small>14:00</small></p>
            <div class="news_content">
                <p>Nadszedł piątek, a wraz z nim długo wyczekiwana premiera najnowszego widowiska sci-fi tego roku! Efekty specjalne, porywająca fabuła i gwiazdorska obsada czekają na Was na naszych największych ekranach. Nie zwlekaj – najlepsze miejsca szybko znikają! Kup bilet online bez kolejki na naszej stronie internetowej. Do zobaczenia w NOVA!</p>
            </div>
        </div>
        
        <div class="news_post">
            <h3>Prosto z Londynu na ekran NOVA - Spektakl Operowy na żywo!</h3>
            <p><small>16.06.2025</small> <small>13:00</small></p>
            <div class="news_content">
                <p>Kino NOVA to nie tylko filmy! Już w przyszłym miesiącu zapraszamy na transmisję na żywo z prestiżowej Royal Opera House w Londynie. Doświadcz magii opery i baletu w najwyższej jakości obrazu HD i nieskazitelnym dźwięku, nie wyjeżdżając z miasta. Bilety na to wyjątkowe wydarzenie są już dostępne w sprzedaży.</p>
            </div>
        </div>

        <div class="news_post">
            <h3>Dołącz do Klubu NOVA i zbieraj punkty za każdy seans!</h3>
            <p><small>17.05.2025</small> <small>17:00</small></p>
            <div class="news_content">
                <p>Oglądasz dużo filmów? Dołącz do naszego darmowego programu lojalnościowego "Klub NOVA"! Zarejestruj się w aplikacji lub na stronie internetowej, a za każdy zakupiony bilet i przekąskę zgarniaj punkty, które wymienisz na darmowe bilety, przekąski oraz zniżki na pokazy specjalne. Zostań naszym stałym klubowiczem już dzisiaj!</p>
            </div>
        </div>

        <div class="news_post">
            <h3>Cykl Kino Konesera - Niezależne perełki i festiwalowe hity</h3>
            <p><small>03.05.2025</small> <small>09:00</small></p>
            <div class="news_content">
                <p>Dla miłośników niebanalnego kina przygotowaliśmy coś specjalnego! W każdy czwartek o 19:00 zapraszamy na "Kino Konesera NOVA". Pokazujemy nagradzane produkcje z festiwali w Cannes, Berlinie i Wenecji, niszowe dokumenty oraz klasykę światowego kinematografu. Po wyselekcjonowanych seansach zapraszamy na krótkie dyskusje z krytykami filmowymi.</p>
            </div>
        </div>

        <div class="news_post">
            <h3>Spróbuj nowości w NOVA Snack Bar - Nachosy w nowym wydaniu!</h3>
            <p><small>19.04.2025</small> <small>19:00</small></p>
            <div class="news_content">
                <p>Dobre kino wymaga doskonałych przekąsek! W naszym menu zagościły właśnie nowe, chrupiące nachosy z gorącym serem cheddar lub pikantną salsą habanero, serwowane w ekologicznych opakowaniach. A dla fanów słodkości - limitowana seria popcornu o smaku solonego karmelu. Co wybierzesz na swój najbliższy seans?</p>
            </div>
        </div>

        <div class="news_post">
            <h3>Poczuj każdy detal - Salony NOVA VIP i fotele Recliner</h3>
            <p><small>14.04.2025</small> <small>14:00</small></p>
            <div class="news_content">
                <p>W kinach NOVA stawiamy na absolutny komfort. Czy wiesz, że w naszych salach VIP możesz oglądać filmy w rozkładanych fotelach z możliwością regulacji oparcia i podnóżka? Dodaj do tego projektory laserowe 4K oraz wielokanałowy system dźwiękowy, a uzyskasz wrażenia, których nie da się powtórzyć w domu. Zarezerwuj seans VIP i doświadcz kina na nowym poziomie.</p>
            </div>
        </div>

        <div class="news_post">
            <h3>Rodzinne Poranki w NOVA - Magia bajek dla najmłodszych</h3>
            <p><small>29.03.2025</small> <small>07:00</small></p>
            <div class="news_content">
                <p>Szukasz pomysłu na udany weekend z dziećmi? Zapraszamy na cykl "Kino Malucha"! W każdą sobotę i niedzielę o 10:00 prezentujemy najpiękniejsze animacje z wyciszonym dźwiękiem i delikatnie oświetloną salą, dostosowaną do potrzeb najmłodszych widzów. Po seansie na dzieci czekają animacje, kolorowanki i małe upominki. Zaplanujcie rodzinny czas w NOVA!</p>
            </div>
        </div>

        <div class="news_post">
            <h3>Noc z dreszczykiem - Maraton Horrorów w kinach NOVA</h3>
            <p><small>13.03.2025</small> <small>16:00</small></p>
            <div class="news_content">
                <p>Masz mocne nerwy? Przygotuj się na całonocną ucztę dla fanów mocnych wrażeń! Już w najbliższy piątek zapraszamy na Nocny Maraton Filmowy. Wyświetlimy cztery najbardziej przerażające premiery sezonu ciągiem, na wielkim ekranie i z potężnym dźwiękiem spatial audio. Dla każdego uczestnika maratonu - doładowanie kofeinowe w kinowej kawiarni w cenie biletu!</p>
            </div>
        </div>

        <div class="news_post">
            <h3>Wtorki z NOVA - Oglądaj więcej za mniej!</h3>
            <p><small>04.03.2025</small> <small>11:00</small></p>
            <div class="news_content">
                <p>Kto powiedział, że środek tygodnia musi być nudny? W każdy wtorek w kinach NOVA wszystkie bilety na seanse 2D kupisz w stałej, niższej cenie! To idealny moment, aby nadrobić filmowe zaległości lub wybrać się na głośny hit z rodziną i znajomymi. Sprawdź nasz aktualny repertuar i zarezerwuj swój ulubiony fotel już dziś!</p>
            </div>
        </div>        

        <div class="news_post">
            <h3>Nowa era kinowych wrażeń - Wielkie Otwarcie sieci kin NOVA!</h3>
            <p><small>13.02.2025</small> <small>08:00</small></p>
            <div class="news_content">
                <p>Z dumą ogłaszamy, że sieć kin NOVA oficjalnie otwiera swoje drzwi! Odkryj najwyższą jakość obrazu i dźwięku, najwygodniejsze fotele premium i atmosferę, która przeniesie Cię wprost do wnętrza filmowych historii. Z okazji otwarcia przygotowaliśmy dla Was mnóstwo niespodzianek, darmowy popcorn do pierwszych biletów oraz wyjątkowe pokazy przedpremierowe. Bądźcie częścią tej nowej kinowej przygody - do zobaczenia przed wielkim ekranem!</p>
            </div>
        </div>
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