<?php 
include('header.php');
ob_start();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    foreach (selectDb("SELECT * FROM user WHERE id = '$id'") as $row) {
        $name = isset($row['name']) ? $row['name'] : '';
        $password = isset($row['password']) ? $row['password'] : '';
        $phone = isset($row['phone']) ? $row['phone'] : '';
        $email = isset($row['email']) ? $row['email'] : '';
        $address = isset($row['address']) ? $row['address'] : '';
        $permission = isset($row['permission']) ? $row['permission'] : '';
        $active = isset($row['active']) ? $row['active'] : '';
    }
    if (isset($_POST['updateuser'])) {
        $name_new = isset($_POST['name']) ? $_POST['name'] : $nane;
        $phone_new = isset($_POST['phome']) ? $_POST['phone'] : $phone;
        $email_new = isset($_POST['email']) ? $_POST['email'] : $email;
        $address_new = isset($_POST['address']) ? $_POST['address'] :$address;
        $pass_new = empty($_POST['password']) ? $password : md5($_POST['password']);
        $active_new = isset($_POST['active']) ? $_POST['active'] : $active;
        $permission_new = isset($_POST['permission']) ? $_POST['permission'] : $permission;
        action("UPDATE user SET name='$name_new', phone='$phone_new',email= '$email_new',address='$address_new' ,password='$pass_new',active='$active_new',permission='$permission_new' WHERE id = '$id'");
        header("Location:sua_user.php");
    }
} else {
    header("Location:sua_user.php");
}
?>
            <!-- Mobile Menu end -->
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list single-page-breadcome">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="breadcome-heading">
                                            <!-- <form role="search" class="sr-input-func">
                                                <input type="text" placeholder="Search..." class="search-int form-control">
                                                <a href="#"><i class="fa fa-search"></i></a>
                                            </form> -->
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="#">Admin</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Sửa user</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        <!-- Single pro tab review Start-->
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Sửa tài khoản</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <form method="POST" class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-6">
														<div class="devit-card-custom">
															<div class="form-group">
                                                                <label for="">Họ tên</label>
																<input name="name" type="text" class="form-control" placeholder="Nhập họ tên" value="<?= $name ?>">
															</div>
															<div class="form-group">
                                                                <label for="">Avatar</label>
																<input name="avatar" type="file" class="form-control" placeholder="" value="">
															</div>
															<div class="form-group">
                                                                <label for="">Email</label>
																<input name="email" type="text" class="form-control" placeholder="Nhập email" value="<?= $email ?>">
															</div>
														</div>
                                                    </div>
                                                    <div class="col-lg-6">
														<div class="devit-card-custom">
															<div class="form-group">
                                                                <label for="">Số điện thoại</label>
																<input name="phone" type="number" class="form-control" placeholder="Nhập số điện thoại" value="<?= $phone ?>">
															</div>
															<div class="form-group">
                                                                <label for="">Địa chỉ</label>
																<input type="text" class="form-control" placeholder="Nhập địa chỉ" value="<?= $address ?>">
															</div>
															<div class="form-group">
                                                                <label for="">Mật khẩu</label>
																<input type="password" class="form-control" placeholder="Nhập mật khẩu" value="<?= $password ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <select class="form-control" name="permission">
                                                                    <option value="0">Admin</option>
                                                                    <option value="1">Người dùng</option>
                                                                </select>
                                                                <select class="form-control" name="active">
                                                                    <option value="1">Hoạt động</option>
                                                                    <option value="0">Khóa</option>
                                                                </select>
                                                                
                                                            </div>
														</div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="payment-adress">
                                                            <button type="submit" name="updateuser" class="btn btn-primary waves-effect waves-light">Cập nhật</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <?php include('footer.php') ?>