<?php session_start(); ?>

<?php

if (!isset($_SESSION['zalogowany']) || $_SESSION['zalogowany'] != 1) {

    header("Location: index.php");
    exit();
}

if (isset($_POST['wyslij'])) {
    $plik = $_FILES['plik'];
    $nazwa = "obrazek.jpg";

    $sciezka = "upload/" . $nazwa;

    move_uploaded_file($plik['tmp_name'], $sciezka);
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>PHP</title>
        <meta charset='UTF-8' />
    </head>
    <body>
        <?php
        require_once("funkcje.php");
        echo "Zalogowano: " . $_SESSION['zalogowanyImie'];
        ?>

        <br>
        <a href="index.php">index.php</a>
        <br>

        <form action="index.php" method="POST">
            <input type="submit" name="wyloguj" value="wyloguj">
        </form>
        <br>

        <form action='user.php' method='POST' enctype='multipart/form-data'>
            <input type="file" name="plik">

            <input type="submit" name="wyslij" value="wyślij">
        </form>

        <?php
        $obrazek = "upload/obrazek.jpg";

        if (file_exists($obrazek)) {
            echo "<img src='$obrazek' width='300'>";
        } else {
            echo "Zdjęcie nie zostało jeszcze dodane.";
        }
        ?>
    </body>
</html>
