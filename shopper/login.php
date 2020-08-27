<!-- 當網頁載入後，如果有登入的話，就不能再登入啦! 所以把用戶導到首頁 -->
<?php include_once "connMysql.php";
	session_start();
	if(isset($_SESSION["id"])){
		header("Location: index.php");
	}
?>

