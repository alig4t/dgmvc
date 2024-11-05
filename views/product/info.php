<div id="desc-box">

    <div class="titlebox">
        <div class="title-info">
            <h1>

                <?= $productInfo['title'] ?>

            </h1>
            <span>
                        Apple iPad 9.7 inch (2017) 4G 128GB Tablet
                    </span>
        </div>
        <div class="ratebox">

        </div>
    </div>

    <div id="kharid-box">
        <label>
            انتخاب رنگ
        </label>
        <div class="col-box">

            <?php
            foreach ($productInfo['allcolor'] as $color) {
                ?>


                <div class="col-select" data-color-id="<?php echo $color['id']; ?>">
                    <span class="colorspan" style="background-color: <?php echo $color['hex']; ?>"></span>
                    <span class="colortxt"><?php echo $color['title']; ?></span>
                </div>

                <?php
            }

            ?>


        </div>

        <label>
            انتخاب گارانتی
        </label>
        <div class="garanty-box">
            <div class="garanty-wrapper">
                <i class="tik"></i>
                <span class="gr-title">
                        </span>
                <i class="zirmenu"></i>

                <ul>

                    <?php
                    foreach ($productInfo['allgarantee'] as $garantee) {
                        ?>
                        <li data-garentee-id="<?php echo $garantee['id']; ?>"
                            onclick="setGarId(<?php echo $garantee['id']; ?>,this);"><?php echo $garantee['title']; ?></li>
                        <?php
                    }
                    ?>

                </ul>
            </div>

        </div>


        <label>
            انتخاب فروشنده
        </label>
        <div class="garanty-box">
            <div class="garanty-wrapper">
                <i class="tik"></i>
                <span>
دیجی کالا
                        </span>
                <i class="zirmenu"></i>
            </div>
        </div>


        <div class="old-price">
            <div class="gheymat">
                <span>قیمت:</span>
                <span class="adad"><?php echo $productInfo['price'] ?></span>
                <span class="tuman">تومان</span>
            </div>
            <div class="box-takhfif">
                <span class="right">تخفیف</span>
                <span><?php echo $productInfo['discount'] / 1000 ?> هزار تومان</span>
            </div>
        </div>


        <div class="new-price">
                    <span class="right">
                        قیمت برای شما:
                    </span>
            <span class="center">
<?php echo $productInfo['total_price'] ?>
                    </span>
            <span class="left">
 تومان
                    </span>

        </div>


        <div class="add-to-cart">
            <div class="basket" style="width: 214px;cursor: pointer" onclick="addToBasket()">
                <div class="basket-right"></div>
                <div class="basket-left" style="width: 111px">
                    <span class="sabad-kharid">افزودن به سبد خرید</span>
                </div>
            </div>
        </div>

    </div>


    <div id="detail-box">
        <ul>
            <li>
                <label>
                    تعداد سيم کارت:
                </label>
                <span>
                دو سيم کارت
                        </span>
            </li>

            <li>
                <label>
                    رزولوشن عکس:
                </label>
                <span>
12 مگاپیکسل
                        </span>
            </li>
            <li>
                <label>
                    حافظه داخلی :
                </label>
                <span>
32 گیگابایت
                        </span>
            </li>


        </ul>
    </div>

    <div class="dg-hori-row"></div>


    <div class="featured-box" style="border: none;box-shadow: none;height: 56px">

        <div class="featured-section">
            <a href="#">
                <i class="delivery" style="margin-right: 1px;margin-top: 24px;"></i>
                <span style="margin-right: 5px;">تحویل اکسپرس</span>
            </a>
        </div>

        <div class="featured-section" style="width: 21%;">
            <a href="#">
                <i class="idate" style="margin-right: 1px;margin-top: 24px;"></i>
                <span style="margin-right: 5px;">7 روز ضمانت بازگشت</span>
            </a>
        </div>

        <div class="featured-section" style="width: 17%;">
            <a href="#">
                <i class="ipay" style="margin-right: 1px;margin-top: 24px;"></i>
                <span style="margin-right: 5px;">پرداخت در محل</span>
            </a>
        </div>

        <div class="featured-section" style="width: 21%;">
            <a href="#">
                <i class="iprice" style="margin-right: 1px;margin-top: 24px;"></i>
                <span style="margin-right: 5px;">تضمین بهترین قیمت</span>
            </a>
        </div>

        <div class="featured-section">
            <a href="#">
                <i class="iasl" style="margin-right: 1px;margin-top: 24px;"></i>
                <span style="margin-right: 5px;">ضمانت اصل بودن کالا</span>
            </a>
        </div>

    </div>


</div>


<script>


    $(".col-select").click(function () {
        $(".colorspan").removeClass('active');
        $(".col-select").removeClass('active');
        $(this).addClass('active');

        var colorSpan = $(this).find(".colorspan");
        colorSpan.addClass('active');

        var colorhex = colorSpan.css('background-color');

        var sefid = "rgb(255, 255, 255)";
        if (colorhex == sefid) {
            colorSpan.css('background-position', '-167px -80px');
        } else {
            colorSpan.css('background-position', '-192px -80px');
        }
    });


    function setGarId(idg, tag) {

        garanteeSelected = idg;
        var garantitxt = $(tag).text();
        $(tag).parents('.garanty-wrapper').find('.gr-title').text(garantitxt);

    }


    var garantyFirstLi = $(".garanty-box .garanty-wrapper ul li").eq(0);
    var garanteeSelected = garantyFirstLi.attr('data-garentee-id');
    var garantitxt = garantyFirstLi.text();
    garantyFirstLi.parents('.garanty-wrapper').find('.gr-title').text(garantitxt);


    var garantyHead = $(".garanty-box .garanty-wrapper");
    garantyHead.click(function () {
        $('ul', this).slideToggle(100);
    });


    function addToBasket() {

        var color = $("#kharid-box .col-box .col-select.active").attr('data-color-id');
        var url = '<?php echo publicUrl;?>product/addtobasket/<?php echo $productInfo['id'] ?>/' + color + '/' + garanteeSelected;
        var data = {};


        if (color) {

            $.post(url, data, function (msg) {

                location.assign ( "http://127.0.0.1/dgmvc/cart" );

            });

        } else {
            alert("لطفا رنگ را انتخاب نمایید");
        }

    }


</script>






