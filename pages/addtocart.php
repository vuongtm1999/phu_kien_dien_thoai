<?php
session_start();
include('../admincp/config/config.php');
// them so luong
// tru so luong
// xoa san pham
// xoa tat sp
if (isset($_GET["delateall"]) && $_GET["delateall"] == 1) {
    unset($_SESSION["cart"]);
    header("Location: ../index.php?p=cart");
}
// them san pham vao gio hang
if (isset($_POST['addtocart'])) {
    // session_destroy();
    
    $id = $_GET['id'];
    $soluong = 1;
    $sql = "SELECT * FROM san_pham WHERE id_sanpham='" . $id . "' LIMIT 1";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);

    if ($row) {
        $new_product = array(
            array(
                'tensanpham' => $row['tensanpham'],
                'id' => $id,
                'soluong' => $soluong,
                'giasp' => $row['giasp'],
                'hinhanh' => $row['hinhanh'],
                'masp' => $row['masp']
            )
        );

        // kiem tra session gio hang ton tai
        if (isset($_SESSION['cart'])) {
            $found = false;

            foreach ($_SESSION['cart'] as $cart_item) {
                echo "Session before: <br>";
                echo print_r($_SESSION['cart']) . "<br>";
                if ($cart_item['id'] == $id) {
                    $soluong = $cart_item['soluong'] + 1;
                    $product[] = array(
                        'tensanpham' => $cart_item['tensanpham'],
                        'id' => $cart_item['id'],
                        'soluong' => $soluong,
                        'giasp' => $cart_item['giasp'],
                        'hinhanh' => $cart_item['hinhanh'],
                        'masp' => $cart_item['masp']
                    );
                    $found = true;
                } else {
                    $product[] = array(
                        'tensanpham' => $cart_item['tensanpham'],
                        'id' => $cart_item['id'],
                        'soluong' => $cart_item['soluong'],
                        'giasp' => $cart_item['giasp'],
                        'hinhanh' => $cart_item['hinhanh'],
                        'masp' => $cart_item['masp']
                    );
                }
            }

            echo $found . "<br>";

            if ($found == false) {
                $_SESSION['cart'] = array_merge($product, $new_product);
            } else {
                $_SESSION['cart'] = $product;
            }
        } else {
            $_SESSION['cart'] = $new_product;
        }

        echo "Session after: <br>";
        echo print_r($_SESSION['cart']) . "<br>";
    }
    // header('Location:../index.php?p=cart');
}
?>

<div class="row px-6">
    <h1>Add to cart</h1>

</div>