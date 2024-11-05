<head>

    <link rel="stylesheet" href="public/cart.css">
    <link rel="stylesheet" href="public/showcart1.css">
    <script type="text/javascript" src="public/js/city.js"></script>


    <link rel="stylesheet" type="text/css" href="public/js/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="public/js/slick/slick-theme.css"/>
    <script type="text/javascript" src="public/js/slick/slick.min.js"></script>

</head>


<div id="main">


    <div class="dgstepbox">


        <div id="steporder">

            <div class="pfdash approved">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>

            <ul>
                <li class="approved">
                    <span class="pficon"></span>
                    <span class="pftxt">
ورود به دیجی‌کالا</span>
                </li>
                <li>
                    <span class="pficon"></span>
                    <span class="pftxt">اطلاعات ارسال سفارش</span>
                </li>
                <li>
                    <span class="pficon"></span>
                    <span class="pftxt">اطلاعات پرداخت</span>
                </li>

            </ul>


            <div class="pfdash">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>

        </div>


    </div>


    <h3 class="title-cart">
        انتخاب آدرس

        <span class="button-gray open-address-box" onclick="showNewAddressBox();">
    افزودن آدرس جدید
</span>

    </h3>


    <div class="address-wrapper">

        <?php
        $address = $data['address'];
        foreach ($address as $row) {
            ?>


            <div class="address-box">
                <div class="adhead">
                    <?= $row['fullname'] ?>
                    <i class="delet" onclick="deleteAddress(<?= $row['id'] ?>);"></i>
                    <i class="edit" onclick="editAddress(<?= $row['id'] ?>);"></i>

                </div>
                <div class="adshahr">
                    <span>استان: <?= $row['ostanTitle'] ?></span>
                    <span>شهر: <?= $row['cityTitle'] ?></span>
                    <span>محله: <?= $row['mahale'] ?></span>
                </div>

                <div class="adneshani">
            <span class="addtilte">
            آدرس :
                <?= $row['address'] ?>
</span>
                    <span class="savemap">
            با ثبت آدرس روی نقشه، روند ارسال را سرعت ببخشید.
        </span>

                </div>


                <div class="adtel">
            <span>
                شماره تلفن ثابت :
                <?= $row['tell'] ?>
            </span>
                    <span>
شماره تماس ضروری :
                        <?= $row['mobile'] ?>
            </span>
                </div>

                <div class="adselect">
            <span>
                <i></i>
            به این آدرس ارسال شود
        </span>
                </div>


            </div>

            <?php
        }
        ?>

    </div>


    <div id="add-address-box">
        <h4>
            افزودن آدرس جدید
        </h4>

        <i class="pd-close"></i>

        <form action="" method="post" id="addaddress">
            <div class="adrow">
                <div class="adtitle">
                    نام و نام‌خانوادگی تحویل گیرنده :
                </div>
                <div class="adjavab">
                    <input type="text" name="fullname">
                </div>
            </div>
            <div class="adrow">
                <div class="adtitle">
                    شماره تماس ضروری (تلفن همراه)
                    :
                </div>
                <div class="adjavab">
                    <input type="text" name="mobile">
                </div>
            </div>

            <div class="adrow">
                <div class="adtitle">
                    شماره تلفن ثابت تحویل گیرنده
                </div>
                <div class="adjavab">
                    <input type="text" name="tel">
                </div>
            </div>


            <div class="adrow">
                <div class="adtitle">
                    استان/شهر تحویل گیرنده *
                </div>
                <div class="adjavab">


                    <select name="state" class="states" onChange="ostanSelect(this.value);">
                        <option value="0">لطفا استان را انتخاب نمایید</option>
                        <option value="1">تهران</option>
                        <option value="2">گیلان</option>
                        <option value="3">آذربایجان شرقی</option>
                        <option value="4">خوزستان</option>
                        <option value="5">فارس</option>
                        <option value="6">اصفهان</option>
                        <option value="7">خراسان رضوی</option>
                        <option value="8">قزوین</option>
                        <option value="9">سمنان</option>
                        <option value="10">قم</option>
                        <option value="11">مرکزی</option>
                        <option value="12">زنجان</option>
                        <option value="13">مازندران</option>
                        <option value="14">گلستان</option>
                        <option value="15">اردبیل</option>
                        <option value="16">آذربایجان غربی</option>
                        <option value="17">همدان</option>
                        <option value="18">کردستان</option>
                        <option value="19">کرمانشاه</option>
                        <option value="20">لرستان</option>
                        <option value="21">بوشهر</option>
                        <option value="22">کرمان</option>
                        <option value="23">هرمزگان</option>
                        <option value="24">چهارمحال و بختیاری</option>
                        <option value="25">یزد</option>
                        <option value="26">سیستان و بلوچستان</option>
                        <option value="27">ایلام</option>
                        <option value="28">کهگلویه و بویراحمد</option>
                        <option value="29">خراسان شمالی</option>
                        <option value="30">خراسان جنوبی</option>
                        <option value="31">البرز</option>
                    </select>
                    <select name="city" id="city" class="citys">
                        <option value="0">لطفا استان را انتخاب نمایید</option>
                    </select>

                </div>

            </div>


            <div class="adrow">
                <div class="adtitle">
                    محله (ویژه شهر تهران) *
                </div>
                <div class="adjavab">
                    <input type="text" name="mahale">
                </div>
            </div>

            <div class="adrow">
                <div class="adtitle">

                    آدرس پستی *
                </div>
                <div class="adjavab">
                    <textarea name="address" style="width: 350px;height: 100px"></textarea>
                </div>
            </div>

            <div class="adrow">
                <div class="adtitle">

                    کد پستی *
                </div>
                <div class="adjavab">
                    <input type="text" name="postal">
                </div>
            </div>


            <div class="adrow">

