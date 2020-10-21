<!--================ Start footer Area  =================-->
<?php
foreach (selectDb("SELECT * FROM info LIMIT 1") as $row) { ?>
	<footer class="footer">
		<div class="footer-area">
			<div class="container">
				<div class="row section_gap">
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="single-footer-widget tp_widgets">
							<h4 class="footer_title large_title">Giới thiệu</h4>
							<p>
								<?= $row['intro'] ?>
							</p>
						</div>
					</div>
					<div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6">
						<div class="single-footer-widget tp_widgets">
							<h4 class="footer_title">Thông tin</h4>
							<ul class="list">
								<li><a href="#">Tuyển Dụng</a></li>
								<li><a href="#">Hệ thống cửa hàng</a></li>
								<li><a href="#">Liên hệ hợp tác</a></li>
								<li><a href="#"> Q&A</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-2 col-md-6 col-sm-6">
						<div class="single-footer-widget tp_widgets">
							<h4 class="footer_title">Nội dung chính sách</h4>
							<ul class="list">
								<li><a href="#">Chính sách bảo mật</a></li>
								<li><a href="#">Chính sách thành viên</a></li>
								<li><a href="#">Chính sách đổi trả hàng</a></li>
								<li><a href="#">Chính sách thanh toán</a></li>
								<li><a href="#">Chính sách dành cho khách hàng</a></li>
								<li><a href="#">Chính sách bảo hành sản phẩm</a></li>
							</ul>
						</div>
					</div>
					<div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6">
						<div class="single-footer-widget tp_widgets">
							<h4 class="footer_title">Liên hệ chúng tôi</h4>
							<div class="ml-40">
								<p class="sm-head">
									<span class="fa fa-location-arrow"></span>
									Địa chỉ:
								</p>
								<p><?= $row['address'] ?></p>

								<p class="sm-head">
									<span class="fa fa-phone"></span>
									Số điện thoại:
								</p>
								<p>
									<?= $row['phone'] ?>
								</p>

								<p class="sm-head">
									<span class="fa fa-envelope"></span>
									Email
								</p>
								<p>
									<?= $row['gmail'] ?>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
}
	?>
	<div class="footer-bottom">
		<div class="container">
			<div class="row d-flex">
				<p class="col-lg-12 footer-text text-center">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					Copyright &copy;<script>
						document.write(new Date().getFullYear());
					</script> <i class="fa fa-heart" aria-hidden="true"></i> <a href="https://www.facebook.com/profile.php?id=100007065284952" target="_blank">Vy Quan</a>. All Rights Reserved
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				</p>
			</div>
		</div>
	</div>
	</footer>
	<!--================ End footer Area  =================-->
	<script src="vendors/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>
	<script src="vendors/skrollr.min.js"></script>
	<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
	<script src="vendors/nice-select/jquery.nice-select.min.js"></script>
	<script src="vendors/jquery.ajaxchimp.min.js"></script>
	<script src="vendors/mail-script.js"></script>
	<script src="js/main.js"></script>
	</body>

	</html>