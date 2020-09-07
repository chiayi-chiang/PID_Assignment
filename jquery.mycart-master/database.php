<?php
	$server='localhost';
	$id='root';
	$pwd='';
	$dbname='shopcart';   
	$con = mysqli_connect($server , $id , $pwd,$dbname);
	if (!$con){
  		die("Could not connect: " . mysql_error());
  	}
	mysqli_query($con ,"SET NAMES utf8");
	// mysql_close($con);
	
?>