<head>

    <link rel="stylesheet" href="public/cart.css">

</head>


<div id="main">

    <div class="dg-masir" style="width:auto">
        <ul>
            <li>
                <a href="" style="font-size: 11px">
                    فروشگاه اینترنتی دیجی کالا
                </a>
            </li>

            <li>
                <a href="" style="font-size: 11px">
                    سبد خرید
                </a>
            </li>
        </ul>

    </div>


    <div id="cart-content">


        <h2>
            سبد خرید شما در دیجی‌کالا
        </h2>
        <span class="cart-des">
            افزودن کالاها به سبد خرید به معنی رزرو کالا برای شما نیست. برای ثبت سفارش باید مراحل بعدی خرید را تکمیل نمایید.

        </span>

        <span class="button-green">
            <a href="showcart1">
                ادامه ثبت سفارش
            </a>
        </span>


        <table id="tblbasket" cellspacing="0" class="basket-tbl">
            <thead>
            <tr>
                <td>شرح محصول</td>
                <td width="60px">فروشنده</td>
                <td width="80px">تعداد</td>
                <td width="130px">قیمت واحد</td>
                <td width="280px" style="border-left: none">قیمت کل</td>
                <td width="25px"></td>
            </tr>
            </thead>
            <tbody>
            <?php
            $basket = $data['basket'];
            foreach ($basket as $row) {
                ?>


                <tr data-id="<?= $row['basketId']; ?>">
                    <td>
                        <div class="basket-pr-img">
                            <img src="public/images/product/<?= $row['id'] ?>/product_150.jpg">
                        </div>

                        <div class="basket-pr-title">
                            <h3>
                                <a href="product/index/<?= $row['id'] ?>">
                                    <?= $row['title'] ?>
                                </a>
                            </h3>
                            <h3>
                                <a href="product/index/<?= $row['id'] ?>">
                                    Philips BT5200/13 Hair Trimmer
                                </a>
                            </h3>

                            <p>
                                رنگ :
                                <i class="color-circle" style="background-color: <?= $row['hex'] ?>">

                                </i>
                                <span>
                                         <?= $row['colorTitle'] ?>

                                </span>
                                <span style="display: block;margin-top: 10px">
گارانتی :
                                    <?= $row['garanteeTitle'] ?>
                                </span>
                            </p>

                        </div>

                    </td>

                    <td>دیجی کالا</td>
                    <td>

                        <div class="garanty-box">
                            <div class="garanty-wrapper" onclick="openTedad(this)">
                                <i class="tik"></i>
                                <span class="gr-title">
                                    <?= $row['tedad'] ?>
                        </span>
                                <i class="zirmenu"></i>

                                <ul>

                                    <?php
                                    for ($i = 1; $i < 21; $i++) {
                                        ?>
                                        <li onclick="updateTedad(<?= $row['basketId'] ?>,<?= $i ?>,this)"><?= $i ?></li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </div>

                        </div>

                    </td>
                    <td>
                        <span class="cartprice"><?= number_format($row['price']) ?></span>
                        <span class="carttuman">تومان</span>
                    </td>
                    <td style="border-left: none">
                        <span class="cartprice"><?= number_format($row['price'] * $row['tedad']) ?></span>
                        <span class="carttuman">تومان</span>
                    </td>
                    <td class="cancell-pr">
                        <i onclick="deleteBasket(<?= $row['basketId'] ?>);"></i>
                    </td>
                </tr>

                <?php
            }
            ?>
            </tbody>


        </table>


        <div class="gheymat-kolli-box">

            <div class="kolli-table">

                <table cellspacing="0" width="100%">
                    <tr>
                        <td width="230px">
                            <div class="box-takhfif">
                                <span class="right">مجموع تخفیف</span>
                                <span>20,000 تـومان</span>
                            </div>
                        </td>
                        <td>
                            جمع کل خرید شما :
                        </td>
                        <td>
                            <span class="cartprice"><?php echo number_format($data['allpricetotal']); ?></span>
                            <span class="carttuman">تومان</span>
                        </td>
                    </tr>
                    <tr>
                        <td width="200px"></td>
                        <td>مبلغ قابل پرداخت :</td>
                        <td>
                            <span class="cartprice" style="font-size: 20px">4,680,000</span>
                            <span class="carttuman">تومان</span>
                        </td>
                    </tr>
                </table>

            </div>

        </div>


        <div class="backnextbox">

              <span class="button-gray">
            <a href="#">
بازگشت به صفحه اصلی
            </a>
              </span>


            <span class="button-green">
            <a href="showcart1">
ادامه ثبت سفارش
            </a>
            </span>


            <span class="gotxt">
                کالاهای موجود در سبد شما ثبت و رزرو نشده اند، برای ثبت سفارش مراحل بعدی را تکمیل کنید >>
            </span>
        </div>


    </div>


    <div class="scroll-slider-box" style="box-sizing: border-box;margin-top: 10px;float: right">
        <h5 style="color: #666;font-size: 13px;font-weight: 100;">احتمالا به محصولات زیر هم علاقه مند باشید</h5>
        <div class="prevbox">
            <span class="prev" onclick="sliderScroll('right',this);"></span>
        </div>
        <div class="scroll-slider-content" style="width: 1088px;">

            <ul style="width: 1212px;">
                <li style="width: 242px">
                    <a href="#">
                        <div class="imgbox">
                            <img src="images/Samsung-Galaxy-J7-Prime-SM-G610FD-Dual-SIM-Mobile-Phone-202313.jpg">
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

                <li style="width: 242px">
                    <a href="#">
                        <div class="imgbox">
                            <img src="images/Samsung-Galaxy-S8-Dual-SIM-Mobile-Phone-a8bcd0.jpg">
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


                <li style="width: 242px">
                    <a href="#">
                        <div class="imgbox">
                            <img src="images/Samsung-J7-(2016)-Mobile-Phone.jpg">
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


                <li style="width: 242px">
                    <a href="#">
                        <div class="imgbox">
                            <img src="images/LG-X-Power-Mobile-Phone.jpg">
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


                <li style="width: 242px">
                    <a href="#">
                        <div class="imgbox">
                            <img src="images/LG-X-Power-Mobile-Phone.jpg">
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
                <li style="width: 242px">
                    <a href="#">
                        <div class="imgbox">
                            <img src="images/Samsung-J7-(2016)-Mobile-Phone.jpg">
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


                <li style="width: 242px">
                    <a href="#">
                        <div class="imgbox">
                            <img src="images/LG-X-Power-Mobile-Phone.jpg">
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


</div>


<script>


    function number_3_3 (num, sep){
        var number = typeof num === "number"? num.toString() : num,
            separator = typeof sep === "undefined"? ',' : sep;
        return number.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1"+separator);
    }


    function openTedad(tag) {
        $('ul', tag).slideToggle(100);
    }


    function createBasket(basket, alltotalprice) {

        $('#tblbasket tbody tr').remove();
        $.each(basket, function (index, value) {

            var basketId = value['basketId'];
            var title = value['title'];
            var tedad = value['tedad'];

            var price = number_3_3(value['price']);
            var totalPrice = number_3_3(value['price'] * tedad);
            var color = value['colorTitle'];
            var garantee = value['garanteeTitle'];
            var idproduct = value['id'];
            var hex = value['hex'];

            //href="product/index/<?//= $row['id'] ?>//"

            var trTag = '<tr data-id="' + basketId + '"><td><div class="basket-pr-img"><img src="public/images/product/' + value['id'] + '/product_150.jpg"></div><div class="basket-pr-title"><h3><a href="product/index/' + idproduct + '">' + title + '</a></h3><h3><a href="product/index/' + idproduct + '">Philips BT5200/13 Hair Trimmer</a></h3><p>رنگ :<i class="color-circle" style="background-color: ' + hex + '"></i><span>' + color + '</span><span style="display: block;margin-top: 10px">گارانتی : ' + garantee + '</span></p></div></td><td>دیجی کالا</td><td><div class="garanty-box"><div class="garanty-wrapper" onclick="openTedad(this)"><i class="tik"></i><span class="gr-title">' + tedad + '</span><i class="zirmenu"></i><ul><?php for ($i = 1; $i < 21; $i++) { ?><li  onclick="updateTedad(' + basketId + ',<?= $i ?>,this)"><?= $i ?></li><?php } ?></ul></div></div></td><td><span class="cartprice">' + price + '</span><span class="carttuman">تومان</span></td><td style="border-left: none"><span class="cartprice">' + totalPrice + '</span><span class="carttuman">تومان</span></td><td class="cancell-pr"><i onclick="deleteBasket(' + basketId + ');"></i></td></tr>';

            $('#tblbasket tbody').append(trTag);

        });

        alltotalprice = number_3_3(alltotalprice);

        $(".kolli-table .cartprice").text(alltotalprice);

    }

    function deleteBasket(basketRow) {

        var url = "<?php echo publicUrl;?>cart/deletebasket/" + basketRow;
        var data = {};

        $.post(url, data, function (msg) {

            var basket = msg[0];
            var alltotalprice = msg[1];
            createBasket(basket, alltotalprice);

        }, 'json');
    }


    function updateTedad(basketRow, newTedad, tagg) {

        var url = "<?php echo publicUrl;?>cart/updatebasket/" + basketRow;
        var data = {'tedad': newTedad, 'basketId': basketRow};
        $.post(url, data, function (msg) {

            var basket = msg[0];
            var alltotalprice = msg[1];
            createBasket(basket, alltotalprice);

        }, 'json');

        var tedadText = newTedad;
        var tedadplace = $(tagg).parents('.garanty-wrapper').find('.gr-title').text(tedadText);

    }


</script>


<script>

    function sliderScroll(direction, tag) {

        var arrowtag = $(tag);


        var sliderScrollTag = arrowtag.parents('.scroll-slider-box');
        var sliderScrollUl = sliderScrollTag.find('.scroll-slider-content ul');
        var sliderScrollItem = sliderScrollUl.find('li');
        var sliderScrollItemNum = sliderScrollItem.length;
        var sliderScrollNum = sliderScrollItemNum - 4;
        var maxMargin = (sliderScrollNum * -242) + 125;

        sliderScrollUl.css('width', sliderScrollItemNum * 242);


        var marginRightOld;
        var marginRightNew;


        marginRightOld = sliderScrollUl.css('margin-right');
        marginRightOld = parseFloat(marginRightOld);


        if (direction == 'left') {

            marginRightNew = marginRightOld - 242;
            if (marginRightNew <= maxMargin) {
                marginRightNew = maxMargin;
                sliderScrollTag.find('.nextbox .next').addClass('bg-icon-scroll');
            }
            sliderScrollUl.css('margin-right', marginRightNew);
            /*sliderScrollUl.animate({'margin-right':marginRightNew},300);*/
            sliderScrollTag.find('.prevbox .prev').removeClass('bg-icon-scroll');
        }

        if (direction == 'right') {

            marginRightNew = marginRightOld + 242;
            if (marginRightNew >= 0) {
                marginRightNew = 0;
                sliderScrollTag.find('.prevbox .prev').addClass('bg-icon-scroll');
            }
            sliderScrollUl.css('margin-right', marginRightNew);
            sliderScrollTag.find('.nextbox .next').removeClass('bg-icon-scroll');
        }


    }


</script>


</body>
</html>