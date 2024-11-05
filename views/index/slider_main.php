


<div id="main-slider">

    <span id="prev"></span>
    <span id="next"></span>

    <div class="slider-img">

        <?php

        foreach ($data[0] as $slider) {

            ?>
            <a href="<?= $slider['link'] ?>" class="item">
                <img src="<?= $slider['img'] ?>">
            </a>

            <?php
        }
        ?>


    </div>


    <div id="slider-nav">
        <ul>
            <li>
                صندلی و کفش تابستانه
            </li>
            <li>
                عینک
            </li>
            <li>
                سرویس های آشپزخانه
            </li>
            <li>
                گوشی سامسونگ
            </li>
            <li>
                محصولات apple
            </li>
        </ul>
    </div>

</div>

