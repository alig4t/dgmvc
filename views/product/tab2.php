<h5>
    مشخصات فنی
    <span>
     گوشي موبايل سامسونگ مدل Galaxy S7 Edge SM-G935FD دو سيم‌کارت ظرفيت 32 گيگابايت
</span>
</h5>


<?php


$fanni = $data[0];

/*echo "<pre>";
print_r($fanni);
echo "</pre>";
*/

foreach ($fanni as $row) {

    ?>


    <h4 class="tab-sec-title">

        <?php echo $row['title']; ?>
    </h4>


    <div class="info-box">
        <ul>
            <?php

            foreach ($row['child'] as $child) {

                ?>
                <li>
                    <span class="onvan"><?php echo $child['title']; ?></span>
                    <span class="info"><?php if($child['value']==''){echo "-";}else{echo $child['value'];} ?></span>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>


    <?php
}
?>
