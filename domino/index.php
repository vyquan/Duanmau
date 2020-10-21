<?php include('header.php');
?>
<!--================ Hero banner start =================-->
<section class="hero-banner">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <section style="background:url(public/slide/parallax-bg.png); background-size: cover; width: 100%; height: 550px;">
          <div class="container">
            <div class="row">
              <div class="col-xl-5">
                <div class="offer__content text-center">
                  <h3>Sale Up To 50%</h3>
                  <h4>Từ 20/9 đến 30/9</h4>
                  <a class="button button--active mt-3 mt-xl-4" href="category.php">Mua Ngay</a>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <?php foreach (selectDb("SELECT * FROM slideshow WHERE status=0") as $tow) { ?>
        <div class="carousel-item">
          <div style="background:url(public/slide/<?= $tow['img'] ?>); background-size: cover; width: 100%; height: 550px;">
            <div class="container">
              <div class="row">
                <div class="col-xl-5">
                  <div class="offer__content text-center">
                    <h3><?= $tow['title'] ?></h3>
                    <h4><?= $tow['detail'] ?> </h4>
                    <a class="button button--active mt-3 mt-xl-4" href="<?= $tow['link'] ?>">Mua Ngay</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><?php
            }
              ?>
      <!-- 
          <div class="carousel-item">
            <section class="offer" id="parallax-1" data-anchor-target="#parallax-1" data-300-top="background-position: 20px 30px" data-top-bottom="background-position: 0 20px">
              <div class="container">
                <div class="row">
                  <div class="col-xl-5">
                    <div class="offer__content text-center">
                      <h3>Sale Up To 50%</h3>
                      <h4>Từ 20/9 đến 30/9</h4>
                      <p>Mua sắm thả ga không lo về giá</p>
                      <a class="button button--active mt-3 mt-xl-4" href="#">Mua Ngay</a>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div> -->
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</section>
<!--================ Hero banner start =================-->
<!-- ================ Best Selling item  carousel ================= -->
<section class="section-margin calc-20px">
  <div class="container">
    <div class="section-intro pb-60px">
      <!-- <p>Sale up to 50%</p> -->
      <h3>Sản phẩm<span class="section-intro__style"> Giảm giá</span></h3>
    </div>
    <div class="owl-carousel owl-theme" id="bestSellerCarousel">
      <?php
      foreach (selectDb("SELECT * FROM product ORDER BY sale DESC LIMIT 0,8") as $row) { ?>
        <div class="card text-center card-product">
          <div class="card-product__img">
            <img class="img-fluid img" src="public/images/<?= $row['images'] ?>" alt="">
          </div>
          <div class="card-body">
            <h6 class="card-product__title"><a href="single-product.php?id=<?php echo $row['id'] ?>"><?= $row['name'] ?></a></h6>
            <p class="card-product__price"><?= number_format($row['price'] - ($row['price'] * ($row['sale'] / 100))) . " đ" ?></p>
            <del><?= number_format($row['price']) ?>đ</del>   <span class="badge badge-pill badge-danger"> -<?= $row['sale'] ?>%</span>
            <p style="float: right;"><i class="fas fa-eye"> </i> <?= $row['view'] ?></p>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
  </div>
</section>

<!-- ================ Best Selling item  carousel end ================= -->
<!-- ================ trending product section start ================= -->
<section class="section-margin calc-60px">
  <div class="container">
    <div class="section-intro pb-60px">
      <!-- <p>Sản phẩm HOT 2020</p> -->
      <h3>Sản phẩm<span class="section-intro__style"> Bán chạy</span></h3>
    </div>
    <div class="row">
      <?php
      foreach (selectDb("SELECT * FROM product ORDER BY view DESC LIMIT 0,12") as $row) { ?>
        <div style="margin-bottom: 10px;" class="col-md-6 col-lg-3 col-xl-3 shw">
          <div class="card text-center card-product "><br>
            <div class="card-product__img">
              <img class="card-img img" src="public/images/<?= $row['images'] ?>" alt="">
            </div>
            <div class="card-body">
              <h6 class="card-product__title"><a href="single-product.php?id=<?php echo $row['id'] ?>"><?= $row['name'] ?></a></h6>
              <p class="card-product__price"><?= number_format($row['price'] - ($row['price'] * ($row['sale'] / 100))) . " đ" ?></p>
              <del><?= number_format($row['price']) ?>đ</del>  <span class="badge badge-pill badge-danger"> -<?= $row['sale'] ?>%</span>
              <p style="float: right;"><i class="fas fa-eye"> </i> <?= $row['view'] ?></p>
            </div>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
  </div>
</section>
<!-- ================ trending product section end ================= -->


<!-- ================ offer section start ================= -->
<!-- <section class="offer" id="parallax-1" data-anchor-target="#parallax-1" data-300-top="background-position: 20px 30px" data-top-bottom="background-position: 0 20px">
      <div class="container">
        <div class="row">
          <div class="col-xl-5">
            <div class="offer__content text-center">
              <h3>Sale Up To 50%</h3>
              <h4>Từ 20/9 đến 30/9</h4>
              <p>Mua sắm thả ga không lo về giá</p>
              <a class="button button--active mt-3 mt-xl-4" href="#">Mua Ngay</a>
            </div>
          </div>
        </div>
      </div>
    </section> -->
<!-- ================ offer section end ================= -->



<!-- ================ Blog section start ================= -->
<!-- <section class="blog">
      <div class="container">
        <div class="section-intro pb-60px">
          <p>Popular Item in the market</p>
          <h2>Latest <span class="section-intro__style">News</span></h2>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="card card-blog">
              <div class="card-blog__img">
                <img class="card-img rounded-0" src="img/blog/blog1.png" alt="">
              </div>
              <div class="card-body">
                <ul class="card-blog__info">
                  <li><a href="#">By Admin</a></li>
                  <li><a href="#"><i class="ti-comments-smiley"></i> 2 Comments</a></li>
                </ul>
                <h4 class="card-blog__title"><a href="single-blog.php">The Richland Center Shooping News and weekly shooper</a></h4>
                <p>Let one fifth i bring fly to divided face for bearing divide unto seed. Winged divided light Forth.</p>
                <a class="card-blog__link" href="#">Read More <i class="ti-arrow-right"></i></a>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="card card-blog">
              <div class="card-blog__img">
                <img class="card-img rounded-0" src="img/blog/blog2.png" alt="">
              </div>
              <div class="card-body">
                <ul class="card-blog__info">
                  <li><a href="#">By Admin</a></li>
                  <li><a href="#"><i class="ti-comments-smiley"></i> 2 Comments</a></li>
                </ul>
                <h4 class="card-blog__title"><a href="single-blog.php">The Shopping News also offers top-quality printing services</a></h4>
                <p>Let one fifth i bring fly to divided face for bearing divide unto seed. Winged divided light Forth.</p>
                <a class="card-blog__link" href="#">Read More <i class="ti-arrow-right"></i></a>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="card card-blog">
              <div class="card-blog__img">
                <img class="card-img rounded-0" src="img/blog/blog3.png" alt="">
              </div>
              <div class="card-body">
                <ul class="card-blog__info">
                  <li><a href="#">By Admin</a></li>
                  <li><a href="#"><i class="ti-comments-smiley"></i> 2 Comments</a></li>
                </ul>
                <h4 class="card-blog__title"><a href="single-blog.php">Professional design staff and efficient equipment you’ll find we offer</a></h4>
                <p>Let one fifth i bring fly to divided face for bearing divide unto seed. Winged divided light Forth.</p>
                <a class="card-blog__link" href="#">Read More <i class="ti-arrow-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->
<!-- ================ Blog section end ================= -->
<hr>
<section class="services spad ">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="services__item">
          <i class="fa fa-car"></i>
          <h6>Giao hàng COD toàn quốc</h6>
          <p>An toàn, nhận hàng mới phải trả tiền</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6 border-left">
        <div class="services__item">
          <i class="fa fa-cog"></i>
          <h6>Cam kết chính hãng 100%</h6>
          <p>Đền gấp 10 nếu phát hiện hàng giả</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6 border-left">
        <div class="services__item">
          <i class="fa fa-phone"></i>
          <h6>Đặt hàng nhanh</h6>
          <p>Liên hệ SĐT 1900.6429</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6 border-left">
        <div class="services__item">
          <i class="far fa-clock"></i>
          <h6>Làm việc 8h30 đến 20h30</h6>
          <p>Từ T2 đến CN, cả chi nhánh HN và HCM</p>
        </div>
      </div>
    </div>
  </div>
</section>
<hr>
<!-- ================ Subscribe section start ================= -->
<section class="subscribe-position">
  <div class="container">
    <div class="subscribe text-center">
      <h3 class="subscribe__title">ĐĂNG KÝ NHẬN KHUYẾN MÃI</h3>
      <p>Đăng ký để nhận được tin khuyến mãi trong thời gian sớm nhất</p>
      <div id="mc_embed_signup">
        <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe-form form-inline mt-5 pt-1">
          <div class="form-group ml-sm-auto">
            <input class="form-control mb-1" type="email" name="EMAIL" placeholder="Nhập địa chỉ email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nhập địa chỉ email'">
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



<!-- </main> -->
<?php include('footer.php') ?>