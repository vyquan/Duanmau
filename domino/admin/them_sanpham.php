<?php
ob_start();
include('header.php'); ?>
<?php
if (isset($_POST['addPro'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $hang_sx = $_POST['hang_sx'];
    $sale =isset($_POST['sale'])?$_POST['sale']:0;
    $total = $_POST['total'];
    $cate = $_POST['cate'];
    $intro = $_POST['intro'];
    $details = $_POST['details'];
    $date = date("Y/m/d");
    $img = $_FILES['img'];
    $view = 1;
    $maxSize = 800000;
    $upload = true;
    $dir = "../public/images/";
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
        if (move_uploaded_file($img['tmp_name'], $dir . $imgname)) { }
        $check = "SELECT * FROM product WHERE name = '$name'";
        $cout = $conn->prepare($check);
        $cout->execute();
        if ($cout->rowCount() > 0) {
            $error = "Sản phẩm đã tồn tại";
        } else {
            try {
                action("INSERT INTO product (name,images,price,hang_sx,detail,id_cate,sale,total,intro,view,date_add) VALUES 
                ('$name','$imgname','$price','$hang_sx','$details','$cate','$sale','$total','$intro','$view','$date')");
                header("Location:danhsach_sanpham.php");
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
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
                                            <li><span class="bread-blod">Thêm sản phẩm</span>
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
            <!-- <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Thêm sản phẩm</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <?php
                                        if (isset($error)) { ?>
                                            <p class="alert alert-danger"><?= $error ?></p>
                                        <?php

                                        }
                                        ?>
                                            <form method="POST" class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-6">
														<div class="devit-card-custom">
															<div class="form-group">
                                                                <label for="">Tên sản phẩm</label>
																<input name="name" type="text" class="form-control" placeholder="Nhập tên sản phẩm">
															</div>
															<div class="form-group">
                                                                <label for="">Hình ảnh</label>
																<input name="img" type="file" class="form-control" placeholder="Hình ảnh" onchange="changeImg(this)">
															</div>
															<div class="form-group">
                                                                <label for="">Giá</label>
																<input name="price" type="number" class="form-control" placeholder="Nhập giá">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Giảm giá</label>
																<input name="sale" type="number" class="form-control" placeholder="Nhập giảm giá (%)">
															</div>
															<div class="form-group">
                                                                <label for="">Số lượng</label>
																<input name="total" type="number" class="form-control" placeholder="Nhập số lượng">
															</div>
															
														</div>
                                                    </div>
                                                    <div class="col-lg-6">
														<div class="devit-card-custom">
															<div class="form-group">
                                                                <label for="">Danh mục</label>
																<select name="cate" required>
                                                                <?php
                                                                foreach (selectDb("SELECT * FROM category") as $row) { ?>
                                                                    <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="intro">Giới thiệu sản phẩm</label>
                                                                <textarea class="summernote" name="intro"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="details">Chi tiết sản phẩm</label>
                                                                <textarea class="summernote" name="details"></textarea>
                                                            </div>
														</div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="payment-adress">
                                                            <button type="submit" name="addPro" class="btn btn-primary waves-effect waves-light">Thêm mới</button>
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
            </div> -->
                <h4 style="text-align:center">Thêm mới sản phẩm</h4>
            <?php
            if (isset($error)) { ?>
                <p class="alert alert-danger"><?= $error ?></p>
            <?php
            }
            ?>
           <form method="POST" id="addPro" enctype="multipart/form-data">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <label for="name">Tên sản phẩm</label> <br>
                <input class="form-control" type="text" name="name" required placeholder="Tên sản phẩm"> <br>
                <label for="price">Giá sản phẩm</label> <br>
                <input class="form-control" type="number" name="price" required placeholder="Giá sản phẩm"> <br>
                <!-- <label for="img">Hình ảnh</label> <br>
                <input type="file" name="img" required> <br><br> -->
                <label>Ảnh sản phẩm</label>
                <input required id="img" type="file" name="img" class="form-control" onchange="changeImg(this)">
                <!-- <img id="avatar" class="thumbnail" width="300px" height="200px" src="../public/images/new.png"> -->
                <label for="hang_sx">Hãng sản xuất</label> <br>
                <input class="form-control" type="text" name="hang_sx" required placeholder="Tên hãng"> <br>
                <label for="sale">Giảm giá %</label> <br>
                <input class="form-control" type="number" name="sale" required placeholder="Tính theo %"> <br>
                <label for="total">Số lượng</label> <br>
                <input class="form-control" type="number" name="total" required placeholder="Số lượng sản phẩm"> <br>
                <label for="cate">Danh mục</label> <br>
                <select class="form-control" name="cate" required>
                    <?php
                    foreach (selectDb("SELECT * FROM category") as $row) { ?>
                        <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                    <?php
                    }
                    ?>
                </select>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label for="intro">Giới thiệu sản phẩm</label>
                    <textarea style="height: 200px;" class="summernote form-control" name="intro"></textarea> <br>
                    <label for="details">Chi tiết sản phẩm</label>
                    <textarea style="height: 285px;" class="summernote form-control" name="details"></textarea>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align:center;margin-top:50px">
                    <button type="submit" class="btn btn-primary waves-effect waves-light" name="addPro">Thêm mới</button>
                    <a href="index.php" class="btn btn-primary waves-effect waves-light">Quay lại</a>
                </div>
                </form>
                </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
        