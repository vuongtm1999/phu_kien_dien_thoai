<?php
$sql_product = "SELECT * FROM san_pham, danh_muc
WHERE san_pham.id_danhmuc = danh_muc.id_danhmuc  AND san_pham.id_sanpham = '$_GET[id]'";
$query_product = mysqli_query($conn, $sql_product);
?>

<style>
    .img-detail-product {
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        padding-top: 75%;
    }
</style>

<div class="row px-6">
    <?php while ($row = mysqli_fetch_array($query_product)) { ?>
        <form method="POST" action="pages/addtocart.php?id=<?php echo $row['id_sanpham']; ?>" class="row g-3">
            <div class="col-6">
                <div class="img-detail-product"
                    style="background-image: url(admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh']; ?>);">
                </div>
            </div>
            <div class="col-6">
                <div class="pt-5">
                    <p>Name product:
                        <span class="text-danger fs-4 fw-bold">
                            <?php echo $row['tensanpham']; ?>
                        </span>
                    </p>
                    <p>Id product:
                        <?php echo $row['id_sanpham']; ?>
                    </p>
                    <p>Price:
                        <?php echo $row['giasp']; ?>
                    </p>
                    <p>Quantity:
                        <?php echo $row['soluong']; ?>
                    </p>
                    <p>Category:
                        <?php echo $row['tendanhmuc']; ?>
                    </p>
                    <div>
                        <input name="addtocart" value="Add to cart" type="submit" class="btn btn-primary"></input>
                    </div>
                </div>
            </div>
        </form>
    <?php } ?>
</div>