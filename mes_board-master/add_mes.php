<!-- 當網頁載入後，如果沒登入的話，就不能新增留言了! 所以把用戶導到登入頁面 -->
<?php include_once "connMysql.php";
    session_start();
    if(!isset($_SESSION["id"])){
    	header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>留言板 - 新增留言</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" >
	<link rel="stylesheet" href="main.css">
</head>
<body>
	<div class="container">
		<h1>新增留言</h1>
		<span>
			<a href="index.php">首頁</a>
        </span>
        <!-- 表單利用 post 的方式，傳到 mes.php，而且帶一個 get 參數 method=add -->
		<form role="form" action="mes.php?method=add" method="post">
            <div class="form-group">
                <label for="title">標題</label>
                <input type="text" class="form-control" id="title" placeholder="title" name="title">
            </div>
            <div class="form-group">
                <label for="content">文章內容</label>
                <input type="text" class="form-control" id="content" placeholder="content" name="content">
            </div>
            <button type="submit" class="btn btn-primary">新增</button>
        </form>
	</div>
	     
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" ></script>

</body>
</html>