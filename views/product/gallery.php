<div id="gallery-box">
    <div id="share-like">
        <ul>
            <li>
                <i class="share"></i>
            </li>
            <li>
                <i class="like"></i>
            </li>

        </ul>

    </div>

    <div id="product-img">
        <img id="prd-zoom" src="public/images/product/<?php echo $productInfo['id'] ?>/product_600.jpg"
             data-zoom-image="public/images/product/<?php echo $productInfo['id'] ?>/product_zoom.jpg">

        <script>
            $("#prd-zoom").elevateZoom({
                'zoomWindowOffetx': -800,
                'zoomWindowOffety': -40,
                'zoomWindowWidth': 480,
                'zoomWindowHeight': 480
            });
        </script>


        <ul>

            <?php
            $gallery = $data[2];
            $i=0;
            foreach ($gallery as $row) {
if($i==4){
    break;
}
                ?>
                <li data-url-image="public/images/product/<?= $row['idproduct'] ?>/gallery/large/<?= $row['img'] ?>">
                    <img src="public/images/product/<?= $row['idproduct'] ?>/gallery/small/<?= $row['img'] ?>">
                </li>
                <?php
                $i++;
            }
            if(sizeof($gallery)>3) {
                ?>


                <li class="noghte" data-url-image="public/images/product/<?= $row['idproduct'] ?>/gallery/large/<?= $row['img'] ?>">
                    <i></i>
                </li>
                <?php
            }
            ?>

        </ul>
    </div>


    <div id="prd-gallery">
        <h4>
            گوشی موبایل سامسونگ مدل Gallexy J5 (2016)
        </h4>

        <i class="pd-close"></i>


        <div id="gl-right">

            <div class="pd-img-box">
                <img class="pd-main-image" src="">
            </div>

            <div class="img3dbox">
                <canvas id="cv3d" width="712px" height="505px"></canvas>
            </div>


        </div>


        <div id="gl-left">

            <ul>
                <li data-url-image="" class="icon3d">
                    <img src="public/images/product/medium/2bf0cb.jpg">
                    <span></span>
                </li>

                <?php
                foreach ($gallery as $row) {
                    ?>

                    <li data-url-image="public/images/product/<?= $row['idproduct'] ?>/gallery/large/<?= $row['img'] ?>">
                        <img src="public/images/product/<?= $row['idproduct'] ?>/gallery/small/<?= $row['img'] ?>">
                    </li>

                    <?php
                }
                ?>


            </ul>

        </div>


    </div>


    <div id="bg-dark-pd"></div>


    <script>
        var canvasTag = document.getElementById('cv3d');
        var viewer = new JSC3D.Viewer(canvasTag, {
            SceneUrl: 'public/images/product/<?= $productInfo['id'] ?>/gallery/3d/3d.obj',
            InitRotationX: -100,
            InitRotationY: -100,
            InitRotationZ: 0,
            RenderMode: 'texturesmooth'
        });
        viewer.init();
        viewer.update();
    </script>


    <script>

        var prdGallery = $("#prd-gallery");
        var glThumbnail = prdGallery.find('#gl-left ul li');
        var pdImgBox = prdGallery.find('#gl-right .pd-img-box');
        var Img3dBox = prdGallery.find('#gl-right .img3dbox');
        var icon3d = $(".icon3d");

        glThumbnail.click(function () {
            glThumbnail.removeClass('active');
            $(this).toggleClass('active');
            var ImgUrl = $(this).attr('data-url-image');

            if (ImgUrl.length > 0) {
                Img3dBox.hide();
                pdImgBox.show();
                pdImgBox.find('.pd-main-image').attr('src', ImgUrl);
            }
            else {
                pdImgBox.fadeOut();
                Img3dBox.fadeIn(1500);
            }
        });

        var CloseBox = prdGallery.find('.pd-close');

        CloseBox.click(function () {

            prdGallery.fadeOut();
            $("#bg-dark-pd").fadeOut();

        });

        var ProductImg = $("#product-img");

        ProductImg.find('ul li').click(function () {


            $("#bg-dark-pd").fadeIn();
            prdGallery.fadeIn();


            var ImgUrl = $(this).attr('data-url-image');
            var indexImgth = $(this).index();
           /* if (indexImgth == 4) {
                indexImgth = 0
            }*/
            glThumbnail.removeClass('active');
            glThumbnail.eq(indexImgth + 1).addClass('active');
            pdImgBox.find('.pd-main-image').attr('src', ImgUrl);
            pdImgBox.addClass('active');


        });


        $("#prd-gallery #gl-left").mCustomScrollbar({
            setWidth: false,
            setHeight: false,
            setTop: 0,
            setLeft: 0,
            axis: "y",
            scrollbarPosition: "inside",
            scrollInertia: 350,
            autoDraggerLength: true,
            autoHideScrollbar: true,
            autoExpandScrollbar: false,
            alwaysShowScrollbar: 0,
            snapAmount: null,
            snapOffset: 0,
            mouseWheel: {
                enable: true,
                scrollAmount: "auto",
                axis: "y",
                preventDefault: false,
                deltaFactor: "auto",
                normalizeDelta: false,
                invert: false,
                disableOver: ["select", "option", "keygen", "datalist", "textarea"]
            },
            scrollButtons: {
                enable: true,
                scrollType: "stepless",
                scrollAmount: "auto"
            },
            keyboard: {
                enable: true,
                scrollType: "stepless",
                scrollAmount: "auto"
            },
            contentTouchScroll: 25,
            advanced: {
                autoExpandHorizontalScroll: false,
                autoScrollOnFocus: "input,textarea,select,button,datalist,keygen,a[tabindex],area,object,[contenteditable='true']",
                updateOnContentResize: true,
                updateOnImageLoad: true,
                updateOnSelectorChange: false,
                releaseDraggableSelectors: false
            },
            theme: "minimal-dark",

            callbacks: {
                onInit: false,
                onScrollStart: false,
                onScroll: false,
                onTotalScroll: false,
                onTotalScrollBack: false,
                whileScrolling: false,
                onTotalScrollOffset: 0,
                onTotalScrollBackOffset: 0,
                alwaysTriggerOffsets: true,
                onOverflowY: false,
                onOverflowX: false,
                onOverflowYNone: false,
                onOverflowXNone: false
            },
            live: false,
            liveSelector: null

        });


    </script>


</div>

