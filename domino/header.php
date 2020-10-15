<?php 
session_start();
include("function.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Domino Shop - Home</title>
	<link rel="icon" href="img/Fevicon.png" type="image/png">
  <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="vendors/nice-select/nice-select.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<style>
  .shw:hover{
    -moz-box-shadow: 0 0 10px rgb(165, 165, 165);
    -webkit-box-shadow: 0 0 10px rgb(165, 165, 165);
    box-shadow: 0 0 10px rgb(165, 165, 165);
  }
  .img{
	-webkit-transform: scale(1);
	transform: scale(1);
	-webkit-transition: .2s ease-in-out;
	transition: .2s ease-in-out;
  }
  .img:hover{
    -webkit-transform: scale(1.07);
    transform: scale(1.07);
  }
</style>
<body>
  <!--================ Start Header Menu Area =================-->
	<header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <?php
          foreach (selectDb("SELECT * FROM info") as $item) { ?>	
          <a class="navbar-brand logo_h" href="index.php"><img  src="./public/logo_icon/<?=$item['logo'] ?>" alt=""></a>
          <?php
          }
          ?>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
              <li class="nav-item "><a class="nav-link" href="index.php">TRANG CHỦ</a></li>
              <li class="nav-item submenu dropdown">
                <a href="category.php" class="nav-link">SẢN PHẨM</a>
                <!-- <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="category.php">Shop Category</a></li>
                  <li class="nav-item"><a class="nav-link" href="single-product.php">Product Details</a></li>
                  <li class="nav-item"><a class="nav-link" href="checkout.php">Product Checkout</a></li>
                  <li class="nav-item"><a class="nav-link" href="confirmation.php">Confirmation</a></li>
                  <li class="nav-item"><a class="nav-link" href="cart.php">Shopping Cart</a></li>
                </ul> -->
							</li>
              <!-- <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">Blog</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="blog.php">Blog</a></li>
                  <li class="nav-item"><a class="nav-link" href="single-blog.php">Blog Details</a></li>
                </ul>
							</li> -->
							<!-- <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">Pages</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                  <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                  <li class="nav-item"><a class="nav-link" href="tracking-order.php">Tracking</a></li>
                </ul>
              </li> -->
              <li class="nav-item"><a class="nav-link" href="contact.php">LIÊN HỆ</a></li>
              <li class="nav-item submenu dropdown">
                <?php
						    if (isset($_SESSION['admin'])) { ?>
                <a href="#" class="nav-link"><i class="fas fa-user-cog"></i><?= $_SESSION['admin']?></a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="admin/danh_muc.php">Quản trị</a></li>
                  <li class="nav-item"><a class="nav-link" href="logout.php" onclick="return alert('Bạn chắc chắn muốn đăng xuất chứ ?')">Đăng Xuất</a></li>
                </ul>
                <?php
						    } elseif (isset($_SESSION['user'])) { ?>
                <a href="#" class="nav-link"><i class="fas fa-user"></i> <?= $_SESSION['user'] ?></a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="logout.php" onclick="return alert('Bạn chắc chắn muốn đăng xuất chứ ?')">Đăng Xuất</a></li>
                  <!-- <li class="nav-item"><a class="nav-link" href="single-product.php">Product Details</a></li> -->
                </ul>
                <?php
                } else{?>
                <a href="login.php" class="nav-link">ĐĂNG NHẬP</a>
                <?php
                }
                ?>
							</li>
              
              <li style="margin-top: 20px;" class="nav-item">
              <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tìm kiếm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="search.php" method="POST">
                          <input style="width: 400px; height: 37px;" type="text" name="name" placeholder="Tìm sản phẩm - thương hiệu" required>
                          <button style="float: right;" class="btn" type="submit" name="search"><i class="fas fa-search"></i></button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
            <ul class="nav-shop">
              <li class="nav-item " type="button" data-toggle="modal" data-target="#exampleModal"><button><a class="ti-search"></a></button>
            </li>
              <li class="nav-item"><button><a style="color: black;" class="ti-shopping-cart" href="cart.php"></a><span class="nav-shop__circle">3</span></button> </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>