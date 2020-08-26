<?php 
	// 判斷我傳過來的 method 參數，代表我要執行的動作
	include_once "connMysql.php";
    session_start();
		
	switch ($_GET["method"]) {
		case "add":
			add();
			break;
		case "update":
			update();
			break;
		case "del":
			del();
			break;
		default:
			break;
	}
	//如果是新增訊息的話，把表單的東西新增到資料庫 mes 表裡面
	function add(){
		$uid = $_SESSION["id"];
		//$title = $_POST["title"];
		//$content = $_POST["content"];
		$sql = "INSERT INTO `mes` (uid)
		VALUES ('$uid')";
		global $con;
		$result = mysqli_query($con , $sql) or die('MySQL query error');
		echo "<script type='text/javascript'>";
		echo "alert('新增留言成功');";
		echo "location.href='index.php';";
		echo "</script>";
	}
	// 如果是更新訊息的話，把表單的東西更新到資料庫 mes 表裡面
	function update(){
		$id = $_GET["id"];
		$title = $_POST["title"];
		$content = $_POST["content"];
		$sql = "UPDATE `mes` SET title = '$title', content = '$content' WHERE id = $id";
		global $con;
		$result = mysqli_query($con , $sql) or die('MySQL query error');
		echo "<script type='text/javascript'>";
		echo "alert('編輯留言成功');";
		echo "location.href='index.php';";
		echo "</script>";
	}
	// 是刪除訊息的話，把表單的東西從資料庫 mes 表裡面刪除
	function del(){
		$id = $_GET["id"];
		$sql = "DELETE FROM `mes` WHERE id = $id";
		global $con;
		$result = mysqli_query($con , $sql) or die('MySQL query error');
		echo "<script type='text/javascript'>";
		echo "alert('刪除留言成功');";
		echo "location.href='index.php';";
		echo "</script>";
	}

?>