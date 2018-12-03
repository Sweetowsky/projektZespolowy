<?php
 
    session_start();
        $nazwisko = $_SESSION['nazwisko'];
        $imie = $_SESSION['imie'];
        $id_tworcy= $_SESSION['id_delikwenta'];
       
     
    if (!isset($_SESSION['zalogowany']))
    {
        header('Location: logowanie.php');
        exit();
    }
     
?>
<?php include('naglowek.php'); ?>

<?php
 
    echo "<p>Witaj ".$_SESSION['imie']." ".$_SESSION['nazwisko'].'! [ <a href="logout.php">Wyloguj się!</a> ]</p>';
   echo "Login: ".$_SESSION['login'];


     
?>


 
<?php include('stopka.php'); ?>