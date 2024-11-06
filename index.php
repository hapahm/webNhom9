<?php
session_start();
$is_homepage = true;
require_once('header.php');
?>

<!-- Featured Section - Các sản phẩm -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Các sản phẩm</h2>
                </div>

                <div class="featured__controls">
                    <ul>
                        <!-- Lấy tất cả - ALL -->
                        <li class="active" data-filter="*">All</li>
                        <!-- Lấy theo slug? -->
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
            <!--End PHP-->

        </div>
    </div>
</section>

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
                            </ul>
                            <h5><a href="tintuc.php?id=<?= $row['id'] ?>"><?= $row['title'] ?></a></h5>
                            <p><?= $row['sumary'] ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!--End PHP-->
        </div>
    </div>
</section>
<!-- Blog Section End -->

<?php
require_once('footer.php');
?>