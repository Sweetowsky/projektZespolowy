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
   echo $_SESSION['login'];
echo $_SESSION['imie'];
echo $_SESSION['nazwisko'];
echo $imie;
echo $nazwisko;

     
?>


 
<?php include('stopka.php'); ?>