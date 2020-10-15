<?php session_start();
if (!isset($_SESSION['admin'])) {
	header("Location:../index.php");
}
include('../function.php');
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Danh mục | Domino Admin</title><link rel="icon" href="../img/Fevicon.png" type="image/png">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/educate-custon-icon.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Start Left menu area -->
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div style="margin-top: 20px;" class="sidebar-header">
                <?php
                foreach (selectDb("SELECT * FROM info") as $item) { ?>
                <a href="../index.php"><img class="main-logo" src="../public/logo_icon/<?=$item['logo'] ?>" alt="" /></a>
                <?php
                }
                ?>
                <strong><a href="../index.php"><img style="width: 40px;" src="../img/Fevicon.png" alt="" /></a></strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li>
                            <a class="active" href="danh_muc.php" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">Danh Mục</span></a>
                        </li>
                        <li>
                            <a class="has-arrow" href="danhsach_sanpham.php" aria-expanded="false"><span class="educate-icon educate-form icon-wrap"></span><span class="mini-click-non">Sản Phẩm</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Thêm Sản Phẩm" href="them_sanpham.php"><span class="mini-sub-pro">Thêm Sản Phẩm</span></a></li>
                                <li><a title="Danh Sách Sản Phẩm" href="danhsach_sanpham.php"><span class="mini-sub-pro">Danh Sách Sản Phẩm</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="binh_luan.php" aria-expanded="false"><span class="educate-icon educate-message icon-wrap"></span> <span class="mini-click-non">Bình Luận</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Danh Sách Bình Luận" href="binh_luan.php"><span class="mini-sub-pro">Danh Sách Bình Luận</span></a></li>
                            </ul>
                          </li>
                        <li>
                            <a class="has-arrow" href="slide.php" aria-expanded="false"><span class="educate-icon educate-apps icon-wrap"></span> <span class="mini-click-non">Slide</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Thêm Slide" href="them_slide.php"><span class="mini-sub-pro">Thêm Slide</span></a></li>
                                <li><a title="Danh Sách Slide" href="slide.php"><span class="mini-sub-pro">Danh Sách Slide</span></a></li>                               
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="danhsach_user.php" aria-expanded="false"><span class="educate-icon educate-professor icon-wrap"></span> <span class="mini-click-non">User</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Thêm User" href="../register.php"><span class="mini-sub-pro">Thêm User</span></a></li>
                                <li><a title="Danh Sách User" href="danhsach_user.php"><span class="mini-sub-pro">Danh Sách User</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="setting.php" aria-expanded="false"><span class="fa fa-gears"></span> <span class="mini-click-non">Setting</span></a>
                        </li>
                        <li id="removable">
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="educate-icon educate-pages icon-wrap"></span> <span class="mini-click-non">Pages</span></a>
                            <ul class="submenu-angle page-mini-nb-dp" aria-expanded="false">
                                <!-- <li><a title="Đăng Nhập" href="../login.php"><span class="mini-sub-pro">Đăng nhập</span></a></li> -->
                                <li><a title="Đăng Ký" href="../logout.php"><span class="mini-sub-pro">Đăng xuất</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="../index.php"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
													<i class="educate-icon educate-nav"></i>
												</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">
                                            <ul class="nav navbar-nav mai-top-nav">
                                                <li class="nav-item"><a href="../index.php" class="nav-link">TRANG CHỦ</a>
                                                </li>
                                                <li class="nav-item"><a href="../category.php" class="nav-link">SẢN PHẨM</a>
                                                </li>
                                                <li class="nav-item"><a href="../contact.php" class="nav-link">LIÊN HỆ</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <!-- <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                    <?php
                                                    foreach (selectDb("SELECT * FROM user WHERE permission = 0") as $item) { ?>
                                                    <tr>
                                                        <span class="admin-name">Xin chào: <?= $item['name'] ?></span><i class="fa fa-angle-down edu-icon edu-down-arrow"></i> </a>
                                                        <?php
                                                        }
                                                        ?>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <li><a href="../logout.php"><span class="edu-icon edu-locked author-log-ic"></span>Đăng xuất</a>
                                                        </li> -->
                                                    </ul>
                                                </li>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>