<link rel="stylesheet" href="../../css/admin.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<?php
include '../../php/database.php';
$result = mysqli_query($conn, "SELECT * FROM `sanpham` WHERE `id`=" . $_GET['id']);


?>



<div class="ctn-chitietsanpham center">

    <a href="http://localhost:8080/Ornamental%20Selling%20Website/pages_admin/home_admin.php"> <i class="fa-solid fa-house"></i></a>

    <div class="box-chitietsanpham">

        <?php $row = mysqli_fetch_array($result)  ?>

        <div class="">
            Tên: <?php echo $row["ten"] ?>
        </div>

        <div class="">
            Giá: <?php echo $row["gia"] ?>
        </div>
        <div class="">
            <p>Hình:</p>
            <img class="img" src="../../img/<?= $row['hinh'] ?>">
        </div>

        <div class="">
            Mô tả: <?php echo $row["moTa"] ?>
        </div>
        <div class="">
            Loại: <?php echo $row["loai"] ?>
        </div>
    </div>








</div>


</div>