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
	<title>留言板 - 註冊會員</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" >
	<link rel="stylesheet" href="main.css">
</head>
<body>
	<div class="container">
		<h1>註冊會員</h1>
		<form role="form" action="config.php?method=signup" method="post">
            <div class="form-group">
                <label for="username">帳號</label>
                <input type="text" class="form-control" id="username" placeholder="username" name="username">
            </div>
            <div class="form-group">
                <label for="password">密碼</label>
                <input type="password" class="form-control" id="passwd" placeholder="Password" name="passwd">
            </div>
            <div class="form-group">
                <label for="name">綽號</label>
                <input type="text" class="form-control" id="name" placeholder="name" name="name">
            </div>
            <button type="submit" class="btn btn-primary">註冊</button>
			<a href="login.php">已是會員</a>
        </form>
	</div>
	     
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" ></script>

</body>
</html>