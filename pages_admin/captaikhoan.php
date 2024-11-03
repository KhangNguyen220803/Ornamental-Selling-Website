<link rel="stylesheet" href="../css/admin.css">
<?php
include '../php/database.php';
session_start();

$usernameSS = $_SESSION['username'];
// if (!isset($username))
//     header('location:login.php');

?>



<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $ho = mysqli_real_escape_string($conn, $_POST['ho']);
    $ten = mysqli_real_escape_string($conn, $_POST['ten']);
    $gioitinh = mysqli_real_escape_string($conn, $_POST['gioitinh']);
   


    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);

    $pass = mysqli_real_escape_string($conn,  md5($_POST['pass']));

    $select = " SELECT * FROM taikhoan WHERE user = '$usernameSS'";


    $result = mysqli_query($conn, $select);


    if (mysqli_num_rows($result) > 0) {

        $select_update = mysqli_query($conn, "UPDATE taikhoan SET  ho='$ho' , ten='$ten' , gioitinh='$gioitinh' , email='$email' , user='$username' , pass = '$pass' WHERE user = '$usernameSS'");
        header('location:login.php');
    } else {
        $errorChange[] = 'Wrong account';
    }
};

?>
<link rel="stylesheet" href="../css/main.css">


<div class="ctn-full">

    <form method="post" class="ctn-captaikhoan">


        <div class="item-ctk head-ctk center pad0">
            <h3>Cấp tài khoản</h3> 
             <a class="comeback pad30" href="http://localhost:8080/Ornamental%20Selling%20Website/pages_admin/home_admin.php"> Trở về trang chủ</a>

        </div>

        <div class="ctn-content-ctk">
            <div class="item-ctk box50">
                <div class="ali-cen">
                    <p>Họ</p>
                </div>
                <div class="ali-cen">
                    <p>Tên</p>
                </div>
            </div>
            <div class="item-ctk box50 ">
                <input class="input w100" type="text" name="ho">
                <input class="input w100" type="text" name="ten">
            </div>
            <div class="item-ctk">
                <p>Chọn giới tính</p>
            </div>
            <div class="item-ctk box50">
                <div><input type="checkbox" name="gioitinh" value="1">Nam</div>

                <div><input type="checkbox" name="gioitinh" value="2">Nữ</div>
            </div>
            <div class="item-ctk">
                <p>Email</p>
            </div>
            <div class="item-ctk ">
                <input class="input w100" type="text" name="email">
            </div>
            <div class="item-ctk">
                <p>Tài khoản</p>
            </div>
            <div class="item-ctk">

                <input class="input w100" type="text" name="username">

            </div>
            <div class="item-ctk">
                <p>Mật khẩu</p>
            </div>
            <div class="item-ctk">
                <input class="input w100" type="passworld" name="pass">

            </div>
            <div class="item-ctk center ">
                <input class="tao-btn" type="submit" name="tao" value="Tạo">
            </div>


        </div>
    </form>
</div>