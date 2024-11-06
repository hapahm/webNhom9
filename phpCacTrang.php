<!-- HEADER -->
<?php //session_start(); ?>

<!-- Giỏ hàng -->
<a href="./cart.php">
    <i class="fa fa-shopping-bag"></i>
    <span>
        <?php
        $cart = [];
        if (isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
        }
        // print_r($cart);exit;
        $count = 0;  //hien thi so luong san pham trong gio hang
        $tongtien = 0;
        foreach ($cart as $item) {
            $count += $item['qty'];
            $tongtien += $item['qty'] * $item['disscounted_price'];
        }
        //hien thi so luong
        echo $count;
        ?>
    </span>
</a>

<!-- Hiển thị Tổng tiền sản phẩm trong giỏ -->
<div class="header__cart__price">Tổng tiền:
    <span><?= number_format($tongtien, 0, '', '.') . " VNĐ" ?></span>
</div>

<!-- Check: là trang chủ thì sổ thanh menu xuống, ko thì thu lên -->
<?php
if ($is_homepage) {
    echo '<section class="hero">';
} else {
    echo '<section class="hero hero-normal">';
}
?>

<!-- Check: Nếu là trang chủ thì hiển thị banner -->
<?php
if ($is_homepage) {
    ?>
    <div>thẻ div banner</div>
    <?php
}
?>

<!-- menu -->
<div class="hero__categories">
    <div class="hero__categories__all">
        <i class="fa fa-bars"></i>
        <span>Danh mục sản phẩm</span>
    </div>
    <ul>
        <?php
        require('./db/conn.php');
        $sql_str = "select * from categories order by name";
        $result = mysqli_query($conn, $sql_str);
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <li><a href="#"><?= $row['name'] ?></a></li>
        <?php } ?>
    </ul>
</div>

<!-- INDEX -->
<?php
session_start();
$is_homepage = true;
require_once('header.php');
?>