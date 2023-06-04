<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, "phu_kien_shop");

$sql_modify_cate = "SELECT * FROM san_pham WHERE id_sanpham='$_GET[id_sanpham]' LIMIT 1";

$query_modify_cate = mysqli_query($conn, $sql_modify_cate);
?>

<div class="row">
    <h2 class="text-danger">Sửa danh mục sản phẩm</h2>
    <form action="modules/quanlysp/xuly.php?id_sanpham=<?php echo $_GET['id_sanpham'] ?>" method="POST"
        enctype="multipart/form-data">
        <div class="border border-primary p-4">
            <?php
            while ($row = mysqli_fetch_array($query_modify_cate)) {
                ?>
                <div class="d-flex align-items-center">
                    <span class="col-1 fw-bold">
                        Name product:
                    </span>
                    <input class="col-11 px-3 py-2 w-25" value="<?php echo $row['tensanpham'] ?>" type="text" name="tensp">
                </div>
                <div class="d-flex align-items-center mt-3">
                    <span class="col-1 fw-bold">
                        Id product:
                    </span>
                    <input class="col-11 px-3 py-2 w-25" value="<?php echo $row['masp'] ?>" type="text" name="masp">
                </div>

                <div class="d-flex align-items-center mt-3">
                    <span class="col-1 fw-bold">
                        Price product:
                    </span>
                    <input class="col-11 px-3 py-2 w-25" value="<?php echo $row['giasp'] ?>" type="text" name="giasp">
                </div>
                <div class="d-flex align-items-center mt-3">
                    <span class="col-1 fw-bold">
                        Quantity:
                    </span>
                    <input class="col-11 px-3 py-2 w-25" value="<?php echo $row['soluong'] ?>" type="text" name="soluong">
                </div>
                <div class="d-flex align-items-center mt-3">
                    <span class="col-1 fw-bold">
                        Images:
                    </span>
                    <img class="img-fluid" src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>">
                    <input class="col-11 px-3 py-2 w-25" type="file" name="hinhanh">
                </div>
                <div class="d-flex align-items-center mt-3">
                    <span class="col-1 fw-bold">
                        Summary:
                    </span>
                    <textarea rows="5" cols="10" class="col-11 px-3 py-2 w-25" type="text"
                        name="tomtat"><?php echo $row['tomtat'] ?></textarea>
                </div>
                <div class="d-flex align-items-center mt-3">
                    <span class="col-1 fw-bold">
                        Content:
                    </span>
                    <textarea rows="10" cols="10" class="col-11 px-3 py-2 w-25" type="text"
                        name="noidung"><?php echo $row['noidung'] ?></textarea>
                </div>
                <div class="d-flex align-items-center mt-3">
                    <span class="col-1 fw-bold">
                        Status:
                    </span>
                    <?php
                    if ($row['trangthai'] == 1) {
                        ?>
                        <select name="tinhtrang" id="">
                            <option selected value="1">Available</option>
                            <option value="0">Hidden</option>
                        </select>
                        <?php
                    } else {
                        ?>
                        <select name="tinhtrang" id="">
                            <option value="1">Available</option>
                            <option selected value="0">Hidden</option>
                        </select>
                        <?php
                    }
                    ?>
                </div>

                <div class="d-flex align-items-center mt-4">
                    <span class="col-1 fw-bold">
                        Category:
                    </span>
                    <select name="danhmuc">
                        <?php
                        $sql_danhmuc = "select * from danh_muc ORDER BY id_danhmuc";
                        $query_danhmuc = mysqli_query($conn, $sql_danhmuc);
                        while ($dong_loaisp = mysqli_fetch_array($query_danhmuc)) {
                            if ($dong_loaisp['id_danhmuc'] == $row['id_danhmuc']) {
                                ?>
                                <option selected value="<?php echo $dong_loaisp['id_danhmuc'] ?>"><?php echo $dong_loaisp['tendanhmuc'] ?>
                                </option>
                                <?php
                            } else {
                                ?>
                                <option value="<?php echo $dong_loaisp['id_danhmuc'] ?>"><?php echo $dong_loaisp['tendanhmuc'] ?>
                                </option>
                            <?php }
                        }
                        ?>
                    </select>
                </div>
                <?php
            }
            ?>

            <div class="col-12 mt-3">
                <input class="btn btn-primary" name="modify" type="submit" value="Modify Product"></input>
            </div>
        </div>

    </form>
</div>