<?php
 
    session_start();
     
    if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
    {
        header('Location: konto.php');
        exit();
    }
 
?> 

<?php include('naglowek.php'); ?>



        
            <span class="bigtitle" >Logowanie </span>
<form action="zaloguj.php"  method="post" enctype="multipart/form-data">
	<fieldset>
		<legend align="center">Logowanie</legend>
		<table align="center">
            <tr align="left"><th valign="top"><label for="mail">Login</label></th>
				<th>
					<input required id="mail" name="login" type="name"></th>
			</tr>
			
            <tr align="left"><th><label for="haslo">Hasło</label></th>
				<th><input required id="haslo" name="haslo" type="password"></th>
			</tr>
		
			

		

			
			
			<tr align="left">
				<th><input name="zaloguj" type="submit" value="Zaloguj"></th>
				
			
		</table>
		
	</fieldset>
	</form>
<?php
    if(isset($_SESSION['blad']))    echo $_SESSION['blad'];
?>


<?php include('stopka.php'); ?>		

	


