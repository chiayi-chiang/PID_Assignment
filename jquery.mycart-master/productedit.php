<?php
require("database.php");

if (!isset($_GET["id"])) {
    die("id not found.");
}

$pid = $_GET["id"];

if (! is_numeric ( $pid )){
    die ( "id not a number." );
}
session_start();
$sUserNumber=$_SESSION["txtUserNumber"];//get now member's uuserNumber
//echo $sUserNumber;
//to sql get now member total
$member = "select *
FROM member 
where unumber = '$sUserNumber'";
$IDrow = mysqli_fetch_assoc(mysqli_query($con, $member));   
$uID=$IDrow["uID"];



$sqlpId = 
  "select * from product where pId = $pid";
  $row = mysqli_fetch_assoc(mysqli_query($con, $sqlpId));    


$UnitPrice=$row["UnitPrice"];
$buytotal=$sqltotal["total"];
echo $buytotal;
$buyquantity = $_POST["quantity"];
if($buyquantity >= 10) {
    $_POST["quantity"]=10; 
    $buyquantity = $_POST["quantity"];
}
$total=$UnitPrice*$buyquantity;
  
  
if (isset($_POST["btnOK"])) {
    
    global $pid;
    global $uID;
    $orderDate=date('Y-m-d H:i:s',mktime (date(H)+8, date(i), date(s), date(m), date(d), date(Y)));
    $storeDate=date('Y-m-d H:i:s',mktime (date(H)+8, date(i), date(s), date(m), date(d)+8, date(Y)));
    $sqlorder="INSERT INTO `order`(`uID`, `orderDate`, `storeDate`) VALUES ('$uID','$orderDate','$storeDate')";
    mysqli_query($con, $sqlorder);
    $sqlorder="SELECT `oID`, `uID`, `orderDate`, `storeDate` FROM `order` WHERE `uID`='$uID'";
    $order = mysqli_fetch_assoc(mysqli_query($con, $sqlorder));
    $oID=$order["oID"];
    global $buyquantity;
    global $total;
    $sqldetail="INSERT INTO `details`(`oID`, `pID`, `quantity`, ` total`) VALUES ('$oID','$pid','$buyquantity','$total')";
    mysqli_query($con, $sqldetail);

    header("location: index.php");//go bake to secret screen
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
      <form class="singup-form" id="form2" name="form2" method="post">
        <div class="form-group row">
          <label for="firstName" class="col-4 col-form-label">產品名稱:</label> 
          <div class="col-8">
            <input type="text" name="txtpName" id="txtpName" disabled="disabled" value="<?= $row["pName"] ?>" class="form-control" />
          </div>
        </div>
        <div class="form-group row">
          <label for="firstName" class="col-4 col-form-label">產品單價:</label> 
          <div class="col-8">
            <input type="text" name="txtprice" id="txtprice" disabled="disabled" value="<?= $row["UnitPrice"] ?>" class="form-control"/>
          </div>
        </div>
        <div class="form-group row">
          <label for="firstName" class="col-4 col-form-label">購買數量:</label> 
          <div class="col-8">
            <input type="text" name="quantity" id="quantity" class="form-control" autofocus 
             onchange="this.form.submit()" value ="<?=(isset($_POST['quantity']))?$_POST['quantity']:"1"?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="firstName" class="col-4 col-form-label">總額:</label> 
          <div class="col-8">
          <input type="text" id="total" name="total" class="form-control" disabled="disabled" value = "<?php echo $total;?>"/>
          </div>
        </div>
        <tr>
          <button type="submit" name="btnOK" id="btnOK" class="btn-success">addcart</button><!--按鈕為btnOK-->
          <button type="reset" name="btnReset" id="btnReset" class="btn-success">重設</button> 
          <a href="index.php">回首頁</a>
        </tr>
      </form>
      
    </div>
  </div>
</body>
</html>
