<?php
 
    session_start();
//$qID=$_SESSION['id_ankieta'];
$id_ankieta=$_SESSION['id_ankieta'];
//$_SESSION['hasVoted'] = '0';

	if (isset($_GET['h1'])) {
		$qID = $_GET['h1'];
	} else {
		$qID = 1;
	}



 require_once "connect.php";

 $connect =  @new mysqli($host, $db_user, $db_password, $db_name);


 if(isset($_GET["action"]))  
 {   
   header('Location: dodajkomentarz.php');
 } 
?>



<?php include('naglowek.php'); ?>

<?php
 //$query = "Select a.id_ankieta, a.temat,a.pytanie,a.opis,a.data_rozpoczecia,a.data_zakonczenia,a.widocznosc,l.id_uzytkownika,k.id_postu, l.imie, l.nazwisko from ankieta a join logowanie l On(a.id_tworcy= l.id) where id_ankieta='$id_ankieta'";
$query ="Select a.id_ankieta,a.pytanie,a.opis,a.data_rozpoczecia,a.data_zakonczenia,a.widocznosc, o.odpowiedz, a.opcjaA, a.opcjaB, a.opcjaC from ankieta a join odpowiedz o On(a.id_ankieta= o.id_ankiety) where id_ankieta='$id_ankieta'"
//$query="Select * from komentarz where id_postu='$id_post'";
?>



<!-- 

$query ="Select a.id_ankieta, a.temat,a.pytanie,a.opis,a.data_rozpoczecia,a.data_zakonczenia,a.widocznosc,l.id, l.imie, l.nazwisko, o.odpowiedz  from ankieta a join logowanie l On(a.id_tworcy= l.id)  where id_ankieta='$id_ankieta'"

<div id="imie">  <?php   // echo $_SESSION['imie']." ".$_SESSION['nazwisko']  ?>  </div>
<br>
<div class="bigtitle" id="temat"> <?php  //  echo $_SESSION['temat'];  ?>   </div>
<br>
<div id="pytanie">  <?php  //  echo $_SESSION['pytanie'];?>   </div>
<br>
<div id="opis">  <?php  //  echo $_SESSION['opis'];  ?>  </div>
<br>
<div id="data_rozpoczecia">  <?php   // echo $_SESSION['data_rozpoczecia'];  ?>  </div>
<br>
<div id="data_zakonczenia">  <?php  //  echo $_SESSION['data_zakonczenia'];  ?>  </div>
<br>
-->

<div id="imie">  <?php    echo $_SESSION['imie']." ".$_SESSION['nazwisko']  ?>  </div>

<div id="czas">  <?php    echo $_SESSION['data_rozpoczecia']." - ".$_SESSION['data_zakonczenia'];  ?>  </div>
<br>
<div class="bigtitle" id="temat"> <?php    echo $_SESSION['temat'];  ?>   </div>
<br>
<div id="opis">  <?php    echo $_SESSION['opis'];?>   </div>
<br>
<div id="opis">  <?php    echo $_SESSION['pytanie'];?>   </div>





<br>

      
      
      
 <FORM METHOD="GET" ACTION="glosowanie.php">
<TABLE>
  <TR>
    <TD><div id="opis">  <?php    echo $_SESSION['opcjaA'];?>   </div></TD>
    <TD>
      <INPUT TYPE="radio" NAME="q" VALUE="A">
    </TD>
  </TR>
  <TR>
    <TD><div id="opis">  <?php    echo $_SESSION['opcjaB'];?>   </div></TD>
    <TD>
      <INPUT TYPE="radio" NAME="q" VALUE="B">
    <TD>
  </TR>
   <?php if($_SESSION['opcjaC']!="")
          {
                
    ?>
 <TR>
    <TD><div id="opis">  <?php    echo $_SESSION['opcjaC'];?>   </div></TD>
    <TD>
      <INPUT TYPE="radio" NAME="q" VALUE="C">
    <TD>
  </TR>
        <?php
    
          }
          
          ?>
 
  
</TABLE>
<BR>
<input class="button_send" type="submit" Name = "Submit1" value="Głosuj" />
<INPUT TYPE = "Hidden" Name = "h1"  VALUE = <?PHP print $qID; ?>>
</FORM>     
        
<br> 
        <BR><BR>
            
<FORM NAME ="form2" METHOD ="GET" ACTION ="viewResults.php">

<INPUT class="button_send" TYPE = "Submit" Name = "Submit2"  VALUE = "Zobacz wyniki">
<INPUT TYPE = "Hidden" Name = "h1"  VALUE = <?PHP print $qID; ?>>
</FORM>
    
    
      

      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      

      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
            
  
      

<form method="post" action="zobacz_ankieta.php?action=add&id=<?php echo $row["id_ankieta"]; ?>">  
        
           <!-- <input class="button_send" type="submit" value="Głosuj" />-->

        </form>  
  
<?php include('stopka.php'); ?>


