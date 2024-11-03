<?php

// include '../database.php';


if (isset($_POST['themnhom'])) {


    $tennhom = mysqli_real_escape_string($conn, $_POST['tennhom']);
    $thutu = mysqli_real_escape_string($conn, $_POST['thutu']);
    $noibat = mysqli_real_escape_string($conn, $_POST['noibat']);



    $insert = "INSERT INTO loai( `ten`, `noiBat`, `thuTu`) 
    VALUES('$tennhom', '$noibat', '$thutu')";

    mysqli_query($conn, $insert);
};


?>


<form class="ctn-themnhom" method="post">

    <div class="box-themnhom">
  
        <div class="item-themnhom center header-themnhom">
            <h2>Thêm nhóm</h2>
        </div>



        <div class="item-themnhom box50">
            <div class="ali-cen">
                <p>Tên nhóm</p>
            </div>
            <div class="ali-cen">
                <p>Thứ tự</p>
            </div>
        </div>
        <div class="item-themnhom box50">
            <input class="input " type="text" name="tennhom" id="">
            <input class="input " type="text" name="thutu" id="">
        </div>
        <div class="item-themnhom">
            <input type="checkbox" name="noibat">Nổi bật
        </div>
        <div class="item-themnhom">
            <input class="themnhom-btn" type="submit" name="themnhom" value="Thêm">
        </div>
    </div>

</form>


