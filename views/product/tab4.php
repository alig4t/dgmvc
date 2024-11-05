<h4 class="tab-sec-title">
    پرسش خود را مطرح نمایید
</h4>


<textarea id="ques-matn" placeholder="متن پرسش خود را اینجا بنویسید ...">

                </textarea>

<div class="row" style="margin-bottom: 55px">
    <div class="sabt-soal">
        ثبت پرسش
    </div>
</div>


<h4 class="tab-sec-title">
    پرسش ها و پاسخ ها
</h4>


<div class="horizental_row"></div>

<?php

$questions = $data[0];
$answers = $data[1];
foreach ($questions as $row) {

    $qId = $row['id'];
    ?>


    <div class="question">
        <div class="row headd">
            <span class="ques-icon">پرسش</span>
            <span class="ques-name"> توسط محمدباقر اشکوئی- <?php echo $row['date']; ?></span>
        </div>

        <div class="ques-content">
            <p>
                <?php echo $row['text']; ?>
            </p>

            <?php
            if (isset($answers[$qId])) {
                ?>

                <div style="width: 90%;margin-right: 20px;border-radius: 8px;background: #fafafa;height: auto;border: 1px solid #dddddd;">
                    <p>
                        <?php
                        echo $answers[$qId];
                        ?>
                    </p>
                </div>

                <?php
            }
            ?>

        </div>

    </div>

    <?php
}
?>



