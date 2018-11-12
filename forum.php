<?php
 
    session_start();
     
    if (!isset($_SESSION['zalogowany']))
    {
        header('Location: logowanie.php');
    
        exit();
    }
     
?>
<?php include('naglowek.php'); ?>
Tu bedą posty

 
<?php include('stopka.php'); ?>