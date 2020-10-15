<?php include('header.php');
ob_start();
// include('function.php');
$data = 12;
if (isset($_GET['id']) && !isset($_GET['product'])) {
    $id = $_GET['id'];
    $product = 1;
} elseif (isset($_GET['id']) && isset($_GET['product'])) {
    $product = $_GET['product'];
    $id = $_GET['id'];
} else {
    header("Location:category.php");
}
$sql = "SELECT COUNT(*) FROM product WHERE id_cate = '$id'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$number = $stmt->fetchColumn();
$page = ceil($number / $data);
$tin = ($product - 1) * $data;
?>
	<!-- ================ start banner area ================= -->	
	<section class="blog-banner-area" id="category">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Sản Phẩm</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>
	<!-- ================ end banner area ================= -->
	<!-- ================ category section start ================= -->		  
  <section class="section-margin--small mb-5">
    <div class="container">
      <div class="row">
        <div class="col-xl-3 col-lg-4 col-md-5">
          <div class="sidebar-categories">
            <div class="head">Danh mục</div>
            <ul class="main-categories">
              <li class="common-filter">
                <form method="POST">
                <?php foreach (selectDb("SELECT * FROM category") as $row) { ?>
                  <ul>
                    <li class="filter-list"><a style="color: black;" href="product.php?id=<?= $row['id'] ?>"><input class="pixel-radio" type="radio" name="brand"><label for="men"><?= $row['name'] ?></a></label></li>                    
                  </ul>
                  <?php
                  } ?>
                </form>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-xl-9 col-lg-8 col-md-7">
          <!-- Start Filter Bar -->
          <div class="filter-bar d-flex flex-wrap align-items-center">
            <div class="sorting mr-auto">
              <select>
                <option value="1">Mới nhất</option>
                <option value="1">Giá: Tăng dần</option>
                <option value="1">Giá: Giảm dần</option>
              </select>
            </div>
            <!-- <div class="sorting ">
              <select>
                <option value="1">Show 12</option>
                <option value="1">Show 12</option>
                <option value="1">Show 12</option>
              </select>
            </div> -->
            <div>
              <div class="input-group filter-bar-search">
                <input type="text" placeholder="Tìm kiếm">
                <div class="input-group-append">
                  <button type="button"><i class="ti-search"></i></button>
                </div>
              </div>
            </div>
          </div>
          <!-- End Filter Bar -->
          <!-- Start Best Seller -->
          <section class="lattest-product-area pb-40 category-list">
            <div class="row">
              <?php foreach (selectDb("SELECT * FROM product WHERE id_cate= '$id' ORDER BY id DESC LIMIT $tin,$data") as $row) { ?>
              <div style="margin-bottom: 10px;" class="col-md-6 col-lg-3 shw">
                <div class="card text-center card-product "><br>
                  <div class="card-product__img">
                    <img class="card-img img" src="public/images/<?= $row['images'] ?>" alt="">
                  </div>
                  <div class="card-body">
                  <h6 class="card-product__title"><a href="single-product.php?id=<?php echo $row['id'] ?>"><?= $row['name'] ?></a></h6>
                  <p class="card-product__price"><?= number_format($row['price'] - ($row['price'] * ($row['sale'] / 100))) . " đ" ?></p>
                  <del><?= number_format($row['price']) ?>đ</del><span style="color: red;">  -<?= $row['sale'] ?>%</span>  
                  <p style="float: right;"><i class="fas fa-eye"> </i> <?= $row['view'] ?></p>            
                  </div>
                </div>
              </div>
              <?php
            }
              ?>              
            </div>
            <div class="row">
              <div class="col-md-6 col-lg-4"></div>
              <div class="col-md-6 col-lg-4">
              
                <nav aria-label="Page navigation example">
                  <ul class="pagination">
                    <li class="page-item">
                      <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                      </a>
                    </li>
                    <?php
                    for ($t = 1; $t <= $page; $t++) { ?>
                    <li class="page-item"><a class="page-link" href="category.php?product=<?= $t ?>"><?= $t ?></a></li>
                    <?php
                    }
                    ?>
                    <li class="page-item">
                      <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                      </a>
                    </li>
                  </ul>
                </nav>
                
              </div>
              <div class="col-md-6 col-lg-4"></div>
            </div>
          </section>
          <!-- End Best Seller -->
        </div>
      </div>
    </div>
  </section>
	<!-- ================ category section end ================= -->		  		

	<!-- ================ Subscribe section start ================= -->		  
  <section class="subscribe-position">
    <div class="container">
      <div class="subscribe text-center">
        <h3 class="subscribe__title">ĐĂNG KÝ NHẬN KHUYẾN MÃI</h3>
        <p>Đăng ký để nhận được tin khuyến mãi trong thời gian sớm nhất</p>
        <div id="mc_embed_signup">
          <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe-form form-inline mt-5 pt-1">
            <div class="form-group ml-sm-auto">
              <input class="form-control mb-1" type="email" name="EMAIL" placeholder="Enter your email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '" >
              <div class="info"></div>
            </div>
            <button class="button button-subscribe mr-auto mb-1" type="submit">Đăng Ký</button>
            <div style="position: absolute; left: -5000px;">
              <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
            </div>

          </form>
        </div>
        
      </div>
    </div>
  </section>
	<!-- ================ Subscribe section end ================= -->		  


  <!--================ Start footer Area  =================-->	
	  <!--================ Start footer Area  =================-->	
    <?php include('footer.php')?>