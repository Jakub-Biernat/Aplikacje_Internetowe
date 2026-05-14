<?php session_start(); ?>
<?php require("funkcje.php"); ?>

<?php
if (isset($_POST['wyloguj'])) {
    $_SESSION['zalogowany'] = 0;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP</title>
    <meta charset="UTF-8" />
</head>
<body>

<h1>Nasz system</h1>

<fieldset>
    <legend>Logowanie użytkownika</legend>

    <form action="logowanie.php" method="POST">

        Login:<br>
        <input type="text" name="login"><br>

        Hasło:<br>
        <input type="password" name="haslo"><br>

        <input type="submit" name="zaloguj" value="Zaloguj">

    </form>
</fieldset>

<br>

<a href="user.php">Przejdź do panelu użytkownika</a>

<br><br>


<fieldset>
    <legend>Tworzenie ciasteczka (cookie)</legend>

    <form action="cookie.php" method="GET">

        Czas życia cookie (sekundy):<br>
        <input type="number" name="czas"><br>

        <input type="submit" name="utworzCookie" value="Utwórz Cookie">

    </form>

</fieldset>

<br>

<fieldset>
    <legend>Informacja o cookie</legend>

    <?php
    if (isset($_COOKIE['Cookie'])) {
        echo "Wartość cookie: " . $_COOKIE['Cookie'];
    } else {
        echo "Cookie nie istnieje lub wygasło.";
    }
    ?>

</fieldset>

</body>
</html>