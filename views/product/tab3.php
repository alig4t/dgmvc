<div id="comment_result">

    <h4 class="tab-sec-title">
        امتیاز کاربران به:

        <span class="zirttle">
گوشي موبايل ال جي مدل X Power2 دو سيم کارت
                    </span>
    </h4>

    <?php

    $avgParam = $data[2];
    /*echo "<pre>";
    print_r($avgParam);
        echo "</pre>";*/
    $commnetParam = $data[0];
    $commnets = $data[1];
    foreach ($commnetParam as $cparam) {

        /*echo "<pre>";
        print_r($cparam);
        echo "</pre>";*/

        $param_id = $cparam['id'];

        ?>


        <div class="pdrow">

        <span class="title">
<?php echo $cparam['title']; ?>
                       </span>

        <ul>

        <?php

        if(isset($avgParam[$param_id])){
            $score = $avgParam[$param_id];
        }else{
            $score = 0;
        }

        $floor = floor($score);

    $ashar = $score - $floor;

        for ($i = 0; $i < $floor; $i++) {
            echo "<li><span></span></li>";
        }
        if($score<5) {
            ?>
            <li><span style="width: <?= $ashar*100 ?>%;"></span></li>
            <?php
        }
          for ($i=0 ; $i<(5 - ($floor+1));$i++) {
              echo "<li></li>";
          }

            ?>



            </ul>

            </div>

            <?php
    }
    ?>


</div>


<div id="comment_send">

    <p style="font-size: 15px;color: #2d2d2d">
        شما هم می توانید در مورد این کالا نظر بدهید.
    </p>

    <p style="font-size: 13px;color: #625f5f">
        برای ثبت نظرات، نقد و بررسی شما لازم است ابتدا وارد حساب کاربری خود شوید. اگر این محصول را قبلا
        از دیجی کالا خریده باشید، نظر شما به عنوان مالک محصول ثبت خواهد شد.
    </p>

    <div style="text-align: left">

        <a class="send_comment_click">
            نظر خود را بنویسید
        </a>
    </div>

</div>


<div id="show_comment">

    <h5>
        نظرات کاربران
    </h5>

    <div class="horizental_row"></div>


    <?php
    foreach ($commnets as $commnet) {
        ?>

        <div class="pdcomment">

            <div class="pdhead">


                            <span style="font-size: 12px">
مجید احمدی (خریدار این محصول)
                            </span>


                <span style="font-size: 9px;color: #625f5f">
<?= $commnet['date'] ?>
                </span>


            </div>


            <div class="pdcontent">


                <div class="darsadbox">

                    <?php
                    $param_array = unserialize($commnet['param']);

                    foreach ($commnetParam as $param) {

                        $paramId = $param['id'];

                        ?>


                        <div class="pdrow">

                       <span class="title">
                           <?php
                           echo $param['title'];
                           if (isset($param_array[$paramId])) {
                               $value = $param_array[$paramId];
                               echo $value;
                           }
                           ?>
                       </span>

                            <ul>
                                <?php
                                $floor = floor($value);
                                $ashar = $value - $floor;
                                for ($i = 0; $i < $floor; $i++) {
                                    echo "<li><span></span></li>";
                                }
                                ?>

                                <?php
                                if ($floor < 5) {
                                    ?>
                                    <li><span style="width: <?php echo($ashar * 100); ?>%"></span></li>

                                    <?php
                                }
                                for ($i = 0; $i < (5 - ($floor + 1)); $i++) {
                                    echo "<li></li>";
                                }
                                ?>

                            </ul>

                        </div>

                        <?php
                    }
                    ?>

                </div>


                <div class="nazarbox">
                    <div class="nazar-title">
                        <?= $commnet['title'] ?>
                    </div>
                    <div class="noghat">


                        <div class="ghovat">
                            <span>نقاط قوت</span>
                            <?php
                            if ($commnet['ghovat'] != '') {
                                $ghovat = unserialize($commnet['ghovat'])
                                ?>

                                <ul>
                                    <?php
                                    foreach ($ghovat as $row) {
                                        echo "<li>" . $row . "</li>";
                                    }
                                    ?>
                                </ul>
                                <?php
                            }
                            ?>
                        </div>


                        <div class="zaaf">
                            <span>نقاط ضعف</span>
                            <?php
                            if ($commnet['zaaf'] != '') {
                                $zaaf = unserialize($commnet['zaaf']);
                                ?>


                                <ul>
                                    <?php

                                    foreach ($zaaf as $row) {
                                        echo "<li>" . $row . "</li>";
                                    }

                                    ?>
                                </ul>
                                <?php
                            }
                            ?>
                        </div>


                    </div>


                    <div class="nazar-matn">
                        <p>
                            <?= $commnet['text'] ?>
                        </p>

                    </div>


                    <div class="nazar-like-box">
<span class="pdlike">
  <span class="yesno">خیر</span>
  <span class="adad"><?= $commnet['dislikecount'] ?></span>
</span>


                        <span class="pdlike">
  <span class="yesno">بلی</span>
  <span class="adad"><?= $commnet['likecount'] ?></span>
</span>

                        <span class="soall">آیا این نظر برایتان مفید بود ؟</span>


                    </div>


                </div>


            </div>


        </div>

        <?php
    }
    ?>


</div>

