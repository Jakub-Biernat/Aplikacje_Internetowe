<?php
session_start();

$link = mysqli_connect("localhost", "scott", "tiger", "instytut");

if (!$link) {
    $_SESSION['message'] = "Błąd połączenia z bazą danych";
    header("Location: form06_post.php");
    exit();
}

$id = isset($_POST['id_prac']) ? $_POST['id_prac'] : '';
$nazwisko = trim(isset($_POST['nazwisko']) ? $_POST['nazwisko'] : '');

if (!is_numeric($id) || $nazwisko === "") {
    $_SESSION['message'] = "Błąd: niepoprawne dane wejściowe";
    header("Location: form06_post.php");
    exit();
}

$sql = "INSERT INTO pracownicy(id_prac, nazwisko) VALUES(?, ?)";
$stmt = $link->prepare($sql);

if (!$stmt) {
    $_SESSION['message'] = "Błąd przygotowania zapytania SQL";
    header("Location: form06_post.php");
    exit();
}

$stmt->bind_param("is", $id, $nazwisko);

try {
    if ($stmt->execute()) {
        $_SESSION['message'] = "Dodano pracownika poprawnie";

        $stmt->close();
        $link->close();
        header("Location: form06_get.php");
        exit();
    }
} catch (mysqli_sql_exception $e) {
    if ($e->getCode() == 1062) {
        $_SESSION['message'] = "Błąd: Pracownik o ID $id już istnieje w bazie danych!";
    } else {
        $_SESSION['message'] = "Błąd bazy danych: " . $e->getMessage();
    }

    $stmt->close();
    $link->close();
    header("Location: form06_post.php");
    exit();
}