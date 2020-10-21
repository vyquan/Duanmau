<?php
ob_start();
include('header.php');
// include('../function.php');
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $link = $_POST['link'];
    $details = $_POST['details'];
    $status = 0;
    $img = $_FILES['img'];
    $maxSize = 8000000;
    $upload = true;
    $dir = "../public/slide/";
    $target_file = $dir . basename($img['name']);
    $type = pathinfo($target_file, PATHINFO_EXTENSION);
    $allowtypes    = array('jpg', 'png', 'jpeg');
    if ($img["size"] > $maxSize) {
        $error = "File ảnh quá lớn. Vui lòng chọn ảnh khác";
        $upload = false;
    } elseif (!in_array($type, $allowtypes)) {
        $error = "Chỉ được upload các định dạng JPG, PNG, JPEG";
        $upload = false;
    } else {
        $imgname = uniqid() . "-" . $img['name'];
        var_dump($imgname);
        move_uploaded_file($img['tmp_name'], $dir . $imgname);
        try {
            action("INSERT INTO slideshow (img,title,detail,status,link) VALUES 
                ('$imgname','$title','$details','$status','$link')");
            header("Location:slide.php");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
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
                                <li><span class="bread-blod">Thêm slide</span>
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
                <h4 class="active">Thêm Slide</h4>
                <?php if (isset($error)) { ?>
                    <p class="alert alert-danger"><?= $error ?></p>
                <?php
                } ?>
                <div class="review-content-section">
                    <div class="row">
                        <div class="col-lg-12">
                            <form method="post" id="slide" enctype="multipart/form-data">
                                <label>Hình ảnh</label>
                                <input id="img" type="file" name="img" class="form-control" onchange="changeImg(this)">

                                <label for="">Tiêu đề</label> <br>
                                <input type="text" class="form-control " name="title"> <br> <br>
                                <label for="">Đường dẫn</label> <br>
                                <input type="text" class="form-control " name="link"> <br> <br>
                                <div class="form-group">
                                    <label for="details">Mô tả</label>
                                    <textarea class="summernote" name="details"></textarea>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary waves-effect waves-light">Thêm mới</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
    <h4>Thêm mới Slideshow</h4>
    <?php if (isset($error)) { ?>
        <p class="alert alert-danger"><?= $error ?></p>
        <?php

    } ?>
    <form method="post" id="slide" enctype="multipart/form-data">
        <label>Hình ảnh</label>
        <input id="img" type="file" name="img" class="form-control " onchange="changeImg(this)">
        
        <label for="">Tiêu đề</label> <br>
        <input type="text" name="title"> <br> <br>
        <label for="">Đường dẫn</label> <br>
        <input type="text" name="link"> <br> <br>
        <label for="details">Mô tả chi tiết</label>
        <textarea class="summernote" name="details"></textarea>
        <button type="submit" name="submit" class="btn btn-danger">Thêm mới</button>
    </form>
</div> -->


<?php include('footer.php') ?>