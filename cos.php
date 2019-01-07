
		
<?php
 
    session_start();
     
    if (isset($_POST['temat']))
    {
        //Udana walidacja? Załóżmy, że tak!
        $wszystko_OK=true;
         
        
        //deklaracja
      
        //$now = new DateTime();
        //deklaracja
		$temat = $_POST['temat'];
		$pytanie = $_POST['pytanie'];
		$opis = $_POST['opis'];
		$id_tworcy= $_SESSION['id_delikwenta'];
		$data_rozpoczecia = $_POST['data_rozpoczecia'];
		$data_zakonczenia = $_POST['data_zakonczenia'];
		$widocznosc = 1;
		$odp = $_POST['odp'];
        
         
        // Sprawdź poprawność adresu email
      
         
       
       
         
        //Zapamiętaj wprowadzone dane
        
       
         
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
        echo $_POST['temat']."  ";
		echo $_POST['pytanie'];
		echo $_POST['opis'];
		echo $_SESSION['id_delikwenta'];
		echo $_POST['data_rozpoczecia'];
		echo $_POST['data_zakonczenia'];
	
		echo $_POST['odp'];
                    //Hurra, wszystkie testy zaliczone, dodajemy do bazy
                     
                    if ($polaczenie->query("INSERT INTO ankieta (temat)VALUES ($temat')"))
                    {
                        $_SESSION['udanarejestracja']=true;
                       echo "udało sie";
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
            echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
            echo '<br />Informacja developerska: '.$e;
        }
         
    }
     
     
?>

<?php include('naglowek.php'); ?>

 <span class="bigtitle" >Dodawanie ankiety</span>
    <form method="post">
        <fieldset>
		<legend align="center">Dodaj ankiete</legend>
		<table align="center">
            <tbody id="elements">
    
            
        <tr align="left"><th>Temat </th> <th> <input type="text" value="" name="temat" />  </th> </tr>
        
        <tr align="left"><th>Pytanie </th> <th> <input type="text" value="" name="pytanie" />  </th> </tr>

        <tr align="left"><th>Opis </th> <th> <input type="text" value="" name="opis" />  </th> </tr>
            
        <tr align="left"><th>Data rozpoczęcia</th> <th> <input type="date" value="" name="data_rozpoczecia" /></th></tr> 
        
        <tr align="left"><th>Data zakonczenia</th> <th> <input type="date" value="" name="data_zakonczenia" /></th></tr>
            
        
            
               <tr class="element">
			<td>Odpowiedz</td>
			<td><input type="text" name="name[x]" value="" id="name[x]" /></td>
			
			
		</tr>
            
            
            
            
            
     
         
        
            

            

            
          
         
              
          
                </tbody>
                    

            </table>
            <button  class="button_send" id="add">Dodaj nowa odpowiedz</button>
             <input class="button_send" type="submit" value="Dodaj ankietę" />
		
	</fieldset>
       
	</form>


<br>



         
  
<?php include('stopka.php'); ?>


		
		
		
