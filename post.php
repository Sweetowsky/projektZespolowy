


<?php
 
    session_start();
?>
<?php include('naglowek.php'); ?>
<?php    echo $_SESSION['id'];  ?>
<br>
<h5> 
<?php    echo $_SESSION['temat'];  ?>
</h5><br>
<?php
echo $_SESSION['opis'];
?>
<br>
<?php    echo $_SESSION['czas'];  ?>

 
<?php include('stopka.php'); ?>