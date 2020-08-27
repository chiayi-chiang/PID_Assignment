<!--登入-->
<?php 
session_start();
if (isset($_GET["logout"]))//read ? back things(index 28)
{
  $_SESSION["userName"] = $sUserName;
  unset($_SESSION["userName"]);
  //setcookie("userName ", "Guest", time() - 3600);//clien cookie,-60*60*24*7 after 7 days ago can't eat
	//header("Location: register.php");//go back to homepage
	exit();
}

if (isset($_POST["btnHome"]))//read 表單
{
	//header("Location: register.php");//go back to homepage
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
		   header("Location: register.php");//go back to homepage
		exit();
	}
	
}

?>


