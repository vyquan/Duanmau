<?php
include('header.php');
// include('../function.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
    action("DELETE FROM info WHERE id= '$id'");
    header("Location:slide.php");
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
                                            <li><span class="bread-blod">Setting</span>
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
                            <h4>Danh sách Slide</h4>
                            <div class="add-product">
                                <a href="them_slide.php">Thêm mới</a>
                            </div>
                            <div class="asset-inner">
                                <table>
                                    <tr>
                                        <th>Stt</th>
                                        <th>Logo</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ</th>
                                        <th>Giới thiệu</th>
                                        <th>Gmail</th>
                                        <th>Quản lý</th>
                                    </tr>
                                    <?php
                                        $stt = 0;
                                        foreach (selectDb("SELECT * FROM info") as $item) { ?>
                                    <tr>
                                        <td><?= $stt += 1 ?></td>
                                        <td><img src="../public/logo_icon/<?=$item['logo'] ?>" alt=""></td>
                                        <td><?=$item['phone'] ?></td>
                                        <td><?=$item['address'] ?></td>
                                        <td><?=$item['intro'] ?></td>
                                        <td><?=$item['gmail'] ?></td>
                                        <td>
                                            <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><a href="#?id=<?=$item['id']?>" class="fa fa-pencil-square-o" aria-hidden="true"></a></button>
                                            <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><a href="#?id=<?=$item['id'] ?>" class="fa fa-trash-o" aria-hidden="true" onclick="return confirm('Xác nhận xóa?')"></a></button>
                                        </td>
                                    </tr>
                                    <?php
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
        <?php include('footer.php') ?>       