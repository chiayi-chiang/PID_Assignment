<?php
if (!isset($_GET["id"])) {
    die("id not found.");
}
$id = $_GET["id"];
if (! is_numeric ( $id ))
    die ( "id not a number." );
$sqlproduct =
    "delete from product where pId = $id"
;
// echo $sql;
require("database.php");
mysqli_query($con, $sqlproduct);
header("location: manager.php");
?>