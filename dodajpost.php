
<?php
 
    session_start();
     
    if (isset($_POST['email']))
    {
        //Udana walidacja? Załóżmy, że tak!
        $wszystko_OK=true;
         
        
        //deklaracja
        $temat = $_POST['temat'];
        $opis = $_POST['opis'];
       
         
      
    
         
   
       
        //Zapamiętaj wprowadzone dane
        $_SESSION['fr_temat'] = $temat;
        $_SESSION['fr_opis'] = $opis;
      
      
         
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
                     
                    if ($polaczenie->query("INSERT INTO post VALUES (NULL, '$temat','$opis',NULL,NULL,NULL)"))
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

 <span class="bigtitle" >Dodawanie postu </span>
    <form method="post">
        <fieldset>
		<legend align="center">Dodaj post</legend>
		<table align="center">
    
            
        <tr align="left"><th>Temat</th>
            
      <th> <input type="text" value="<?php
            if (isset($_SESSION['fr_temat']))
            {
                echo $_SESSION['fr_temat'];
                unset($_SESSION['fr_temat']);
            }
        ?>" name="temat" />
        
          </th>
            </tr>
            
            
            
            
            
               <tr align="left"><th>Opis</th>
                   <th>
            <input type="text" value="<?php
            if (isset($_SESSION['fr_opis']))
            {
                echo $_SESSION['fr_opis'];
                unset($_SESSION['fr_opis']);
            }
        ?>" name="opis" /><br />
         
       
                       </th>
            </tr>
            
            
            
          
            
     
         
        

            

            
        
            
        
         
           
             <tr align="left">
                 <th>
        <input type="submit" value="Dodaj post" />
                     </th>
            </tr>
            </table>
		
	</fieldset>
	</form>
         
  
<?php include('stopka.php'); ?>


		
		
		
