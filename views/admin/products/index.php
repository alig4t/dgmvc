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


    $allproducts = $data['allproducts'];


    ?>

    <div class="wrapper">
        <div class="content">


            <a href="admin/product/addproduct" class="addbtn">افزودن محصول جدید</a>

            <form action="admin/attr/<?= $idcat; ?>/delete" method="post">
                <table cellspacing="0" class="table-data">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>نام محصول</th>
                        <th>دسته بندی</th>
                        <th>قیمت</th>
                        <th>تخفیف</th>
                        <th>ویرایش</th>
                        <th>انتخاب</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    foreach ($allproducts as $row) {
                        ?>
                        <tr style="">
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['title'] ?></td>
                            <td><?= $row['catname'] ?></td>
                            <td><?= $row['price'] ?></td>
                            <td><?= $row['discount'] ?></td>
                            <td><a href="admin/product/addproduct/<?= $row['id'] ?>">ویرایش</a></td>
                            <td><input type="checkbox" value="<?= $row['id'] ?>" name="ids[]"></td>
                        </tr>

                        <?php

                    }
                    ?>

                    </tbody>

                </table>

                <input type="submit" name="delattr" value="حذف موارد انتخابی" class="del-cat">

            </form>
        </div>
    </div>

</div>


</body>
</html>
