<?php
ob_start();
include("header.php");
require_once "database.php";
if (isset($_GET['id'])) {
	$id = $_GET['id'];
}
$view = 1;
if (isset($_GET['id'])){
	foreach (selectDb("SELECT * FROM product WHERE id = '$id'") as $row) {
		$id_pro  = $row['id'];
		$view += $row['view'];
		action("UPDATE product SET view='$view' WHERE id = '$id'");
	}
} 
if (isset($_GET['id_comment'])) {
	$id_cmt = $_GET['id_comment'];
	action("DELETE FROM Comment WHERE id = '$id_cmt'");
	header("Location:category.php");
}
if (isset($_SESSION['user']) && isset($_POST['comment'])){
	$date = date("Y/m/d");
	$content = $_POST['commentPro'];
	$user = $_SESSION['user'];
	foreach (selectDb("SELECT * FROM user WHERE email = '$user'") as $row) {
		$id_user = $row['id'];
	}
	$sql = "INSERT INTO Comment (id,content,id_user,id_product,date_add) VALUES (null,'$content','$id_user','$id','$date')";
	// echo $sql;
	action($sql);
}
if (isset($_SESSION['admin']) && isset($_POST['comment'])){
	$date = date("Y/m/d");
	$content = $_POST['commentPro'];
	$user = $_SESSION['admin'];
	foreach (selectDb("SELECT * FROM user WHERE email = '$user'") as $row) {
		$id_user = $row['id'];
	}
	$sql = "INSERT INTO Comment (id,content,id_user,id_product,date_add) VALUES (null,'$content','$id_user','$id','$date')";
	// echo $sql;
	action($sql);
}
elseif (!isset($_SESSION['user']) && isset($_POST['comment'])) {
	$error = "Vui lòng đăng nhập trước khi bình luận!";
	// echo "<script>alert('Vui lòng đăng nhập trước khi bình luận!')</script>";
}
?>
<!--================ End Header Menu Area =================-->

<!-- ================ start banner area ================= -->
<section class="blog-banner-area" id="blog">
	<div class="container h-100">
		<div class="blog-banner">
			<div class="text-center">
				<h1>Shop Single</h1>
				<nav aria-label="breadcrumb" class="banner-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Shop Single</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</section>
<!-- ================ end banner area ================= -->


