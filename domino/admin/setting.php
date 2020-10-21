<?php
include('header.php');
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
            <?php
            $stt = 0;
            foreach (selectDb("SELECT * FROM info") as $item) { ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap drp-lst">
                        <h4>Thông tin - Liên hệ</h4>
                        <div class="add-product">
                            <a href="sua_setting.php?id=<?= $item['id'] ?>">Chỉnh sửa</a>
                        </div>
                        <div class="asset-inner">

                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <div class="media-body">
                                                    <p>Logo</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <img src="../public/logo_icon/<?= $item['logo'] ?>" alt="">
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
                                            <h5><?= $item['phone'] ?></h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <div class="media-body">
                                                    <p>Gmail</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h5><?= $item['gmail'] ?></h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <div class="media-body">
                                                    <p>Địa chỉ</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h5><?= $item['address'] ?></h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <div class="media-body">
                                                    <p>Google Map</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h5><?= $item['map'] ?></h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <div class="media-body">
                                                    <p>Giới thiệu</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h5><?= $item['intro'] ?></h5>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php
                    }
                        ?>
                        </div>

                    </div>
                </div>
        </div>
    </div>
</div>
</div>
<?php include('footer.php') ?>