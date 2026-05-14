<?php session_start(); ?>
<?php
require("funkcje.php");
?>

<?php
if (isSet($_POST['wyloguj'])) {
    $_SESSION['zalogowany'] = 0;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP</title>
    <meta charset='UTF-8' />
</head>
<body>
    <h1>
        <?php
        echo "Nasz system";
        ?>
    </h1>

    <form action="logowanie.php" method="POST">

        <label>Login:</label>
        <input type="text" name="login"><br>

        <label>Hasło:</label>
        <input type="password" name="haslo"><br>

        <input type="submit" name="zaloguj" value="Zaloguj">

    </form>

    <br>
    <a href="user.php">user.php</a>

</body>
</html>
