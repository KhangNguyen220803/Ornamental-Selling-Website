<?php
include '../php/database.php';
include 'func.php';
session_start();


$username = $_SESSION['username'];

if (!isset($username))
    header('location:login.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/admin.css">
   



</head>

<body>
    <div class="ctn-banner">
        <img src="./banner/banner.jpg" alt="">
        <!-- <h1 class="content-banner"> ADMIN</h1> -->
    </div>
    <div class="ctn-header flex">

        <a class="pad-nav" href="http://localhost:8080/Ornamental%20Selling%20Website/pages_admin/home_admin.php">Trang chủ</a>
        <a class="pad-nav" href="" id="them">Thêm</a>
        <a class="pad-nav" href="home_admin.php?capnhatsp=capnhatsp">Cập nhật sản phẩm</a>
        <a class="pad-nav" href="home_admin.php?capnhatnhom=capnhatnhom">Cập nhật nhóm</a>
        <a class="pad-nav" href="http://localhost:8080/Ornamental%20Selling%20Website/pages_admin/captaikhoan.php">Cấp tài khoản</a>

      

        <p class="fr1 pad-nav"> xin chào:<?php echo $username ?></p>


        <p class="fr0 pad-nav"><a href="logout.php"> <i class="fa-solid fa-right-from-bracket"></i> logout</a></p>
    </div>

    <div class="ctn-show-them " id="container-show-them">

        <div class="box-show-them">

            <a href="home_admin.php?themsanpham=themsanpham">Thêm sản phẩm</a>

            <a href="home_admin.php?themnhom=themnhom">Thêm nhóm</a>

        </div>

    </div>

    <!--  -->
    <div class="ctn-noidung center br_w column">


        <?php
        if (isset($_GET["themnhom"])) {
            $themnhom = $_GET["themnhom"];
            $themnhom = "blocks/" . $themnhom . ".php";
            require($themnhom);
        } elseif (isset($_GET["themsanpham"])) {

            $themsanpham = $_GET["themsanpham"];
            $themsanpham = "blocks/" . $themsanpham . ".php";
            require($themsanpham);
        } elseif (isset($_GET["capnhatsp"])) {

            $capnhatsp = $_GET["capnhatsp"];
            $capnhatsp = "blocks/" . $capnhatsp . ".php";
            require($capnhatsp);
        } elseif (isset($_GET["capnhatnhom"])) {

            $capnhatnhom = $_GET["capnhatnhom"];
            $capnhatnhom = "blocks/" . $capnhatnhom . ".php";
            require($capnhatnhom);
        }

        else{
            include 'quanlydonhang.php';
        }

        ?>


       
    </div>
    <!--  -->


</body>

</html>

<script src="./js/admin.js"></script>