<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, "phu_kien_shop");

$sql_modify_cate = "SELECT * FROM danh_muc WHERE id_danhmuc='$_GET[iddanhmuc]' LIMIT 1";

$query_modify_cate = mysqli_query($conn, $sql_modify_cate);
?>

<div class="row">
    <h2 class="text-danger">Sửa danh mục sản phẩm</h2>
    <form action="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc'] ?>" method="post" enctype="multipart/form-data">
        <div class="border border-primary p-4">
            <?php
            while ($row = mysqli_fetch_array($query_modify_cate)) {
                ?>
                <div class="d-flex align-items-center">
                    <span class="col-1 fw-bold">
                        Tên loại sản phẩm:
                    </span>
                    <input class="col-11 px-3 py-2 w-25" value="<?php echo $row['tendanhmuc'] ?>"
                        placeholder="Tên danh mục..." type="text" name="tendanhmuc">
                </div>
                <div class="d-flex align-items-center mt-3">
                    <span class="col-1 fw-bold">
                        Thứ tự:
                    </span>
                    <input class="col-11 px-3 py-2 w-25" value="<?php echo $row['thutu'] ?>" placeholder="Thứ tự..."
                        type="text" name="thutu">
                </div>
                <?php
            }
            ?>

            <div class="col-12 mt-3">
                <input class="btn btn-primary" name="modifycate" type="submit" value="Modify"></input>
            </div>
        </div>

    </form>
</div>