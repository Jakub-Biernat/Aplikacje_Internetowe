<?php session_start(); ?>

<?php
if (isset($_GET['utworzCookie'])) {

    $czas = $_GET['czas'];
    setcookie("Cookie", "Oreo", time() + $czas, "/");

    $komunikat = "Cookie zostało utworzone.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP</title>
    <meta charset="UTF-8" />
</head>
<body>

<?php require_once("funkcje.php"); ?>

<fieldset>
    <legend>Informacja systemowa</legend>

    <?php
    if (isset($komunikat)) {
        echo $komunikat;
    }
    ?>

</fieldset>

<br>

<a href="index.php">Wstecz</a>

</body>
</html>