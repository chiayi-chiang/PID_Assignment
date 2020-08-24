<?php
    srequire_once("connMysql.php");
    // //預設每筆頁數
    // $pageRow_records = 6;
    // //預設頁數
    // $num_pages =1;
    // //若已經有翻頁，將頁數更新
    // if(isset_($_GET['page'])){
    //     $num_pages = $_GET['page'];
    // }
    // //本頁開始記錄筆數
    // $startRow_records=($num_pages-1)*$pageRow_records;
    // //
    // if(isset($_GET["cid"])&&($_GET["cid"])){
    //     $query_RecProduct = "SELECT *
    //     from menus
    //     WHERE `rID`=?
    //     order by `mID`";
    //     $stmt = $link->prepare($query_RecProduct);
    //     $stmt->bind_param("i",$_GET["cid"]);
    // //
    // }elseif(isset($_GET["keyword"])&&($_GET["keyword"]!="")){
    //     $query_RecProduct = "SELECT *
    //     from menus
    //     WHERE `mName` LIKE ?
    //     order by `mID`";
    //     $stmt = $link->prepare($query_RecProduct);
    //     $keyword = "%".$_GET["keyword"]."%";
    //     $stmt->bind_param("ss",$keyword,$keyword);
    // //
    // }elseif(isset($_GET["price1"]) && isset($_GET["price2"])&&($_GET["price1"]<=$_GET["price2"])){
    //     $query_RecProduct = "SELECT *
    //     from menus
    //     WHERE `UnitPrice` BETWEEN ? AND ? 
    //     order by `mID`";
    //     $stmt = $link->prepare($query_RecProduct);
    //     $stmt->bind_param("ii",$_GET["price1"],$_GET["price1"]);
    // //
    // }else{
    //     $query_RecProduct = "SELECT * 
    //     FROM menus
    //     order BY `mID`";
    //     $stmt = $link->prepare($query_RecProduct);

    // }
    // $stmt->execute();
    // //
    // $all_RecProduct = $stmt->get_result();
    // //
    // $total_records=$all_RecProduct->num_rows;
    // //
    // $total_pages=ceil($total_records/$pageRow_records);
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
  <h2>Employee List
      <a href="addEmployee.php" class="btn btn-outline-info btn-md float-right">New</a>
  </h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>cID</th>
        <th>cName</th>
        <th>oID</th>
        <th>OrderDate</th>
        <th>ShipDate</th>
        <th>&nbsp;</th>
      </tr>
    </thead>
    <tbody>
    <?php while ( $row = mysqli_fetch_assoc($result) ) { ?>
      <tr>
        <td><?= $row["cID"] ?></td>
        <td><?= $row["cName"] ?></td>
        <td><?= $row["oID"] ?></td>
        <td><?= $row["OrderDate"] ?></td>
        <td><?= $row["ShipDate"] ?></td>
        <td>
            <span class="float-right">
                <a href="./editForm.php?id=<?= $row["cID"] ?>" class="btn btn-outline-success btn-sm">Edit</a>
                | 
                <a href="./deleteEmployee.php?id=<?= $row["cID"] ?>" class="btn btn-outline-danger btn-sm">Delete</a>
            </span>
        </td>
      </tr>
    <?php } ?>
    
    </tbody>
  </table>
</div>

</body>
</html>