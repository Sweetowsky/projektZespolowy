<?php
 
    session_start();
     
    if (isset($_POST['temat']))
    {
        //Udana walidacja? Załóżmy, że tak!
        $wszystko_OK=true;
        //$now = new DateTime();
        //deklaracja
		$temat = $_POST['temat'];
		$pytanie = $_POST['pytanie'];
		$opis = $_POST['opis'];
		$id_tworcy= $_SESSION['id_delikwenta'];
		$data_rozpoczecia = $_POST['data_rozpoczecia'];
		$data_zakonczenia = $_POST['data_zakonczenia'];
		$widocznosc = 1;
        $opcjaA =$_POST['name']['0'];
        $opcjaB =$_POST['name']['1'];
        $opcjaC =$_POST['name']['2'];
       // $opcjaC = $_POST['name']['2'];
        
        //$opcjaA= $_POST['name'];
        
		//$odpwiedz = $_POST['odpowiedz'];
        
        
        if($data_rozpoczecia=="0000-00-00 00:00:00")
        {
            
            
            echo "defaultowa data";
echo $_POST['data_rozpoczecia'];
            
        }
        else 
        {echo "dobra data";
		echo $_POST['data_rozpoczecia'];}
		

		//Zapamiętaj wprowadzone dane
		

		//deklaracja do testow
        //$data_rozpoczecia_test = date('Y-m-d', strtotime($data_rozpoczecia));
        //$data_zakonczenia_test = date('Y-m-d', strtotime($data_zakonczenia));

        require_once "connect.php";
        mysqli_report(MYSQLI_REPORT_STRICT);
         
        try
        {
             echo $data_zakonczenia ;
          
            $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
              $polaczenie->set_charset("utf8");
         
			if($pytanie==null || $temat==null) 
			{
                throw new Exception('Uzupełnij dane');
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
                     
                    if ($polaczenie->query("INSERT INTO ankieta (temat,pytanie,opis,data_rozpoczecia,data_zakonczenia,widocznosc,id_tworcy,opcjaA,opcjaB,opcjaC)VALUES ('$temat','$pytanie','$opis','$data_rozpoczecia','$data_zakonczenia','$widocznosc','$id_tworcy','$opcjaA','$opcjaB','$opcjaC')"))
                    {
                        $_SESSION['udanarejestracja']=true;
                       // header('Location: ankiety.php');
                        echo  $data_zakonczenia ;
                       // echo  $opcjaA;
                       // echo $_POST['name']['0'];
                        //echo $_POST['name']['1'];
                       // echo $_POST['name']['2'];
                        
                       
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

 <span class="bigtitle" >DODAWANIE ANKIETY </span>
    <form method="post">
        <fieldset>
		<legend align="center">Dodaj ankiete</legend>
		<table align="center">
                        <tbody id="elements">

    
            
        <tr align="left"><th>Temat</th>
            
      <th> <input type="text" value="<?php
            if (isset($_SESSION['fr_temat']))
            {
                echo $_SESSION['fr_temat'];
                unset($_SESSION['fr_temat']);
            }
        ?>" name="temat" />
        
          </th>
		  
		  <tr align="left"><th>Pytanie</th>
            
      <th> <input type="text" value="<?php
            if (isset($_SESSION['fr_pytanie']))
            {
                echo $_SESSION['fr_pytanie'];
                unset($_SESSION['fr_pytanie']);
            }
        ?>" name="pytanie" />
        
          </th>
		  
            </tr>

               <tr align="left"><th>Opis</th>
                   <th>
            <input  type="text" value="<?php
            if (isset($_SESSION['fr_opis']))
            {
                echo $_SESSION['fr_opis'];
                unset($_SESSION['fr_opis']);
            }
        ?>" name="opis" /><br />

                       </th>
            </tr>
			
			<tr align="left"><th>Data rozpoczęcia</th>
            
      <th> <input type="date" value="<?php
            if (isset($_SESSION['fr_data_rozpoczecia']))
            {
                echo $_SESSION['fr_data_rozpoczecia'];
                unset($_SESSION['fr_data_rozpoczecia']);
            }
        ?>" name="data_rozpoczecia" />
        
				</th>
			</tr>
			
			<tr align="left"><th>Data zakończenia</th>
            
      <th> <input type="date" value="<?php
            if (isset($_SESSION['fr_data_zakonczenia']))
            {
                echo $_SESSION['fr_data_zakonczenia'];
                unset($_SESSION['fr_data_zakonczenia']);
            }
        ?>" name="data_zakonczenia" />

        
          </th>
                
                    <tr class="element">
			<td>Odpowiedz</td>
			<td><input type="text" name="name[]" value="" id="name" /></td>
			
			
		</tr>
            
            
            
            
            
     
         
        
            

            

            
          
         
              
          
                </tbody>
                    

            </table>
            <button  class="button_send" id="add">Dodaj nowa odpowiedz</button>
             <input class="button_send" type="submit" value="Dodaj ankietę" />
                
	</fieldset>
	</form>
<!--	
	<


-->

<?php include('stopka.php'); ?>