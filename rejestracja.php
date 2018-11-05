
		
<?php
 
    session_start();
     
    if (isset($_POST['email']))
    {
        //Udana walidacja? Załóżmy, że tak!
        $wszystko_OK=true;
         
        
        //deklaracja
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        //$typ = $_POST['typ'];
        $login = $_POST['login'];
      
         
        // Sprawdź poprawność adresu email
        $email = $_POST['email'];
        $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
         
        if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
        {
            $wszystko_OK=false;
            $_SESSION['e_email']="Podaj poprawny adres e-mail!";
        }
         
        //Sprawdź poprawność hasła
        $haslo1 = $_POST['haslo1'];
        $haslo2 = $_POST['haslo2'];
         
        if ((strlen($haslo1)<4) || (strlen($haslo1)>20))
        {
            $wszystko_OK=false;
            $_SESSION['e_haslo']="Hasło musi posiadać od 4 do 20 znaków!";
        }
         
        if ($haslo1!=$haslo2)
        {
            $wszystko_OK=false;
            $_SESSION['e_haslo']="Podane hasła nie są identyczne!";
        }   
 
        $haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);
         
        //Czy zaakceptowano regulamin?
        if (!isset($_POST['regulamin']))
        {
            $wszystko_OK=false;
            $_SESSION['e_regulamin']="Potwierdź akceptację regulaminu!";
        }               
         
        //Bot or not? Oto jest pytanie!
       // $sekret = "6Lcw3FcUAAAAAOJeEm9j86jbxt7erQ6KbAEm4HOT";
         
       // $sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']);
         
     //   $odpowiedz = json_decode($sprawdz);
         
       // if ($odpowiedz->success==false)
      //  {
       //     $wszystko_OK=false;
       //     $_SESSION['e_bot']="Potwierdź, że nie jesteś botem!";
      //  }       
         
        //Zapamiętaj wprowadzone dane
        $_SESSION['fr_imie'] = $imie;
        $_SESSION['fr_nazwisko'] = $nazwisko;
        $_SESSION['fr_login'] = $login;
        $_SESSION['fr_email'] = $email;
        $_SESSION['fr_haslo1'] = $haslo1;
        $_SESSION['fr_haslo2'] = $haslo2;
        if (isset($_POST['regulamin'])) $_SESSION['fr_regulamin'] = true;
         
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
                //Czy email już istnieje?
                $rezultat = $polaczenie->query("SELECT id FROM logowanie WHERE login='login'");
                 
                if (!$rezultat) throw new Exception($polaczenie->error);
                 
                $ile_takich_maili = $rezultat->num_rows;
                if($ile_takich_maili>0)
                {
                    $wszystko_OK=false;
                    $_SESSION['e_email']="Istnieje już konto przypisane do tego adresu e-mail!";
                }       
 
                //Czy nick jest już zarezerwowany?
                //$rezultat = $polaczenie->query("SELECT id_klient FROM klienci WHERE user='$nick'");
                 
                //if (!$rezultat) throw new Exception($polaczenie->error);
                 
               // $ile_takich_nickow = $rezultat->num_rows;
             //  if($ile_takich_nickow>0)
               // {
              //      $wszystko_OK=false;
            //        $_SESSION['e_nick']="Istnieje już gracz o takim nicku! Wybierz inny.";
              //  }
                 
                if ($wszystko_OK==true)
                {
                    //Hurra, wszystkie testy zaliczone, dodajemy usera do bazy
                     
                    if ($polaczenie->query("INSERT INTO logowanie VALUES (NULL, '$login','$haslo_hash',NULL,'$imie','$nazwisko')"))
                    {
                        $_SESSION['udanarejestracja']=true;
                        header('Location: witamy.php');
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

 <span class="bigtitle" >Rejestracja </span>
    <form method="post">
        <fieldset>
		<legend align="center">Rejestracja</legend>
		<table align="center">
    
            
        <tr align="left"><th>Imię </th>
            
      <th> <input type="text" value="<?php
            if (isset($_SESSION['fr_imie']))
            {
                echo $_SESSION['fr_imie'];
                unset($_SESSION['fr_imie']);
            }
        ?>" name="imie" />
        
          </th>
            </tr>
            
            
            
            
            
               <tr align="left"><th>Nazwisko</th>
                   <th>
            <input type="text" value="<?php
            if (isset($_SESSION['fr_nazwisko']))
            {
                echo $_SESSION['fr_nazwisko'];
                unset($_SESSION['fr_nazwisko']);
            }
        ?>" name="nazwisko" /><br />
         
       
                       </th>
            </tr>
            
            
            
             <tr align="left"><th valign="top"><label for="strona">Login</label></th>
				<th>
					<input  id="login" name="login" value="<?php
            if (isset($_SESSION['fr_login']))
            {
                echo $_SESSION['fr_login'];
                unset($_SESSION['fr_login']);
            }
        ?>"type="txt"></th>
			</tr>
            
     
         
        
                <tr align="left"><th>E-mail </th>
                      <th>
            <input type="text"  value="<?php
            if (isset($_SESSION['fr_email']))
            {
                echo $_SESSION['fr_email'];
                unset($_SESSION['fr_email']);
            }
        ?>" name="email" />
       
        <?php
            if (isset($_SESSION['e_email']))
            {
                echo '<div class="error">'.$_SESSION['e_email'].'</div>';
                unset($_SESSION['e_email']);
            }
        ?>
                    </th>
            </tr>
            
                <tr align="left"><th>Hasło</th>
        <th><input type="password"  value="<?php
            if (isset($_SESSION['fr_haslo1']))
            {
                echo $_SESSION['fr_haslo1'];
                unset($_SESSION['fr_haslo1']);
            }
        ?>" name="haslo1" /><br />
         
        <?php
            if (isset($_SESSION['e_haslo']))
            {
                echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
                unset($_SESSION['e_haslo']);
            }
        ?>    
                    </th>
            </tr>
            
             <tr align="left"><th>Powtórz hasło</th>
                 <th>
       <input type="password" value="<?php
            if (isset($_SESSION['fr_haslo2']))
            {
                echo $_SESSION['fr_haslo2'];
                unset($_SESSION['fr_haslo2']);
            }
        ?>" name="haslo2" /><br />
                 </th>
            </tr>
            
             <tr align="left">
                 <th>
        <label>
            <input type="checkbox" name="regulamin" <?php
            if (isset($_SESSION['fr_regulamin']))
            {
                echo "checked";
                unset($_SESSION['fr_regulamin']);
            }
                ?>/> Akceptuję regulamin
        </label>
         
        <?php
            if (isset($_SESSION['e_regulamin']))
            {
                echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
                unset($_SESSION['e_regulamin']);
            }
        ?> 
                 </th>
                </tr>
         
                <tr id="captcha">
                    <th>
        <div class="g-recaptcha" data-sitekey="6Lcw3FcUAAAAAL5SpuzXhT62S5W906haD9lzAllj"></div>
         
        <?php
            if (isset($_SESSION['e_bot']))
            {
                echo '<div class="error">'.$_SESSION['e_bot'].'</div>';
                unset($_SESSION['e_bot']);
            }
        ?>   
         </th>
                    
            </tr>
             <tr align="left">
                 <th>
        <input type="submit" value="Zarejestruj się" />
                     </th>
            </tr>
            </table>
		
	</fieldset>
	</form>
         
  
<?php include('stopka.php'); ?>


		
		
		
