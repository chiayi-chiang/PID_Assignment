<?php 
    require("database.php");
    $sqlproduct ="
    select *
    FROM product";
    $product = mysqli_query($con, $sqlproduct);
  
    session_start();
    if (isset($_SESSION["txtUserName"])){//檢查是否有資料
      $sUserName = $_SESSION["txtUserName"];//有
    }else {
      $sUserName = "Guest";//沒有
    }

    session_start();
    if (isset($_GET["logout"]))//read ? back things(index 28)
    {
      $_SESSION["txtUserName"] = $sUserName;
      unset($_SESSION["txtUserName"]);
      //setcookie("userName ", "Guest", time() - 3600);//clien cookie,-60*60*24*7 after 7 days ago can't eat
      echo "<script type='text/javascript'>alert('登出成功');location.href='index.php';</script>";//go back to homepage
      exit();
    }
    if(isset($_POST["addtocart"])){
      
  
    }


?>
    
    


<html>

<head>
  <title>My Cart</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <style>
  .badge-notify{
    background:red;
    position:relative;
    top: -20px;
    right: 10px;
  }
  .my-cart-icon-affix {
    position: fixed;
    z-index: 999;
  }
  </style>
</head>

<body class="container">
<form class="singup-form" id="form2" name="form2" method="post" >
  <div class="page-header">
    <h1><td align="center" bgcolor="#CCCCCC" ><?="Welcome!". $sUserName?> </td><!--登入成功後會出現使用者帳號-->
      <button>
        <?php if ($sUserName == "Guest"){?>
          <td align="center" valign="baseline"><a href="login.php">登入</a>｜<a href="singup.php">註冊</a></td><!--yes-->
        <?php }else{?>
          <td align="center" valign="baseline"><a href="index.php?logout=1">登出</a>|<a href="decidemana.php">管理員</a></td><!--no-->
        <?php }?>
      </button>
      
      <div style="float: right; cursor: pointer;">
        <span class="glyphicon glyphicon-shopping-cart my-cart-icon"><span class="badge badge-notify my-cart-badge"></span></span>
      </div>
    </h1>
  </div>

  <div class="row">
    <?php while ( $row = mysqli_fetch_assoc($product) ) { ?>
      <div class="col-md-3 text-center">
        <img src="images/<?= $row["picture"]?>" width="150px" height="150px">
        <br>
        <?= $row["pName"]?> - <strong><?= $row["UnitPrice"]?></strong>
        <br>
        <a href="./productedit.php?id=<?= $row["pID"] ?>" class="btn btn-danger my-cart-btn">detail</a>
        <!-- <a href="#" class="btn btn-info">Details</a> -->
      </div>
    <?php } ?>
  </div>
</form>
</body>

</html>
