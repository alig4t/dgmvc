<div id="main">
    <div class="dg-masir">
        <ul>
            <li>
                <a href="">
                    فروشگاه اینترنتی دیجی کالا
                </a>
            </li>
            <li>
                <a href="">
                    ورود به دیجی کالا
                </a>
            </li>
        </ul>

    </div>


    <div id="registration-box">

        <div id="reg-title-box">
            <span class="reg-icon login-icon"></span>
            <h1>
                ورود به دیجی کالا
            </h1>
        </div>


        <?php
$errorMode = 0;
if(isset($data['errorMode'])){
    $errorMode = $data['errorMode'];
}

        if ($errorMode == 1) {

            ?>

            <div class="gotopage" style="background: rgba(255,48,31,0.28);margin-bottom: 45px">
        <span>
نام کاربری یا کلمه عبور اشتباه است
        </span>

            </div>


            <?php
        }
        ?>

        <div id="reg-right" style="width: 100%">
            <form action="login/checkuser" method="post">
                <div id="reg-right-wrapper">
                    <div class="input-box">
                        <label>
                            پست الکترونیک
                        </label>
                        <input type="email" placeholder="Email" name="email">
                    </div>
                    <div class="input-box">
                        <label>
                            کلمه عبور
                        </label>
                        <input type="password" placeholder="Password" name="password">
                    </div>

                    <div class="checkbox">
                        <span class="gp-checkbox"></span>
                        <input type="checkbox" class="check-input">
                        <label>
                            مرا به خاطر بسپار
                        </label>
                    </div>

                    <div class="button-box">
                        <a onclick="submitform();">
                            ورود به دیجی کالا
                        </a>
                    </div>
                </div>
            </form>
        </div>


    </div>

    <script>
        function submitform() {
            $('form').submit();
        }
    </script>


    <div class="gotopage">
        <span>
          قبلاً در دیجی کالا ثبت نام نکرده اید؟
            <a href="#">
                ثبت نام در دیجی کالا
            </a>
        </span>

    </div>

</div>


</body>
</html>