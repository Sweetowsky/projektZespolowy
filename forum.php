<?php
 
    session_start();

 if (isset($_POST['temat']))
    {
$_SESSION['temat'] = $_POST['temat'];
$_SESSION['opis'] = $_POST['opis'];
$_SESSION['czas'] = $_POST['czas'];
$_SESSION['id'] = $_POST['id'];
$_SESSION['id_post'] = $_POST['id_post'];
$_SESSION['imie'] = $_POST['imie'];
$_SESSION['nazwisko'] = $_POST['nazwisko'];


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
$query="Select p.id_post,p.temat,p.opis,p.data_rozpoczecia, l.imie,l.nazwisko from post p join logowanie l On(p. id_tworcy = l. id)";

 if(isset($_GET["action"]))  
 {  
 
   header('Location: post.php');
     
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
        <form method="post" action="forum.php?action=add&id=<?php echo $row["id_post"]; ?>">  
            
        
            
            <h5><?php echo $row['temat']."<br>".$row['opis']."<br> DATA ROZPOCZECIA: ".$row['data_rozpoczecia']."<br> AUTOR: ".$row['imie']." ".$row['nazwisko']?> </h5>
            <br>
            <input type="hidden" name="temat" value="<?php echo $row["temat"]; ?>" />
            <input type="hidden" name="opis" value="<?php echo $row["opis"]; ?>" />
            <input type="hidden" name="czas" value="<?php echo $row["data_rozpoczecia"]; ?>" />
            <input type="hidden" name="id" value="<?php echo $row["id_tworcy"]; ?>" />
            <input type="hidden" name="id_post" value="<?php echo $row["id_post"]; ?>" />
            <input type="hidden" name="imie" value="<?php echo $row["imie"]; ?>" />
            <input type="hidden" name="nazwisko" value="<?php echo $row["nazwisko"]; ?>" />
            
         
                <input class="button_send" type="submit" value="Zobacz" />

        </form>  
    </div>  
        <?php  
        }  
        }  
    ?>  
              
</div>


<?php include('stopka.php'); ?>
































 
