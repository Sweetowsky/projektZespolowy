
<?php
 
    session_start();
 require_once "connect.php";
     $id_post=$_SESSION['id_post'];
    $komunikat="";
?>


<?php
$mysqli = new mysqli($host, $db_user, $db_password, $db_name);

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$query  = "DELETE FROM komentarz WHERE id_postu='$id_post';";
$query .= "DELETE FROM post WHERE id_post='$id_post'";

/* execute multi query */
if ($mysqli->multi_query($query)) {
    do {
        /* store first result set */
        if ($result = $mysqli->store_result()) {
            while ($row = $result->fetch_row()) {
                printf("%s\n", $row[0]);
            }
            $result->free();
        }
        /* print divider */
        if ($mysqli->more_results()) {
            printf("-----------------\n");
        }
    } while ($mysqli->next_result());
}

/* close connection */
$mysqli->close();
?>



















<?php include('naglowek.php'); ?>


 <?php echo $komunikat;?>
         
  
<?php include('stopka.php'); ?>


		
		
		
