
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>دیجی کالا</title>
    <base href="<?php echo publicUrl; ?>">
    <link href="public/style.css" rel="stylesheet">

    <script type="text/javascript" src="public/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="public/js/jquery.flipTimer.js"></script>
    <link href="public/css/flipTimer.css" rel="stylesheet">
    <link href="public/responsive.css" rel="stylesheet">


</head>
<body>


<header>
    <div id="header">

        <div id="header-right">

            <div id="header-right-top">
                <span class="dg-lock"></span>
                <span class="text">
                فروشگاه اینترنتی دیجی کالا ،
                </span>
                <a href="#login">

                    وارد شوید
                </a>
                <span class="dg-person"></span>
                <a href="#reg">
                    ثبت نام کنید
                </a>
            </div>

            <div id="header-right-bottom">
                <div class="basket">
                    <div class="basket-right"></div>
                    <div class="basket-left">
                        <span class="sabad-kharid">سبد خرید</span>
                        <span class="sabad-tedad">0</span>
                    </div>
                </div>

                <div id="serch-box">
                    <input type="text" placeholder="محصول، دسته یا برند مورد نظرتان را جستجو کنید..">
                    <span class="search-icon"></span>
                </div>
            </div>
        </div>
        <div id="header-left">
            <img src="public/images/logo.png">
        </div>
    </div>
</header>


<nav>
    <div id="menu-top">

        <ul>
            <li data-time="1">
                <a href="##">
                    کالای دیجیتال
                    <span class="down-arrow"></span>
                </a>
                <ul>
                    <li>
                        <a href="##">
                            موبایل
                        </a>

                        <div class="submenu3">
                            <div class="top-menu3-col">
                                <ul>
                                    <li><a href="##">گوشی موبایل</a></li>
                                    <li><a href="##">Apple</a></li>
                                    <li><a href="##">Samsung</a></li>
                                </ul>
                            </div>
                            <div class="top-menu3-col"></div>
                            <div class="top-menu3-col"></div>
                            <div class="top-menu3-col"></div>

                            <img src="public/images/mobile.png" width="379" height="335">

                        </div>

                    </li>
                    <li>
                        <a href="##">
                            تبلت و کتابخوان
                        </a>

                        <div class="submenu3">
                            <div class="top-menu3-col">
                                <ul>
                                    <li><a href="##">تبلت</a></li>
                                    <li><a href="##">Apple</a></li>
                                    <li><a href="##">Samsung</a></li>
                                </ul>
                            </div>
                            <div class="top-menu3-col"></div>
                            <div class="top-menu3-col"></div>
                            <div class="top-menu3-col"></div>

                            <img src="public/images/tablet-ebook-reader.png" width="379" height="335">


                        </div>


                    </li>
                </ul>
            </li>

            <li data-time="2">
                <a href="##">
                    لوازم خانگی
                    <span class="down-arrow"></span>
                </a>

                <ul>
                    <li>
                        <a href="##">
                            صوتی تصویری
                        </a>

                        <div class="submenu3">
                            <div class="top-menu3-col">
                                <ul>
                                    <li><a href="##">تلویزیون</a></li>
                                    <li><a href="##">Apple</a></li>
                                    <li><a href="##">Samsung</a></li>
                                </ul>
                            </div>
                            <div class="top-menu3-col"></div>
                            <div class="top-menu3-col"></div>
                            <div class="top-menu3-col"></div>

                            <img src="public/images/mobile.png" width="379" height="335">


                        </div>

                    </li>
                    <li>
                        <a href="##">
                            لوازم خانگی
                        </a>
                    </li>
                </ul>

            </li>


        </ul>

    </div>
</nav>

<script>


    var timer = {};

    $("#menu-top > ul > li").hover(function () {
        var tag = $(this);
        var timerAttr = tag.attr('data-time');
        clearTimeout(timer[timerAttr]);
        timer[timerAttr] = setTimeout(function () {
            $(" > ul", tag).fadeIn(0);
            tag.addClass('active-menu');
            /* $(" > .submenu3", tag).fadeIn(0);*/
        }, 400);


    }, function () {
        var tag = $(this);
        var timerAttr = tag.attr('data-time');
        clearTimeout(timer[timerAttr]);
        timer[timerAttr] = setTimeout(function () {

            $(" > ul", tag).fadeOut(0);
            tag.removeClass('active-menu');


        }, 400);

    })

    var zirtag = $("#menu-top > ul > li > ul >li");
    zirtag.hover(function () {
        $(this).addClass('zir-active');
        $(" > .submenu3", this).fadeIn(0);
    }, function () {
        $(this).removeClass('zir-active');
        $(" > .submenu3", this).fadeOut(0);
    });


</script>
