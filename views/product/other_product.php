
<div class="scroll-slider-box">
    <h5 style="color: #666;font-size: 13px;font-weight: 100;">محصولات مرتبط این محصول</h5>
    <div class="prevbox">
        <span class="prev" onclick="sliderScroll('right',this);"></span>
    </div>
    <div class="scroll-slider-content" style="width: 1090px;">

        <ul style="width: 1212px;">

            <?php
                foreach ($onlydg as $row) {
                    ?>

                    <li style="width: 242px">
                        <a href="#">
                            <div class="imgbox">
                                <img src="public/images/product/<?= $row['id'] ?>/product_150.jpg">
                            </div>
                            <div class="namebox">
                              <?= $row['title']; ?>
                            </div>
                            <div class="old-price">
                                <b>
                                    <?= $row['price']; ?>
                                </b>
                            </div>
                            <div class="new-price">
                                <span class="gheymat"><b><?= $row['total_price']; ?></b></span>
                                <span class="tuman"> تومان</span>
                            </div>
                        </a>
                    </li>
                    <?php
                }
            ?>


        </ul>

    </div>
    <div class="nextbox">
        <span class="next" onclick="sliderScroll('left',this);"></span>
    </div>
</div>
