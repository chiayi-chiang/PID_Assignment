<?php
	$server='localhost';
	$id='root';
	$pwd='root';
	$dbname='clothes';   
	$con = mysqli_connect($server , $id , $pwd, $dbname,8889);
	if (!$con){//無法連線sql
  		die("Could not connect: " . mysql_error());
  	}
	mysqli_select_db($con , $dbname);//連線sql的clothes資料檔
	mysqli_query($con ,"SET NAMES utf8");
	// mysql_close($con);
?>