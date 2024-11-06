<?php
require('./db/conn.php');
//session_start(); ?>
<!DOCTYPE html>
<html lang="zxx">



<body>



    <!-- Header Section Begin -->
    <header class="header">

        <!-- Bỏ -->
        <div class="container">
            <!-- ... -->
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <!-- Check: là trang chủ thì sổ thanh menu xuống, ko thì thu lên -->
    <?php
    if ($is_homepage) {
        echo '<section class="hero">';
    } else {
        echo '<section class="hero hero-normal">';
    }
    ?>


    <!-- <section class="hero"> -->
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <!-- menu -->
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Danh mục sản phẩm</span>
                    </div>
                    <ul>
                        <?php

                        $sql_str = "select * from categories order by name";
                        $result = mysqli_query($conn, $sql_str);
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <li><a href="#"><?= $row['name'] ?></a></li>

                        <?php } ?>

                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="timkiem.php" method="get">
                            <!-- ... -->
                            <input type="text" name="tukhoa" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>

                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-money"></i>
                        </div>
                        <div class=" hero__search__phone__text">
                            <span>Tổng tiền:</h5>
                                <div class="header__cart__price">
                                    <h5 style="color: black;"><?= number_format($tongtien, 0, '', '.') . " VNĐ" ?>
                                    </h5>

                                </div>
                            </span>

                        </div>

                    </div>
                </div>
                <!-- Check: Nếu là trang chủ thì hiển thị banner -->
                <?php
                if ($is_homepage) {
                    ?>
                    <div class="hero__item set-bg" data-setbg="img/hero/banner.jpg">
                        <div class="hero__text">
                            <span>THỰC PHẨM</span>
                            <h2>SẠCH <br />100% ORGANIC</h2>
                            <p>Luôn có sẵn hàng trong kho!</p>
                            <a href="shop.php" class="primary-btn">MUA NGAY</a>
                        </div>
                    </div>
                    <?php
                }
                ?>

            </div>
        </div>
    </div>
    </section>
    <!-- Hero Section End -->