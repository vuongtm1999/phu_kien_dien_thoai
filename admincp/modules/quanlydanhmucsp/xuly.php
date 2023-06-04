<?php 
    include("../../config/config.php");

    $tenloaisp = $_POST['tendanhmuc'];
    $thutu = $_POST['thutu'];

    if(isset($_POST['themdanhmuc'])) {
        $sql_them = "INSERT INTO danh_muc(tendanhmuc, thutu) VALUES ('".$tenloaisp."', '".$thutu."')";
        mysqli_query($conn, $sql_them);

        header('Location:../../index.php?p=quanlydanhmucsp&query=add');
    } else if (isset($_POST['modifycate'])) {
        $id = $_GET['iddanhmuc'];
        //
        $sql_update = "UPDATE danh_muc SET tendanhmuc='".$tenloaisp."', thutu='".$thutu."'  WHERE id_danhmuc ='".$id."' ";
        mysqli_query($conn, $sql_update);
        header('Location:../../index.php?p=quanlydanhmucsp&query=add');
    } else {
        $id = $_GET['iddanhmuc'];
        // 
        $sql_xoa = "DELETE FROM danh_muc WHERE id_danhmuc ='".$id."' ";
        mysqli_query($conn, $sql_xoa);
        header('Location:../../index.php?p=quanlydanhmucsp&query=add');
    }
?>