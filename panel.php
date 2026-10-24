<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script defer src="script.js"></script>
    <title>Kino NOVA | Panel zarządzania</title>
</head>
<body>
    <header>
        <img src="assets/img/logo.svg" alt="Logo strony">
        <h1>Kino NOVA</h1>
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Strona główna</a></li>
            <li><a href="repertuar.php">Repertuar</a></li>
            <li><a href="premiery.php">Premiery</a></li>
            <li><a href="rezerwacje.php">Rezerwacje</a></li>
            <li><a href="panel.php" id='panel_zarzadzania'>Panel zarządzania</a></li>
        </ul>
    </nav>

    <main>
        <?php 
        $baza_danych= new mysqli('127.0.0.1', 'root', '', 'kino_nova');
        
        ?>
        <form action="" method="post">
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