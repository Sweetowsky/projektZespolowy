<?php
 
    session_start();


$id_post=$_SESSION['id_post'];

 require_once "connect.php";

 $connect =  @new mysqli($host, $db_user, $db_password, $db_name);


 if(isset($_GET["action"]))  
 {  
 
   header('Location: dodajkomentarz.php');
     
 } 
?>



<?php include('naglowek.php'); ?>

<?php
 //$query = "SELECT * FROM post ";
$query="Select * from komentarz where id_postu='$id_post'";



?>


<div id="imie">  <?php    echo $_SESSION['imie']." ".$_SESSION['nazwisko']  ?>  </div>

<div id="czas">  <?php    echo $_SESSION['czas'];  ?>  </div>
<br>
<div id="temat"> <?php    echo $_SESSION['temat'];  ?>   </div>
<br>
<div id="opis">  <?php    echo $_SESSION['opis'];?>   </div>




    <?php
        
        mysqli_query($connect, "SET CHARSET utf8");
        mysqli_query($connect, "SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");
        if ($result = $connect->query($query)) {
            /* fetch associative array */
            while ($row = $result->fetch_assoc()) {
            ?>
            <div id="kreska"> -------------------------------------------------------------------------------------------------</div>
<br>
            <div id= "imie"><?php    echo $_SESSION['imie']." ".$_SESSION['nazwisko']  ?></div>
            <div id= "czas"> <?php echo $row['data_wstawienia']?></div>
<br>
            <div id="komentarz"> <?php echo $row['opis']?>  </div>
       
            
          
            <div id = "koniec"></div>
            

            
           
            
          
            
         
                

        
   
        <?php  
        }  
        }  
    ?> 
<br>
<br>

        <form method="post" action="post.php?action=add&id=<?php echo $row["id_post"]; ?>">  
            
        
            
            
            
         
            <input class="button_send" type="submit" value="Dodaj komentarz" />

        </form>  
  



 
<?php include('stopka.php'); ?>