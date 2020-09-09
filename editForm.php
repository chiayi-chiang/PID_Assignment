<?php
require("database.php");

if (!isset($_GET["id"])) {
    die("id not found.");
}

$id = $_GET["id"];

if (! is_numeric ( $id )){
    die ( "id not a number." );
}

$sqlpId = 
  "select * from product where pId = $id";
  $row = mysqli_fetch_assoc(mysqli_query($con, $sqlpId));    



if (isset($_POST["btnOK"])) {
  $picture = $_POST["txtpicture"];
  $pName = $_POST["txtpName"];
  $price = $_POST["txtprice"];
  $sqlproduct = 
  "UPDATE `product` 
  SET pName='$pName',UnitPrice ='$price',picture='$picture'
  WHERE pID = $id";
  mysqli_query($con, $sqlproduct);
  header("location: manager.php");
  exit();
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
  <style>
        
        .form {
        position: relative;
        z-index: 1;
        background: #FFFFFF;
        max-width: 600px;
        margin: 100px auto ;
        padding: 45px;
        text-align: center;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }
      .form input {
        font-family: "Roboto", sans-serif;
        outline: 0;
        background: #f2f2f2;
        width: 100%;
        border: 0;
        margin: 0 0 15px;
        padding: 15px;
        box-sizing: border-box;
        font-size: 14px;
      }
      .form button {
        font-family: "Roboto", sans-serif;
        text-transform: uppercase;
        outline: 0;
        background: #4CAF50;
        width: 100%;
        border: 0;
        padding: 15px;
        color: #FFFFFF;
        font-size: 14px;
        -webkit-transition: all 0.3 ease;
        transition: all 0.3 ease;
        cursor: pointer;
      }
  </style>
</head>
<body>
    <div class="addproduct-page" >
    <div class="form">
    <h2>產品修改</h2>
      <form class="singup-form" id="form2" name="form2" method="post" >
        <div class="form-group row">
          <label for="firstName" class="col-4 col-form-label">產品圖檔:</label> 
          <div class="col-8">
            <input type="text" name="txtpicture" id="txtpicture" value="<?= $row["picture"] ?>" class="form-control" />
          </div>
        </div>
        <div class="form-group row">
          <label for="firstName" class="col-4 col-form-label">產品名稱:</label> 
          <div class="col-8">
            <input type="text" name="txtpName" id="txtpName" value="<?= $row["pName"] ?>" class="form-control" />
          </div>
        </div>
        <div class="form-group row">
          <label for="firstName" class="col-4 col-form-label">產品價格:</label> 
          <div class="col-8">
            <input type="text" name="txtprice" id="txtprice" value="<?= $row["UnitPrice"] ?>" class="form-control"/>
          </div>
        </div>
        <tr>
          <button type="submit" name="btnOK" id="btnOK" class="btn-success">修改</button><!--按鈕為btnOK-->
          <button type="reset" name="btnReset" id="btnReset" class="btn-success">重設</button> 
          <a href="manager.php">回首頁</a>
        </tr>
      </form>
      
    </div>
  </div>
</body>
</html>
