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

    // session_start();
    // $cart =&$_SESSION['cart'];
    // if(!is_object($cart)) $cart=new wfCart();
    // $cart->add_$item

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
        <button class="btn btn-danger my-cart-btn" name="addtocart" data-id="<?= $row["pID"]?>" data-name="<?= $row["pName"]?>" data-price="<?= $row["UnitPrice"]?>" data-quantity="1" data-image="<?= $row["picture"]?>">Add to Cart</button>
        <!-- <a href="#" class="btn btn-info">Details</a> -->
      </div>
    <?php } ?>
  </div>
</form>

   <!-- <script src="js/jquery-2.2.3.min.js"></script>
  <script type='text/javascript' src="js/bootstrap.min.js"></script>
  <script type='text/javascript' src="js/jquery.mycart.js"></script>
  <script type="text/javascript">
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
      cartItems: [ ],
      
      clickOnAddToCart: function($addTocart){
        goToCartIcon($addTocart);
      },
      afterAddOnCart: function(products, totalPrice, totalQuantity) {
        console.log("afterAddOnCart", products, totalPrice, totalQuantity);
      },
      clickOnCartIcon: function($cartIcon, products, totalPrice, totalQuantity) {
        console.log("cart icon clicked", $cartIcon, products, totalPrice, totalQuantity);
      },
      checkoutCart: function(products, totalPrice, totalQuantity) {
        var checkoutString = "Total Price: " + totalPrice + "\nTotal Quantity: " + totalQuantity;
        checkoutString =checkoutString+ "\n\n id \t name \t price \t quantity \t image path";
        let myObj = [];
        $.each(products, function(){
        //   $.each(myArray, function (i, value) {
            myObj.push({id: this.id, name: this.name, price: this.price, quantity: this.quantity, image: this.image});
        // });  
            
          // checkoutString += ("\n " + this.id + " \t " + this.name + " \t "  + this.price + " \t " + this.quantity + " \t " + this.image);
        });
        for($i=0;$i<)
        console.log(myObj[1]);
        $.ajax({
          type: 'POST',
          url: 'detail.php',
          data: {myObj},
          success: function(e){
            alert(e);
          },
          error: function(){
            alert('error');
          }
        
        }); 
        
        
        
          
          // console.log("checking out", products, totalPrice, totalQuantity);
        },
      
      // getDiscountPrice: function(products, totalPrice, totalQuantity) {
      //   console.log("calculating discount", products, totalPrice, totalQuantity);
      //   return totalPrice * 0.5;
      // }
    });

    
  });
  </script>  -->

</body>

</html>
