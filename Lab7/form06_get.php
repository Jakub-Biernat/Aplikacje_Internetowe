<?php
session_start();

$link = mysqli_connect("localhost", "scott", "tiger", "instytut");

if (!$link) {
    die("Błąd połączenia z bazą danych");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Lista pracowników</title>
</head>
<body>

<h2>Lista pracowników</h2>

<?php
if (isset($_SESSION['message'])) {
    echo "<p><b>" . htmlspecialchars($_SESSION['message']) . "</b></p>";
    unset($_SESSION['message']);
}
?>

<a href="form06_post.php">Dodaj nowego pracownika</a>

<hr>

<?php
$sql = "SELECT * FROM pracownicy";
$result = $link->query($sql);

if (!$result) {
    die("Błąd zapytania SQL");
}

foreach ($result as $row) {
    echo htmlspecialchars($row["ID_PRAC"]) . " "
        . htmlspecialchars($row["NAZWISKO"]) . "<br>";
}

$result->free();
$link->close();
?>

</body>
</html>