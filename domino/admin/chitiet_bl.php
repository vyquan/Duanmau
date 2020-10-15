<?php
include('header.php');
// include('../function.php');
$details= null;
if (isset($_GET['iddetails']) && !isset($_GET['iddelete'])) {
    $details = $_GET['iddetails'];
} elseif (isset($_GET['iddelete']) && isset($_GET['iddetails'])) {
    $details = $_GET['iddetails'];
    $iddelete = $_GET['iddelete'];
    action("DELETE FROM Comment WHERE id = '$iddelete'");
    header("Location:detailsCom.php?iddetails=$details");
}
$stt = 0;
?>
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
                                            <li><span class="bread-blod">Chi tiết bình luận</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-status mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="product-status-wrap drp-lst">
                        <h3 style="text-align:center">Chi tiết bình luận</h3>
                        <table style="width:100%">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Ảnh sản phẩm</th>
                                    <th>Chi tiết bình luận</th>
                                    <th>Ngày bình luận</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach (selectDb("SELECT * FROM Comment WHERE id_product = '$details'") as $row) {
                                    foreach (selectDb("SELECT * FROM product WHERE id = '$details'") as $item) {
                                        ?>
                                        <tr>
                                            <td><?= $stt += 1 ?></td>
                                            <td><?=$item['name']?></td>
                                            <td><img src="../public/images/<?= $item['images'] ?>" alt="" width="100px" height="100px"></td>
                                            <td><?= $row['content'] ?></td>
                                            <td><?= $row['date_add'] ?></td>
                                            <td>
                                                <a href="chitiet_bl.php?iddelete=<?= $row['id'] ?>&iddetails=<?=$details ?>" class="btn btn-primary waves-effect waves-light" onclick="return confirm('Bạn muốn xóa bình luận này?')">Xóa</a>
                                                <a href="binh_luan.php" class="btn btn-primary waves-effect waves-light">Quay lại</a>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</div>