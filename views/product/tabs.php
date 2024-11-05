<div class="tab-box">
    <ul>
        <li class="active">نقد و بررسی تخصصی</li>
        <li>مشخصات فنی</li>
        <li>نظرات کاربران</li>
        <li>پرسش و پاسخ</li>
        <li>اینفوگرافی</li>
    </ul>


    <div class="tabcontent">

        <?php /*include_once 'tab1.php';*/ ?><!--
<?php /*include_once 'tab2.php';*/ ?>
<?php /*include_once 'tab3.php';*/ ?>
<?php /*include_once 'tab4.php';*/ ?>
--><?php /*include_once 'tab5.php';*/ ?>

        <section></section>
        <section></section>
        <section style="padding-bottom: 40px;"></section>
        <section id="question-page"></section>
        <section></section>


    </div>


</div>


<script>

    var tabBoxLi = $(".tab-box ul li");
    var tabSecContent = $(".tabcontent").find('section');
    tabBoxLi.click(function () {
        tabBoxLi.removeClass('active');
        $(this).addClass('active');
        tabSecContent.fadeOut(0);
        var tabIndex = $(this).index();

        var selectedTab = tabSecContent.eq(tabIndex);

        var url = "<?php echo publicUrl;?>product/tabs/<?php echo $productInfo['id']."/".$productInfo['cat'] ?>";
        var data = {'number':tabIndex};

        $.post(url, data, function (msg) {
            selectedTab.html(msg);
            selectedTab.fadeIn(500);
        });



    })


</script>
