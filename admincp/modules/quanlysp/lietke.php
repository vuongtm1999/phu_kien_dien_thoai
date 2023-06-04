<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, "phu_kien_shop");

$sql_list_product = "SELECT * FROM san_pham,danh_muc WHERE san_pham.id_danhmuc = danh_muc.id_danhmuc 
ORDER BY id_sanpham DESC";

$query_list_product = mysqli_query($conn, $sql_list_product);
?>

<style>
    .bi-dot::before {
        vertical-align: top;
        -webkit-text-stroke-width: 8px;
        font-size: 24px;
    }
</style>

<div class="row pt-4">
    <h2 class="text-success fw-bold">List products</h2>
    <table class="table" style="border-collapse: collapse">
        <thead>
            <tr>
                <th scope="col">Id product</th>
                <th scope="col">Name product</th>
                <th scope="col">Images</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Summary</th>
                <th scope="col">Status</th>
                <th scope="col">Id category</th>
                <th scope="col">Mange</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;

            while ($row = mysqli_fetch_array($query_list_product)) {
                $i++;
                ?>
                <tr>
                    <td>
                        <?php echo $row['masp'] ?>
                    </td>
                    <td>
                        <?php echo $row['tensanpham'] ?>
                    </td>
                    <td>
                        <div class="my-2">
                            <img style="max-width: 300px;" class="img-fluid"
                                src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" alt="Img san pham">
                        </div>
                    </td>
                    <td>
                        <?php echo $row['giasp'] ?>
                    </td>
                    <td>
                        <?php echo $row['soluong'] ?>
                    </td>
                    <td class="text-truncate" style="max-width: 150px;">
                        <?php echo $row['tomtat'] ?>
                    </td>
                    <td>
                        <?php
                        if ($row['trangthai'] == 1) {
                            echo "<i class='bi bi-dot text-success'></i>" . "Available";

                        } else {
                            echo "<i class='bi bi-dot text-black-50'></i>" . "Disabled";
                        }
                        ?>
                    </td>
                    <td>
                        <?php echo $row['tendanhmuc'] ?>
                    </td>
                    <td>
                        <a class="btn btn-danger"
                            href="modules/quanlysp/xuly.php?id_sanpham=<?php echo $row['id_sanpham'] ?>">
                            Delete
                        </a>
                        <span class="mx-2"></span>
                        <a class="btn btn-warning"
                            href="?p=quanlysp&query=modify&id_sanpham=<?php echo $row['id_sanpham'] ?>">
                            Modify
                        </a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>