<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, "phu_kien_shop");

$sql_list_cate = "SELECT * FROM danh_muc ORDER BY thutu DESC";

$query_list_cate = mysqli_query($conn, $sql_list_cate);
?>

<div class="row pt-4">
    <h2 class="text-success fw-bold">List categories</h2>
    <table class="table" style="border-collapse: collapse">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name cate</th>
                <th scope="col">Order</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($query_list_cate)) {
                $i++;
                ?>
                <tr>
                    <td>
                        <?php echo $i ?>
                    </td>
                    <td>
                        <?php echo $row['tendanhmuc'] ?>
                    </td>
                    <td>
                        <?php echo $row['thutu'] ?>
                    </td>
                    <td>
                        <a class="btn btn-danger"
                            href="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $row['id_danhmuc'] ?>">
                            Delete
                        </a>
                        <span class="mx-2"></span>
                        <a class="btn btn-warning" 
                            href="?p=quanlydanhmucsp&query=modify&iddanhmuc=<?php echo $row['id_danhmuc'] ?>">
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