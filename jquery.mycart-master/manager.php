<?php
require("database.php");

if (isset($_POST["btnHome"]))//read 表單
{
	header("Location: index.php");//go back to homepage
	exit();
}

$sqlproduct ="
SELECT * FROM `product`";
$product=mysqli_query($con, $sqlproduct);

foreach($_POST as $item) {
  echo($item);
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
    <h2 class="float-left"><?= $sUserName."管理者專用"?></h2>
        <a href="index.php" class="btn btn-outline-info btn-md float-right">回首頁</a>
        <a href="addproduct.php" class="btn btn-outline-info btn-md float-right">新增品項</a>
        <a href="memcheck.php" class="btn btn-outline-info btn-md float-right">會員冊</a>
    
  <table class="table table-striped">
    <thead>
      <tr>
        <th>圖片</th>
        <th>產品名稱</th>
        <th>價格</th>
        <th>&nbsp;</th>
      </tr>
    </thead>
    <tbody>
    <?php while ( $row = mysqli_fetch_assoc($product) ) { ?>
      <tr>
        <td><img src="images/<?= $row["picture"]?>" width="150px" height="150px"></td>
        <td><?= $row["pName"] ?></td>
        <td><?= $row["UnitPrice"] ?></td>
        <td>
            <span class="float-right">
                <a href="./detail.php?id=<?= $row["pID"] ?>" class="btn btn-outline-success  btn-sm">detail</a>
                |
                <a href="./editForm.php?id=<?= $row["pID"] ?>" class="btn btn-outline-success btn-sm">Edit</a>
                | 
                <a href="./deletefrom.php?id=<?= $row["pID"] ?>" class="btn btn-outline-danger btn-sm">Delete</a>
            </span>
        </td>
      </tr>
    <?php } ?>
    
    </tbody>
  </table>
</div>

</body>
</html>
