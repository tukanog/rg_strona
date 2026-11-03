<?php 
    session_start();
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
                <a href="logowanie.php">Zaloguj</a>
                <?php } else { ?> 
                    <a href="wylogowanie.php">Wyloguj</a>
                <?php }; ?>
            </li>
            </li>
            <?php 
                if (empty($_SESSION)) {

                } else { ?>
                    <li><a href="panel.php" id='panel_zarzadzania'>Panel zarządzania</a></li>
            <?php
                }
            ?>
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
        <section id="cennik">
            <div class="pomoc_wrapper">

                <h2>Cennik biletów</h2>
                <p class="cennik_desc">
                    Sprawdź ceny biletów i skorzystaj z atrakcyjnych
                    cen przy wcześniejszym zakupie!
                </p>

                <table class="cennik_table">
                    <thead>
                        <tr>
                            <th>Rodzaj biletu</th>
                            <th>Cena podstawowa</th>
                            <th>14 dni i więcej</th>
                            <th>7 dni przed</th>
                            <th>3 dni przed</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Bilet normalny</td>
                            <td>30 zł</td>
                            <td class="rabat">25,20 zł</td>
                            <td class="rabat">27 zł</td>
                            <td>30 zł</td>
                        </tr>

                        <tr>
                            <td>Bilet ulgowy</td>
                            <td>24 zł</td>
                            <td class="rabat">20,16 zł</td>
                            <td class="rabat">21,60 zł</td>
                            <td>24 zł</td>
                        </tr>

                        <tr>
                            <td>Dzieci do lat 6</td>
                            <td>0 zł</td>
                            <td>0 zł</td>
                            <td>0 zł</td>
                            <td>0 zł</td>
                        </tr>

                        <tr>
                            <td>Maratony filmowe</td>
                            <td>55 zł</td>
                            <td class="rabat">46,20 zł</td>
                            <td class="rabat">49,50 zł</td>
                            <td>55 zł</td>
                        </tr>

                        <tr>
                            <td>Grupy powyżej 30 osób</td>
                            <td>20 zł / os.</td>
                            <td class="rabat">16,80 zł / os.</td>
                            <td class="rabat">18 zł / os.</td>
                            <td>20 zł / os.</td>
                        </tr>
                    </tbody>
                </table>

                <div class="cennik_info">
                    <h3>Ważne informacje</h3>
                    <ul>
                        <li>Bilet ulgowy przysługuje uczniom i studentom za okazaniem ważnej legitymacji.</li>
                        <li>Dzieci do lat 6 mogą wejść bezpłatnie pod opieką osoby dorosłej.</li>
                        <li>Cena grupowa obowiązuje przy zakupie minimum 31 biletów.</li>
                        <li>Zakup 14 dni lub więcej przed seansem oznacza 84% ceny podstawowej.</li>
                        <li>Zakup 7 dni przed seansem oznacza 90% ceny podstawowej.</li>
                        <li>Zakup 3 dni przed seansem oznacza 100% ceny podstawowej.</li>
                        <li>Rabaty nie łączą się z innymi promocjami.</li>
                    </ul>
                </div>

            </div>
        </section>

        <section id="kontakt">
            <div class="pomoc_wrapper" id="kontakt_wrapper">

                <div class="kontakt_item">  
                    <h2>Kontakt</h2>
                    <p>Masz pytania? Skontaktuj się z nami!</p>
                    <h3>Adres e-mail</h3>
                    <a href="mailto:kino.nova@nova.kontakt.pl" target="_blank">
                        kino.nova@nova.kontakt.pl
                    </a>

                    <h3>Numer telefonu</h3>
                    <a href="tel:+38111111111" target="_blank">
                        +48 111 111 111
                    </a>
                </div>

                <div class="kontakt_item">
                    <h3>Nasza lokalizacja</h3>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d4494.0027508985995!2d19.8457817!3d51.3627625!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47198d24a97cbf45%3A0xf336da6e3d8e4feb!2zTGXFm25hIDY3LCA5Ny0zMzAgU3VsZWrDs3c!5e1!3m2!1spl!2spl!4v1793653239328!5m2!1spl!2spl" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
                </div>
            </div>
        </section>

        <section id="inne">
            <div class="pomoc_wrapper">
                <h2>Zgłoś problem</h2>
                <p>Wypełnij formularz, aby zgłosić problem związany z zakupem biletu do kina.</p>

                <form action="#" method="post">

                    <label for="problem">Rodzaj problemu:</label>
                    <select id="problem" name="problem" required>
                        <option value="">Wybierz rodzaj problemu</option>
                        <option value="zwrot">Zwrot biletu</option>
                        <option value="bledny-zakup">Błędny zakup</option>
                        <option value="platnosc">Problem z płatnością</option>
                        <option value="brak-biletu">Nie otrzymałem biletu na e-mail</option>
                        <option value="bledne-dane">Błędne dane na bilecie</option>
                        <option value="kod-qr">Nieprawidłowy kod QR</option>
                        <option value="podwojny-zakup">Podwójny zakup biletu</option>
                        <option value="rezerwacja">Problem z rezerwacją miejsc</option>
                        <option value="inny">Inny problem</option>
                    </select>

                    <label for="wiek">Wiek:</label>
                    <input type="number" id="wiek" name="wiek"
                        min="1" max="120" placeholder="Podaj swój wiek" required>

                    <label for="numer-biletu">Numer biletu:</label>
                    <input type="text" id="numer-biletu" name="numer-biletu"
                        placeholder="Wpisz numer biletu" required>

                    <label for="email">Adres e-mail:</label>
                    <input type="email" id="email" name="email"
                        placeholder="np. przyklad@email.com" required>

                    <label for="opis">Krótki opis problemu:</label>
                    <textarea id="opis" name="opis" rows="5"
                            placeholder="Opisz krótko, czego dotyczy problem..."
                            required></textarea>

                    <button type="submit">Wyślij zgłoszenie</button>

                </form>
            </div>
        </section>
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