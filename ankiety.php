<?php
 
    session_start();

 if (isset($_POST['temat']))
    {
$_SESSION['temat'] = $_POST['temat'];
$_SESSION['pytanie'] = $_POST['pytanie'];
$_SESSION['opis'] = $_POST['opis'];
$_SESSION['data_rozpoczecia'] = $_POST['data_rozpoczecia'];
$_SESSION['data_zakonczenia'] = $_POST['data_zakonczenia'];
$_SESSION['id'] = $_POST['id'];
$_SESSION['id_ankieta'] = $_POST['id_ankieta'];
$_SESSION['imie'] = $_POST['imie'];
$_SESSION['nazwisko'] = $_POST['nazwisko'];
$_SESSION['opcjaA'] = $_POST['opcjaA'];
$_SESSION['opcjaB'] = $_POST['opcjaB'];
$_SESSION['opcjaC'] = $_POST['opcjaC'];


 }
    if (!isset($_SESSION['zalogowany']))
    {
        header('Location: logowanie.php');
    
        exit();
    }
 require_once "connect.php";

 $connect =  @new mysqli($host, $db_user, $db_password, $db_name);
     
?>
<?php include('naglowek.php'); ?>

  
<?php
 //$query = "SELECT * FROM post ";
$query="Select a.id_ankieta,a.temat,a.pytanie,a.opis,a.data_rozpoczecia, a.data_zakonczenia,l.imie,l.nazwisko, a.opcjaA, a.opcjaB, a.opcjaC from ankieta a join logowanie l On(a. id_tworcy = l. id)";

 if(isset($_GET["action"]))  
 {  
 
   header('Location: zobacz_ankieta.php');
     
 }

?>

<div class="rodzic">
    <?php
        mysqli_query($connect, "SET CHARSET utf8");
        mysqli_query($connect, "SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");
        if ($result = $connect->query($query)) {
            /* fetch associative array */
            while ($row = $result->fetch_assoc()) {
            ?>
    
    <div class="post">  
        <form method="post" action="ankiety.php?action=add&id=<?php echo $row["id_ankieta"]; ?>">



            <h5><?php echo "<font color=#eb5937 size='20' face='Caveat'>".$row['temat']."</font><br>".$row['pytanie']."<br>".$row['opis']."<br> <b><font color=#eb5937>DATA ROZPOCZECIA:</font> </b>".$row['data_rozpoczecia']."<br> <b><font color=#eb5937>DATA ZAKOŃCZENIA:</font></b> ".$row['data_zakonczenia']."<br><b><font color=#eb5937> AUTOR:</font> </b>".$row['imie']." ".$row['nazwisko']?> </h5>
            
            <input  type="hidden" name="temat" value="<?php echo $row["temat"]; ?>" />
			<input type="hidden" name="pytanie" value="<?php echo $row["pytanie"]; ?>" />
            <input type="hidden" name="opis" value="<?php echo $row["opis"]; ?>" />
            <input type="hidden" name="data_rozpoczecia" value="<?php echo $row["data_rozpoczecia"]; ?>" />
			<input type="hidden" name="data_zakonczenia" value="<?php echo $row["data_zakonczenia"]; ?>" />
            <input type="hidden" name="id" value="<?php echo $row["id_tworcy"]; ?>" />
            <input type="hidden" name="id_post" value="<?php echo $row["id_post"]; ?>" />
            <input type="hidden" name="imie" value="<?php echo $row["imie"]; ?>" />
            <input type="hidden" name="nazwisko" value="<?php echo $row["nazwisko"]; ?>" />
            <input type="hidden" name="id_ankieta" value="<?php echo $row["id_ankieta"]; ?>" />
             <input type="hidden" name="opcjaA" value="<?php echo $row["opcjaA"]; ?>" />
            <input type="hidden" name="opcjaB" value="<?php echo $row["opcjaB"]; ?>" />
            <input type="hidden" name="opcjaC" value="<?php echo $row["opcjaC"]; ?>" />
            
                <input class="button_send" type="submit" value="Zobacz" />
            
              

        </form>  
        
 
                        
        
        

           

    </div>  
        <?php  
        }  
        }  
    ?>  
              
</div>
<!--<div class='ajax-poll' tclass='poll-simple' style='width:450px;'></div>-->

<?php include('stopka.php'); ?>