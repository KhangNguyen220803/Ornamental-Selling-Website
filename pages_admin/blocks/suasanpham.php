<link rel="stylesheet" href="../../css/admin.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<?php
include '../../php/database.php';


include '../func.php';


if(isset($_GET["id"]))
{
    $number_pr = $_GET["id"];

    $select_rm = "SELECT * FROM `sanpham` WHERE `id` = '$number_pr'";
    $result_rm = mysqli_query($conn, $select_rm);
    $row_rm = mysqli_fetch_array($result_rm);


}
if (isset($_POST['themsanpham'])) {


    $tensanpham = mysqli_real_escape_string($conn, $_POST['ten']);
    $giasanpham = mysqli_real_escape_string($conn, $_POST['gia']);


    if(empty($_FILES['hinh']['name'])){
        $hinhsanpham = $row_rm['hinh'];
    }
    else{
        $hinhsanpham = $_FILES['hinh']['name'];
    }

    // move_uploaded_file($_FILES["hinh"]["tmp_name"], "../../img/" . $_FILES["hinh"]["name"]);
    // $hinhsanpham = $_FILES["hinh"]["name"];
    




    $motasanpham = mysqli_real_escape_string($conn, $_POST['mota']);
    $loaisanpham = mysqli_real_escape_string($conn, $_POST['loai']);




    $update = "UPDATE sanpham SET `ten`='$tensanpham', `gia`='$giasanpham', `hinh`='$hinhsanpham',`moTa`='$motasanpham',`loai`='$loaisanpham' WHERE `id`=" . $_GET['id'];


    mysqli_query($conn, $update);
};
$result = mysqli_query($conn, "SELECT * FROM `sanpham` WHERE `id`=" . $_GET['id']);

$row = mysqli_fetch_array($result);




?>

<div class="ctn-chitietsanpham center">
<a href="http://localhost:8080/Ornamental%20Selling%20Website/pages_admin/home_admin.php"> <i class="fa-solid fa-house"></i></a>

<form enctype="multipart/form-data" class="ctn-themsanpham w100 center column" method="post">
    <div class="header-themsp center ali-cen">
        <h3>Sửa sản phẩm</h3>
    </div>
    <div class="box-themsanpham">

        <div class="body-themsanpham">
            <div class="item-themsp">

                <p>Tên sản phẩm</p>

            </div>
            <div class="item-themsp">
                <input type="text" name="ten" value="<?php echo $row["ten"] ?>">
            </div>
            <div class="item-themsp">
                <p>Giá sản phẩm</p>
            </div>
            <div class="item-themsp">
                <input type="text" name="gia" value="<?php echo $row["gia"] ?>">

            </div>
            <div class="item-themsp">
                <p>Hình sản phẩm </p>
            </div>
            <div class="item-themsp">
                <input type="hidden" name="hinh" value="<?php echo $row["hinh"] ?>">
                <input type="file" name="hinh">

            </div>
            <div class="item-themsp">
                <p>Mô tả</p>
            </div>
            <div class="item-themsp">
                <input type="text" name="mota" value=" <?php echo $row["moTa"] ?>">

            </div>
            <div class="item-themsp">
                <p>Loại sản phẩm</p>
            </div>
            <div class="item-themsp">
                <select name="loai">
                    <?php
                    $resultloaisphientai = mysqli_query($conn, "SELECT loai.ten,loai.id FROM sanpham,loai WHERE sanpham.loai=loai.id AND sanpham.id=" . $_GET['id']);

                    $rowsphientai = mysqli_fetch_array($resultloaisphientai);

                    $loaisp = layloaisp($conn);
                    while ($r = mysqli_fetch_array($loaisp)) {
                    ?>
                        <option value="<?php echo $r["id"] ?>" selected> <?php echo $r["ten"] ?></option>


                    <?php } ?>

                    <option value="<?php echo $rowsphientai["id"] ?>" selected> <?php echo $rowsphientai["ten"] ?></option>





                </select>


            </div>



        </div>


        <input class="btn_submit" type="submit" name="themsanpham" value="Lưu sản phẩm">
    </div>


</form>
</div>