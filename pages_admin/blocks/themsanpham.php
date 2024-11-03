<link rel="stylesheet" href="../../css/admin.css">

<?php







if (isset($_POST['themsanpham'])) {


    $tensanpham = mysqli_real_escape_string($conn, $_POST['ten']);
    $giasanpham = mysqli_real_escape_string($conn, $_POST['gia']);


    // $hinhsanpham = mysqli_real_escape_string($conn, $_POST['hinh']);
    move_uploaded_file($_FILES["hinh"]["tmp_name"], "../img/" . $_FILES["hinh"]["name"]);
    $hinhsanpham = $_FILES["hinh"]["name"];





    $motasanpham = mysqli_real_escape_string($conn, $_POST['mota']);
    $loaisanpham = mysqli_real_escape_string($conn, $_POST['loai']);




    $insert = "INSERT INTO sanpham( `ten`, `gia`, `hinh`,`moTa`,`loai`) 
    VALUES('$tensanpham', '$giasanpham', '$hinhsanpham','$motasanpham','$loaisanpham')";

    mysqli_query($conn, $insert);
};


?>


<form enctype="multipart/form-data" class="ctn-themsanpham w100 center column" method="post">
    <div class="header-themsp center ali-cen">
        <h3>Thêm sản phẩm</h3>
    </div>
    <div class="box-themsanpham">

        <div class="body-themsanpham">
            <div class="item-themsp">
                <p>Tên sản phẩm</p>

            </div>
            <div class="item-themsp">
                <input type="text" name="ten">
            </div>
            <div class="item-themsp">
                <p>Giá sản phẩm</p>
            </div>
            <div class="item-themsp">
                <input type="text" name="gia">

            </div>
            <div class="item-themsp">
                <p>Hình sản phẩm</p>
            </div>
            <div class="item-themsp">
                <input type="file" name="hinh">

            </div>
            <div class="item-themsp">
                <p>Mô tả</p>
            </div>
            <div class="item-themsp">
                <input type="text" name="mota">

            </div>
            <div class="item-themsp">
                <p>Loại sản phẩm</p>
            </div>
            <div class="item-themsp">
                <select name="loai">
                    <?php
                    $loaisp = layloaisp($conn);
                    while ($r = mysqli_fetch_array($loaisp)) {
                    ?>

                        <option value="<?php echo $r["id"] ?>"><?php echo $r["ten"] ?></option>



                    <?php } ?>







                </select>


            </div>



        </div>


        <input class="btn_submit" type="submit" name="themsanpham" value="Lưu sản phẩm">
    </div>


</form>