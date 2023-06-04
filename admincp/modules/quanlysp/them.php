<?php
$servername = "localhost";
$username = "root";
$password = "";
$csdl = "phu_kien_shop";


// Create connection
$conn = new mysqli($servername, $username, $password, $csdl);

$sql_list_cate = "SELECT * FROM san_pham ORDER BY id_sanpham DESC";

$query_list_cate = mysqli_query($conn, $sql_list_cate);
?>

<div class="row">
    <h2 class="text-success fw-bold">Add product</h2>
    <form action="modules/quanlysp/xuly.php" method="post" enctype="multipart/form-data">
        <div class="border border-primary p-4">
            <div class="d-flex align-items-center">
                <span class="col-1 fw-bold">
                    Name product:
                </span>
                <input class="col-11 px-3 py-2 w-25" type="text" name="tensp">
            </div>
            <div class="d-flex align-items-center mt-3">
                <span class="col-1 fw-bold">
                    Id product:
                </span>
                <input class="col-11 px-3 py-2 w-25" type="text" name="masp">
            </div>
            <div class="d-flex align-items-center mt-3">
                <span class="col-1 fw-bold">
                    Price product:
                </span>
                <input class="col-11 px-3 py-2 w-25" type="text" name="giasp">
            </div>
            <div class="d-flex align-items-center mt-3">
                <span class="col-1 fw-bold">
                    Quantity:
                </span>
                <input class="col-11 px-3 py-2 w-25" type="text" name="soluong">
            </div>
            <div class="d-flex align-items-center mt-3">
                <span class="col-1 fw-bold">
                    Images:
                </span>
                <input class="col-11 px-3 py-2 w-25" type="file" name="hinhanh">
            </div>
            <div class="d-flex align-items-center mt-3">
                <span class="col-1 fw-bold">
                    Summary:
                </span>
                <textarea rows="5" cols="10" class="col-11 px-3 py-2 w-25" type="text" name="tomtat"></textarea>
            </div>
            <div class="d-flex align-items-center mt-3">
                <span class="col-1 fw-bold">
                    Content:
                </span>
                <textarea rows="10" cols="10" class="col-11 px-3 py-2 w-25" type="text" name="noidung"></textarea>
            </div>
            <div class="d-flex align-items-center mt-4">
                <?php
                $sql_loaisp = "select id_danhmuc,tendanhmuc from danh_muc";
                $row_loaisp = mysqli_query($conn, $sql_loaisp);
                ?>
                <span class="col-1 fw-bold">
                    Category:
                </span>
                <select name="danhmuc">
                    <?php
                    while ($dong_loaisp = mysqli_fetch_array($row_loaisp)) {
                        ?>
                        <option value="<?php echo $dong_loaisp['id_danhmuc'] ?>"><?php echo $dong_loaisp['tendanhmuc'] ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </div>

            <div class="d-flex align-items-center mt-4">
                <span class="col-1 fw-bold">
                    Status:
                </span>
                <select name="tinhtrang" id="">
                    <option selected value="1">Available</option>
                    <option value="0">Hidden</option>
                </select>
            </div>


            <div class="col-12 mt-3">
                <input class="btn btn-primary" name="themsanpham" type="submit" value="Thêm sản phẩm"></input>
            </div>
        </div>

    </form>
</div>