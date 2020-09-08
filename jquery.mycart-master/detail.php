<?php 

$pid = $_GET["id"];


//將sql資料顯示在畫面上
require("database.php");
$sqldetail =
"select p.pID,`pName`,o.uID,`uName`,`uPhone`,`orderDate`,`storeDate`,`quantity`,(quantity*p.UnitPrice) as total 
FROM `member` m,`order` o,`product` p,`details` d 
where m.uID=o.uID and o.oID = d.oID and p.pID = d.pID AND p.pID='$pid'
";

$detail=mysqli_query($con, $sqldetail);

$sqlproduct=
"select * 
from product
where `pID`='$pid'";
$rowname=mysqli_fetch_assoc(mysqli_query($con, $sqlproduct));






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .form {
            position: relative;
            z-index: 1;
            background: #FFFFFF;
            max-width: 1000px;
            margin: 100px auto 100px;
            padding: 45px;
            text-align: center;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</head>
<body>
<div class="form"> 
    <form class="member-form" method="post" action="index.php">
        <div class="container">
        <h2 class="float-left"><?= $rowname["pName"]."交易明細"?></h2>
        <a href="manager.php" class="btn btn-outline-info btn-md float-right">回首頁</a>
                <table class="table table-bordered" >
                <thead>
                    <tr>
                        <th>購買人</th>
                        <th>手機</th>
                        <th>訂單日</th>
                        <th>結單日</th>
                        <th>購買數量</th>
                        <th>總額</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row=mysqli_fetch_assoc($detail)) { ?> 
                    <tr>
                        <td><?= $row["uName"] ?></td>
                        <td><?= $row["uPhone"] ?></td>
                        <td><?= $row["orderDate"] ?></td>
                        <td><?= $row["storeDate"] ?></td>
                        <td><?= $row["quantity"] ?></td>
                        <td><?= $row["total"] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            </div>
        </div>
    </form>
</div>
</body>
</html>