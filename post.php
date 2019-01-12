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
 $query = "Select k.id_komentarz, k.opis,k.data_wstawienia,k.id_uzytkownika,k.id_postu, l.imie, l.nazwisko from komentarz k join logowanie l On(k.id_uzytkownika= l.id) where id_postu='$id_post'";
//$query="Select * from komentarz where id_postu='$id_post'";



?>


<div id="imie">  <?php    echo $_SESSION['imie']." ".$_SESSION['nazwisko']  ?>  </div>

<div id="czas">  <?php    echo $_SESSION['czas'];  ?>  </div>
<br>
<div class="bigtitle" id="temat"> <?php    echo "<font color=#eb5937 size='20' face='Caveat'>".$_SESSION['temat']."</font>";  ?>   </div>
<br>
<div id="opis">  <?php    echo $_SESSION['opis'];?>   </div>
<br><br>



    <?php
        
        mysqli_query($connect, "SET CHARSET utf8");
        mysqli_query($connect, "SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");
        if ($result = $connect->query($query)) {
            /* fetch associative array */
			
            while ($row = $result->fetch_assoc()) {
            ?>
			            
<div class="comment"> 
            <div id= "imie"><?php    echo "<font color=#eb5937>".$row['imie']." ".$row['nazwisko']."</font>" ?></div>
            <div id= "czas"> <?php echo $row['data_wstawienia']?></div>

            <div id="komentarz"> <?php echo $row['opis']?>  </div>
       <br>
            
</div>          
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
  


    <?php
    
            if($_SESSION['id_delikwenta'] == 3)
            {
               // echo  $_SESSION['id_delikwenta'];
                ?>
                           
<FORM NAME ="form3" METHOD ="GET" ACTION ="usunPost.php">

<INPUT class="button_send" TYPE = "Submit" Name = "Submit3"  VALUE = "Usuń post">
 

</FORM> 
                
             <?php  
            }
          
          ?>



 
<?php include('stopka.php'); ?>