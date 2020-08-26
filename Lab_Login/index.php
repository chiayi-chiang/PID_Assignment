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
  $stmt = $link->prepaare($query_RecLogin);//準備語法
  $stmt->bind_param("s",$_POST["username"]);//從sql進入的資料為字串屬性
  $stmt->execute();//可以擷取sql資料
  //取出帳密的值
  $stmt->bind_result($userName,$passwd,$level);//獲取資料表特定內容
  $stmt->fetch();//獲取sql的結果
  $stmt->close();
  //比對密碼，若登入成功則呈現登入狀態
  if(password_verify($_POST["passwd"],$passwd)){
    //計算登入次數
    $query_RecLoginUpdata = "UPDATE `customers` SET `mlogin`= mlogin+1,`mlogintime`=now() WHERE `muserName`=?";
    $stmt = $link->prepare($query_RecLoginUpdata);
      $stmt->bind_param("s",$userName);
      $stmt->execute();
      $stmt->close();
      //設定登入者的名稱等級
      $_SESSION["loginMember"]=$username;
      $_SESSION["memberLevel"]=$level;
      //使用cookie紀錄登入資料
      if(isset($_POST["rememberme"]) && ($_POST["rememberme"]=="ture")){
        setcookie("remUser",$_POST["username"],time()+365*24*60);//永久記住
        setcookie("remPass",$_POST["passwd"],time()+365*24*60);//永久記住
      }else{
        if(isset($_COOKIE["remUser"])){
          setcookie("remUser",$_POST["username"],time()-100);//永久記住
          setcookie("remPass",$_POST["passwd"],time()-100);//永久記住
        }
      }
      //若帳號等級為member則導向會員中心
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