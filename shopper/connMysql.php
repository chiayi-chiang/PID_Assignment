<!-- 資料庫連結 database.php -->
<?php

$dbhost = '127.0.0.1';
$dbuser = 'root';
$dbpass = 'root';
$dbname = 'clothes';
//connect to mysql
$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname, 8889);
	if (!$con){
  		die("Could not connect: " . mysql_error());
  	}
	mysqli_select_db($con , $dbname);
	mysqli_query($con ,"SET NAMES utf8");
	// mysql_close($con);
?>