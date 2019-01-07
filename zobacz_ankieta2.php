<?php
 
    session_start();


$id_ankieta=$_SESSION['id_ankieta'];

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
<div id="opis">  <?php    echo $_SESSION['opcjaA'];?>   </div>
<br>
<div id="opis">  <?php    echo $_SESSION['opcjaB'];?>   </div>
<br>
<div id="opis">  <?php    echo $_SESSION['opcjaC'];?>   </div>






 <!-- <?php
        
        mysqli_query($connect, "SET CHARSET utf8");
        mysqli_query($connect, "SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");
        if ($result = $connect->query($query)) {
            /* fetch associative array */
            while ($row = $result->fetch_assoc()) {
            ?>
            <div id="kreska"> -------------------------------------------------------------------------------------------------</div>
<br>
            <div id= "imie"><?php echo $row['imie']." ".$row['nazwisko'] ?></div>

			<div id= "pytanie"> <?php echo $row['pytanie']?></div>
<br>
			<div id= "opis"> <?php echo $row['opis']?></div>

<div id= "opis"> <?php echo $row['opis']?></div>

        
<br>		
			
            <div id = "koniec"></div>

        <?php  
        }  
        }  
    ?> 
<br>
<br>
-->

    <FORM METHOD="post" ACTION="ankieta.php">
<TABLE>
  <TR>

    <?php
        
        mysqli_query($connect, "SET CHARSET utf8");
        mysqli_query($connect, "SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");
        if ($result = $connect->query($query)) {
            /* fetch associative array */
            while ($row = $result->fetch_assoc()) {
            ?>
			
           
        <br>
            
        <TD><div id= "opis"><?php echo $row['odpowiedz']?></div></TD>
        <br>
          
   
   

            
          
            <div id = "koniec"></div>
            

            

   
        <?php  
        }  
            ?>
          <TD>
      <INPUT TYPE="radio" NAME="vote" VALUE="czerwony">
    </TD>
  </TR>
  <TR>

</TABLE>
<BR>
<!--<INPUT TYPE="submit" VALUE="Głosuj">-->
</FORM>
            
   <?php       }  
    ?> 
      
<br>
<br>



        <form method="post" action="zobacz_ankieta.php?action=add&id=<?php echo $row["id_ankieta"]; ?>">  
        
            <input class="button_send" type="submit" value="Głosuj" />

        </form>  
  
<?php include('stopka.php'); ?>



<FORM METHOD="post" ACTION="ankieta.php">
<TABLE>
  <TR>
    <TD>czerwony</TD>
    <TD>
      <INPUT TYPE="radio" NAME="vote" VALUE="czerwony">
    </TD>
  </TR>
  <TR>

</TABLE>
<BR>
<INPUT TYPE="submit" VALUE="Głosuj">
</FORM>