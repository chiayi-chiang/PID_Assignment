<?php 
    require("database.php");
    $sqlStatement ="
    select m.uID,`unumber`,`uPasswd`,`uName`,`uPhone`,`manager`,`canuse`,o.oID,`orderDate`,`stortDate`,p.pID,`pName`,p.UnitPrice,`picture`
    FROM `product` p,`order` o,`member` m,`details` d
    where m.uID = o.uID
    and o.oID = d.oID
    AND d.pID = p.pID";
    $result = mysqli_query($con, $sqlStatement);
  
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
    
    
    

?>
<html>

<head>
  <title>My Cart</title>
  <!-- 首先，先將Boostrap與jQuery載入後，再把jquery.mycart.js載入。 -->
  <link href="bootstrap.min.css" rel="stylesheet" />
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
  <script src="jquery.mycart.js"></script>    
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

  <div class="page-header">
        <h1><td align="center" bgcolor="#CCCCCC" ><?="Welcome!". $sUserName?> </td><!--登入成功後會出現使用者帳號-->
            <button>
                <?php if ($sUserName == "Guest"){?>
                <td align="center" valign="baseline"><a href="login.php">登入</a>｜<a href="singup.php">註冊</a></td><!--yes-->
                <?php }else{?>
                <td align="center" valign="baseline"><a href="index.php?logout=1">登出</a>|<a href="manager.php">管理員</a></td><!--no-->
                <?php }?>
            </button>
            <div style="float: right; cursor: pointer;">
        <span class="glyphicon glyphicon-shopping-cart my-cart-icon"><span class="badge badge-notify my-cart-badge"></span></span>
      </div>
      <div style="float: right; cursor: pointer;">
        <span class="glyphicon glyphicon-shopping-cart my-cart-icon"><span class="badge badge-notify my-cart-badge"></span></span>
      </div>
    </h1>
  </div> 
<div class="row">
    <div class="col-sm-6 col-md-3 text-center">
      <img src="https://www.jqueryscript.net/demo/Simple-Shopping-Cart-Plugin-With-jQuery-Bootstrap-mycart/images/img_1.png" width="150px" height="150px">
      <br>
      產品1 - <strong>$10</strong>
      <br>
      <button class="btn btn-danger my-cart-btn" data-id="1" data-name="product 1" data-summary="summary 1" data-price="10" data-quantity="1" data-image="https://www.jqueryscript.net/demo/Simple-Shopping-Cart-Plugin-With-jQuery-Bootstrap-mycart/images/img_1.png">加入購物車</button>
      <a href="#" class="btn btn-info">產品內容</a>
    </div>

    <div class="col-sm-6 col-md-3 text-center">
      <img src="https://www.jqueryscript.net/demo/Simple-Shopping-Cart-Plugin-With-jQuery-Bootstrap-mycart/images/img_2.png" width="150px" height="150px">
      <br>
      產品 2 - <strong>$20</strong>
      <br>
      <button class="btn btn-danger my-cart-btn" data-id="2" data-name="product 2" data-summary="summary 2" data-price="20" data-quantity="1" data-image="https://www.jqueryscript.net/demo/Simple-Shopping-Cart-Plugin-With-jQuery-Bootstrap-mycart/images/img_2.png">加入購物車</button>
      <a href="#" class="btn btn-info">產品內容</a>
    </div>

    <div class="col-sm-6 col-md-3 text-center">
      <img src="https://www.jqueryscript.net/demo/Simple-Shopping-Cart-Plugin-With-jQuery-Bootstrap-mycart/images/img_3.png" width="150px" height="150px">
      <br>
      產品 3 - <strong>$30</strong>
      <br>
      <button class="btn btn-danger my-cart-btn" data-id="3" data-name="product 3" data-summary="summary 3" data-price="30" data-quantity="1" data-image="https://www.jqueryscript.net/demo/Simple-Shopping-Cart-Plugin-With-jQuery-Bootstrap-mycart/images/img_3.png">加入購物車</button>
      <a href="#" class="btn btn-info">產品內容</a>
    </div>

    <div class="col-sm-6 col-md-3 text-center">
      <img src="https://www.jqueryscript.net/demo/Simple-Shopping-Cart-Plugin-With-jQuery-Bootstrap-mycart/images/img_4.png" width="150px" height="150px">
      <br>
      產品 4 - <strong>$40</strong>
      <br>
      <button class="btn btn-danger my-cart-btn" data-id="4" data-name="product 4" data-summary="summary 4" data-price="40" data-quantity="1" data-image="https://www.jqueryscript.net/demo/Simple-Shopping-Cart-Plugin-With-jQuery-Bootstrap-mycart/images/img_4.png">加入購物車</button>
      <a href="#" class="btn btn-info">產品內容</a>
    </div>
