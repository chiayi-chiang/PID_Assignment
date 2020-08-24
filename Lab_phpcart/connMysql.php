<?php
// if (! isset ( $_GET ["id"] ))
// 	die ( "Parameter id not found." );

// $id = $_GET ["id"];
// if (! is_numeric ( $id ))//檢查
//     die ( "id not a number." );
$dbhost = '127.0.0.1';
$dbuser = 'root';
$dbpass = 'root';
$dbname = 'phpcart';
//connect to mysql
$link = mysqli_connect($dbhost, $dbuser, $dbpass, "hw0807", 8889) or die ( mysqli_connect_error() );
$result = mysqli_query ( $link, "set names utf8");
echo $result;
// mysqli_select_db ( $link, $dbname );//切換資料庫
// //資料庫語法
// $commandText = <<<SqlQuery
// select `cID`, `cName`, `Address`,`Phone`
//   from customers
//   where cID = $id
// SqlQuery;
// //http://...php?id=3;update....; --
// $result = mysqli_query ( $link, $commandText );
// $row = mysqli_fetch_assoc ( $result );
// mysqli_close($link);
?>