


<?php
 
    session_start();
?>
<?php include('naglowek.php'); ?>
<h5> 
<?php    echo $_SESSION['temat'];  ?>
</h5><br>
<?php
echo $_SESSION['opis'];
?>

 
<?php include('stopka.php'); ?>