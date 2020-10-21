<?php
ob_start();
include('header.php');
// include('../function.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    foreach (selectDb("SELECT * FROM slideshow WHERE id = '$id'") as $row) {
        $title = isset($row['title']) ? $row['title'] : '';
        $link = isset($row['link']) ? $row['link'] : '';
        $detail = isset($row['detail']) ? $row['detail'] : '';
        $status = isset($row['status']) ? $row['status'] : '';
        $img = isset($row['img']) ? $row['img'] : '';
    }
} else {
    header("Location:slide.php");
}
if (isset($_POST['submit'])) {
    $title_new = $_POST['title'];
    $link_new = $_POST['link'];
    $details_new = $_POST['details'];
    $status_new = $_POST['status'];
    $img_new = $_FILES['img'];
    if (isset($_FILES['img']) && $_FILES['img']['name']) {
        $maxSize = 8000000;
        $upload = true;
        $dir = "../public/slide/";
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
            var_dump($imgname);
            move_uploaded_file($img_new['tmp_name'], $dir . $imgname);
            try {
                action("UPDATE  slideshow SET img = '$imgname',title = '$title_new',link = '$link_new',detail =' $details_new',status= '$status_new' WHERE id = '$id'");
                header("Location:slide.php");
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    } else {
        action("UPDATE  slideshow SET title = '$title_new',link = '$link_new',detail =' $details_new',status= '$status_new' WHERE id = '$id'");
        header("Location:slide.php");
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
                                <li><span class="bread-blod">Sửa slide</span>
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
<!-- <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Courses Details</a></li>
                                <li><a href="#reviews"> Account Information</a></li>
                                <li><a href="#INFORMATION">Social Information</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad addcoursepro">
                                                    <form action="#" class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <input name="number" type="text" class="form-control" placeholder="Course Name" value="Apps Development">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" placeholder="Course Start Date" value="12/10/2017">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" placeholder="Course Duration" value="6 Months">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" placeholder="Course Price" value="$400">
                                                                </div>
                                                                <div class="form-group alert-up-pd">
                                                                    <div class="dz-message needsclick download-custom">
                                                                        <i class="fa fa-download edudropnone" aria-hidden="true"></i>
                                                                        <h2 class="edudropnone">Drop image here or click to upload.</h2>
                                                                        <p class="edudropnone"><span class="note needsclick">(This is just a demo dropzone. Selected image is <strong>not</strong> actually uploaded.)</span>
                                                                        </p>
                                                                        <input name="imageico" class="hd-pro-img" type="text" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group res-mg-t-15">
                                                                    <input type="text" class="form-control" placeholder="Department" value="CSE">
                                                                </div>
                                                                <div class="form-group edit-ta-resize">
                                                                    <textarea name="description">Lorem ipsum dolor sit amet of, consectetur adipiscing elitable. Vestibulum tincidunt est vitae ultrices accumsan.</textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" placeholder="Course Professor" value="Selima sha">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" placeholder="Year" value="1 Year">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-tab-list tab-pane fade" id="reviews">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="devit-card-custom">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Email">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" placeholder="Phone">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="password" class="form-control" placeholder="Password">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="password" class="form-control" placeholder="Confirm Password">
                                                            </div>
                                                            <a href="#!" class="btn btn-primary waves-effect waves-light">Submit</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-tab-list tab-pane fade" id="INFORMATION">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
												<div class="row">
													<div class="col-lg-12">
														<div class="devit-card-custom">
															<div class="form-group">
																<input type="url" class="form-control" placeholder="Facebook URL">
															</div>
															<div class="form-group">
																<input type="url" class="form-control" placeholder="Twitter URL">
															</div>
															<div class="form-group">
																<input type="url" class="form-control" placeholder="Google Plus">
															</div>
															<div class="form-group">
																<input type="url" class="form-control" placeholder="Linkedin URL">
															</div>
															<button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
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
                </div>
            </div>
        </div> -->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <h3 style="text-align:center">Thêm mới Slideshow</h3>
    <?php if (isset($error)) { ?>
        <p class="alert alert-danger"><?= $error ?></p>
    <?php

    } ?>
    <form method="post" id="slide" enctype="multipart/form-data">
        <label>Hình ảnh</label>
        <input id="img" type="file" name="img" class="form-control" onchange="changeImg(this)">
        <img id="avatar" class="thumbnail" width="300px" height="200px" src="../public/slide/<?= $img ?>">
        <label for="">Tiêu đề</label> <br>
        <input class="form-control" type="text" name="title" value="<?= $title ?>"> <br> <br>
        <label for="">Đường dẫn</label> <br>
        <input class="form-control" type="text" name="link" value="<?= $link ?>"> <br> <br>
        <label for="details">Mô tả</label>
        <textarea class="summernote form-control" name="details"><?= $detail ?></textarea>
        <label for="details">Trạng thái</label>
        <select class="form-control" name="status">
            <option value="0">Hiển thị</option>
            <option value="1">Ẩn</option>
        </select> <br> <br>
        <button type="submit" name="submit" class="btn btn-primary waves-effect waves-light">Cập nhật</button>
        <a href="slideshow.php" class="btn btn-primary waves-effect waves-light">Quay lại</a>
    </form>
</div>