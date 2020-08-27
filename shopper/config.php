<!-- 會員機制 -->
<!-- 判斷我傳過來的 method 參數，代表我要執行的動作 -->
<?php include_once "connMysql.php";
	switch ($_GET["method"]) {
		case "login":
			login();
			break;
		case "signup":
			signup();
			break;
		case "logout":
			logout();
			break;
		default:
			break;
	}
	// 如果是登入的話，要先找資料庫 member 表裡面是否帳號、密碼和使用者輸入的帳號、密碼一樣，如果一樣才能登入，
	// 登入要給用戶一個 session，$_SESSION[“id”] 設成使用者的 id
	function login(){
		$sql="SELECT * FROM `coust`
				WHERE username = '$_POST[username]' && passwd = '$_POST[password]';";
		global $con;
		$result = mysqli_query($con , $sql) or die('MySQL query error');
	    $row = mysqli_fetch_array($result);
	    if($row==""){
			echo "<script type='text/javascript'>";
			echo "alert('帳密錯誤');";
			echo "location.href='login.php';";
			echo "</script>";
	    }else{
	    	session_start();
	    	$_SESSION["id"] = $row['id'];
	    	echo "<script type='text/javascript'>";
			echo "alert('登入成功');";
			echo "location.href='index.php';";
			echo "</script>";
	    }
	} 
	// 如果是註冊的話，要先找資料庫 member 表裡面是否帳號和使用者輸入的帳號一樣，如果一樣的話就代表已經註冊過帳號了。
	// 如果沒有一樣的話，就把他填的資料存進資料庫 member 表裡註冊成功後要給用戶一個 session，$_SESSION[“id”] 設成使用者的 id
	function signup(){
		$sql="SELECT * FROM `member`
				WHERE unumber = '$_POST[username]'";
		global $con;
	    $result = mysqli_query($con , $sql) or die('MySQL query error');
	    $row = mysqli_fetch_array($result);
		if($row!=""){
			echo "<script type='text/javascript'>";
			echo "alert('已經辦過帳號囉');";
			echo "location.href='login.php';";
			echo "</script>";
		}
		else{
			$sql="INSERT INTO `member` (`username`, `passwd`, `name`)
					VALUES ('$_POST[username]','$_POST[password]','$_POST[name]')";
			global $con;
		    $result = mysqli_query($con , $sql) or die("MySQL query error");
		    
			$sql="SELECT * FROM `member`
				WHERE username = '$_POST[username]' && passwd = '$_POST[password]'";
			global $con;
	    	$result = mysqli_query($con , $sql) or die('MySQL query error');
	    	$row = mysqli_fetch_array($result);		    
		    session_start();
	    	$_SESSION["id"] = $row["id"];
		 	echo "<script type='text/javascript'>";
			echo "alert('註冊成功');";
			echo "location.href='index.php';";
			echo "</script>";
		}
	} 
	// 如果是登出的話，就把用戶的 SESSION 清除掉
	function logout(){
		session_start();
		if(isset($_SESSION["id"])){
			session_unset();
			echo "<script type='text/javascript'>";
			echo "alert('登出成功');";
			echo "location.href='index.php';";
			echo "</script>";
		}
	} 

?>
