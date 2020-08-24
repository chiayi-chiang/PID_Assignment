<!--登入-->
<?php 
session_start();
if (isset($_GET["logout"]))//read ? back things(index 28)
{
  $_SESSION["userName"] = $sUserName;
  unset($_SESSION["userName"]);
  //setcookie("userName ", "Guest", time() - 3600);//clien cookie,-60*60*24*7 after 7 days ago can't eat
	header("Location: index.php");//go back to homepage
	exit();
}

if (isset($_POST["btnHome"]))//read 表單
{
	header("Location: index.php");//go back to homepage
	exit();
}

if (isset($_POST["btnOK"]))//read 表單，去看$_POST裏頭有沒有一個較btnOK的
{
  //有
	$sUserName = $_POST["txtUserName"];//$sUserName(變數)<-["txtUserName"](帳號)，使用者寫入的帳號以陣列傳給sUN變數
	if (trim($sUserName) != "")//變數值不是空的時後
	{
    //不是
    
   // setcookie("userName", $sUserName);//請瀏覽器(userName)幫忙記住$sUserName的資料
    session_start();
    $_SESSION["userName"] = $sUserName;
    if (isset($_SESSION["lastPage"]))//read cookie，
      
		  header(sprintf("Location: %s", $_SESSION["lastPage"]));//%s(字串)<-$_SESSION["lastPage"]，
		else
		   header("Location: index.php");//go back to homepage
		exit();
	}
	
}

?>


<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Lab - Login</title>
</head>
<body>
<!--把登入表單資料送給login.php再次執行 -->
<form id="form1" name="form1" method="post" action="login.php">
  <table width="300" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
    <tr>
      <td colspan="2" align="center" bgcolor="#CCCCCC"><font color="#FFFFFF">會員系統 - 登入</font></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">帳號</td>
      <td valign="baseline"><input type="text" name="txtUserName" id="txtUserName" /></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">密碼</td>
      <td valign="baseline"><input type="password" name="txtPassword" id="txtPassword" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#CCCCCC"><input type="submit" name="btnOK" id="btnOK" value="登入" /><!--按鈕為btnOK-->
      <input type="reset" name="btnReset" id="btnReset" value="重設" />
      <input type="submit" name="btnHome" id="btnHome" value="回首頁" />
      </td>
    </tr>
  </table>
</form>
</body>
</html>