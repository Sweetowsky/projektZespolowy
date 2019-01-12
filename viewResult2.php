<?PHP

$id_ankieta=$_SESSION['id_ankieta'];

 $connect =  @new mysqli($host, $db_user, $db_password, $db_name);
$question = '';
$answerA = '';
$answerB = '';
$answerC = '';

$imgTagA = '';
$imgWidthA = '0';

$imgTagB = '';
$imgWidthB = '0';

$imgTagC = '';
$imgWidthC = '0';

$imgHeight = '10';
$totalP = '';
$percentA = '0';
$percentB = '0';
$percentC = '0';

$qA = '';
$qB = '';
$qC = '';




     $query = "Select * FROM ankieta where id_ankieta='$id_ankieta'";
    
      
        
        mysqli_query($connect, "SET CHARSET utf8");
        mysqli_query($connect, "SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");
        if ($result = $connect->query($query)) {
            /* fetch associative array */
            while ($row = $result->fetch_assoc()) {
            
			
            
                $question = $row['pytanie'];
				$answerA = $row['opcjaA'];
				$answerB = $row['opcjaB'];
				$answerC = $row['opcjaC'];

				$qA = $row['glosA'];
				$qB = $row['glosB'];
				$qC = $row['glosC'];

				$totalP = $qA + $qB + $qC;
                if($qA!=0){
                    $percentA = (($qA * 100) / $totalP);
				    $percentA = floor($percentA);
                    
                }
			     
                if($qB!=0){
                    $percentB = (($qB * 100) / $totalP);
				    $percentB = floor($percentB);
                    
                }
                
                if($qC!=0){
                    $percentC = (($qC * 100) / $totalP);
				    $percentC = floor($percentC);
                    
                }

			

				$imgWidthA = $percentA * 2;
				$imgWidthB = $percentB * 2;
				$imgWidthC = $percentC * 2;

				$imgTagA = "<IMG SRC = 'red.jpg' Height = " . $imgHeight . " WIDTH = " . $imgWidthA. ">";
				$imgTagB = "<IMG SRC = 'red.jpg' Height = " . $imgHeight . " WIDTH = " . $imgWidthB . ">";
				$imgTagC = "<IMG SRC = 'red.jpg' Height = " . $imgHeight . " WIDTH = " . $imgWidthC . ">";
            
           
            }
          
            
         
                

        
   
        
        }  
         
   


?>
                    


<?PHP
//print $question . "<BR>";
print $answerA . " " . $imgTagA . " " . $percentA . "% " . $qA . "<BR>";
print $answerB . " " .$imgTagB . " " . $percentB . "% " . $qB . "<BR>";
if($_SESSION['opcjaC']!="")
{
    print $answerC . " " .$imgTagC . " " . $percentC . "% " . $qC . "<BR>";

    
}

?>



 







