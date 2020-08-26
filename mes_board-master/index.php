<!-- 在載入頁面的時候要去資料庫裡面撈 mes 資料出來 -->
<?php include_once "connMysql.php";
    session_start();
    $sql = "SELECT * FROM mes ";//******/
	$result = mysqli_query($con , $sql) or die('MySQL query error');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>留言板</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" >
	<link rel="stylesheet" href="main.css">
</head>
<body>
	<div class="container">
		<h1>留言板</h1>
		<span>
			<!-- 在載入頁面的時候判斷有沒有登入狀態，顯示不同的功能按鈕
			有登入就顯示 => 登出、新增留言
			沒登入就顯示 => 登入、註冊 -->
			<?php if(isset($_SESSION["id"])){?>
				<a href="config.php?method=logout">登出</a>
				<!-- <a href="add_mes.php">新增留言</a> -->
			<?php }else{?>
				<a href="login.php">登入</a>
				<a href="signup.php">註冊</a>
			<?php }?>
		</span>
		<!-- 塞進去留言版裡面 -->
		<?php 
		    while($row = mysqli_fetch_array($result)){ 
		?>
			<div class="card">
				<h4 class="card-header">標題：<?php //echo $row['title'];?>
				<?php if(@$_SESSION["id"]===$row["uid"]){?>
					<a href="mes.php?method=del&id=<?php echo $row["id"]?>" class="btn btn-danger mybtn">刪除</a>
					<a href="update_mes.php?id=<?php echo $row["id"]?>" class="btn btn-primary mybtn">編輯</a>
				<?php }?>
				</h4>
				
				<!-- 特別判斷這篇留言的主人跟現在登入的人是不是同一個人，是的話才可以編輯和刪除
				刪除連結利用 get 的方式，傳到 mes.php，而且帶兩個參數 method=del 和 id=該留言的 id
				編輯連結利用 get 的方式，傳到 update.php，而且帶一個參數 id=該留言的 id -->
				
				<!-- <div class="card-body">
					<h5 class="card-title">作者：<?php //echo $row["uid"];?></h5>
					<p class="card-text">
						<?//php echo $row["content"];?>
					</p>
				</div> -->
			</div>		  
		<?php 
		   	}
		?>
	</div>
	     
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" ></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" ></script>
</body>
</html>