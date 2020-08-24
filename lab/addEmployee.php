<?php
if (isset($_POST["okButton"])) {
  $cID = $_POST["cID"];
  $cName = $_POST["cName"];
  $oId = $_POST["oId"];
  $sql = <<<multi
    insert into customers (cID, cName, oId)
    values ('$cID', '$cName', $oId)
  multi;
  // echo $sql;
  require("connDB.php");
  mysqli_query($link, $sql);
  header("location: index.php");
}

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

<form method="post">
  <div class="form-group row">
    <label for="firstName" class="col-4 col-form-label">First Name:</label> 
    <div class="col-8">
      <input id="firstName" name="firstName" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="lastName" class="col-4 col-form-label">Last Name:</label> 
    <div class="col-8">
      <input id="lastName" name="lastName" type="text" class="form-control">
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
