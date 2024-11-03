
<link rel="stylesheet" href="../css/admin.css">
<?php

include '../php/database.php';
session_start();



?>

<link rel="stylesheet" href="../css/main.css">



<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $username = mysqli_real_escape_string($conn, $_POST['username']);

    $pass = mysqli_real_escape_string($conn,  md5($_POST['pass']));

    $select = " SELECT * FROM taikhoan WHERE user = '$username' AND pass = '$pass' ";


    $result = mysqli_query($conn, $select);


    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['user'];
        header('location:/Ornamental Selling Website/pages_admin/home_admin.php');
        // header('https://khangbonsai.000webhostapp.com/pages_admin/home_admin.php');

    } else {
        $error[] = 'Wrong account';
    }
}

?>


<div class="ctn-full">


    <form class="ctn-login" method="post">
        <div class="header-login center">
            <h3>Login</h3>
        </div>
        <div class="item_login">
            <p>Username</p>
            <input class="input" type="text" name="username">
        </div>
       
        <div class="item_login">
            <p>Passworld</p>
            <input class="input" type="passworld" name="pass">
        </div>

        <div class="footer-login">
            <input class="log-btn"type="submit" name="post-acc" value="Go">
        </div>
    </form>




</div>