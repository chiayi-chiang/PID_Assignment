<?php
require ("connMysql.php");
// session_start();
// if(!isset($_SESSION["id"])){
// 	header("Location: login.php");
// }

$commandText = <<<SqlQuery
select g.goodID,g.mName,r.rName, g.UnitPrice,g.picture
    from restaurants r,good g
    where r.rID = g.rID 
    ORDER By g.goodID
SqlQuery;

$result = mysqli_query ( $link, $commandText );
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Bootstrap E-commerce Templates</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
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
		<!--頁頂超連結  -->
		<div id="top-bar" class="container">
			<div class="row">
				<div class="span4">
					<form method="POST" class="search_form">
						<input type="text" class="input-block-level search-query" Placeholder="eg. T-sirt">
					</form>
				</div>
				<div class="span8">
					<div class="account pull-right">
						<ul class="user-menu">				
							<li>My Account</li>
							<li><a href="cart.html">Your Cart</a></li>
							<?php if(isset($_SESSION["id"])){?>
								<li><a href="config.php?method=logout">登出</a></li>
							<?php }else{?>
								<li>登出</li>		
							<?php }?>			
							<li><a href="register.php">Login</a></li>		
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div id="wrapper" class="container">
			<section class="navbar main-menu">
				<div class="navbar-inner main-menu">
					<!-- 主logo超連結 -->
					<a href="products.php" class="logo pull-left"><img src="themes/images/logo.png" class="site_logo" alt=""></a>
					<nav id="menu" class="pull-right">
						<ul>
							<li><a href="./products.html">Woman</a></li>													
							<li><a href="./products.html">Man</a></li>			
							<li><a href="./products.html">Sport</a></li>							
							<li><a href="./products.html">Hangbag</a></li>
							<li><a href="./products.html">Best Seller</a></li>
							<li><a href="./products.html">Top Seller</a></li>
						</ul>
					</nav>
				</div>
			</section>	
			<section class="header_text sub">
			<img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" >
				<h4><span>New products</span></h4>
			</section>
			<section class="main-content">
				<div class="page-header">
							<h1>Products
							<div style="float: right; cursor: pointer;">
								<!-- 加入購物車圖示與按鈕。 -->
								<span class="glyphicon glyphicon-shopping-cart my-cart-icon">
									<span class="badge badge-notify my-cart-badge"></span>
								</span>
							</div>
							</h1>
						</div>
						<button type="addNewProduct" name="addNewProduct" id="addNewProduct">Add New Product</button> 

						<div class="row">
							<div class="col-md-3 text-center">
							<img src="images/img_1.png" width="150px" height="150px">
							<br>
							product 1 - <strong>$10</strong>
							<br>
							<button class="btn btn-danger my-cart-btn" data-id="1" data-name="product 1" data-summary="summary 1" data-price="10" data-quantity="1" data-image="images/img_1.png">Add to Cart</button>
							<a href="#" class="btn btn-info">Details</a>
							</div>

							<div class="col-md-3 text-center">
							<img src="images/img_2.png" width="150px" height="150px">
							<br>
							product 2 - <strong>$20</strong>
							<br>
							<button class="btn btn-danger my-cart-btn" data-id="2" data-name="product 2" data-summary="summary 2" data-price="20" data-quantity="1" data-image="images/img_2.png">Add to Cart</button>
							<a href="#" class="btn btn-info">Details</a>
							</div>

							<div class="col-md-3 text-center">
							<img src="images/img_3.png" width="150px" height="150px">
							<br>
							product 3 - <strong>$30</strong>
							<br>
							<button class="btn btn-danger my-cart-btn" data-id="3" data-name="product 3" data-summary="summary 3" data-price="30" data-quantity="1" data-image="images/img_3.png">Add to Cart</button>
							<a href="#" class="btn btn-info">Details</a>
							</div>

							<div class="col-md-3 text-center">
							<img src="images/img_4.png" width="150px" height="150px">
							<br>
							product 4 - <strong>$40</strong>
							<br>
							<button class="btn btn-danger my-cart-btn" data-id="4" data-name="product 4" data-summary="summary 4" data-price="40" data-quantity="1" data-image="images/img_4.png">Add to Cart</button>
							<a href="#" class="btn btn-info">Details</a>
							</div>

							<div class="col-md-3 text-center">
							<img src="images/img_5.png" width="150px" height="150px">
							<br>
							product 5 - <strong>$50</strong>
							<br>
							<button class="btn btn-danger my-cart-btn" data-id="5" data-name="product 5" data-summary="summary 5" data-price="50" data-quantity="1" data-image="images/img_5.png">Add to Cart</button>
							<a href="#" class="btn btn-info">Details</a>
							</div>

						</div>
				</div>
			</section>
			
		</div>
		<!-- 首先，先將Boostrap與jQuery載入後，再把jquery.mycart.js載入。 -->
		<script src="themes/js/common.js"></script>	
		<script src="js/jquery-2.2.3.min.js"></script>
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
			clickOnCartIcon: function($cartIcon, products, totalPrice, totalQuantity) {
			  console.log("cart icon clicked", $cartIcon, products, totalPrice, totalQuantity);
			},
			checkoutCart: function(products, totalPrice, totalQuantity) {
			  var checkoutString = "Total Price: " + totalPrice + "\nTotal Quantity: " + totalQuantity;
			  checkoutString += "\n\n id \t name \t summary \t price \t quantity \t image path";
			  $.each(products, function(){
				checkoutString += ("\n " + this.id + " \t " + this.name + " \t " + this.summary + " \t " + this.price + " \t " + this.quantity + " \t " + this.image);
			  });
			  alert(checkoutString)
			  console.log("checking out", products, totalPrice, totalQuantity);
			},
			getDiscountPrice: function(products, totalPrice, totalQuantity) {
			  console.log("calculating discount", products, totalPrice, totalQuantity);
			  return totalPrice * 0.5;
			}
		  });
	  
		  $("#addNewProduct").click(function(event) {
			var currentElementNo = $(".row").children().length + 1;
			$(".row").append('<div class="col-md-3 text-center"><img src="images/img_empty.png" width="150px" height="150px"><br>product ' + currentElementNo + ' - <strong>$' + currentElementNo + '</strong><br><button class="btn btn-danger my-cart-btn" data-id="' + currentElementNo + '" data-name="product ' + currentElementNo + '" data-summary="summary ' + currentElementNo + '" data-price="' + currentElementNo + '" data-quantity="1" data-image="images/img_empty.png">Add to Cart</button><a href="#" class="btn btn-info">Details</a></div>')
		  });
		});
		</script>
	  
	  </body>
	  
	  </html>
	  