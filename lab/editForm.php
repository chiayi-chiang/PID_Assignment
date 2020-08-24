<?php
if (isset($_POST["cancelButton"])) {
  header("location: index.php");
  exit();
}
if (!isset($_GET["id"])) {
    die("id not found.");
}
$id = $_GET["id"];
if (! is_numeric ( $id ))
    die ( "id not a number." );

//echo $sql;
require("connDB.php");
if (isset($_POST["okButton"])) {
  $cID = $_POST["cID"];
  $cName = $_POST["cName"];
  $oId = $_POST["oId"];
  $sql = <<<multi
    update customers set 
       cID = '$cID', 
       cName='$cName', oId = $oId
    where cId = $id
  multi;
  mysqli_query($link, $sql);
  header("location: index.php");
  exit();
}
else {
  $sql = <<<multi
    select * from customers where cId = $id
  multi;
  $result = mysqli_query($link, $sql);
  $row = mysqli_fetch_assoc($result);
}

//var_dump($row);
// header("location: index.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

<form method="post" action="">
  <div class="form-group row">
    <label for="cID" class="col-4 col-form-label">cID:</label> 
    <div class="col-8">
      <input id="cID" name="cID" value="<?= $row["cID"] ?>" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="cName" class="col-4 col-form-label">cName:</label> 
    <div class="col-8">
      <input id="cName" name="cName" value="<?= $row["cName"] ?>" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="okButton" value="OK" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>

</div>

</body>
</html>
