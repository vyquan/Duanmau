<?php
include('header.php'); ?>
// include('../function.php');
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
                                <li><span class="bread-blod">Danh sách user</span>
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap drp-lst">
                    <h4>Danh sách Bình luận</h4>
                    <div class="asset-inner">
                        <table>
                            <tr>
                                <th>Stt</th>
                                <th>Ảnh sản phẩm</th>
                                <th>Số bình luận</th>
                                <th>Bình luận gần nhất</th>
                                <th>Quản lý</th>
                            </tr>
                            <?php
                            $stt = 0;
                            foreach (selectDb("SELECT DISTINCT id_product FROM Comment") as $item) {
                                $id_sp = $item['id_product'];
                                foreach (selectDb("SELECT * FROM product WHERE id= '$id_sp'") as $value) {
                                    $tong = total("SELECT COUNT(*) FROM Comment WHERE id_product = '$id_sp'");
                                    foreach (selectDb("SELECT * FROM Comment WHERE id_product='$id_sp' ORDER BY id DESC LIMIT 1 ") as $row) {
                            ?>
                                        <tr>
                                            <td><?= $stt += 1 ?></td>
                                            <td> <img src="../public/images/<?= $value['images'] ?>" alt="" width="100px" height="100px"></td>
                                            <td><?= $tong ?></td>
                                            <td><?= $row['date_add'] ?></td>
                                            <td>
                                                <a href="chitiet_bl.php?iddetails=<?= $id_sp ?>" class="btn btn-primary waves-effect waves-light">Xem chi tiết</a>
                                            </td>
                                            <!-- <td>
                                            <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><a href="sua_user.php?id=<?= $item['id'] ?>" class="fa fa-pencil-square-o" aria-hidden="true"></a></button>
                                            <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><a href="danhsach_user.php?id=<?= $item['id'] ?>" class="fa fa-trash-o" aria-hidden="true" onclick="return confirm('Bạn muốn xóa User <?= $item['name'] ?>?')"></a></button>
                                        </td> -->
                                        </tr>
                            <?php
                                    }
                                }
                            }
                            ?>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>