<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
<TITLE>Wyniki głosowania</TITLE>
</HEAD>
<BODY>
<CENTER>
<H2>Wyniki głosowania</H2>
<?PHP

function printResults()
{
  if(isSet($_POST["vote"])){
    $color = $_POST["vote"];
  }
  else{
    $color = "";
  }

  if($color == ""){
    echo("Proszę zaznacyć jeden z kolorów.");
  }
  else{
    $link = mysql_connect("localhost", "login", "haslo");
    $flag = mysql_select_db("nazwa_bazy");
    if(!$link || !$flag){
      echo("Problem z połączeniem z bazą danych.");
      return false;
    }

    $query = "UPDATE COLORS SET VOTES = VOTES + 1 WHERE NAME = '".$color."'";
    if(!$result = mysql_query($query)){
      echo("Problem z bazą danych. Odrzucone zapytanie.");
      return false;
    }

    $query = 'SELECT SUM(VOTES) FROM COLORS';
    if(!$result = mysql_query($query)){
      echo("Problem z bazą danych. Odrzucone zapytanie.");
      return false;
    }

    if(!$row = mysql_fetch_row($result)){
      echo("Problem z bazą danych. Odrzucone zapytanie.");
      return false;
    }

    $votes_no = $row[0];

    $query = "SELECT NAME, VOTES, VOTES * 100 /".$votes_no;
    $query .= " AS PROC FROM COLORS ORDER BY VOTES DESC";
    if(!$result = mysql_query($query)){
      echo("Problem z bazą danych. Odrzucone zapytanie.");
      result;
    }
    echo("<TABLE border='1'>");
    $kolor_nazwa = "Nazwa koloru";
    $ile_glosow = "Liczba głosów";
    $proc_glosow = "Procent głosów";
    include("color_tab_row.inc");
    echo("$code");

    while($row = mysql_fetch_array($result)){
      $kolor_nazwa = $row[0];
      $ile_glosow = $row[1];
      $proc_glosow = $row[2];
      include("color_tab_row.inc");
      echo("$code");
    };
    echo("</TABLE>");
  }
}
printResults();
?>
</CENTER>
</BODY>
</HTML>