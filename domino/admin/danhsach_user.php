<?php
include('header.php');
// include('../function.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    action("DELETE FROM user WHERE id = '$id'");
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
                            <h4>Danh sách User</h4>
                            <div class="add-product">
                                <a href="../register.php">Thêm mới</a>
                            </div>
                            <div class="asset-inner">
                                <table>
                                    <tr>
                                        <th>Stt</th>
                                        <th>Họ tên</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ</th>
                                        <th>Quyền</th>
                                        <th>Trạng thái</th>
                                        <th>Quản lý</th>
                                    </tr>
                                    <?php
                                    $stt = 0;
                                    foreach (selectDb("SELECT * FROM user") as $item) { ?>
                                    <tr>
                                        <td><?= $stt += 1 ?></td>
                                        <td><?= $item['name'] ?></td>
                                        <td><?= $item['email'] ?></td>
                                        <td><?= $item['phone'] ?></td>
                                        <td><?= $item['address'] ?></td>
                                        <td><?= ($item['permission'] == 1) ? 'Khách hàng' : 'Admin' ?></td>
                                        <td><?= ($item['active'] == 1) ? 'Hoạt động' : 'Bị khóa' ?></td>
                                        <td>
                                            <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><a href="sua_user.php?id=<?= $item['id'] ?>" class="fa fa-pencil-square-o" aria-hidden="true"></a></button>
                                            <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><a href="danhsach_user.php?id=<?= $item['id'] ?>" class="fa fa-trash-o" aria-hidden="true" onclick="return confirm('Bạn muốn xóa User <?= $item['name']?>?')"></a></button>
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