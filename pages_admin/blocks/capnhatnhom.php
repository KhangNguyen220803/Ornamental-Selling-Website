<link rel="stylesheet" href="../../css/main.css">



<?php

$select = "SELECT * from loai";
$result = mysqli_query($conn, $select);
if (isset($_POST['xoa'])) {
    $id=$_POST["id"];

    $xoa = "DELETE FROM loai WHERE id='$id'";

    mysqli_query($conn,  $xoa);
};


?>
<div class="ctn-capnhatsp center">

    <div class="box-capnhatsp">

        <div class="head-capnhatsp space-x border">

            <div class="row center">
                <p>Tên Nhóm</p>
            </div>
        
            <div class="row center">
                <p>Thứ tự</p>
            </div>
            <div class="row center">
                <p>Xem</p>
            </div>
            <div class="row center">
                <p>Sửa</p>
            </div>
            <div class="row center">
                <p>Xóa</p>
            </div>

        </div>

        <?php
       

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <div class="item">
                <div class="label center">
                <?php echo $row["ten"] ?>
                </div>
                <div class="label center">
                <?php echo $row["thuTu"] ?>
                   
                </div>
                <div class="label center">

                    <a href="blocks/chitietnhom.php?id=<?php echo $row["id"] ?>"> Xem </a>
                </div>
                <div class="label center">
                    <a href="blocks/suanhom.php?id=<?php echo $row["id"] ?>"> Sửa </a>

                </div>
                <div class="label center">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $row["id"]?>">
                        <input type="submit" name="xoa" value="Xóa">
                    </form>

                </div>
            </div>


        <?php } ?>
    </div>


</div>