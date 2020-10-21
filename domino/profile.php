<?php
include('header.php') ?>
<?php

if (isset($_GET['email'])) {
    $email = $_GET['email'];
    foreach (selectDb("SELECT * FROM user WHERE email='$email'") as $row) {
        $name = isset($row["name"]) ? $row['name'] : '';
        $email_pro = isset($row['email']) ? $row['email'] : '';
        $phone = isset($row['phone']) ? $row['phone'] : '';
        $address = isset($row['address']) ? $row['address'] : '';
    }
} else {
    header("Location:index.php");
}

?>
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">
                                <h5>Thông tin tài khoản</h5>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="media-body">
                                        <p>Họ và tên</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5><?= $name ?></h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="media-body">
                                        <p>Email</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5><?= $email_pro ?></h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="media-body">
                                        <p>Số điện thoại</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5><?= $phone ?></h5>
                            </td>
                        </tr>
                        <tr class="out_button_area">
                            <td class="d-none-l">
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                                <div class="checkout_btn_inner d-flex align-items-center">
                                    <a class="gray_btn" href="change_password.php?email=<?= $email ?>">Đổi mật khẩu</a>
                                    <a class="primary-btn ml-2" href="index.php">Quay lại</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?php include('footer.php') ?>