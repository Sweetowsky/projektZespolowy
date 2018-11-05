<?php
 
    session_start();
     
    session_unset();


// usuwanie wszystkich zmiennych z $_SESSION
//$_SESSION = array();


     
    header('Location: logowanie.php');
 
?>