</div>


<!-- 
  <script src="js/jquery-2.2.3.min.js"></script>
  <script type='text/javascript' src="js/bootstrap.min.js"></script>
  <script type='text/javascript' src="js/jquery.mycart.js"></script>
  <script type="text/javascript"> -->
  $(function () {

    var goToCartIcon = function($addTocartBtn){
      var $cartIcon = $(".my-cart-icon");
      var $image = $('<img width="30px" height="30px" src="' + $addTocartBtn.data("image") + '"/>').css({"position": "fixed", "z-index": "999"});
      $addTocartBtn.prepend($image);
      var position = $cartIcon.position();
      $image.animate({
        top: position.top,
        left: position.left
      }, 500 , "linear", function() {
        $image.remove();
      });
    }

    $('.my-cart-btn').myCart({
      currencySymbol: '$',
      classCartIcon: 'my-cart-icon',
      classCartBadge: 'my-cart-badge',
      classProductQuantity: 'my-product-quantity',
      classProductRemove: 'my-product-remove',
      classCheckoutCart: 'my-cart-checkout',
      affixCartIcon: true,
      showCheckoutModal: true,
      numberOfDecimals: 2,
      cartItems: [
        {id: 1, name: 'product 1', summary: 'summary 1', price: 10, quantity: 1, image: 'images/img_1.png'},
        {id: 2, name: 'product 2', summary: 'summary 2', price: 20, quantity: 2, image: 'images/img_2.png'},
        {id: 3, name: 'product 3', summary: 'summary 3', price: 30, quantity: 1, image: 'images/img_3.png'}
      ],
      clickOnAddToCart: function($addTocart){
        goToCartIcon($addTocart);
      },

      afterAddOnCart: function(products, totalPrice, totalQuantity) {
        console.log("afterAddOnCart", products, totalPrice, totalQuantity);
      },

      //從購物車刪除一個產品
      clickOnCartIcon: function($cartIcon, products, totalPrice, totalQuantity) {
        console.log("cart icon clicked", $cartIcon, products, totalPrice, totalQuantity);
      },

      //出現確定你所購入詳細產品對話框
      checkoutCart: function(products, totalPrice, totalQuantity) {
        var checkoutString = "Total Price: " + totalPrice + "\nTotal Quantity: " + totalQuantity;
        checkoutString =checkoutString+ "\n\n id \t name \t summary \t price \t quantity \t image path";
        $.each(products, function(){
          checkoutString += ("\n " + this.id + " \t " + this.name + " \t " + this.summary + " \t " + this.price + " \t " + this.quantity + " \t " + this.image);
        });
        alert(checkoutString)
        console.log("checking out", products, totalPrice, totalQuantity);
      },
      
    //   //計算折扣
    //   getDiscountPrice: function(products, totalPrice, totalQuantity) {
    //     console.log("calculating discount", products, totalPrice, totalQuantity);
    //     return totalPrice * 0.5;
    //   }
    });

    $("#addNewProduct").click(function(event) {
      var currentElementNo = $(".row").children().length + 1;
      $(".row").append('<div class="col-md-3 text-center"><img src="images/img_empty.png" width="150px" height="150px"><br>product ' + currentElementNo + ' - <strong>$' + currentElementNo + '</strong><br><button class="btn btn-danger my-cart-btn" data-id="' + currentElementNo + '" data-name="product ' + currentElementNo + '" data-summary="summary ' + currentElementNo + '" data-price="' + currentElementNo + '" data-quantity="1" data-image="images/img_empty.png">Add to Cart</button><a href="#" class="btn btn-info">Details</a></div>')
    });
  });
  </script>

</body>

</html>
