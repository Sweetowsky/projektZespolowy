<?php
 
    session_start();
     
    if (!isset($_SESSION['zalogowany']))
    {
        header('Location: logowanie.php');
        exit();
    }
     
?>
<?php include('naglowek.php'); ?>

<?php
 
    echo "<p>Witaj ".$_SESSION['imie']." ".$_SESSION['nazwisko'].'! [ <a href="logout.php">Wyloguj się!</a> ]</p>';
   echo $_SESSION['login'];
     
?>


 
<?php include('stopka.php'); ?>