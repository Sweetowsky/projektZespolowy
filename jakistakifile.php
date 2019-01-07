<?php
if($_POST["btnadd"] == "ADD") {
// add 1 to the row counter
    if (isset($_POST['count'])) $count = $_POST['count'] + 1;
// set value for first load
    else $count = 1;
}
if($_POST["btnremove"] == "REMOVE") {
// decrement the row counter
    $count = $_POST['count'] - 1;
// set minimum row number
    if ($count < 1) $count = 1;
}
?>
<body>
<!-- call same file on submit -->
<form name="form1" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <?php
    // print $count rows
    for ($i=1; $i<=$count; $i++) {
        echo '      <input type="text" name="txt" align="center">';
    }
    ?>
    <!-- you only need one set of buttons and only one counter for this script
         because every button would do the same -->
    <input type="submit" name="btnadd" id="btnadd" value="ADD">
    <input type="submit" name="btnremove" id="btnremove" value="REMOVE">
    <input type="hidden" name="count" value="<?php echo $count; ?>">
