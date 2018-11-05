<?php
 
    session_start();
     
    if (!isset($_SESSION['udanarejestracja']))
    {
        header('Location: rejestracja.php');
        exit();
    }
    else
    {
        unset($_SESSION['udanarejestracja']);
    }
     
    //Usuwanie zmiennych pamiętających wartości wpisane do formularza
    if (isset($_SESSION['fr_imie'])) unset($_SESSION['fr_imie']);
    if (isset($_SESSION['fr_nazwisko'])) unset($_SESSION['fr_nazwisko']);
    if (isset($_SESSION['fr_nip'])) unset($_SESSION['fr_nip']);
    if (isset($_SESSION['fr_typ'])) unset($_SESSION['fr_typ']);
    if (isset($_SESSION['fr_email'])) unset($_SESSION['fr_email']);
    if (isset($_SESSION['fr_haslo1'])) unset($_SESSION['fr_haslo1']);
    if (isset($_SESSION['fr_haslo2'])) unset($_SESSION['fr_haslo2']);
    if (isset($_SESSION['fr_regulamin'])) unset($_SESSION['fr_regulamin']);
     
    //Usuwanie błędów rejestracji

    if (isset($_SESSION['e_email'])) unset($_SESSION['e_email']);
    if (isset($_SESSION['e_haslo'])) unset($_SESSION['e_haslo']);
    if (isset($_SESSION['e_regulamin'])) unset($_SESSION['e_regulamin']);
    if (isset($_SESSION['e_bot'])) unset($_SESSION['e_bot']);
     
?>
<?php include('naglowek.php'); ?>
     
    Dziękujemy za rejestrację w serwisie! Możesz już zalogować się na swoje konto!<br /><br />
     
    <a href="logowanie.php">Zaloguj się na swoje konto!</a>
    <br /><br />
 
<?php include('stopka.php'); ?>