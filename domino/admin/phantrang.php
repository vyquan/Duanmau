<?php
include('../function.php');
$sotin = 2;
if (isset($_GET['trang'])) {
    $trang = $_GET['trang'];
}
$sql = "SELECT count(*) FROM `category`";
$result = $conn->prepare($sql);
$result->execute();
$number_of_rows = $result->fetchColumn();
$sotrang = ceil($number_of_rows / $sotin);
$tin = ($trang - 1) * $sotin;
foreach (selectDb("SELECT * FROM category LIMIT $tin,$sotin") as $row) { ?>
    <p><?= $row['name'] ?></p>
<?php
};
echo "<br>";
for ($t = 1; $t <= $sotrang; $t++) { ?>
    <a href="phantrang.php?trang=<?= $t ?>">Trang <?= $t . " " ?></a>
<?php

}
if (isset($_POST['submit'])) {
    if (isset($_FILES['abc'])&& $_FILES['abc']["name"]!=null) {
        echo "abc";
    }else{
        echo "jvbjkdbvbd";
    }
}
?>
<form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="abc">
    <button type="submit" name="submit"></button>
</form>