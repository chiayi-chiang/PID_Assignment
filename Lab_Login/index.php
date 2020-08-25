<?php 
require_once("connMysql.php");//設定sql連線
session_start();
//檢查是否經過登入，若有登入則重新導入
if (isset($_SESSION["loginMember"]) && ($_SESSION["loginMember"]!="")){//沒登入或空值跳過
  // 若帳號等級為member則導向會員中心
  if($_SESSION["userNameLevel"]=="member"){
    header("location:member_center.php");
  //否則則導向管理中心
  }else{
    header("location:member_admin.php");
  }
}
//執行會員登入
if(isset($_POST["userName"]) && ($_POST["passwd"])){
  //連結登入會員資料
  $query_RecLogin = " SELECT `muserName`,`mpasswd`,`mlevel` FROM customers WHERE muserName=? ";
  $stmt = $link->prepaare($query_RecLogin);
  $stmt->bind_param("s",$_POST["username"]);
  $stmt->execute();
  //取出帳密的值
  $stmt->bind_result($userName,$passwd,$level);
  $stmt->fetch();
  $stmt->close();
  //比對密碼，若登入成功則呈現登入狀態
  if(password_verify($_post["passwd"],$passwd)){
    //計算登入次數
    $query_RecLoginUpdata = "UPDATE `customers` SET `mlogin`= mlogin+1,`mlogintime`=now() WHERE `muserName`=?";
    $stmt = $link->
  }

}
session_start();
if (isset($_SESSION[""]))//檢查是否有資料
  
  $sUserName = $_SESSION["userName"];//有
else 
  $sUserName = "Guest";//沒有
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Lab - index</title>
</head>
<body>

<table width="300" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
  <tr>
    <td align="center" bgcolor="#CCCCCC"><font color="#FFFFFF">會員系統 - 首頁</font></td>
  </tr>
  <tr>
  
  <?php if ($sUserName == "Guest"): ?>
    <td align="center" valign="baseline"><a href="login.php">登入</a> <!--yes-->
  <?php else: ?>
    <td align="center" valign="baseline"><a href="login.php?logout=1">登出</a><!--no-->
  <?php endif; ?>
    
    | <a href="secret.php">會員專用頁</a></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#CCCCCC"><?php echo "Welcome! " . $sUserName ?> </td><!--登入成功後會出現使用者帳號-->
  </tr>
</table>


</body>
</html>