<?php ob_start();
include('header.php');
// include_once('function.php');
if (isset($_SESSION['user']) || isset($_SESSION['admin'])) {
	header("Location:index.php");
}

if (isset($_POST['login'])) {
	$email = $_POST['mail'];
	$password = md5($_POST['pass']);
	$check = "SELECT * FROM user WHERE email = '$email' AND password = '$password' AND active = :active AND permission=:permission";
	$count = $conn->prepare($check);
	$count->execute(array(
		'permission' => 1,
		'active' => 1
	));
	$check_admin = "SELECT * FROM user WHERE email = '$email' AND password = '$password' AND permission= :permission AND active = :active ";
	$cout_admin = $conn->prepare($check_admin);
	$cout_admin->execute(array(
		':permission' => 0,
		':active' => 1
	));
	if ($cout_admin->rowCount() > 0) {
		$_SESSION['admin'] = $email;
		header("Location:index.php");
	} elseif ($count->rowCount() > 0) {
		$_SESSION['user'] = $email;
		header("location:index.php");
	} else {
		$error = "Email hoặc mật khẩu chưa đúng hoặc tài khoản của bạn đã bị khóa!";
	}
}
?>
  <!-- ================ start banner area ================= -->	
	<!-- <section class="blog-banner-area" id="category">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Đăng nhập</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Trang Chủ</a></li>
              <li class="breadcrumb-item active" aria-current="page">Đăng nhập</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section> -->
	<!-- ================ end banner area ================= -->
  
  <!--================Login Box Area =================-->
	<section class="login_box_area section-margin">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<div class="hover">
							<h4>Bạn chưa có tài khoản?</h4>
							<p>Đăng ký tài khoản để nhận bình luận và thông báo khuyễn mãi</p>
							<a class="button button-account" href="register.php">Đăng Ký</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Đăng nhập tài khoản</h3>
						<?php if (isset($error)) { ?>
						<p class="alert alert-danger"><?= $error ?></p>
						<?php
						} else {
							echo "<p>Nếu bạn đã có tài khoản vui lòng đăng nhập bên dưới</p><br>";
						} ?>
						<form class="row login_form" action="" id="contactForm" method="POST">
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="mail" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="name" name="pass" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
							</div>
							<div class="col-md-12 form-group">
								<!-- <div class="creat_account">
									<input type="checkbox" id="f-option2" name="selector remember">
									<label for="f-option2">Lưu đăng nhập</label>
								</div> -->
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" name="login" value="submit" class="button button-login w-100">ĐĂNG NHẬP</button>
								<a href="#">Quên mật khẩu?</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->
	<?php include('footer.php') ?>
