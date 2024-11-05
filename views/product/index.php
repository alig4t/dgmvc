<head>
    <link rel="stylesheet" href="public/product.css">
    <script src="public/js/jquery.elevatezoom.js"></script>
    <script src="public/js/scroll/jquery.mCustomScrollbar.js"></script>
    <script src="public/js/scroll/jquery.mousewheel.js"></script>
    <link rel="stylesheet" href="public/js/scroll/jquery.mCustomScrollbar.css">
    <script src="public/js/3d/jsc3d.js"></script>
    <script src="public/js/3d/jsc3d.touch.js"></script>
    <script src="public/js/3d/jsc3d.webgl.js"></script>
</head>


<?php

$productInfo = $data[0];
$onlydg = $data[1];
?>


<div id="main">


    <?php include_once 'masir.php'; ?>


    <div id="dg-prodct-box">

        <?php
        if ($productInfo['special'] == 1) {
            include_once 'offer.php';
        }
        ?>


        <?php include_once 'gallery.php'; ?>
        <?php include_once 'info.php'; ?>

    </div>

    <?php include_once 'other_product.php'; ?>
    <?php include_once 'introduction.php'; ?>
    <?php include_once 'tabs.php'; ?>


</div>


<script>


    $(".sum-more").click(function () {
        var sumaryBox = $(this).parents('.sumary-product');
        sumaryBox.find('.txtbox').toggleClass('active');
        sumaryBox.find('.shadow-box').fadeToggle();

        $(this).find('i').toggleClass('active');

        $(this).find('.show-more').fadeToggle(0);
        $(this).find('.show-less').fadeToggle(0);

    })








    $('.check-input').click(function () {

        if ($(this).is(':checked')) {
            $(this).parents('.checkbox').find('.gp-checkbox').addClass('checked');
        } else {
            $(this).parents('.checkbox').find('.gp-checkbox').removeClass('checked');
        }

    })


    $('.prevbox .prev').addClass('bg-icon-scroll');

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