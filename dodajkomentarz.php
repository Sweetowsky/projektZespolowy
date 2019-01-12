
<?php
 
    session_start();
     
    if (isset($_POST['komentarz']))
    {
        //Udana walidacja? Załóżmy, że tak!
        $wszystko_OK=true;
         
        
        //deklaracja
        $komentarz = $_POST['komentarz'];
        
        $id_tworcy= $_SESSION['id_delikwenta'];
       $id_post=$_SESSION['id_post'];
         
      
    
         
   
       
        //Zapamiętaj wprowadzone dane
        $_SESSION['fr_komentarz'] = $komentarz;
       
      
      
         
        require_once "connect.php";
        mysqli_report(MYSQLI_REPORT_STRICT);
         
        try
        {
          
            $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
              $polaczenie->set_charset("utf8");
            if($komentarz==null)
            {
                throw new Exception('Nie mozna wstawic pustego komentarza');
            }
            if ($polaczenie->connect_errno!=0)
            {
                throw new Exception(mysqli_connect_errno());
            }
            else
            {
               
                if ($wszystko_OK==true)
                {
                    //Hurra, wszystkie testy zaliczone, dodajemy do bazy
                     
                    if ($polaczenie->query("INSERT INTO komentarz VALUES (NULL, '$komentarz',NULL,'$id_tworcy','$id_post')"))
                    {
                        $_SESSION['udanarejestracja']=true;
                        header('Location: forum.php');
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
         
    }
     
     
?>

<?php include('naglowek.php'); ?>

 <span class="bigtitle" >DODAWANIE KOMENTARZA </span>
    <form method="post"  >
        <fieldset>
		<legend align="center">Dodaj komentarz</legend>
		<table align="center">
    
            
      
            
            
            
            
            
               <tr align="left"><th>Komentarz</th>
                   <th>
            <input  type="text" value="<?php
            if (isset($_SESSION['fr_komentarz']))
            {
                echo $_SESSION['fr_komentarz'];
                unset($_SESSION['fr_komentarz']);
            }
        ?>" name="komentarz" /><br />
         
       
                       </th>
            </tr>
            
            
            
          
            
     
         
        

            

            
        
            
        
         
           
             <tr align="left">
                 <th>
        <input class="button_send" type="submit" value="Dodaj" />
                     </th>
            </tr>
            </table>
		
	</fieldset>
	</form>
         
  
<?php include('stopka.php'); ?>


		
		
		
