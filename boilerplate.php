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

            <br>

            <label>
                Zmień rozmiar czcionki:
                <input type="range" id="czcionka" min="100" max="200" step="25" value="100">
                <span id="wartosc_czcionka">100%</span>   
            </label>

            <form action="boilerplate.php" method="post" id='logowanie'> <!-- action=boilerplate na potrzeby testów, w praktyce do zmiany na index -->
                <input type="hidden" name="nazwa_uzytkownika" id="nazwa_uzytkownika">
                <input type="hidden" name="haslo" id="haslo">
                <button onclick='PobierzDane()'>Zaloguj</button>
            </form>
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
        <ul id="navbar">
            <li><a href="index.php">Repertuar</a></li>
            <li><a href="index.php">Aktualności</a></li>
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
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, eius? Ut, cupiditate animi dolor quos aspernatur nam ullam odit impedit repellat aut magnam perspiciatis, dolores quisquam totam. Eum, expedita veritatis maiores laudantium ea quia odio ratione porro ex debitis quidem nisi tempora veniam ut quaerat dignissimos voluptate? Tempora nam doloremque laudantium, corporis vel, laborum excepturi ipsa quaerat voluptatibus inventore deleniti earum labore, dolorum veniam modi repudiandae sed omnis. Iusto nesciunt delectus corporis obcaecati maiores consectetur voluptatibus, quidem, natus perspiciatis nostrum dolor! Corrupti earum nihil natus, officia perspiciatis, quae dolor quia architecto fugit animi modi nam ipsa incidunt magnam porro. Laboriosam earum laudantium aspernatur? Fuga dignissimos ducimus, velit, ut amet sint tempora voluptatem veritatis porro esse molestiae excepturi reiciendis ullam perspiciatis mollitia voluptatum deleniti neque expedita sequi? Recusandae fugiat quidem aperiam voluptates cum consectetur alias minima placeat impedit tenetur nisi modi qui cumque perspiciatis nobis quos laboriosam numquam ex nulla, in voluptas sapiente maiores totam suscipit! Reiciendis pariatur at quos, vitae sunt repudiandae accusantium a, molestias beatae animi amet reprehenderit! Unde quod nisi ad nulla hic eos dolore cupiditate, nesciunt, voluptatum, consequatur et. Quae distinctio eaque ducimus nulla excepturi delectus quisquam assumenda, cupiditate repudiandae voluptas at minus placeat minima consequuntur provident sequi quo dicta adipisci quasi sunt iure itaque. Excepturi possimus rerum impedit atque veniam, mollitia quos officia rem nobis ex soluta quibusdam ad perspiciatis, aliquam id, doloribus porro quas vero blanditiis tempore in numquam laborum hic. Dolorum blanditiis, natus consectetur aperiam cumque pariatur ipsum molestiae qui culpa eius voluptas possimus tempore cupiditate accusantium molestias ad impedit accusamus eum quasi aliquid voluptatum distinctio rem esse? Voluptates natus officiis modi dignissimos dolorem vel, repellendus esse quo voluptatem explicabo culpa! Ipsa rem ex nostrum non officia temporibus veritatis quidem repudiandae odit ab accusamus amet, sunt qui repellendus fugiat voluptates quos fuga eaque pariatur cupiditate delectus dolorem odio velit? Veritatis atque consectetur quasi nemo sit nesciunt, molestiae ea? Est sit facere, architecto sed ratione aperiam eius sunt animi molestias totam numquam maxime, eum amet nostrum voluptas illo sapiente cupiditate, inventore eveniet nesciunt vero velit? Voluptatem obcaecati incidunt placeat necessitatibus, laboriosam modi voluptate laudantium distinctio eum accusamus sunt quibusdam quo ipsam dignissimos consequuntur, blanditiis temporibus velit quisquam dolorem? Perferendis quaerat recusandae quis iste, corrupti nostrum eveniet ullam officia voluptatem molestias rerum vitae quibusdam nulla optio officiis cum temporibus velit. Magnam, natus facere sed aspernatur officiis nobis, atque doloribus provident temporibus quisquam possimus animi nemo eveniet veritatis laborum maiores ipsum! Unde aliquam sint reprehenderit possimus dolor eveniet maxime maiores, libero ipsum voluptate modi beatae enim officia quisquam excepturi sapiente, similique dignissimos placeat cumque animi facilis tenetur aut natus! Sapiente illum, facere voluptatibus quisquam rem saepe eum, ullam laborum, laboriosam doloremque nobis eaque! Natus, consectetur magni. Blanditiis, ea in perspiciatis tenetur at magnam nostrum expedita alias libero omnis molestiae facere necessitatibus consequatur, veniam asperiores ipsa debitis vel a eum sequi quas! Excepturi molestiae repudiandae quo fugiat possimus, debitis voluptatibus repellat voluptates obcaecati, architecto suscipit ipsam consequatur quas enim sed quis? Distinctio deleniti debitis dignissimos quam, ipsum harum.
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