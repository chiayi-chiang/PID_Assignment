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
    //header("location:member_admin.php");
  }
}
//執行會員登入
if(isset($_POST["username"]) && ($_POST["passwd"])){
  //連結登入會員資料
  $query_RecLogin = " SELECT `muserName`,`mpasswd`,`mlevel` FROM customers WHERE muserName=? ";
  $stmt = $link->prepare($query_RecLogin);//準備語法
  $stmt->bind_param("s",$_POST["username"]);//從sql進入的資料為字串屬性
  $stmt->execute();//可以擷取sql資料
  //取出帳密的值
  $stmt->bind_result($username,$passwd,$level);//獲取資料表特定內容
  $stmt->fetch();//獲取sql的結果
  $stmt->close();
  //比對密碼，若登入成功則呈現登入狀態
  if(password_verify($_POST["passwd"],$passwd)){
    //計算登入次數
    $query_RecLoginUpdata = "UPDATE `customers` SET `mlogin`= mlogin+1,`mlogintime`=now() WHERE `muserName`=?";
    $stmt = $link->prepare($query_RecLoginUpdata);
      $stmt->bind_param("s",$username);
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
      if($_SESSION["memberLevel"]=="member"){
        header("location:member_center.php");
      //否則導向管理中心
      }else{
        //header("location:member_admin.php");
      }
  }else{
    header("location:index.php?errMsg=1");//不成功則跳至index,並帶URL參數：「errMsg=1」,原頁顯示相關訊息
  }  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Bootstrap E-commerce Templates</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
  <!-- bootstrap -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">      
  <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">		
  <link href="themes/css/bootstrappage.css" rel="stylesheet"/>
  
  <!-- global styles -->
  <link href="themes/css/flexslider.css" rel="stylesheet"/>
  <link href="themes/css/main.css" rel="stylesheet"/>

  <!-- scripts -->
  <script src="themes/js/jquery-1.7.2.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>				
  <script src="themes/js/superfish.js"></script>	
  <script src="themes/js/jquery.scrolltotop.js"></script>
  <!--[if lt IE 9]>			
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="js/respond.min.js"></script>
  <![endif]-->
</head>
<body>
  <div class="span5">					
    <h4 class="title"><span class="text"><strong>Login</strong> Form</span></h4>
    <form id="form1" name="form1" method="post" action=" ">
      <input type="hidden" name="next" value="/">
      <fieldset>
        <div class="control-group">
          <label class="control-label">帳號</label>
          <div class="controls">
            <input type="text" placeholder="Enter your username" name="username" id="username"  class="logintexbox" value="<?php if(isset($_COOKIE["remUser"])&&
              ($_COOKIE["remUser"]!="")) echo $_COOKIE["remUser"]; ?>" required="required">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">密碼</label>
          <div class="controls">
            <input type="passwd" placeholder="Enter your passwd" name="passwd" id="passwd"  class="logintexbox" value="<?php if(isset($_COOKIE["remPass"])&&
              ($_COOKIE["remPass"]!="")) echo $_COOKIE["remPass"]; ?>" required="required">
            
          </div>
        </div>
        <div class="control-group">
          <input tabindex="3" class="btn btn-inverse large" name="btnOK" id="btnOK" type="submit" value="登入">
          <input tabindex="3" class="btn btn-inverse large" type="reset" name="btnReset" id="btnReset" value="重設" />
          <hr>
          <!-- <p class="reset">Recover your <a tabindex="4" href="#" title="Recover your username or password">username or password</a></p> -->
        </div>
      </fieldset>
    </form>				
  </div>
  <script src="themes/js/common.js"></script>
</body>
</html>
          