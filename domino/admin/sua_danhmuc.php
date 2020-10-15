<?php
ob_start();
 include('header.php'); ?>
<?php 
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    foreach (selectDb("SELECT * FROM category WHERE id = '$id'") as $item) {
        $name = isset($item['name']) ? $item['name'] : '';
    }
    if (isset($_POST['updateCate'])) {
        $name_new = $_POST['category'];
        action("UPDATE category SET name = '$name_new' WHERE id = '$id'");
    }
}else{
    header("Location:sua_danhmuc.php");
}
?>
            <!-- Mobile Menu start -->
            
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
                                            <li><span class="bread-blod">Sửa danh mục</span>
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
            <div class="product-status mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="product-status-wrap drp-lst">
                                <h4>Sửa danh mục</h4>
                                <form method="POST">
                                    <input style="width: 30%;border: 1px solid #e5e6e7;height: 30px;border-radius: 5px; margin-bottom: 20px;" type="text" name="category" placeholder="Danh mục" required value="<?= $name ?>">
                                    <button type="submit" style="padding: 7px 20px;color: #fff;border-radius: 5px;background: #006DF0; border: none;" name="updateCate">Sửa</button>
                                <div class="asset-inner">                               
                                </form>
                                    <table>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên danh mục</th>
                                            <th>Quản trị</th>
                                        </tr>
                                        <?php
                                        $stt = 0;
                                        foreach (selectDb("SELECT * FROM category") as $item) { ?>
                                        <tr>
                                            <td><?= $stt += 1 ?></td>
                                            <td><?= $item['name']?></td>
                                            <td>
                                                <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><a href="sua_danhmuc.php?id=<?= $item['id'] ?>" class="fa fa-pencil-square-o" aria-hidden="true"></a></button>
                                                <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><a href="danh_muc.php?id=<?= $item['id'] ?>" class="fa fa-trash-o" aria-hidden="true" onclick="return confirm('Bạn muốn xóa thật chứ?')"></a></button>
                                            </td>
                                        <?php
                                        } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include('footer.php') ?>