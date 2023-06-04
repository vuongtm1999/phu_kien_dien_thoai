<?php
if (isset($_GET['p']) && $_GET['query']) {
    $tam = $_GET['p'];
    $query = $_GET['query'];
} else {
    $tam = '';
    $query = '';
}

if ($tam == 'quanlydanhmucsp' && $query == 'add') {
    require "quanlydanhmucsp/them.php";
    require "quanlydanhmucsp/lietke.php";
} else if ($tam == 'quanlydanhmucsp' && $query == 'modify') {
    require "quanlydanhmucsp/sua.php";
} else if ($tam == 'quanlysp' && $query == 'add') {
    require "quanlysp/them.php";
    require "quanlysp/lietke.php";
} else if ($tam == 'quanlysp' && $query == 'modify') {
    require "quanlysp/sua.php";
} else {
    require "dashboard.php";
}
?>