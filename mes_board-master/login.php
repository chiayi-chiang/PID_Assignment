<!-- 當網頁載入後，如果有登入的話，就不能再登入啦! 所以把用戶導到首頁 -->
<?php include_once "connMysql.php";
	session_start();
	if(isset($_SESSION["id"])){
		header("Location: index.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>留言板 - 登入會員</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" >
	<link rel="stylesheet" href="main.css">
</head>
<body>
	<div class="container">
		<h1>登入會員</h1>
		<!-- 表單利用 post 的方式，傳到 config.php，而且帶一個 get 參數 method=login -->
		<form role="form" action="config.php?method=login" method="post">
            <div class="form-group">
                <label for="username">帳號</label>
                <input type="text" class="form-control" id="username" placeholder="username" name="username">
            </div>
            <div class="form-group">
                <label for="password">密碼</label>
                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">登入</button>
			<a href="signup.php">註冊</a>
        </form>
	</div>
	     
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" ></script>

</body>
</html>