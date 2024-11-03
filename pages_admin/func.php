<?php 


function layloaisp($conn){
    $selectloai="select * from loai";
    return mysqli_query($conn,$selectloai);
}


function laysp($conn){
    $selectsp="select * from sanpham";
    return mysqli_query($conn,$selectsp);
}





?>