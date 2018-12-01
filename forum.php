<?php
 
    session_start();
     
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
            
        
            
            <h5><?php echo $row['temat']."|||| ".$row['opis']."|||| DATA ROZPOCZECIA:".$row['data_rozpoczecia']."|||| ID AUTORA: ".$row['id_tworcy']?></h5>
            <br>
         
     
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
































 