<!--================Single Product Area =================-->
<?php
$id = $_GET['id'];
$sql = $conn->query("SELECT * FROM product WHERE id = '$id'");
$arr_product = $sql->fetch();
?>
<div class="product_image_area">
	<div class="container">
		<div class="row s_product_inner">
			<div class="col-lg-6 border">
				<div class="owl-carousel owl-theme s_Product_carousel ">
					<div class="single-prd-item">
						<img class="img-fluid  img" src="public/images/<?php echo $arr_product['images'] ?>" alt="">
					</div>
					<!-- <div class="single-prd-item">
							<img class="img-fluid" src="img/category/s-p1.jpg" alt="">
						</div>
						<div class="single-prd-item">
							<img class="img-fluid" src="img/category/s-p1.jpg" alt="">
						</div> -->
				</div>
			</div>
			<div class="col-lg-5 offset-lg-1">
				<div class="s_product_text">
					<h3><?php echo $arr_product['name'] ?></h3>
					<h2><?= number_format($arr_product['price'] - ($arr_product['price'] * ($arr_product['sale'] / 100))) . " đ" ?></h2>
					<p>Giảm giá: <span style="color: red;"> -<?= $arr_product['sale'] ?>%</span><br>Giá thị trường: <?= number_format($arr_product['price']) ?>đ</p>
					<ul class="list">
						<li><a class="active" href="#"><span>Hãng</span> : <?php echo $arr_product['hang_sx'] ?></a></li>
						<li><a class="active" href="#"><span>Tình trạng</span> :<?= $tt = $arr_product['total'] != 0 ? " Còn hàng" : " Hết hàng" ?></a></li>
						<!-- <li><a href="#"><span>Màu sắc</span> : Đen</a></li> -->
					</ul>
					<p><?php echo $arr_product['intro'] ?></p>
					<div class="product_count">
						<label for="qty">Số lượng: </label>
						<button style="bottom: 13px; right: 252px;" onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="reduced items-count" type="button"><i class="fas fa-plus"></i></button>
						<input style="margin-left: 5px;" type="text" name="qty" id="sst" size="2" maxlength="12" value="1" title="Quantity:" class="input-text qty">
						<button style="bottom: 13px; left: 60px;" onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;" class="increase items-count" type="button"><i class="fas fa-minus"></i></button>
						<a style="margin-left: 80px;" class="button primary-btn" href="#">Thêm vào giỏ</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
	<div class="container">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Mô tả</a>
			</li>
			<!-- <li class="nav-item">
					<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
					 aria-selected="false">Thông số</a>
				</li> -->
			<li class="nav-item">
				<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Bình luận</a>
			</li>
			<!-- <li class="nav-item">
					<a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
					 aria-selected="false">Reviews</a>
				</li> -->
		</ul>
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
				<p><?php echo $arr_product['detail'] ?></p>
			</div>
			<!-- <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					<div class="table-responsive">
						<table class="table">
							<tbody>
								<tr>
									<td>
										<h5>Width</h5>
									</td>
									<td>
										<h5>128mm</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Height</h5>
									</td>
									<td>
										<h5>508mm</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Depth</h5>
									</td>
									<td>
										<h5>85mm</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Weight</h5>
									</td>
									<td>
										<h5>52gm</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Quality checking</h5>
									</td>
									<td>
										<h5>yes</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Freshness Duration</h5>
									</td>
									<td>
										<h5>03days</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>When packeting</h5>
									</td>
									<td>
										<h5>Without touch of hand</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Each Box contains</h5>
									</td>
									<td>
										<h5>60pcs</h5>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div> -->
			<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
				<div class="row">
					<div class="col-lg-6">
						<h4>Tất cả bình luận</h4><br>
						<div class="comment_list">
							<?php
							foreach (selectDb("SELECT * FROM Comment WHERE id_product = '$id' ORDER BY id DESC") as $row) {
								$id_user = $row['id_user'];
								foreach (selectDb("SELECT * FROM user WHERE id= '$id_user'") as $tow) { ?>
									<div class="review_item border-bottom">
										<div class="media">
											<!-- <div class="d-flex">
											<img src="img/product/review-1.png" alt="">
										</div> -->
											<div class="media-body">
												<h4><?= $tow['name'] ?></h4>
												<h5><?= $row['date_add'] ?></h5>
												<?php
												if (isset($_SESSION['user'])) {
													if ($tow['email'] == $_SESSION['user']) { ?>
														<a class="reply_btn" href="single-product.php?id_comment=<?= $row['id'] ?>">Xóa</a>
													<?php
													}
												} else if (isset($_SESSION['admin']))
													if ($tow['email'] == $_SESSION['admin']) { ?>
													<a class="reply_btn" href="single-product.php?id_comment=<?= $row['id'] ?>" onclick="load_trang()">Xóa</a>
												<?php
													}
												?>
											</div>
										</div>
										<p style="color: black;"><?= $row['content'] ?></p>
									</div>
							<?php
								}
							}
							?>
							<!-- <div class="review_item reply">
									<div class="media">
										<div class="d-flex">
											<img src="img/product/review-2.png" alt="">
										</div>
										<div class="media-body">
											<h4>Admin</h4>
											<h5>12th Feb, 2020 at 05:56 pm</h5>
											<a class="reply_btn" href="#">Trả lời</a>
										</div>
									</div>
									<p>Cảm ơn quý khách!</p>
								</div> -->
							<!-- <div class="review_item">
									<div class="media">
										<div class="d-flex">
											<img src="img/product/review-3.png" alt="">
										</div>
										<div class="media-body">
											<h4>FEF</h4>
											<h5>12th Feb, 2020 at 05:56 pm</h5>
											<a class="reply_btn" href="#">Trả lời</a>
										</div>
									</div>
									<p>Hàng chính hãng, giao hàng nhanh, shop tư vấn nhiệt tình.</p>
								</div> -->
						</div>
					</div>
					<div class="col-lg-6">
						<div class="review_box">
							<h4>Bình luận</h4>
							<?php
							if (isset($error)) { ?>
								<p class="alert alert-danger"><?= $error ?></p>
								<!-- <a href="login.php">Click vào đây đề đăng nhập</a> -->
							<?php
							}
							?>
							<form method="POST" class="row contact_form" action="" method="post" id="contactForm" novalidate="novalidate">
								<div class="col-md-12">
									<div class="form-group">
										<textarea style="height: 100px;" class="form-control" name="commentPro" id="message" rows="1" placeholder="Nhập bình luận"></textarea>
									</div>
								</div>
								<div class="col-md-12 text-right">
									<button type="submit" name='comment' value="submit" class="btn primary-btn">Gửi</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<?php
			// if (isset($_GET['id'])) {
			// 	// $id = $_GET['id'];
			// 	// $content = $_POST['commentPro'];
			// 	// $user = $_SESSION['user'];
			// 	// $id_user = $user['id'];
			// 	try {
			// 		// $sql_comment = $conn->prepare("INSERT INTO comment VALUES ('','$commentPro','$id','$id_user','')");
			// 		// $sql_comment->execute();
			// 		// header("Location: single-product.php");
			// 	} catch (PDOException $e) {
			// 		echo "Loi truy vấn CSDL: " . $e->getMessage();
			// 	}
			// }
			?>

		</div>
	</div>
</section>
<!--================End Product Description Area =================-->
<!--================ Start related Product area =================-->
<?php
$id = $_GET['id'];
$sql = $conn->query("SELECT * FROM product WHERE id = $id");
$row = $sql->fetch();
$id_cate = $row['id_cate'];
?>
<section class="related-product-area section-margin--small mt-0">
	<div class="container">
		<div class="section-intro pb-60px">
			<p></p>
			<h2>Sản phẩm <span class="section-intro__style">Liên quan</span></h2>
		</div>
		<div class="row mt-30">
			<?php foreach (selectDb("SELECT * FROM product WHERE id_cate = '$id_cate' ORDER BY RAND() LIMIT 8") as $row) { ?>
				<div class="col-sm-12 col-xl-3 mb-4 mb-xl-0">
					<div class="single-search-product-wrapper">
						<div class="single-search-product d-flex">
							<a href="single.php?id=<?= $row['id'] ?>&cate=<?= $row['id_cate'] ?>"><img src="public/images/<?= $row['images'] ?>" alt=""></a>
							<div class="desc">
								<a href="#" class="title"><?= $row['name'] ?></a>
								<span class="badge badge-pill badge-danger"> -<?= $row['sale'] ?>%</span>
								<div class="price"><?= number_format($row['price'] - ($row['price'] * ($row['sale'] / 100))) . " đ"?></div>
							</div>
						</div>
					</div>
				</div>
			<?php
			}
			?>

		</div>
	</div>
</section>
<!--================ end related Product area =================-->
<script>
	function load_trang() {
		location.reload();
	}
</script>
<!--================ Start footer Area  =================-->
<?php include('footer.php') ?>