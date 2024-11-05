<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="http://127.0.0.1/dgmvc/">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>صفحه اصلی مدیریت</title>
    <link rel="stylesheet" href="public/admin.css">
    <script type="text/javascript" src="public/js/jquery-3.2.1.min.js"></script>
</head>
<body>

<nav>

</nav>


<div class="main">

    <?php
    $edit = $data[0];

    ?>

    <div class="sidebar">

        <ul>

            <li><a href="">داشبورد</a></li>

            <li><a href="">مدیریت دسته ها</a>

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

    <div class="wrapper">
        <div class="content">

            <form action="admin/menu/edit/<?= $edit['id'] ?>" method="post">

                <h1 class="addtitle">

                    ویرایش دسته بندی
                  <span style="font-size: 14px;color: #09252e">(<?= $edit['title'] ?>)</span>
                </h1>


                <div class="inputrow">
                    <label>نام دسته</label>
                    <input type="text" name="title" value="<?= $edit['title'] ?>" placeholder="نام دسته را وارد کنید">
                </div>

                <div class="inputrow">
                    <label>دسته والد</label>
                    <select name="parent" autocomplete="off">
                        <option value="0">دسته اصلی</option>

                        <?php
                        $cats = $data[1];
                        foreach ($cats as $cat) {

                            ?>
                            <option value="<?php echo $cat['id']; ?>" <?php if($cat['id'] == $edit['parent']){echo "selected";} ?>><?php echo $cat['title']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="inputrow">
                    <input type="submit" name="btneditcat" class="add-cat" value="ویرایش دسته">
                </div>
            </form>



        </div>
    </div>

</div>


<script>

    /*   function showzir1(tag) {
     var masir = $(tag);

     var parent = masir.parents('tbody');

     parent.find(".zirdaste1").fadeIn();
     }
     */

</script>


</body>
</html>