<?php include('header.php');
?>
<!--================ End Header Menu Area =================-->


<!-- ================ start banner area ================= -->
<section class="blog-banner-area" id="contact">
  <div class="container h-100">
    <div class="blog-banner">
      <div class="text-center">
        <h1>Liên Hệ</h1>
        <nav aria-label="breadcrumb" class="banner-breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Liên Hệ</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</section>
<!-- ================ end banner area ================= -->

<!-- ================ contact section start ================= -->
<?php
foreach (selectDb("SELECT * FROM info LIMIT 1") as $row) { ?>
  <section class="section-margin--small">
    <div class="container">
      <center><?= $row['map'] ?></center>

      <div style="margin-top: 50px;" class="row">
        <div class="col-md-4 col-lg-3 mb-4 mb-md-0">
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-home"></i></span>
            <div class="media-body">
              <h3><?= $row['address'] ?></h3>
            </div>
          </div><br>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-headphone"></i></span>
            <div class="media-body">
              <h3><a href="#"><?= $row['phone'] ?></a></h3>
              <p>T2 - T6, 9h00 đến 18h00</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-email"></i></span>
            <div class="media-body">
              <h3><a href="mailto:support@colorlib.com"><?= $row['gmail'] ?></a></h3>
              <p>Gửi cho chúng tôi thắc mắc của bạn bất cứ lúc nào!</p>
            </div>
          </div>
        </div>
        <div class="col-md-8 col-lg-9">
          <form action="#/" class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
            <div class="row">
              <div class="col-lg-5">
                <div class="form-group">
                  <input class="form-control" name="name" id="name" type="text" placeholder="Nhập họ tên">
                </div>
                <div class="form-group">
                  <input class="form-control" name="email" id="email" type="email" placeholder="Nhập email">
                </div>
                <div class="form-group">
                  <input class="form-control" name="subject" id="subject" type="text" placeholder="Nhập vấn đề">
                </div>
              </div>
              <div class="col-lg-7">
                <div class="form-group">
                  <textarea class="form-control different-control w-100" name="message" id="message" cols="30" rows="5" placeholder="Nhập tin nhắn"></textarea>
                </div>
              </div>
            </div>
            <div class="form-group text-center text-md-right mt-3">
              <button type="submit" class="button button--active button-contactForm">Gửi</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- ================ contact section end ================= -->
<?php
}
?>


<!--================ Start footer Area  =================-->
<!--================ Start footer Area  =================-->
<?php include('footer.php') ?>