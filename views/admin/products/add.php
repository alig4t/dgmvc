<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="http://127.0.0.1/dgmvc/">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>مدیریت محصولات </title>
    <link rel="stylesheet" href="public/admin.css">
    <script type="text/javascript" src="public/js/jquery-3.2.1.min.js"></script>
    <script src="public/ckeditor/ckeditor.js"></script>
</head>
<body>

<nav>

</nav>


<div class="main">


    <div class="sidebar">

        <ul>

            <li><a href="">داشبورد</a></li>

            <li><a href="admin/category">مدیریت دسته ها</a>

                <ul>
                    <li><a href="#">لیست دسته ها</a>
                    <li><a href="#">افزودن دسته جدید</a>
                </ul>

            </li>


            <li><a href="">مدیریت محصولات</a></li>
            <li><a href="">مدیریت کاربران</a></li>
            <li><a href="">مدیریت سفارش ها</a></li>
            <li><a href="">تنظیمات</a></li>


        </ul>

    </div>


    <?php

    $cats = $data['cats'];
    $colors = $data['colors'];
    $garentee = $data['garentee'];

    if ($data['pid'] != '') {
        $edit = true;
        $product = $data['product'];

    } else {
        $edit = false;
    }


    ?>

    <div class="wrapper">


        <form action="" method="post" enctype="multipart/form-data">
            <div class="content">

                <h3>افزودن محصول جدید</h3>

                <div class="inputrow">
                    <label>نام محصول</label>
                    <input type="text" name="title" value="<?php if ($edit) {echo $product['title'];} ?>">
                </div>

                <div class="inputrow">
                    <label>دسته بندی</label>
                    <select name="cat">
                        <option value="0">دسته بندی را انتخاب کنید</option>
                        <?php

                        foreach ($cats as $cat) {
                            $selected = '';
                            if($edit){
                                $catId = $product['cat'];
                                if($catId == $cat['id']){
                                    $selected = 'selected';
                                }
                            }
                            ?>

                            <option value="<?= $cat['id']; ?>" <?php echo $selected; ?> ><?= $cat['title']; ?></option>

                            <?php
                        }
                        ?>
                    </select>
                </div>





                <div class="inputrow">
                    <label>تصویر محصول</label>
                    <input type="file" name="pic">
                </div>



                <div class="inputrow">
                    <label>قیمت محصول</label>
                    <input type="text" name="price" value="<?php if ($edit) {echo $product['price'];} ?>">
                </div>

                <div class="inputrow">
                    <label>میزان تخفیف</label>
                    <input type="text" name="discount" value="<?php if ($edit) {echo $product['discount'];} ?>">
                </div>

                <div class="inputrow">
                    <label>توضیحات محصول</label>
                    <textarea class="editor1" id="editor1" style="vertical-align: middle" cols="70" rows="8"
                              name="introduction">
                         <?php if ($edit) {echo $product['introduction'];}else{
                             echo "توضیحات محصول را بنویسید" ;
                         } ?>
                    </textarea>
                </div>

                <script>

                    CKEDITOR.replace('editor1', {});

                </script>


                <div class="row inputrow">
                    <label>رنگ بندی محصول</label>
                    <select class="selectparent">

                        <option value="0">رنگ مورد نظر را انتخاب کنید</option>
                        <?php
                        if($edit) {
                            $colArray = explode(',', $product['color']);
                            $selColor = [];
                        }
                        foreach ($colors as $color) {

                            ?>

                            <option data-title="<?php echo $color['title']; ?>" value="<?= $color['id']; ?>"
                                    onclick=addColor(this,"<?php echo $color['id']; ?>","<?php echo $color['hex']; ?>")><?= $color['title']; ?></option>


                            <?php


                            if($edit) {
                                foreach ($colArray as $col){

                                    if($color['id'] == $col){
                                        array_push($selColor,$color);
                                    }

                                }
                            }


                        }
                        ?>
                    </select>
                    <div class="colorbox">

                        <?php

//print_r($selColor);
if($edit){
    foreach ($selColor as $row){
        echo "<span class=\"addcolor\"><input type=\"hidden\" value=".$row['id']." name=\"color[]\"><img onclick=\"removeItem(this);\" src=\"public/images/Delete.gif\">".$row['title']."</span>";
    }
}

                        ?>

                    </div>

                    <!--                <span class="addcolor"></span>-->
                </div>
                <div class="inputrow">
                    <label>گارانتی محصول</label>
                    <select name="garentee" autocomplete="off">
                        <option value="0">گارانتی محصول را انتخاب کنید</option>
                        <?php
                        foreach ($garentee as $gr) {
                            $selected = '';
                            if($edit){
                                $gId = $product['garantee'];
                                if($gId == $gr['id']){
                                    $selected = 'selected';
                                }
                            }
                            ?>

                            <option value="<?= $gr['id']; ?>" <?php echo $selected;?>><?= $gr['title']; ?></option>

                            <?php
                        }
                        ?>

                    </select>
                </div>


                <div class="inputrow">


                    <input type="submit" value="<?php
if($edit){echo "ویرایش محصول";}else{echo "افزودن محصول";}
                    ?>
" class="addbtn"
                           style="border: none;font-size: 14px;font-family: 'dg-yekan'">


                </div>


            </div>
        </form>
    </div>

</div>


<script>

    function addColor(tag, colorId, colorCode) {
        var optionTag = $(tag);
        var colorName = optionTag.attr('data-title');
        var spanTag = '<span class="addcolor"><input type="hidden" value="' + colorId + '" name="color[]"><img onclick="removeItem(this);" src="public/images/Delete.gif">' + colorName + '</span>';
        var colorbox = optionTag.parents('.row').find('.colorbox');
        colorbox.append(spanTag);
    }


    function removeItem(tag) {
        var removeTag = $(tag);
        var spanItem = removeTag.parents('.addcolor');
        spanItem.remove();

    }


    /*function addColor(tag, colorId, colorCode) {

     var optionTag = $(tag);
     var colorName = optionTag.attr('data-title');
     var spanTag = '<span style="background:' + colorCode + '" class="span_item"><input type="hidden" value="' + colorId + '" name="color[]">' + colorName + '<img style="width: 15px" src="public/images/close-icon.gif" onclick="removeItem(this);"></span>';
     var divRow = optionTag.parents('.row');
     divRow.append(spanTag);

     }*/


</script>


</body>
</html>
