<?php
 
    session_start();

 if (isset($_POST['temat']))
    {
$_SESSION['temat'] = $_POST['temat'];
$_SESSION['opis'] = $_POST['opis'];
$_SESSION['czas'] = $_POST['czas'];
$_SESSION['id'] = $_POST['id'];

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
 $query = "SELECT * FROM post ";

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
            
        
            
            <h5><?php echo $row['temat']."<br>".$row['opis']."<br> DATA ROZPOCZECIA: ".$row['data_rozpoczecia']."<br> ID AUTORA: ".$row['id_tworcy']?> </h5>
            <br>
            <input type="hidden" name="temat" value="<?php echo $row["temat"]; ?>" />
            <input type="hidden" name="opis" value="<?php echo $row["opis"]; ?>" />
            <input type="hidden" name="czas" value="<?php echo $row["data_rozpoczecia"]; ?>" />
            <input type="hidden" name="id" value="<?php echo $row["id_tworcy"]; ?>" />
            
         
                <input class="button_send" type="submit" value="Zobacz" />

        </form>  
    </div>  
        <?php  
        }  
        }  
    ?>  
              
</div>


<?php include('stopka.php'); ?>
































 
