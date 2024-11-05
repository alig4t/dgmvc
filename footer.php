<?php

    $option= Model::get_option();

?>

<footer>
    <div id="tel-box">
        <div id="tel-box-wrapper">
            <span>
     ۷ روز هفته، ۲۴ ساعته پاسخگوی شما هستیم.
            </span>
            <ul>
                <li>
                    <i></i>
                    <span><?php echo $option['email']; ?></span>
                </li>
                <li>
                    <i class="qustion"></i>

                    <span>
<a href="##">
                سوالات متداول
             </a>
            </span>

                </li>

                <li>
                    <i class="dg-tell"></i>

                    <span style="font-family:yekan; direction: ltr;text-align: left">
                <a href="##">
                      <?php echo $option['tel']; ?>
           </a>
            </span>

                </li>

            </ul>
        </div>
    </div>
    <div id="footer-menu-box">
        <div id="footer-menu-wrapper">

            <div class="fm-col">
                <ul>
                    <li>
                        <a href="#">
                            راهنمای خرید از دیجی‌کالا
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            ثبت سفارش
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            رویه های ثبت سفارش
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            شیوه های پرداخت
                        </a>
                    </li> <li>
                        <a href="#">
                            معرفی دیجی بن
                        </a>
                    </li>

                </ul>
            </div>


            <div class="fm-col">
                <ul>
                    <li>
                        <a href="#">
                            خدمات مشتریان
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            پاسخ به پرسش های متداول
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            رویه های بازگرداندن کالا
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            شرایط استفاده
                        </a>
                    </li> <li>
                        <a href="#">
                            حریم خصوصی
                        </a>
                    </li>

                </ul>
            </div>



            <div class="fm-bigcol">
                <h5>از تخفیف ها و جدیدترین های دیجی کالا باخبر شوید !</h5>

                <input type="text" class="khabar-input" placeholder="آدرس ایمیل خود را وارد کنید" >
                <a class="dg-butoon">تایید ایمیل</a>

                <div class="dg-social">
                    <ul>
                        <li>
                            <a href="#">
                                <img src="public/images/ios_app_bg.png">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="public/images/android_app_bg.png">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="dg-telegram"></i>
                            </a>
                        </li><li>
                            <a href="#">
                                <i class="dg-aparat"></i>
                            </a>
                        </li><li>
                            <a href="#">
                                <i class="dg-insta"></i>
                            </a>
                        </li><li>
                            <a href="#">
                                <i class="dg-gplus"></i>
                            </a>
                        </li><li>
                            <a href="#">
                                <i class="dg-twitter"></i>
                            </a>
                        </li><li>
                            <a href="#">
                                <i class="dg-fb"></i>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>

        </div>
    </div>

</footer>

