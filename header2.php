<?php
require('./db/conn.php');
//session_start(); ?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Kanit:wght@600;800&display=swap"
        rel="stylesheet">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Kanit:ital,wght@0,600;1,600&display=swap"
        rel="stylesheet"> -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet"> -->

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="custom.css">
</head>

<body>
    <!-- Page Preloder - Hiệu ứng tải trang -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -- ko biết đây là gì -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="./index.php">Home</a></li>
                <li><a href="./shop.php">Shop</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shop-details.html">Shop Details</a></li>
                        <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href="./blog.html">Blog</a></li>
                <li><a href="./contact.html">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <!-- ... -->
                <div class="row">
                    <div class="col-lg-3">
                        <div class="header__logo">
                            <a href="./index.php"><img src="img/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <nav class="header__menu">
                            <ul>
                                <li class="active"><a href="./index.php">Trang chủ</a></li>
                                <li><a href="./shop.php">Sản phẩm</a></li>
                                <li><a href="#">Pages</a>
                                    <ul class="header__menu__dropdown">
                                        <li><a href="./shop-details.html">Shop Details</a></li>
                                        <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                        <li><a href="./checkout.html">Check Out</a></li>
                                        <li><a href="./blog-details.html">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="./tintuc.php">Tin tức</a></li>
                                <li><a href="./contact.html">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-2">
                        <div class="header__cart">
                            <ul>
                                <div class="header__top__right__auth">
                                    <!-- Giỏ hàng -->
                                    <li>
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
                                    </li>
                                    <!-- Đăng nhập -->
                                    <li><a href="#"><i class="fa fa-user"></i> Login</a></li>
                                </div>
                                <!-- ... -->
                            </ul>
                            <!-- ... -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
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