<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="../css/layout.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/search.css">
    <link rel="stylesheet" href="../css/products.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>

    <?php
    include '../php/database.php';

    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }

    $er = false;
    $success = false;


    if (isset($_GET['action'])) {


        function updatecart($add = false)
        {
            foreach ($_POST['quantity'] as $id => $quantity) {
                if ($quantity == 0) {
                    unset($_SESSION["cart"][$id]);
                } elseif ($quantity < 0) {

                    $quantity == 1;
                } else {
                    if ($add) {
                        $_SESSION["cart"][$id] += $quantity;
                    } else {
                        $_SESSION["cart"][$id] = $quantity;
                    }
                }
            }
        }
        switch ($_GET['action']) {


            case "add":
                updatecart(true);
                header('Location:./cart.php');
                break;

            case "delete":
                if (isset($_GET['id'])) {
                    unset($_SESSION["cart"][$_GET['id']]);
                }
                header('Location:./cart.php');
                break;

            case "submit":
                if (isset($_POST['update_click'])) {
                    updatecart();
                    header('Location:./cart.php');
                } elseif ($_POST['order_click']) {

                    if (empty($_POST['name'])) {
                        $er = "Bạn chưa nhập tên người nhận!";
                    } elseif (empty($_POST['phone'])) {
                        $er = "Bạn chưa nhập số điện thoại người nhận!";
                    } elseif (empty($_POST['address'])) {
                        $er = "Bạn chưa nhập địa chỉ người nhận!";
                    } elseif (empty($_POST['quantity'])) {
                        $er = "Giỏ hàng rỗng ";
                    }
                    if ($er == false && isset($_POST['quantity'])) {

                        $products = mysqli_query($conn, "SELECT * FROM sanpham WHERE id IN (" . implode(",", array_keys($_POST['quantity'])) . ")");

                        $total = 0;
                        $orderProducts = array();
                        while ($row = mysqli_fetch_array($products)) {
                            $orderProducts[] = $row;
                            $total += $row['gia'] * $_POST['quantity'][$row['id']];
                        }



                        $date = date('d-m-y h:i:s');
                        echo $date;




                        $insert_order =  mysqli_query($conn, "INSERT INTO `dathang` (`iddathang`, `ngaydathang`, `tonggia`, `tenkh`, `sdt`, `diachi`, `ghichu`) 
                        VALUES (NULL,'$date', '123000', '" . $_POST['name'] . "', '" . $_POST['phone'] . "', '" . $_POST['address'] . "', '" . $_POST['note'] . "')");
                        // var_dump($conn->insert_id);exit;
                        $Order_ID = $conn->insert_id;


                        $insertString = "";
                        foreach ($orderProducts as $key => $products) {
                            $insertString .= "('" . $Order_ID . "', '" . $products['id'] . "', '$date', '" . $_POST['quantity'][$products['id']] . "', '" . $products['gia'] . "')";
                            if ($key != count($orderProducts) - 1) {
                                $insertString .= ",";
                            }
                        }
                        // $insertString =  "('".$Order_ID."', '97', '2024-02-02', '3', '120000'), ('".$Order_ID."', '96', '2024-02-05', '2', '100000')";
                        $insert_order =  mysqli_query($conn, "INSERT INTO `chitietdathang` (`iddathang`, `idsanpham`, `ngaydathang`, `soluong`, `gia`)
                        VALUES " . $insertString . " ;");
                        $success = "Đặt hàng thành công";
                        unset($_SESSION['cart']);
                    }
                }
                break;
        }
    }


    if (!empty($_SESSION["cart"])) {
        $products = mysqli_query($conn, "SELECT * FROM sanpham WHERE id IN (" . implode(",", array_keys($_SESSION["cart"])) . ")");
    }
    ?>

    <div class="search">
        <?php include("search.php") ?>
    </div>

    <div class="menu">
        <?php include("menu.php") ?>
    </div>



    <?php if (isset($er) && $er == true) {
    ?>
        <div class="div100 center-box">


            <p class="er">

                <?php

                if (!empty($er)) {
                    echo $er;
                } else {
                    echo "";
                }

                ?><a href="javascript:history.back()">Quay lại</a>

            </p>

        </div>
    <?php } elseif (!empty($success)) { ?>
        <div class="div100 center-box">
            <div class="er">
                <!-- <?= $success ?>. <a href="index.php">Tiếp tục mua hàng</a> -->
                <?= $success ?>.<a href="http://localhost:8080/Ornamental%20Selling%20Website/index.php?pages_guests=products">Tiếp tục mua hàng</a>
            </div>
        </div>
    <?php } else { ?>



        <div class="ctn-cart center-box">
            <h3 class="title_cart">Giỏ hàng</h3>

            <form class="w100 center-box" action="cart.php?action=submit" method="POST">

                <table>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Ảnh sản phẩm </th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th>Xóa</th>


                    </tr>

                    <?php

                    if (isset($products)) {
                        $total = 0;
                        $nums = 1;
                        while ($row = mysqli_fetch_array($products)) {

                    ?>

                            <tr>
                                <td><?= $nums++; ?></td>
                                <td><?= $row['ten'] ?></td>
                                <td><img class="" src="../img/<?= $row['hinh'] ?>"></td>
                                <td><?= number_format($row['gia'], 0, ",", ".")  ?></td>
                                <td><input type="text" class="inp_quantity" name="quantity[<?= $row['id'] ?>]" id="" value="<?= $_SESSION["cart"][$row['id']] ?>"></td>
                                <td><?= number_format($row['gia'] * $_SESSION["cart"][$row['id']], 0, ",", ".")  ?></td>
                                <td><a href="cart.php?action=delete&id=<?= $row['id'] ?>">Xóa</a></td>

                            </tr>

                        <?php
                            $total += $row['gia'] * $_SESSION["cart"][$row['id']];
                            $nums++;
                        } ?>

                        <tr>
                            <th></th>
                            <th>Tong tien</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th> <?= number_format($total, 0, ",", ".") ?> </th>
                            <th></th>



                        </tr>


                    <?php
                    }
                    ?>



                </table>

                <div id="form-btn">
                    <input type="submit" name="update_click" id="" value="Cập nhật">
                </div>

                <div class="box-inf-cart">



                    <div class="row-inf">
                        <label for="">Tên người nhận</label>
                        <input type="text" name="name" id="">
                    </div>
                    <div class="row-inf">
                        <label for="">Điện thoại</label>
                        <input type="text" name="phone" id="">
                    </div>
                    <div class="row-inf">
                        <label for="">Địa chỉ</label>
                        <input type="text" name="address" id="">
                    </div>
                    <div class="row-inf ">
                        <label for="">Ghi chú</label>
                        <input type="text" name="note" id="" class="inf-note">
                    </div>

                </div>
                <input type="submit" name="order_click" value="Đặt hàng">

            </form>

            <?php

            // $result = mysqli_query($conn, "SELECT * FROM `sanpham` WHERE `id`=" . $_GET['id']);



            ?>


            <!-- <div class="ctn-detail center_detail">
        <?php while ($row = mysqli_fetch_array($result)) { ?>

            <div class="box-pro-detail ">

                <div class="box_img_detail ">

                    <img class="img_detail" src="../img/<?= $row['hinh'] ?>">

                </div>

                <div class="box-mota">
                    <div class="ten ">
                        <p class="font20">  <?php echo $row['ten']; ?></p>

                    </div>

                    <div class="gia font20" >
                        <?php echo "Giá:  " . $row['gia'] . "đ"; ?>



                    </div>






                    <div class="box_soluong">
                        <p class="font20">Số lượng</p>
                        <button id="tru" onclick="handleMinus()">-</button>
                        <input id="soluong" type="text" value="1">
                        <button id="cong" onclick="handlePlus()">+</button>



                    </div>

                    <a href="#" class="font20 btn_submit">Mua Ngay</a>
                </div>

            <?php } ?>


            </div> -->




        </div>
</body>

</html>


<?php } ?>