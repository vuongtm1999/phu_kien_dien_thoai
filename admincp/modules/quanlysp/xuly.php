<?php
include('../../config/config.php');

$tensp = $_POST['tensp'];
$masp = $_POST['masp'];
$giasp = $_POST['giasp'];
$soluong = $_POST['soluong'];
$hinhanh = $_FILES['hinhanh']['name'];

$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$tomtat = $_POST['tomtat'];
$noidung = $_POST['noidung'];
$trangthai = $_POST['tinhtrang'];
$danhmuc = $_POST['danhmuc'];
// $giadexuat=$_POST['giadexuat'];
// $giagiam=$_POST['giagiam'];
// $nhasx=$_POST['nhasx'];
// $trang=$_GET['trang'];

if (isset($_POST['themsanpham'])) {
    $hinhanh = time() . '-' . $hinhanh;
    $sql_them = "INSERT INTO san_pham(tensanpham, masp, giasp, soluong, hinhanh, tomtat, noidung, trangthai, id_danhmuc) 
    VALUES ('" . $tensp . "', '" . $masp . "', '" . $giasp . "', '" . $soluong . "', '" . $hinhanh . "', 
    '" . $tomtat . "', '" . $noidung . "', '" . $trangthai . "', '".$danhmuc."') ";

    mysqli_query($conn, $sql_them);
    move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh);

    header('Location:../../index.php?p=quanlysp&query=add');
} else if (isset($_POST['modify'])) {
    $id = $_GET['id_sanpham'];
    //

    if ($hinhanh != '') {
        $sql = "SELECT * FROM san_pham WHERE id_sanpham='" . $id . "' LIMIT 1";
        $query = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($query)) {
            unlink('uploads/' . $row['hinhanh']);
        }

        $hinhanh = time() . '-' . $hinhanh;
        $sql_update = "UPDATE san_pham SET tensanpham='" . $tensp . "', masp='" . $masp . "',  
        giasp='" . $giasp . "', soluong='" . $soluong . "', 
        hinhanh='" . $hinhanh . "', tomtat='" . $tomtat . "', noidung='" . $noidung . "', trangthai='" . $trangthai . "',
        id_danhmuc='".$danhmuc."'
        WHERE id_sanpham ='" . $id . "' ";

        mysqli_query($conn, $sql_update);
        move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh);
    } else {
        $sql_update = "UPDATE san_pham SET tensanpham='" . $tensp . "', masp='" . $masp . "',  
        giasp='" . $giasp . "', soluong='" . $soluong . "', 
        tomtat='" . $tomtat . "', noidung='" . $noidung . "', trangthai='" . $trangthai . "',
        id_danhmuc='".$danhmuc."'
        WHERE id_sanpham ='" . $id . "' ";
        mysqli_query($conn, $sql_update);
    }


    header('Location:../../index.php?p=quanlysp&query=add');
} else {
    $id = $_GET['id_sanpham'];
    $hinhanh = time() . '-' . $hinhanh;
    // 
    $sql = "SELECT * FROM san_pham WHERE id_sanpham='" . $id . "' LIMIT 1";
    $query = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($query)) {
        unlink('uploads/' . $row['hinhanh']);
    }
    $sql_xoa = "DELETE FROM san_pham WHERE id_sanpham ='" . $id . "' ";
    mysqli_query($conn, $sql_xoa);
    header('Location:../../index.php?p=quanlysp&query=add');
}
?>