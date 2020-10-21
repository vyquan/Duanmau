<?php include('header.php') ?>
<?php
if (isset($_GET['email'])) {
  $email = $_GET['email'];
  if (isset($_POST['updatePass'])) {
    $pass = md5($_POST['pass']);
    $passnew = md5($_POST['passnew']);
    $passconfirm = md5($_POST['passconfirm']);
    if ($passnew != $passconfirm) {
      $error = "Nhập lại mật khẩu chưa chính xác!";
    } else {
      $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$pass'";
      $check = $conn->prepare($sql);
      $check->execute();
      if ($check->rowCount() > 0) {
        action("UPDATE user SET password = '$passnew'");
        $success = "Đổi mật khẩu thành công!";
      } else {
        $error = "Mật khẩu sai vui lòng thử lại!";
      }
    }
  }
} else {
  header("Location:index.php");
}

?>
<section class="section-margin--small">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-lg-3 mb-4 mb-md-0"></div>
      <div class="col-md-12 col-lg-9">
        <h5>Thay đổi mật khẩu</h5><br>
        <?php
        if (isset($error)) { ?>
          <div class="col-lg-7">
            <p class="alert alert-danger"><?= $error ?></p>
          </div>
        <?php
        }
        ?>
        <?php
        if (isset($success)) { ?>
          <div class="col-lg-7">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <?= $success ?> / <a href="index.php">Tiếp tục mua sắm</a>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
        <?php
        }
        ?>
        <form action="#/" class="form-contact contact_form" action="contact_process.php" method="POST" id="contactForm" novalidate="novalidate">
          <div class="row">
            <div class="col-lg-7">
              <div class="form-group">
                <span>Mật khẩu cũ</span>
                <input class="form-control" type="password" name="pass" required placeholder="">
              </div>
              <div class="form-group">
                <span>Mật khẩu mới</span>
                <input class="form-control" type="password" name="passnew" required placeholder="">
              </div>
              <div class="form-group">
                <span>Nhập lại mật khẩu</span>
                <input class="form-control" type="password" name="passconfirm" required placeholder="">
              </div>
            </div>
          </div>
          <div class="col-lg-7">
            <div class="form-group text-center text-md-right mt-3">
              <a href="index.php"><button class="gray_btn">Quay lại</button></a>
              <button type="submit" name="updatePass" class="button gray_btn button-contactForm">Cập nhật</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<?php include('footer.php') ?>