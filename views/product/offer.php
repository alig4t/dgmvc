<div id="pishnahad-vip">

    <div class="timerbox">
        <div class="flipTimer">

            <div class="hours"></div>
            <div class="minutes"></div>
            <div class="seconds"></div>
        </div>
    </div>

    <div class="takhfif">
        <span class="adad"><?= $productInfo['discount']/1000 ?></span>
        <span class="tuman">هزار تومان</span>
        <span class="txt-off">تخفیف</span>
    </div>

</div>


<script>
    $('.flipTimer').flipTimer({
        direction: 'down',
        date: '<?= $productInfo['date_special'] ?>',
        callback: function () {
            $('.sec-slider-content').addClass('finishblur');
            var finishImg = $('#sec-slider .tamamshod');
            finishImg.css('display', 'block');
            $('.sec-slider-content-box .timerbox').hide();
        }

    });
</script>
