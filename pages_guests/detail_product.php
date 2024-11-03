<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Product</title>
    <link rel="stylesheet" href="../css/layout.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/search.css">
    <link rel="stylesheet" href="../css/products.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>

    <?php
    include '../php/database.php';


    ?>

    <div class="search">
        <?php include("search.php") ?>
    </div>

    <div class="menu">
        <?php include("menu.php") ?>
    </div>

    <!-- 

    <div class="box-back">
        <a href="http://localhost:8080/buoi4/index.php?page=giaodien"><i class="fa-solid fa-right-to-bracket fa-rotate-180"></i> Back home</a>



    </div> -->

    <?php

    $result = mysqli_query($conn, "SELECT * FROM `sanpham` WHERE `id`=" . $_GET['id']);



    ?>


    <div class="ctn-detail center_detail">
        <?php while ($row = mysqli_fetch_array($result)) { ?>

            <div class="box-pro-detail ">

                <div class="box_img_detail ">

                    <img class="img_detail" src="../img/<?= $row['hinh'] ?>">

                </div>

                <div class="box-mota">
                    <div class="ten ">
                        <p class="font20"> <?php echo $row['ten']; ?></p>

                    </div>

                    <div class="gia font20">
                        <?php echo "Giá:  " . $row['gia'] . "đ"; ?>



                    </div>






                    <!-- <div class="box_soluong">
                        <p class="font20">Số lượng</p>
                        <button id="tru" onclick="handleMinus()">-</button>
                        <input id="soluong" type="text" value="1">
                        <button id="cong" onclick="handlePlus()">+</button>



                    </div> -->

                    <form action="cart.php?action=add" method="POST">
                        <label class="font20">Số lượng:</label> <input type="text" value="1" name="quantity[<?= $row['id']?>]" size="2">
                        <br>
                        <br>
                        <input class="btn_submit" type="submit" name="" id="" value="Mua sản phẩm">
                    </form>
                </div>

            <?php } ?>


            </div>
</body>

</html>

<!-- 
<script>
    let soluongElement = document.getElementById('soluong')
    let soluong = soluongElement.value

    let render = (soluong) => {
        soluongElement.value = soluong
    }
    let handlePlus = () => {
        soluong++
        render(soluong);
    }

    let handleMinus = () => {
        if (soluong > 1) {
            soluong--
            render(soluong);
        }


    }


    // check nhập chữ chuyển thành số
    soluongElement.addEventListener('input', () => {
        soluong = soluongElement.value;
        soluong = parseInt(soluong);
        soluong = (isNaN(soluong) || soluong == 0) ? 1 : soluong;
        render(soluong);

    });
</script> -->