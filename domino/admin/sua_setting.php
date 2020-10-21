<?php
ob_start();
include('header.php');
// include('../function.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    foreach (selectDb("SELECT * FROM info WHERE id = '$id'") as $row) {
        $phone = isset($row['phone']) ? $row['phone'] : '';
        $address = isset($row['address']) ? $row['address'] : '';
        $gmail = isset($row['gmail']) ? $row['gmail'] : '';
        $intro = isset($row['intro']) ? $row['intro'] : '';
        $map = isset($row['map']) ? $row['map'] : '';
        $logo = isset($row['logo']) ? $row['logo'] : '';
    }
} else {
    header("Location:setting.php");
}
if (isset($_POST['submit'])) {
    $phone_new = $_POST['phone'];
    $address_new = $_POST['address'];
    $gmail_new = $_POST['gmail'];
    $intro_new = $_POST['intro'];
    $map_new = $_POST['map'];
    $logo_new = $_FILES['logo'];
    if (isset($_FILES['logo']) && $_FILES['logo']['name']) {
        $maxSize = 8000000;
        $upload = true;
        $dir = "../public/logo_icon/";
        $target_file = $dir . basename($logo_new['name']);
        $type = pathinfo($target_file, PATHINFO_EXTENSION);
        $allowtypes    = array('jpg', 'png', 'jpeg');
        if ($logo_new["size"] > $maxSize) {
            $error = "File ảnh quá lớn. Vui lòng chọn ảnh khác";
            $upload = false;
        } elseif (!in_array($type, $allowtypes)) {
            $error = "Chỉ được upload các định dạng JPG, PNG, JPEG";
            $upload = false;
        } else {
            $logoname = uniqid() . "-" . $logo_new['name'];
            var_dump($logoname);
            move_uploaded_file($logo_new['tmp_name'], $dir . $logoname);
            try {
                action("UPDATE  info SET logo = '$logoname',phone = '$phone_new',address = '$address_new',gmail =' $gmail_new',intro= '$intro_new', map ='$map_new' WHERE id = '$id'");
                header("Location:setting.php");
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    } else {
        action("UPDATE  info SET phone = '$phone_new',address = '$address_new',gmail =' $gmail_new',intro= '$intro_new', map ='$map_new' WHERE id = '$id'");
        header("Location:setting.php");
    }
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
                                <li><span class="bread-blod">Sửa Info</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <h3>Chỉnh sửa Info</h3>
    <?php if (isset($error)) { ?>
        <p class="alert alert-danger"><?= $error ?></p>
    <?php

    } ?>
    <form method="POST" id="slide" enctype="multipart/form-data">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <label>Hình ảnh</label>
        <input id="logo" type="file" name="logo" class="form-control" onchange="changeImg(this)">
        <img id="avatar" class="thumbnail" width="300px" height="200px" src="../public/logo_icon/<?= $logo ?>">
        <label for="">Số điện thoại</label> <br>
        <input class="form-control" type="text" name="phone" value="<?= $phone ?>">
        <label for="">Gmail</label> <br>
        <textarea class="form-control" type="text" name="gmail"><?= $gmail ?></textarea>
        <label for="">Địa chỉ</label> <br>
        <input class="form-control" type="text" name="address" value="<?= $address ?>">
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <label for="">Google Map</label>
        <textarea style="height: 200px;" class="summernote form-control" name="map"><?= $map ?></textarea>
        <label for="">Giới thiệu</label>
        <textarea style="height: 200px;" class="summernote form-control" name="intro"><?= $intro ?></textarea>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align:center;margin-top:50px">
            <button type="submit" class="btn btn-primary waves-effect waves-light" name="submit">Cập nhật</button>
            <a href="setting.php" class="btn btn-primary waves-effect waves-light">Quay lại</a>
        </div>
    </form>
</div>