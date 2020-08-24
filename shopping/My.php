<?php 
session_start();
if (isset($_SESSION["userName"]))//檢查是否有資料
  
  $sUserName = $_SESSION["userName"];//有
else 
  $sUserName = "Guest";//沒有

?>