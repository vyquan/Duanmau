<?php
ob_start();
include('header.php'); ?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $imgname = null;
    foreach (selectDb("SELECT * FROM product WHERE id = '$id'") as $row) {
        $name = isset($row['name']) ? $row['name'] : '';
        $price = isset($row['price']) ? $row['price'] : '';
        $sale = isset($row['sale']) ? $row['sale'] : '';
        $total = isset($row['total']) ? $row['total'] : '';
        $cate = isset($row['id_cate']) ? $row['id_cate'] : '';
        $intro = isset($row['intro']) ? $row['intro'] : '';
        $details = isset($row['detail']) ? $row['detail'] : '';
        $date = isset($row['date_add']) ? $row['date_add'] : '';
        $img = isset($row['images']) ? $row['images'] : '';
        $hang_sx = isset($row['hang_sx']) ? $row['hang_sx'] : '';
    }
    if (isset($_POST['updatePro'])) {
        $name_new = $_POST['name'];
        $hang_sx_new = $_POST['hang_sx'];
        $price_new = $_POST['price'];
        $sale_new = $_POST['sale'];
        $total_new = $_POST['total'];
        $intro_new = $_POST['intro'];
        $details_new = $_POST['details'];
        $date_new = date("Y/m/d");
        if (isset($_FILES['img']) && $_FILES['img']['name']) {
            $img_new = $_FILES['img'];
            $maxSize = 800000;
            $upload = true;
            $dir = "../public/images/";
            $target_file = $dir . basename($img_new['name']);
            $type = pathinfo($target_file, PATHINFO_EXTENSION);
            $allowtypes    = array('jpg', 'png', 'jpeg');

            if ($img_new["size"] > $maxSize) {
                $error = "File ảnh quá lớn. Vui lòng chọn ảnh khác";
                $upload = false;
            } elseif (!in_array($type, $allowtypes)) {
                $error = "Chỉ được upload các định dạng JPG, PNG, JPEG";
                $upload = false;
            } else {
                $imgname = uniqid() . "-" . $img_new['name'];
                move_uploaded_file($img_new['tmp_name'], $dir . $imgname);
                action("UPDATE product SET name='$name_new', hang_sx='$hang_sx_new', price= '$price_new',sale='$sale_new',total = '$total_new',
                    intro='$intro_new',detail='$details_new',date_add='$date_new',images='$imgname' WHERE id = '$id'");
                header("Location:danhsach_sanpham.php");
            }
        } else {
            action("UPDATE product SET name='$name_new', hang_sx='$hang_sx_new', price= '$price_new',sale='$sale_new',total = '$total_new',
                intro='$intro_new',detail='$details_new',date_add='$date_new' WHERE id = '$id'");
            header("Location:danhsach_sanpham.php");
        }
    }

    foreach (selectDb("SELECT * FROM category WHERE id =" . $cate) as $item) {
        $cate_id = $item['name'];
    }
} else {
    header("Location:danhsach_sanpham.php");
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
                            <!-- <div class="breadcome-heading">
                                            <form role="search" class="sr-input-func">
                                                <input type="text" placeholder="Search..." class="search-int form-control">
                                                <a href="#"><i class="fa fa-search"></i></a>
                                            </form>
                                        </div> -->
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu">
                                <li><a href="#">Admin</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Sửa sản phẩm</span>
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
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <h3 style="text-align:center">Sửa sản phẩm</h3>
    <?php
    if (isset($error)) { ?>
        <p class="alert alert-danger"><?= $error ?></p>
    <?php
    }
    ?>
    <form method="POST" id="addPro" enctype="multipart/form-data">

        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <label for="name">Tên sản phẩm</label> <br>
            <input class="form-control" type="text" name="name" value="<?= $name ?>"> <br>
            <label for="price">Giá sản phẩm</label> <br>
            <input class="form-control" type="number" name="price" value="<?= $price ?>"> <br>
            <!-- <label for="img">Hình ảnh</label> <br>
            <input type="file" name="img" value="<?= $img ?>"> <br><br> -->
            <label>Ảnh sản phẩm</label>
            <input class="form-control" id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)">
            <img id="img" class="thumbnail" width="300px" height="200px" src="../public/images/<?= $img ?>">
            <label for="sale">Hãng sản xuất</label> <br>
            <input class="form-control" type="text" name="hang_sx" value="<?= $hang_sx ?>">

        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <label for="sale">Giảm giá</label> <br>
            <input class="form-control" type="number" name="sale" value="<?= $sale ?>"><br>
            <label for="total">Số lượng</label> <br>
            <input class="form-control" type="number" name="total" value="<?= $total ?>"><br>
            <label for="cate">Danh mục</label> <br>
            <select class="form-control" name="cate">
                <option value="<?= $cate_id ?>"><?= $cate_id ?></option>
                <?php
                foreach (selectDb("SELECT * FROM category") as $row) { ?>
                    <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                <?php
                }
                ?>
            </select>
            <label for="intro">Giới thiệu sản phẩm</label>
            <textarea style="height: 300px;" class="summernote form-control" name="intro"><?= $intro ?></textarea> <br>
            <label for="details">Chi tiết sản phẩm</label>
            <textarea style="height: 300px;" class="summernote form-control" name="details"><?= $details ?></textarea>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align:center;margin-top:50px">
            <button type="submit" class="btn btn-primary waves-effect waves-light" name="updatePro">Cập nhật</button>
            <a href="danhsach_sanpham.php" class="btn btn-primary waves-effect waves-light">Quay lại</a>
        </div>

    </form>
</div>

</div>
</div>
<script>
    $(document).ready(function() {
        $('.summernote').summernote();
    });
</script>