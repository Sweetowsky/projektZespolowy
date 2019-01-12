
<?php
 
    session_start();
     $id_ankieta=$_SESSION['id_ankieta'];
    $komunikat='';
    //if isset($_GET['Submit3'])
    //{
        //Udana walidacja? Załóżmy, że tak!
        $wszystko_OK=true;
         
       
  
      
        // echo $_GET['hid'];
        require_once "connect.php";
        mysqli_report(MYSQLI_REPORT_STRICT);
         
        try
        {
          
            $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
              $polaczenie->set_charset("utf8");
          
            if ($polaczenie->connect_errno!=0)
            {
                throw new Exception(mysqli_connect_errno());
            }
            else
            {
               
                if ($wszystko_OK==true)
                {
                    //Hurra, wszystkie testy zaliczone, dodajemy do bazy
                     
                    if ($polaczenie->query("DELETE FROM ankieta WHERE id_ankieta='$id_ankieta'"))
                    {
                       $komunukat= "Usunięto ankiete";
                    }
                    else
                    {
                        throw new Exception($polaczenie->error);
                    }
                     
                }
                 
                $polaczenie->close();
            }
             
        }
        catch(Exception $e)
        {
            echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o dodanie posta w innym terminie!</span>';
            echo '<br />Informacja developerska: '.$e;
        }
         
    
//}
     
     
?>

<?php include('naglowek.php'); ?>


 <?php echo $komunikat;?>
         
  
<?php include('stopka.php'); ?>


		
		
		
