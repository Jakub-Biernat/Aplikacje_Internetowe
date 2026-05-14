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
    <meta charset="UTF-8" />
</head>
<body>

<?php
require_once("funkcje.php");
echo "<h2>Zalogowano: " . $_SESSION['zalogowanyImie'] . "</h2>";
?>

<a href="index.php">Powrót do strony głównej</a>

<br><br>

<fieldset>
    <legend>Wylogowanie</legend>

    <form action="index.php" method="POST">
        <input type="submit" name="wyloguj" value="wyloguj">
    </form>

</fieldset>

<br>

<fieldset>
    <legend>Upload zdjęcia</legend>

    <form action="user.php" method="POST" enctype="multipart/form-data">

        Wybierz plik JPG/PNG:<br>
        <input type="file" name="plik"><br><br>

        <input type="submit" name="wyslij" value="wyślij">

    </form>

</fieldset>

<br>

<fieldset>
    <legend>Podgląd zdjęcia</legend>

    <?php
    $obrazek = "upload/obrazek.jpg";

    if (file_exists($obrazek)) {
        echo "<img src='$obrazek' width='300'>";
    } else {
        echo "Zdjęcie nie zostało jeszcze dodane.";
    }
    ?>

</fieldset>

</body>
</html>