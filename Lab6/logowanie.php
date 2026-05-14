<?php session_start(); ?>
<?php require("funkcje.php"); ?>

<?php
if (isSet($_POST['zaloguj'])) {

    $login = test_input($_POST['login']);
    $haslo = test_input($_POST['haslo']);

    //echo "Przesłany login: " . $login . "<br>";
    //echo "Przesłane hasło: " . $haslo;

    if ($login == $osoba1->login && $haslo == $osoba1->haslo) {

        $_SESSION['zalogowany'] = 1;
        $_SESSION['zalogowanyImie'] = $osoba1->imieNazwisko;

        header("Location: user.php");
        exit();
    }

    elseif ($login == $osoba2->login && $haslo == $osoba2->haslo) {

        $_SESSION['zalogowany'] = 1;
        $_SESSION['zalogowanyImie'] = $osoba2->imieNazwisko;

        header("Location: user.php");
        exit();
    }

    else {
        header("Location: index.php");
        exit();
    }
}
?>
