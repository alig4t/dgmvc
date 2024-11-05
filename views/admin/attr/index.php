<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="http://127.0.0.1/dgmvc/">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>مدیریت ویژگی ها</title>
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


    $attr = $data['attr'];
$idcat = $data['idcat'];

    ?>

    <div class="wrapper">
        <div class="content">

            <form action="admin/attr/<?= $idcat; ?>/add" method="post">

                <h1 class="addtitle">افزودن ویژگی جدید</h1>


                <div class="inputrow">
                    <label>نام ویژگی</label>
                    <input type="text" name="title" placeholder="نام ویژگی را وارد کنید">
                </div>
                <div class="inputrow">
                    <label>ویژگی والد</label>
                    <select name="parent">
                        <option value="0">ویژگی اصلی</option>
                        <?php

                        foreach ($attr as $row) {
                            ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['title']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="inputrow">
                    <input type="submit" name="btnattr" class="add-cat" value="افزودن ویژگی">
                </div>
            </form>


            <form action="admin/attr/<?= $idcat; ?>/delete" method="post">
                <table cellspacing="0" class="table-data">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>نام ویژگی</th>
                        <th>انتخاب</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    foreach ($attr as $row) {
                        ?>
                        <tr style="background-color: #62b965;color: #fff">
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['title'] ?></td>
                            <td><input type="checkbox" value="<?= $row['id'] ?>" name="ids[]"></td>
                        </tr>

                        <?php
                        if(isset($row['child'])) {
                            foreach ($row['child'] as $child) {
                                ?>
                                <tr>
                                    <td><?= $child['id'] ?></td>
                                    <td><?= $child['title'] ?></td>
                                    <td><input type="checkbox" value="<?= $child['id'] ?>" name="ids[]"></td>
                                </tr>

                                <?php
                            }
                        }
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
