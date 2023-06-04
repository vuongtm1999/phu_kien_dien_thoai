<?php
session_start();
if ($_SESSION['cart']) {
    echo "<pre>";
    print_r($_SESSION['cart']);
    echo "</pre>";
}
?>
<div class="row px-6">
    <h1>Cart</h1>
</div>