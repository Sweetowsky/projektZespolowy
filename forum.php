<?php
 
    session_start();

 if (isset($_POST['temat']))
    {
$_SESSION['temat'] = $_POST['temat'];
$_SESSION['opis'] = $_POST['opis'];

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
         
                <input class="button_send" type="submit" value="Zobacz" />

        </form>  
    </div>  
        <?php  
        }  
        }  
    ?>  
              
</div>





    Zróbcie te 2 divy jakoś żeby to wyglądało ( .rodzic i .post ) <br>
    
    Zamiast id autora docelowo będzię oczywiście jego login lub imie i nazwisko ;) <br>
    
    Aby wejść do postu zrobione będzie hiperłącze na tym divie post gdzie bedzie otwierana podstrona z tym postem i komentarzami <br>

    Dodawanie posta tez trzeba bedzie gdzies dodać <br>

<?php include('stopka.php'); ?>
































 
