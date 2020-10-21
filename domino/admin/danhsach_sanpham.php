<?php include('header.php');
// include('../function.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    action("DELETE FROM product WHERE id = '$id'");
}

if (!isset($_GET['product'])) {
    $product = 1;
} else {
    $product = $_GET['product'];
}
$data = 20;
$sql = "SELECT count(*) FROM `product`";
$result = $conn->prepare($sql);
$result->execute();
$number = $result->fetchColumn();
$page = ceil($number / $data);
$tin = ($product - 1) * $data;
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
                                <li><span class="bread-blod">Danh sách sản phẩm</span>
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
                <div class="product-status-wrap">
                    <h4>Danh sách sản phẩm</h4>
                    <div class="add-product">
                        <a href="them_sanpham.php">Thêm mới</a>
                    </div>
                    <div class="asset-inner">
                        <table>
                            <tr>
                                <th>Stt</th>
                                <th>Tên</th>
                                <th>Hình ảnh</th>
                                <th>Hãng sản xuất</th>
                                <th>Giảm giá</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Danh mục</th>
                                <!-- <th>Giới thiệu</th>
                                        <th>Chi tiết sản phẩm</th> -->
                                <th>Quản lý</th>
                            </tr>
                            <tr>
                                <?php
                                $stt = 0;
                                foreach (selectDb("SELECT * FROM product ORDER BY id DESC LIMIT $tin,$data") as $item) {
                                    foreach (selectDb("SELECT * FROM category WHERE id=" . $item['id_cate']) as $row) {
                                ?>
                                        <td><?= $stt += 1 ?></td>
                                        <td><?= $item['name'] ?></td>
                                        <td><img src="../public/images/<?= $item['images'] ?>" width="50px" height="50px" alt=""></td>
                                        <td><?= $item['hang_sx'] ?></td>
                                        <td><?= $item['sale'] . '%' ?></td>
                                        <td><?= number_format($item['price']) . 'VNĐ' ?></td>
                                        <td><?= $item['total'] ?></td>
                                        <td><?= $row['name'] ?></td>
                                        <!-- <td><?= $item['intro'] ?></td>
                                        <td><?= $item['detail'] ?></td> -->
                                        <td>
                                            <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><a href="sua_sanpham.php?id=<?= $item['id'] ?>" class="fa fa-pencil-square-o" aria-hidden="true"></a></button>
                                            <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><a href="danhsach_sanpham.php?id=<?= $item['id'] ?>" class="fa fa-trash-o" aria-hidden="true" onclick="return confirm('Bạn chắc chắn muốn xóa chứ?')"></a></button>
                                        </td>
                            </tr>
                    <?php
                                    }
                                }
                    ?>
                        </table>
                        <?php
                        for ($t = 1; $t <= $page; $t++) { ?>
                            <ul class="pagination">
                                <li class="page-item"><a name="" id="" class="page-link" href="danhsach_sanpham.php?product=<?= $t ?>" role="button"><?= $t ?></a></li>
                            </ul>
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