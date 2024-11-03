
QUẢN LÝ ĐƠN HÀNG


<?php 
$select_donhang =  "SELECT * FROM dathang";
$result_donhang = mysqli_query($conn,$select_donhang);

 

?>


<table>
    <tr>
        <th>ID</th>
        <th>Tên người nhận</th>
        <th>Địa chỉ</th>
        <th>Điện thoại</th>
        <th>Ngày tạo</th>
        <th>In</th>

    </tr>
    <?php while ($row_dh=mysqli_fetch_array($result_donhang)){?>
    <tr>
        <td><?=$row_dh['iddathang']?></td>
        <td><?=$row_dh['tenkh']?></td>
        <td><?=$row_dh['diachi']?></td>
        <td><?=$row_dh['sdt']?></td>
        <td><?=$row_dh['ngaydathang']?></td>
        <td>   <a href="chitietdonhang.php?iddathang=<?php echo $row_dh['iddathang']; ?>" > IN</td>
        
    </tr>
    <?php }?>
</table>


