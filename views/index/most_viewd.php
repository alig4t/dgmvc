
<div class="scroll-slider-box">
    <h5>پر بازدید ترین ها</h5>
    <div class="prevbox">
        <span class="prev" onclick="sliderScroll('right',this);"></span>
    </div>
    <div class="scroll-slider-content">

        <ul>

            <?php
            $mostVeiw = $data[5];
            foreach ($mostVeiw as $row) {
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



<!--
<div class="scroll-slider-box">
    <h5>پربازدید ترین های موبایل</h5>
    <div class="prevbox">
        <span class="prev" onclick="sliderScroll('right',this);"></span>
    </div>
    <div class="scroll-slider-content">

        <ul>
            <li>
                <a href="##">
                    <div class="imgbox">
                        <img src="public/images/Samsung-Galaxy-J7-Prime-SM-G610FD-Dual-SIM-Mobile-Phone-202313.jpg">
                    </div>
                    <div class="namebox">
                        گوشی موبایل سامسونگ مدل گلکسی دارای اینترنت 4G
                    </div>
                    <div class="old-price">
                        <b>
                            750,000
                        </b>
                    </div>
                    <div class="new-price">
                        <span class="gheymat"><b>695,000</b></span>
                        <span class="tuman"> تومان</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="##">
                    <div class="imgbox">
                        <img src="public/images/Samsung-Galaxy-S8-Dual-SIM-Mobile-Phone-a8bcd0.jpg">
                    </div>
                    <div class="namebox">
                        گوشی موبایل سامسونگ مدل گلکسی دارای اینترنت 4G
                    </div>
                    <div class="old-price">
                        <b>
                            750,000
                        </b>
                    </div>
                    <div class="new-price">
                        <span class="gheymat"><b>695,000</b></span>
                        <span class="tuman"> تومان</span>
                    </div>
                </a>
            </li>


            <li>
                <a href="##">
                    <div class="imgbox">
                        <img src="public/images/Samsung-J7-(2016)-Mobile-Phone.jpg">
                    </div>
                    <div class="namebox">
                        گوشی موبایل سامسونگ مدل گلکسی دارای اینترنت 4G
                    </div>
                    <div class="old-price">
                        <b>
                            750,000
                        </b>
                    </div>
                    <div class="new-price">
                        <span class="gheymat"><b>695,000</b></span>
                        <span class="tuman"> تومان</span>
                    </div>
                </a>
            </li>


            <li>
                <a href="##">
                    <div class="imgbox">
                        <img src="public/images/LG-X-Power-Mobile-Phone.jpg">
                    </div>
                    <div class="namebox">
                        گوشی موبایل سامسونگ مدل گلکسی دارای اینترنت 4G
                    </div>
                    <div class="old-price">
                        <b>
                            750,000
                        </b>
                    </div>
                    <div class="new-price">
                        <span class="gheymat"><b>695,000</b></span>
                        <span class="tuman"> تومان</span>
                    </div>
                </a>
            </li>


            <li>
                <a href="##">
                    <div class="imgbox">
                        <img src="public/images/LG-X-Power-Mobile-Phone.jpg">
                    </div>
                    <div class="namebox">
                        گوشی موبایل سامسونگ مدل گلکسی دارای اینترنت 4G
                    </div>
                    <div class="old-price">
                        <b>
                            750,000
                        </b>
                    </div>
                    <div class="new-price">
                        <span class="gheymat"><b>695,000</b></span>
                        <span class="tuman"> تومان</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="##">
                    <div class="imgbox">
                        <img src="public/images/Samsung-J7-(2016)-Mobile-Phone.jpg">
                    </div>
                    <div class="namebox">
                        گوشی موبایل سامسونگ مدل گلکسی دارای اینترنت 4G
                    </div>
                    <div class="old-price">
                        <b>
                            750,000
                        </b>
                    </div>
                    <div class="new-price">
                        <span class="gheymat"><b>695,000</b></span>
                        <span class="tuman"> تومان</span>
                    </div>
                </a>
            </li>


            <li>
                <a href="##">
                    <div class="imgbox">
                        <img src="public/images/LG-X-Power-Mobile-Phone.jpg">
                    </div>
                    <div class="namebox">
                        گوشی موبایل سامسونگ مدل گلکسی دارای اینترنت 4G
                    </div>
                    <div class="old-price">
                        <b>
                            750,000
                        </b>
                    </div>
                    <div class="new-price">
                        <span class="gheymat"><b>695,000</b></span>
                        <span class="tuman"> تومان</span>
                    </div>
                </a>
            </li>

        </ul>

    </div>
    <div class="nextbox">
        <span class="next" onclick="sliderScroll('left',this);"></span>
    </div>
</div>

-->