<?php
    require("database.php");

    session_start();
    if (isset($_SESSION["txtUserName" ]))//檢查是否沒有一個txtUserName的陣列資料
    {
        $sUserName = $_SESSION["txtUserName"];//有
        $sUserNumber=$_SESSION["txtUserNumber"];
    }    
    $sqlmember ="
    select m.uID,`unumber`,`uPasswd`,`uName`,`uPhone`,`manager`,`canuse`
    FROM `member` m
    where m.uID 
    and `unumber`='$sUserNumber'";
    $row = mysqli_fetch_assoc(mysqli_query($con, $sqlmember));

    if ($row["manager"]=='1')//是否有管理權限
    {
    echo "<script type='text/javascript'> alert('歡迎管理者進入');location.href='manager.php';</script>";
    }else{
    echo "<script type='text/javascript'> alert('你尚未取得權限');location.href='index.php';</script>";
    }
?>