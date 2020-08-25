<?php 
session_start();
if (!isset($_SESSION["userName"]))//檢查$_COOKIE是否沒有一個userName的陣列資料
{
  //沒有
  $_SESSION["lastPage"] = "secret.php";
	setcookie("lastPage", "secret.php");//請瀏覽器(userName)幫忙記住$sUserName的資料
	//header("Location: login.php");//回首頁
	exit();
	
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Lag - Member Page</title>
</head>
<body>

<table width="300" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
  <tr>
    <!-- 當登入成功，跳至購物頁 -->
    <td align="center" bgcolor="#CCCCCC" ><a href="index.html">購物網站</a></td>
  </tr>
</table>


</body>
</html>