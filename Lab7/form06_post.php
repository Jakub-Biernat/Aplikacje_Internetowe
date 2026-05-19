<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dodaj pracownika</title>
</head>
<body>

<h2>Dodaj pracownika</h2>

<?php
if (isset($_SESSION['message'])) {
    echo "<p><b>" . htmlspecialchars($_SESSION['message']) . "</b></p>";
    unset($_SESSION['message']);
}
?>

<form action="form06_redirect.php" method="POST">
    ID pracownika:
    <input type="text" name="id_prac"><br>

    Nazwisko:
    <input type="text" name="nazwisko"><br><br>

    <input type="submit" value="Wstaw">
    <input type="reset" value="Wyczyść">
</form>

<br>

<a href="form06_get.php">Zobacz listę pracowników</a>

</body>
</html>