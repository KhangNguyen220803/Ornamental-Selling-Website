<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Product</title>


    <link rel="stylesheet" href="../css/products.css">
    <link rel="stylesheet" href="../css/admin.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>

    <?php
    include '../php/database.php';


    ?>



    <!-- 

    <div class="box-back">
        <a href="http://localhost:8080/buoi4/index.php?page=giaodien"><i class="fa-solid fa-right-to-bracket fa-rotate-180"></i> Back home</a>



    </div> -->

    <?php

    $resultkh = mysqli_query($conn, "SELECT dathang.tenkh,dathang.sdt,dathang.diachi FROM sanpham,chitietdathang,dathang WHERE sanpham.id=chitietdathang.idsanpham AND chitietdathang.iddathang=dathang.iddathang AND  dathang.iddathang=" . $_GET['iddathang']);
    $resultdh = mysqli_query($conn, "SELECT sanpham.ten,chitietdathang.soluong FROM sanpham,chitietdathang,dathang WHERE sanpham.id=chitietdathang.idsanpham AND chitietdathang.iddathang=dathang.iddathang AND  dathang.iddathang=" . $_GET['iddathang']);



    ?>


    <div class="ctn-detail center_detail column">
     


        <div class="box-pro-detail ">
        <h3 class="center-box"><P>Chi tiết đơn hàng</P></h3>


            <?php  $rowkh = mysqli_fetch_assoc($resultkh) ?>
            <div class="box-kh">
                <div class="">
                    <p>Người nhận: <?php echo $rowkh['tenkh']; ?></p>
                </div>

                <div class=" ">
                    <p>Điện thoại: <?php echo $rowkh['sdt']; ?></p>
                </div>
                <div class=" ">
                    <p>Địa chỉ: <?php echo $rowkh['diachi']; ?></p>
                </div>


            </div>
            

            <h3>Danh sách sản phẩm</h3>


            <?php while ($rowsp = mysqli_fetch_array($resultdh)) { ?>
                <div class="box-dh">
                   
                    <div class="">
                        <p>Tên: <?php echo $rowsp['ten'];  ?>  SL: <?php echo $rowsp['soluong'];  ?></p>
                    </div>

                </div>


            <?php } ?>


        </div>
</body>

</html>