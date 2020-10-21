<?php
ob_start();
include('header.php'); ?>
<?php
if (isset($_POST['register'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = md5($_POST['pass']);
	$phone = $_POST['phone'];
	// $address = $_POST['address'];
	$permission = 1; //user
	$active = 1; //dang hoat dong
	$check_email = "SELECT * FROM user WHERE email = '$email'";
	$check_phone = "SELECT * FROM user WHERE phone = '$phone'";
	$cout_mail = $conn->prepare($check_email);
	$cout_mail->execute();
	$cout_phone = $conn->prepare($check_phone);
	$cout_phone->execute();
	if ($cout_mail->rowCount() > 0) {
		$error = "Email này đã có người sử dụng. Vui lòng chọn Email khác! ";
	} elseif ($cout_phone->rowCount() > 0) {
		$error = "Số điện thoại này đã có người sử dụng. Vui lòng chọn Số khác khác! ";
	} else {
		action("INSERT INTO user (name,email,password,phone,permission,active)
		 VALUES
		  ('$name','$email','$password','$phone','$permission','$active')");
		$success = "Đăng ký thành công - Xin mời đăng nhập";
		// header("Location:login.php");
	}
}
?>
<!--================ End Header Menu Area =================-->

<!--================Login Box Area =================-->
<section class="login_box_area section-margin">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="login_box_img">
					<div class="hover">
						<h4>Bạn đã có tài khoản?</h4>
						<p>Đăng nhập ngay để bình luận và nhận thông báo khuyễn mãi</p>
						<a class="button button-account" href="login.php">Đăng Nhập</a>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="login_form_inner register_form_inner">
					<h3>Tạo tài khoản</h3>
					<?php
					if (isset($error)) { ?>
						<p class="alert alert-danger"><?= $error ?></p>
					<?php
					}
					?>
					<?php
					if (isset($success)) { ?>
						<p class="alert alert-success"><?= $success ?></p>       
					<?php
					}
					?>
					<form method="POST" class="row login_form" action="#/" id="register_form" enctype="multipart/form-data">
						<div class="col-md-12 form-group">
							<input type="text" class="form-control" id="name" name="name" placeholder="Họ và tên" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Họ và tên'">
						</div>
						<div class="col-md-12 form-group">
							<input type="text" class="form-control" id="name" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
						</div>
						<!-- <div class="col-md-12 form-group">Avatar
								<input type="file" class="form-control" id="name" name="avatar" placeholder="Avatar" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Avatar'">
							</div> -->
						<div class="col-md-12 form-group">
							<input type="number" class="form-control" id="phone" name="phone" placeholder="Số điện thoại" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Số điện thoại'">
						</div>
						<!-- <div class="col-md-12 form-group">
							<input type="text" class="form-control" id="address " name="address " placeholder="address" onfocus="this.placeholder = ''" onblur="this.placeholder = ' Địa chỉ'">
						</div> -->
						<div class="col-md-12 form-group">
							<input type="password" class="form-control" id="password" name="pass" placeholder="Mật khẩu" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mật khẩu'">
						</div>
						<!-- <div class="col-md-12 form-group">
								<input type="text" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm Password'">
							</div> -->
						<!-- <div class="col-md-12 form-group">
								<div class="creat_account">
									<input type="checkbox" id="f-option2" name="selector">
									<label for="f-option2">Lưu đăng nhập</label>
								</div>
							</div> -->
						<div class="col-md-12 form-group">
							<button type="submit" name="register" value="submit" class="button button-register w-100">Đăng Ký</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Login Box Area =================-->



<!--================ Start footer Area  =================-->
<?php include('footer.php') ?>