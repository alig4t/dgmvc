
<div class="scroll-slider-box">
    <h5>جدیدترین های موبایل</h5>
    <div class="prevbox">
        <span class="prev" onclick="sliderScroll('right',this);"></span>
    </div>
    <div class="scroll-slider-content">

        <ul>

            <?php
            $newst_product = $data[3];
            foreach ($newst_product as $row) {
                ?>

                <li>
                    <a href="<?= publicUrl ?>product/index/dkp-<?= $row['id'] ?>">
                        <div class="imgbox">
                            <img src="public/images/product/<?php echo $row['id']; ?>/product_150.jpg">
                        </div>
                        <div class="namebox">
                            <?php echo $row['title']; ?>
                        </div>
                        <div class="old-price">
                            <b>
                                <?php echo $row['price']; ?>
                            </b>
                        </div>
                        <div class="new-price">
                            <span class="gheymat"><b><?php echo $row['total_price']; ?></b></span>
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

