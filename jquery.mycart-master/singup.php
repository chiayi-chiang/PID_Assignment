 <?php 
require("database.php");//呼叫sql

  
  //$sUserName(變數)<-["txtUserName"](帳號)，使用者寫入的帳號以陣列傳給sUN變數
if (isset($_POST["btnOK"]))//read 表單，去看$_POST裏頭有沒有一個較btnOK的
{
  $sUserNumber = $_POST["txtUserNumber"];//$sUserName(變數)<-["txtUserName"](帳號)，使用者寫入的帳號以陣列傳給sUN變數
  $sPasswd = $_POST["txtPassword"];
  $sUserName =$_POST["txtUserName"];
  $sUserPhone = $_POST["txtUserPhone"];
  $sql="SELECT * FROM `member`WHERE unumber	 = '$sUserNumber' ";//從輸入資料去找尋sql資料
  $row = mysqli_fetch_array(mysqli_query($con, $sql));
  if ($row!= "")//變數值不是空的時後
	{
    echo "<script type='text/javascript'> alert('已經辦過帳號囉');location.href='login.php';</script>";
    
  }else{
    $sql = "INSERT INTO `member`(`unumber`, `uPasswd`, `uName`,`uPhone`,`manager`,`canuse`) 
      VALUES ('$sUserNumber','$sPasswd','$sUserName','$sUserPhone','0','1')";
    mysqli_query($con, $sql);

    session_start();
    $_SESSION["txtUserName"] = $sUserName;
    echo "<script type='text/javascript'> alert('註冊成功');location.href='index.php';</script>";
  }
    

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="modle.css" rel="stylesheet"/>
    <script src="modle.js"></script>
    <style>
      body {
        background: #76b852;
        background: -webkit-linear-gradient(right, #76b852, #8DC26F);
        background: -moz-linear-gradient(right, #76b852, #8DC26F);
        background: -o-linear-gradient(right, #76b852, #8DC26F);
        background: linear-gradient(to left, #76b852, #8DC26F);
        font-family: "Roboto", sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
      }
      .form {
        position: relative;
        z-index: 1;
        background: #FFFFFF;
        max-width: 360px;
        margin: 0 auto 100px;
        padding: 45px;
        text-align: center;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
      }
      .form input {
        font-family: "Roboto", sans-serif;
        outline: 0;
        background: #f2f2f2;
        width: 100%;
        border: 0;
        margin: 0 0 15px;
        padding: 15px;
        box-sizing: border-box;
        font-size: 14px;
      }
      .form button {
        font-family: "Roboto", sans-serif;
        text-transform: uppercase;
        outline: 0;
        background: #4CAF50;
        width: 100%;
        border: 0;
        padding: 15px;
        color: #FFFFFF;
        font-size: 14px;
        -webkit-transition: all 0.3 ease;
        transition: all 0.3 ease;
        cursor: pointer;
      }
    </style>
</head>
<body>
    <div class="singup-page" >
    <div class="form">
      <form class="singup-form" id="form2" name="form2" method="post" action="singup.php">
        <tr>
            <td colspan="2" align="center" bgcolor="#CCCCCC"><font color="#00000">會員系統 - 註冊</font></td>
        </tr>
        <tr>
          <input type="text" name="txtUserNumber" id="txtUserNumber" required placeholder="UserNumber"/>
        </tr>
        <tr>
          <input type="password" name="txtPassword" id="txtPassword" required placeholder="password" />
        </tr>
        <tr>
          <input type="text" name="txtUserName" id="txtUserName" required placeholder="UserName" />
        </tr>
        <tr>
          <input type="text" name="txtUserPhone" id="txtUserPhone" required placeholder="Userphone" />
        </tr>
        <tr>
          <button type="submit" name="btnOK" id="btnOK"><a>註冊</a></button><!--按鈕為btnOK-->
          <button type="reset" name="btnReset" id="btnReset"><a>重設</a></button> 
          <a href="index.php">回首頁</a>
        </tr>
      </form>
    </div>
  </div>
</body>
</html>
