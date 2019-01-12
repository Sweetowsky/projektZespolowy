<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Forum</title>
	<meta name="description" content="sklep" />
	<meta name="keywords" content="sklep" />
	<!--<script type="text/javascript" src="/web/jquery.js"></script>
<script type="text/javascript" src="/web/ajax-poll.php"></script>-->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
    


</script>
    
    
<script type="text/javascript">
$(document).ready(function() {
 
$('#add').click(function(){
                var x = 0;
		
				
				var newRow = $('#elements .element:first').clone();
 
		     
				
			
		       newRow.find('input[name="name[0]"]').attr('id', 'name['+x+']');
		      newRow.find('input[id="name['+x+']"]').attr('name', 'name['+(x)+']');
 
		      newRow.find('input').val('');
 
		      newRow.appendTo($('#elements'));
			  return false;
		      
		   });
 
});
</script>    
    
    
    
    
	
	<link rel="stylesheet" href="style.css" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=Lato:400,900&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

</head>

<body>
    <div id="container">
	
		<div id="logo">
			<img src="img/baner1.png" alt="sklep" />
		</div>
        <?php
 
    
     
    if ((isset($_SESSION['zalogowany'])) && isset($_SESSION['zalogowanyAdmin']))
    {
         ?>
       	<div id="menu" >
			
            <a href="forum.php"><div class="option">FORUM</div></a>
            <a href="dodajpost.php"><div class="option">DODAJ POST</div></a>
		    <a href="ankiety.php"><div class="option">ANKIETY</div></a>
            <a href="dodajankiete.php"><div class="option">DODAJ ANKIETE</div></a>
			<a href="rejestracja.php"><div class="option">REJESTRACJA</div></a>
			<a href="logowanie.php"><div class="option">KONTO</div></a>
			
			<div style="clear:both;"></div>
		</div>
          <?php
    }
    else if ((!isset($_SESSION['zalogowany'])) )
    {
         ?>
       	<div id="menu" >
			
           
		    
		
			<a href="logowanie.php"><div class="option">LOGOWANIE</div></a>
			
			<div style="clear:both;"></div>
		</div>
          <?php
    }
    else
    {
         ?>
       	<div id="menu" >
			
            <a href="forum.php"><div class="option">FORUM</div></a>
		    <a href="dodajpost.php"><div class="option">DODAJ POST</div></a>
            <a href="ankiety.php"><div class="option">ANKIETY</div></a>
            <a href="dodajankiete.php"><div class="option">DODAJ ANKIETE</div></a>
            <a href="logowanie.php"><div class="option">KONTO</div></a>
			
			<div style="clear:both;"></div>
		</div>
          <?php
    }
        
 
?> 
        
 

	
		<div id="content">
             