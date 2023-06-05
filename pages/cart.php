<?php
session_start();

?>
<div class="row px-6">
    <h1>Cart page</h1>
    <table class="table table-success table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Id product</th>
                <th scope="col">Name product</th>
                <th scope="col">Image product</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Total price</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_SESSION['cart'])) {
                $i = 0;
                $finalTotal;
                foreach ($$_SESSION['cart'] as $item_cart) {
                    $i++;
                    $totalOfOneProduct = $item_cart['giasp'] * $item_cart['soluong'];
                    $finalTotal += $total;
                    ?>
                    <tr>
                        <th scope="row">
                            <?php echo $i; ?>
                        </th>
                        <td>
                            <?php echo $item_cart['id']; ?>
                        </td>
                        <td>
                            <?php echo $item_cart['tensanpham']; ?>
                        </td>
                        <td>
                            <?php echo $item_cart['hinhanh']; ?>
                        </td>
                        <td>
                            <?php echo $item_cart['soluong']; ?>
                        </td>
                        <td>
                            <?php echo number_format($item_cart['giasp'], 0, ",", ".") . "VND"; ?>
                        </td>
                        <td>
                            <?php echo number_format($total, 0, ",", ".") . "VND"; ?>
                        </td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="6">
                        Final total:
                        <?php echo number_format($finalTotal, 0, ",", ".") . "VND"; ?>
                    </td>
                </tr>
                <?php
            } else {
                ?>
                <span class="badge bg-warning text-dark">Empty cart</span>
            <?php } ?>
        </tbody>
    </table>
</div>