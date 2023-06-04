<?php
$sql_list_products = "SELECT * FROM san_pham WHERE san_pham.id_danhmuc = '$_GET[id]' 
ORDER BY id_sanpham DESC";
$sql_cate = "SELECT * FROM danh_muc WHERE danh_muc.id_danhmuc = '$_GET[id]' LIMIT 1";

$query_list_products = mysqli_query($conn, $sql_list_products);

$title_cate = mysqli_fetch_array(mysqli_query($conn, $sql_cate))

?>


<div class="row px-6 pt-4 g-4">
    <h3>
        List products of
        <span class="text-danger">
            <?php
                echo $title_cate['tendanhmuc'];
            ?>
        </span>
    </h3>
    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query_list_products)) {
        $i++;
        ?>
        <div class="col-4">
            <div class="card" style="width: 18rem;">
                <img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">
                        <?php echo $row['tensanpham']; ?>
                    </h5>
                    <p class="card-text">
                    Giá: <?php echo $row['giasp'].' VND'; ?>
                    </p>
                    <p class="card-text">
                        <?php echo $row['tomtat']; ?>
                    </p>
                    <a href="?p=detailproduct&id=<?php echo $row['id_sanpham']; ?>" class="btn btn-primary">Detail this product</a>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>