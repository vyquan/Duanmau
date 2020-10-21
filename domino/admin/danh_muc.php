<?php include('header.php') ?>
<?php
if (isset($_POST['addCate'])) {
    $name = $_POST['category'];
    $check = "SELECT * FROM category WHERE name='$name'";
    $cout = $conn->prepare($check);
    $cout->execute();
    if ($cout->rowCount() > 0) {
        $error = "Danh mục đã tồn tại";
    } else {
        action("INSERT INTO category(name) VALUES('$name')");
        header("Location:dang_muc.php");
    }
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    action("DELETE FROM category WHERE id = '$id'");
}
?>
<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
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
                                <li><span class="bread-blod">Danh mục</span>
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
                <?php if (isset($error)) { ?>
                    <p class="alert alert-danger"><?= $error ?></p>
                <?php

                } ?>
                <div class="product-status-wrap drp-lst">
                    <h4>Danh mục</h4>
                    <form method="POST" action="danh_muc.php">
                        <input style="width: 30%;border: 1px solid #e5e6e7;height: 30px;border-radius: 5px; margin-bottom: 20px;" type="text" name="category" placeholder="Danh mục" required>
                        <button type="submit" style="padding: 7px 20px;color: #fff;border-radius: 5px;background: #006DF0; border: none;" name="addCate">Thêm mới</button>
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
                                <td><?= $item['name'] ?></td>
                                <td>
                                    <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><a href="sua_danhmuc.php?id=<?= $item['id'] ?>" class="fa fa-pencil-square-o" aria-hidden="true"></a></button>
                                    <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><a href="danh_muc.php?id=<?= $item['id'] ?>" class="fa fa-trash-o" aria-hidden="true" onclick="return confirm('Bạn muốn xóa danh mục <?= $item['name'] ?>?')"></a></button>
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
<?php include('footer.php') ?>