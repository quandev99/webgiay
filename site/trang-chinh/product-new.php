<div class="product-new">
    <div class="title">
        <h3 class="title-text">
            <span>Các sản phẩm mới</span>
        </h3>
    </div>
    <div class="product-list">
    <?php foreach ($items as $items) :
                    extract($items);
                    $Image_select1=name_img_select_one_by_MaSP($Ma_SP);
                    if (isset($Image_select1)) {
                        extract($Image_select1);
                        $Image1=$Image;
                    }
                    $Image_select2=name_img_select_top2_by_MaSP($Ma_SP);
                    if (isset($Image_select2)) {
                        extract($Image_select2);
                        $Image2=$Image;
                    }

                ?>
        <div class="product-item">
            <a href="<?= $SITE_URL . '/product/product-detail.php?Ma_SP=' . $Ma_SP ?>" class="product-image">
                <img src="	<?= $UPLOAD_URL . '/products/' . $Image1 ?>" alt=""
                    class="product-image-first" />
                <img src="	<?= $UPLOAD_URL . '/products/' . $Image2 ?>" alt=""
                    class="product-image-second" />
            </a>
            <p class="product-price"><del><?= number_format($Price, 0, ',') ?> ₫   </del> <br><?= number_format($Price_Giam, 0, ',') ?> ₫</p>
            <h4 class="product-name"><?= $Ten_SP ?></h4>
        </div>
        <?php endforeach; ?>
    </div>
    <a href="<?= $SITE_URL ?>/product/product.php" class="load-more">XEM THÊM</a>
</div>
</div>
</div>