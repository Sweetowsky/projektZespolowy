<?PHP


$voteMessage = "";
//$votedSQL="";
session_start();
require_once "connect.php";

 $connect =  @new mysqli($host, $db_user, $db_password, $db_name);

if ((isset($_SESSION['hasVoted']))) {
	if ($_SESSION['hasVoted'] = '1') {
		$voteMessage = "Już zagłosowałeś ";
	}
}
else {
 //echo $_GET['imie'];
   // echo $_GET['q'];
		//echo $_GET['h1'];
	if (isset($_GET['Submit1']) && isset($_GET['q'])){
//$qID=$_SESSION['id_ankieta'];
		$selected_radio = $_GET['q'];
		$idNumber = $_SESSION['id_ankieta'];
        
	
		//echo $_GET['q'];
		//echo $_GET['h1'];
	

		if ($connect) {

			if($selected_radio == "A") {
				$votedSQL = "UPDATE ankieta SET glosA = glosA + 1 WHERE id_ankieta = $idNumber";
				$voteMessage = "Oddano głos na A";
                $_SESSION['hasVoted'] = '1';
			}
			else if($selected_radio == "B"){
				$votedSQL = "UPDATE ankieta SET glosB = glosB + 1 WHERE id_ankieta = $idNumber";
                $_SESSION['hasVoted'] = '1';
				$voteMessage = "Oddano głos na B";
			}
			else if($selected_radio == "C"){
				$votedSQL = "UPDATE ankieta SET glosC = glosC + 1 WHERE id_ankieta = $idNumber";
                $_SESSION['hasVoted'] = '1';
				$voteMessage = "Oddano głos na C";
			}
			else {
				print "Error - Nie mozna oddac głosu";
			}	
		}
	}
	else {
		print "Nie wybrałeś niczego!";
	}
    
    
     mysqli_report(MYSQLI_REPORT_STRICT);
         $wszystko_OK=true;
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
                    //Hurra,  dodajemy do bazy
                     
                    if ($polaczenie->query($votedSQL))
                    {
                        
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

//function insert_vote($db, $sql, $id) {

	//$stmt = $db->prepare($sql);
	///$stmt->bind_param('i', $id);
	//$stmt->execute();

	//$_SESSION['hasVoted'] = '1';
//	return "Dziękuje za zagłosowanie!";
//}



       
?>



<?php include('naglowek.php'); ?>
<?PHP print $voteMessage . "<BR>" ?>
<?PHP
 //echo $_GET['q'];
//echo "udało sie dodac do bazy";
		 ?>
<FORM NAME ="form2" METHOD ="GET" ACTION ="viewResults.php">

<INPUT class="button_send" TYPE = "Submit" Name = "Submit2"  VALUE = "Zobacz wyniki">
<INPUT TYPE = "Hidden" Name = "h1"  VALUE = "">
</FORM>

<?php include('stopka.php'); ?>