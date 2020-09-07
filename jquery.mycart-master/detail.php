<!-- <?php
// foreach($_POST as $item){
//     foreach($item as $d){
//         var_dump($d);
//     }
// }

?> -->
<?php 

$uid = $_GET["id"];


//將sql資料顯示在畫面上
require("database.php"); 
$sqldetail =
"select p.pID,`pName`,o.uID,`uName`,`uPhone`,`orderDate`,`storeDate`,`quantity`,(quantity*p.UnitPrice) as total 
FROM `member` m,`order` o,`product` p,`details` d 
where m.uID=o.uID and o.oID = d.oID and p.pID = d.pID AND p.pID='$uid'
";
require("database.php");
$detail=mysqli_query($con, $sqldetail);
$row=mysqli_fetch_assoc($detail);
echo $row["uName"];




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
    .form {
        position: relative;
        z-index: 1;
        background: #FFFFFF;
        max-width: 1000px;
        margin:  auto 100px;
        padding: 45px;
        text-align: center;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }
    </style>
</head>
<body>
    <div class="member-page">
    <div class="form"> 
    <form class="member-form" method="post">
        <div class="container">
        <h2 class="float-left"><?= $row["pName"]."交易明細"?>
        <a href="manager.php" class="btn btn-outline-info btn-md float-right">回首頁</a>
        
        
        <table class="table table-striped">
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
                <?php while ($row) { ?> 
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
    </form>
    </div>
  </div> 
</body>
</html>