<span class="button-gray" onclick="addaddress();" style="float: left;background-color: #2196f3;">
    افزودن آدرس جدید
</span>

            </div>


    </div>


    <div id="bg-dark-pd"></div>


    <h3 class="title-cart">
        انتخاب شیوه ارسال
    </h3>


    <div class="dgstepbox">

        <h4>
            زمان ارسال این مرسوله را انتخاب نمایید.
        </h4>


        <table cellspacing="0">
            <tr>
                <td colspan="4" style="text-align: right">
                    <img src="public/images/express_delivery_dk_48_icon.png" style="float: right;margin-left: 30px;">
                    <span style="float: right;font-size: 14px;line-height: 24px">
        تحویل اکسپرس دیجی‌کالا (ارسال رایگان سفارش‌های بالاتر از ‌صد هزار تومان )
   <br>
            <span style="font-size: 11px;color: #625f5f">
            زمان تقريبي تحويل: طبق بازه انتخابي در هنگام ثبت سفارشات
    </span>
            </span>
                </td>
                <td style="line-height: 30px;background-color: #fbfcfc">
                    هزینه ارسال
                    <br>
                    <span style="font-size: 16px;color: #62b965;text-align: center">رایگان</span>
                </td>

            </tr>


            <tr>
                <td style="width: 100px;line-height: 20px">یکشنبه<br>
                    <span style="font-size: 10px;color: #929782">1396/8/21</span></td>
                <td class="zaman active"><i></i>
                    ساعت 9 - 12
                </td>
                <td class="zaman"><i></i>
                    ساعت 12 - 15
                </td>
                <td class="zaman"><i></i>ساعت 15 - 18</td>
                <td width="220px"></td>
            </tr>
            <tr>
                <td>دوشنبه<br><span style="font-size: 10px;color: #929782">1396/8/21</span></td>
                <td class="zaman"><i></i>ساعت 9 - 12</td>
                <td class="zaman"><i></i>ساعت 12 - 15</td>
                <td class="zaman"><i></i>ساعت 15 - 18</td>
                <td class="zaman"><i></i>ساعت 18 - 21</td>
            </tr>
            <tr>
                <td>سه شنبه<br><span style="font-size: 10px;color: #929782">1396/8/21</span></td>
                <td class="zaman"><i></i>ساعت 9 - 12</td>
                <td class="zaman"><i></i>ساعت 12 - 15</td>
                <td class="zaman"><i></i>ساعت 15 - 18</td>
                <td class="zaman"><i></i>ساعت 18 - 21</td>
            </tr>
            <tr>
                <td>چهارشنبه<br><span style="font-size: 10px;color: #929782">1396/8/21</span></td>
                <td class="zaman"><i></i>ساعت 9 - 12</td>
                <td class="zaman"><i></i>ساعت 12 - 15</td>
                <td class="zaman"><i></i>ساعت 15 - 18</td>
                <td class="zaman"><i></i>ساعت 18 - 21</td>
            </tr>

        </table>


        <span class="button-gray" style="float: left;margin: 20px;background-color: #4fb8ed;">
  تایید و ثبت مرسوله
