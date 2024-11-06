<?php
session_start();
$is_homepage = true;
require_once('header.php');
?>

<!-- Categories Section Begin -->
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="section-title">
                <h2>Các danh mục</h2>
            </div>
            <!-- khác nè -->
            <div class="categories__slider owl-carousel">
                <!-- same header -->
                <?php
                $sql_str = "select * from categories order by name";
                $result = mysqli_query($conn, $sql_str);
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="col-lg-3">
                        <!-- xử lý ảnh -->
                        <div class="categories__item set-bg" data-setbg="img/categories/cat-1.jpg">
                            <h5><a href="#"><?= $row['name'] ?></a></h5>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Featured Section Begin - Sản phẩm đặc trưng - feature-->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <!-- Khác nè -->
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Các sản phẩm</h2>
                </div>
                <!-- Danh mục các sản phẩm -->
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">All</li>
                        <!-- same header -->
                        <?php
                        $sql_str = "select * from categories order by name";
                        $result = mysqli_query($conn, $sql_str);
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <!-- hiển thị theo slug categories -->
                            <li data-filter=".<?= $row['slug'] ?>">
                                <?= $row['name'] ?>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Khác nè -->
        <!-- Hiển thị sản phẩm -->
        <div class="row featured__filter">
            <?php
            $sql_str = "select products.id as pid, products.name as pname, images, price,disscounted_price, categories.slug as cslug from products, categories where products.category_id=categories.id; ";
            $result = mysqli_query($conn, $sql_str);
            while ($row = mysqli_fetch_assoc($result)) {
                $anh_arr = explode(';', $row['images']);
                ?>

                <div class="col-lg-3 col-md-4 col-sm-6 mix <?= $row['cslug'] ?>">
                    <div class="featured__item">
                        <!--pop up mua hàng -->
                        <div class="featured__item__pic set-bg" data-setbg="<?= "quantri/" . $anh_arr[0] ?>">
                            <ul class="featured__item__pic__hover">
                                <!-- <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li> -->
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <!--Tên, giá, giá giảm -->
                        <div class="featured__item__text">
                            <h6><a href="sanpham.php?id=<?= $row['pid'] ?>"><?= $row['pname'] ?></a></h6>
                            <div class="prices">
                                <span class="old"><?= $row['price'] ?></span>
                                <span
                                    class="curr"><?= number_format($row['disscounted_price'], 0, '', '.') . " VNĐ" ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>


        </div>
    </div>
</section>
<!-- Featured Section End -->

<!-- Banner Begin - Thanh banner bên dưới-->
<!-- <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div> -->
<!-- Banner End -->

<!-- Latest Product Section Begin - Sản phẩm mới nhất, có thể thêm vài mục luôn - ảnh, tên, giá -->
<section class="latest-product spad">
    <div class="container">
        <div class="row">
            <!-- SP nổi bật -->
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Latest Products</h4>
                    <!-- nhiều hàng -->
                    <div class="latest-product__slider owl-carousel">
                        <!-- có 3 sản phẩm của cột -->
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="img/latest-product/lp-1.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Latest Product Section End -->

<!-- Blog Section Begin - Trang blog nà -->
<section class="from-blog spad">
    <div class="container">
        <!-- Tiêu đề -->
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title from-blog__title">
                    <h2>Tin tức</h2>
                </div>
            </div>
        </div>
        <!-- yô các bài -->
        <div class="row">
            <!-- yô từng bài -->
            <?php
            $sql_str = "select * from news order by created_at desc limit 0, 3";
            $result = mysqli_query($conn, $sql_str);
            while ($row = mysqli_fetch_assoc($result)) {

                ?>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="<?= 'quantri/' . $row['avatar'] ?>" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> <?= $row['created_at'] ?></li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="tintuc.php?id=<?= $row['id'] ?>"><?= $row['title'] ?></a></h5>
                            <p><?= $row['sumary'] ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>


        </div>
    </div>
</section>
<!-- Blog Section End -->

<?php
require_once('footer.php');
?>