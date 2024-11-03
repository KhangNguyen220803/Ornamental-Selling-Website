<link rel="stylesheet" href="../../css/admin.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<?php
include '../../php/database.php';


include '../func.php';



if (isset($_POST['suanhom'])) {


    $tennhom = mysqli_real_escape_string($conn, $_POST['ten']);
    $thutu = mysqli_real_escape_string($conn, $_POST['thutu']);
    $noibat = mysqli_real_escape_string($conn, $_POST['noibat']);



    $insert = "UPDATE loai SET `ten`='$tennhom',`thuTu`='$thutu',`noiBat`='$noibat' WHERE `id`=" . $_GET['id'];


    mysqli_query($conn, $insert);
};
$result = mysqli_query($conn, "SELECT * FROM `loai` WHERE `id`=" . $_GET['id']);

$row = mysqli_fetch_array($result);

?>

<div class="ctn-chitietsanpham center">
<a href="http://localhost:8080/Ornamental%20Selling%20Website/pages_admin/home_admin.php"> <i class="fa-solid fa-house"></i></a>

    <form enctype="multipart/form-data" class="ctn-themsanpham w100 center column" method="post">
        <div class="header-themsp center ali-cen">
            <h3>Sửa nhóm</h3>
        </div>
        <div class="box-themsanpham">

            <div class="body-themsanpham">
                <div class="item-themsp">

                    <p>Tên nhóm</p>

                </div>
                <div class="item-themsp">
                    <input type="text" name="ten" value="<?php echo $row["ten"] ?>">
                </div>
                <div class="item-themsp">
                    <p>Thứ tự</p>
                </div>
                <div class="item-themsp">
                    <input type="text" name="thutu" value="<?php echo $row["thuTu"] ?>">

                </div>


                <div class="item-themsp">
                    <p>Nổi bật</p>
                </div>
                <div class="item-themsp">
                    <input type="checkbox" name="noibat" value="1">

                </div>









            </div>






            <input class="btn_submit" type="submit" name="suanhom" value="Lưu sản phẩm">
        </div>


    </form>

</div>