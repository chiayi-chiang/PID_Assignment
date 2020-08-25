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