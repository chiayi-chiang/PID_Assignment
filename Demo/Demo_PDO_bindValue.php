<?php

if (!isset($_GET["id"])) {
	die("id not found.");
}
$id = $_GET["id"];//fin id

$pdo = new PDO("mysql:host=127.0.0.1;dbname=northwind", 'root', '');

$cmd = $pdo->prepare("select ProductID, ProductName, UnitPrice from products where productid = :pid lock in share mode");//: need write
$cmd->bindValue(":pid", $id);//參數型別 

$cmd->execute();
$row = $cmd->fetch();
echo "$id => {$row['ProductName']}"; 


