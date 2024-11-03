<?php
include './php/database.php';

?>

<div class="container-product">
    <div class="type-product">
        <h3>Chậu cây</h3>
    </div>


    <div class="box-lap">
        <div class="box-pro">
            <?php
            $select = "SELECT sanpham.hinh, sanpham.ten, sanpham.gia, sanpham.id from sanpham,loai WHERE sanpham.loai=loai.id AND loai.ten='Chậu' limit 4";
            $result = mysqli_query($conn, $select);



            while ($row = mysqli_fetch_array($result)) {




            ?>
                <div class="display-product">
                    <div class="products_flex_box">
                        <div class="item label_img">
                            <img class="img-lap" src="img/<?= $row['hinh'] ?>" alt="">
                        </div>
                        <div class="item">
                            <p class="name-product"><?= $row['ten'] ?></p>
                        </div>
                        <div class="item item50">
                            <div class="box-price">
                                <P><?= $row['gia'] ?></P>
                            </div>
                            <div class="box-buy">
                            <a href="pages_guests/detail_product.php?id=<?php echo $row['id']; ?>" > Mua ngay 
                            </div>
                        </div>

                    </div>
                </div>
            <?php
            }

            ?>
        </div>
    </div>
</div>