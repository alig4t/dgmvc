<div id="sec-slider">


    <div class="sec-slider-nav">

        <ul>
            <?php

            $date_special = $data[2];


            foreach ($data[1] as $dcslider) {
                ?>
            <li><?= $dcslider['title'] ?></li>
            <?php
            }
            ?>
        </ul>
    </div>


    <div class="sec-slider-content-box">


        <?php
        foreach ($data[1] as $dcslider) {
            ?>


            <a class="sec-item" href="<?= publicUrl ?>product/index/dkp-<?= $dcslider['id'] ?>">
                <img src="public/images/Finished_Badge.png" class="tamamshod">
                <div class="sec-slider-content">

                    <div class="description">
                        <h5>پیشنهاد شگفت انگیز امروز</h5>

                        <div class="price">
                            <div class="oldprice">
                                <span class="adad"> <?= $dcslider['price']/100 ?></span>
                            </div>
                            <div class="newprice">
                                <span class="adad">
                                    <?= $dcslider['total_price']/100 ?>

                                </span>
                                <span class="tuman">
                            هزار تومان
                             </span>
                            </div>
                        </div>

                        <div class="mazaya">
<span>
                نوع اتصال بی سیم با سیگنال دهی بالا
                    </span>
                            <span>
                            رابط ها : شیار کارت حافظه با ظرفیت بالا
                        </span>
                            <span>
                             اتصال بی سیم با WiFi
                        </span>
                        </div>


                    </div>
                    <div class="slideimg">
                        <h4 class="title">
                            <?= $dcslider['title'] ?>
                        </h4>
                        <div class="slide-img-item">
                            <img src="public/images/product/<?= $dcslider['id'] ?>/product_220.jpg">
                        </div>


                    </div>

                </div>


            </a>

            <?php
        }
        ?>


        <div class="timerbox">
                        <span class="timehead">
                            فرصت باقی مانده تا این پیشنهاد

                    </span>

            <div class="flipTimer">

                <div class="hours"></div>
                <div class="minutes"></div>
                <div class="seconds"></div>
            </div>


        </div>


    </div>


</div>

<script>

    $('.flipTimer').flipTimer({
        direction: 'down',
        date: '<?php echo $date_special; ?>',
        callback: function () {
            $('.sec-slider-content').addClass('finishblur');
            var finishImg = $('#sec-slider .tamamshod');
            finishImg.css('display', 'block');
            $('.sec-slider-content-box .timerbox').hide();
        }

    });
</script>
