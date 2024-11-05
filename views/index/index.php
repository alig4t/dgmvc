

<div id="main">

    <div class="banner-top">
        <img src="public/images/banner.jpg">
    </div>


    <?php
            include_once 'sidebar.php';
    ?>


    <div id="content">

        <?php
        include_once 'slider_main.php';
        include_once 'slider_discount.php';
        include_once 'category_box.php';
        include_once 'featured.php';
        include_once 'onlydg.php';
        include_once 'newest.php';
        include_once 'most_viewd.php';

        ?>


    </div>


</div>



<script>


    $('.prevbox .prev').addClass('bg-icon-scroll');

    function sliderScroll(direction, tag) {

        var arrowtag = $(tag);




        var sliderScrollTag = arrowtag.parents('.scroll-slider-box');
        var sliderScrollUl = sliderScrollTag.find('.scroll-slider-content ul');
        var sliderScrollItem = sliderScrollUl.find('li');
        var SliderScrollLiWidth = parseFloat(sliderScrollItem.css('width'));
        var SliderScrollNimWid = SliderScrollLiWidth - 100 ;

        var sliderScrollItemNum = sliderScrollItem.length;
        var sliderScrollNum = sliderScrollItemNum - 3;
        var maxMargin = (sliderScrollNum * (-1) * SliderScrollLiWidth) + SliderScrollNimWid;




        sliderScrollUl.css('width', sliderScrollItemNum * SliderScrollLiWidth);


        var marginRightOld;
        var marginRightNew;


        marginRightOld = sliderScrollUl.css('margin-right');
        marginRightOld = parseFloat(marginRightOld);


        if (direction == 'left') {

            marginRightNew = marginRightOld - SliderScrollLiWidth;
            if (marginRightNew <= maxMargin) {
                marginRightNew = maxMargin;
                sliderScrollTag.find('.nextbox .next').addClass('bg-icon-scroll');
            }
            sliderScrollUl.css('margin-right', marginRightNew);
            sliderScrollTag.find('.prevbox .prev').removeClass('bg-icon-scroll');
        }

        if (direction == 'right') {

            marginRightNew = marginRightOld + SliderScrollLiWidth;
            if (marginRightNew >= 0) {
                marginRightNew = 0;
                sliderScrollTag.find('.prevbox .prev').addClass('bg-icon-scroll');
            }
            sliderScrollUl.css('margin-right', marginRightNew);
            sliderScrollTag.find('.nextbox .next').removeClass('bg-icon-scroll');
        }


    }


    var SecSliderbox = $("#sec-slider .sec-slider-content-box");
    var secSliderItems = SecSliderbox.find('.sec-item');
    var SecSliderNumber = secSliderItems.length;
    var Secnextslide = 1;
    var secTimer = 4000;

    var SecUl = $("#sec-slider .sec-slider-nav ul li");

    function secSlider() {

        if (Secnextslide > SecSliderNumber) {
            Secnextslide = 1;
        }
        SecUl.removeClass('active');
        secSliderItems.fadeOut(500);
        secSliderItems.eq(Secnextslide - 1).fadeIn(600);
        SecUl.eq(Secnextslide - 1).addClass('active');
        Secnextslide++;
    }

    secSlider();


    var SecSliderInvertal = setInterval(secSlider, secTimer);

    SecSliderbox.mouseleave(function () {
        clearInterval(SecSliderInvertal);
        SecSliderInvertal = setInterval(secSlider, secTimer);
    });

    function SecGoSlide(Secindex) {
        Secnextslide = Secindex;
        secSlider();
    }


    SecUl.click(function () {
        clearInterval(SecSliderInvertal);
        var Secindex = $(this).index();
        SecGoSlide(Secindex + 1);
    })




    var sliderbox = $('#main-slider');
    var sliderTag = $('#main-slider .slider-img');
    var slideitems = sliderTag.find('.item');
    var numslide = slideitems.length;
    var sliderNav = sliderbox.find("#slider-nav ul li");
    var nextslide = 1;
    var timeOut = 5000;

    function mainslider() {

        if (nextslide > numslide) {
            nextslide = 1;
        }
        if (nextslide < 1) {
            nextslide = numslide;
        }
        sliderNav.removeClass('active');
        slideitems.fadeOut(800);
        slideitems.eq(nextslide - 1).fadeIn(800);
        sliderNav.eq(nextslide - 1).addClass('active');
        nextslide++;
    }


    mainslider();
    var sliderInterval = setInterval(mainslider, timeOut);


    sliderbox.mouseleave(function () {
        clearInterval(sliderInterval);

        sliderInterval = setInterval(mainslider, timeOut);
    });


    function GoToNext() {
        mainslider();
    }
    function GoToPrev() {
        nextslide = nextslide - 2;
        mainslider();
    }

    $("#main-slider #next").click(function () {
        clearInterval(sliderInterval);
        GoToNext();
    });

    $("#main-slider #prev").click(function () {
        clearInterval(sliderInterval);
        GoToPrev();
    });


    function GotoSlide(index) {
        nextslide = index;
        mainslider();
    }


    $('#main-slider #slider-nav ul li').click(function () {
        clearInterval(sliderInterval);
        var index = $(this).index();
        GotoSlide(index + 1);
    });





</script>


</body>
</html>