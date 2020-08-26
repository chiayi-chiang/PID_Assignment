<!-- 更新頁面 -->
<!-- 按下編輯按鈕會帶一個 get 參數
當網頁載入後，如果不是登入的用戶和該留言的主人不一樣的話，就不能更新留言了! 所以把用戶導到登入頁面 -->
<?php
	include_once "connMysql.php";
	session_start();
	$id = $_GET["id"];
    $sql="SELECT * FROM `mes` WHERE id = '$id'";
	$result = mysqli_query($con , $sql) or die('MySQL query error');
   	$row = mysqli_fetch_array($result);
	if($_SESSION["id"]!=$row["uid"]){
    	header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>留言板 - 編輯留言</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="main.css">
</head>
<body>
	<div class="container">
		<h1>編輯留言</h1>
		<span>
			<a href="index.php">首頁</a>
		</span>
		<!-- 表單利用 post 的方式，傳到 mes.php，而且帶兩個 get 參數 method=add 和 id=該留言的 id -->
		<form role="form" action="mes.php?method=update&id=<?php echo $row["id"]?>" method="post">
            <div class="form-group">
                <label for="title">標題</label>
                <input type="text" class="form-control" id="title" placeholder="title" name="title" value="<?php echo $row["title"]?>">
            </div>
            <div class="form-group">
                <label for="content">文章內容</label>
                <input type="text" class="form-control" id="content" placeholder="content" name="content" value="<?php echo $row["content"]?>">
            </div>
            <button type="submit" class="btn btn-primary">修改</button>
        </form>
	</div>
	    
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" ></script>

</body>
</html>