</span>


    </div>


</div>

<script>

    var editAddressField = '';

    $('.address-wrapper').slick({
        infinite: false,
        rtl: true,
        slidesToShow: 3,
        slidesToScroll: 3
    });


    var TableZaman = $(".dgstepbox table");
    var TableZamanTD = TableZaman.find('.zaman');

    TableZamanTD.click(function () {
        TableZamanTD.removeClass('active');
        $(this).addClass('active');
    });


    function editAddress(addressId) {

        editAddressField = addressId;


        var url = 'showcart2/editaddress/' + addressId;
        var data = {};
        $.post(url, data, function (msg) {


            $('input[name=fullname]').val(msg['fullname']);
            $('input[name=mobile]').val(msg['mobile']);
            $('input[name=tel]').val(msg['tell']);
            $('input[name=mahale]').val(msg['mahale']);
            $('input[name=postal]').val(msg['postal']);
            $('textarea[name=address]').val(msg['address']);


            var ostanCode = msg['ostan'];
            var cityCode = msg['city'];


            $('.states option').each(function (index) {

                var codeState = $(this).attr('value');
                if (codeState == ostanCode) {
                    $(this).attr('selected', 'selected');
                    ostanSelect(this.value);
                }

            });

            $('.citys option').each(function (index) {

                var codecity = $(this).attr('value');
                if (codecity == cityCode) {
                    $(this).attr('selected', 'selected');
                }

            });


        }, 'json');


        $("#bg-dark-pd").fadeIn();
        AddressBox.fadeIn();


    }


    var addressHa = $(".address-wrapper .address-box");
    var tedadAddress = addressHa.length;
    var selectHa = $(".address-wrapper .adselect");


    addressHa.eq(tedadAddress - 1).addClass('active');

    selectHa.click(function () {
        addressHa.removeClass('active');
        $(this).parents('.address-box').addClass('active');
    });


    var AddressBox = $("#add-address-box");
    var openAddressBox = $(".open-address-box");
    var CloseBox = AddressBox.find('.pd-close');

    CloseBox.click(function () {

        AddressBox.fadeOut();
        $("#bg-dark-pd").fadeOut();

    });


    function showNewAddressBox() {

        editAddressField = "";

        $("#addaddress").trigger('reset');

        $(".states option:selected").removeAttr('selected');
        // $(".states option[value=0]").attr('selected','selected');


        $("#bg-dark-pd").fadeIn();
        AddressBox.fadeIn();

    }


    function deleteAddress(addressId) {

        var url = 'showcart2/deleteadress/' + addressId;
        var data = {};
        $.post(url, data, function (msg) {

        });
        // window.location='showcart2';
    }


    function addaddress() {


        var url = 'showcart2/addadress/' + editAddressField;
        var data = $("#addaddress").serializeArray();
        $.post(url, data, function (msg) {
            window.location='showcart2';
        });

        // showAddresses();
        //

    }


    function showAddresses() {
        var url = 'showcart2/showaddresses';
        var data = {};
        $.post(url, data, function (msg) {
            var AddressHaArray = msg;


            console.log(msg);

            $.each(msg, function (index, value) {


                console.log(value['iduser']);


            });


        }, 'json');



    }


</script>


</body>
</html>