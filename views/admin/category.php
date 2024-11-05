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
    $sortcat = $data[0];

    /*echo "<pre>";
    print_r($sortcat);
    echo "</pre>";*/

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

            <form action="admin/category/add" method="post">

                <h1 class="addtitle">افزودن دسته بندی جدید</h1>


                <div class="inputrow">
                    <label>نام دسته</label>
                    <input type="text" name="title" placeholder="نام دسته را وارد کنید">
                </div>
                <div class="inputrow">
                    <label>دسته والد</label>
                    <select name="parent">
                        <option value="0">دسته اصلی</option>
                        <?php

                        $allcat = $data[1];

                        foreach ($allcat as $cat) {
                            ?>
                            <option value="<?php echo $cat['id']; ?>"><?php echo $cat['title']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="inputrow">
                    <input type="submit" name="btnaddcat" class="add-cat" value="افزودن دسته">
                </div>
            </form>


            <form action="admin/category/delete" method="post">
                <table cellspacing="0" class="table-data">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>نام دسته</th>
                        <th>نمایش زیر دسته ها</th>
                        <th>زیر دسته</th>
                        <th>ویژگی ها</th>
                        <th>ویرایش</th>
                        <th>انتخاب</th>
                    </tr>
                    </thead>
                    <tbody>


                    <?php

                    $lvl1 = sizeof($sortcat);

                    for ($key1 = 0; $key1 < $lvl1; $key1++) {
                        ?>

                        <tr class="levelasli">
                            <td><?php echo $sortcat[$key1]['id'] ?></td>
                            <td style="font-weight: bold;font-size: 15px;/*background-color: #fa4652;text-align: center"><?php echo $sortcat[$key1]['title'] ?></td>
                            <td onclick="showzir1(this)"><img src="public/images/angle-arrow-down.png"></td>
                            <td>دسته والد</td>
                            <td><a href="admin/attr/<?php echo $sortcat[$key1]['id']; ?>">مدیریت</a></td>
                            <td><a href="admin/category/edit/<?= $sortcat[$key1]['id'] ?>">ویرایش</a></td>
                            <td><input type="checkbox" name="ids[]" value="<?php echo $sortcat[$key1]['id'] ?>"></td>

                        </tr>

                        <?php

                        $lvl2 = sizeof($sortcat[$key1]['child1']);
                        for ($key2 = 0; $key2 < $lvl2; $key2++) {

                            ?>

                            <tr class="zirdaste1">

                                <td><?php echo $cid = $sortcat[$key1]['child1'][$key2]['id'] ?></td>
                                <td style="/*border-right: 1px solid*/"><?php
                                    if (isset($sortcat[$key1]['child1'][$key2]['title'])) {
                                        echo $sortcat[$key1]['child1'][$key2]['title'];
                                    }
                                    ?></td>
                                <td onclick="showzir1(this)"><img src="public/images/angle-arrow-down.png"></td>
                                <td>زیر دسته سطح یک</td>
                                <td><a href="admin/attr/<?php echo $cid ?>">مدیریت</a></td>
                                <td><a href="admin/category/edit/<?= $cid ?>">ویرایش</a>
                                </td>
                                <td><input type="checkbox" name="ids[]"
                                           value="<?php echo $cid ?>"></td>
                            </tr>

                            <?php
                            $lvl3 = sizeof($sortcat[$key1]['child1'][$key2]['child2']);
                            for ($key3 = 0; $key3 < $lvl3; $key3++) {
                                ?>

                                <tr class="zirdaste2">
                                    <td><?php echo $cid = $sortcat[$key1]['child1'][$key2]['child2'][$key3]['id'] ?></td>
                                    <td style="/*border-right: 1px solid*/"><?php
                                        if (isset($sortcat[$key1]['child1'][$key2]['child2'][$key3]['title'])) {
                                            echo $sortcat[$key1]['child1'][$key2]['child2'][$key3]['title'];
                                        }
                                        ?></td>
                                    <td onclick="showzir1(this)"><img src="public/images/angle-arrow-down.png"></td>
                                    <td>زیر دسته سطح دو</td>
                                    <td><a href="admin/attr/<?php echo $cid ?>">مدیریت</a></td>
                                    <td>
                                        <a href="admin/category/edit/<?= $cid ?>">ویرایش</a>
                                    </td>
                                    <td><input type="checkbox" name="ids[]"
                                               value="<?php echo $cid ?>">
                                    </td>
                                </tr>

                                <?php
                                $lvl4 = sizeof($sortcat[$key1]['child1'][$key2]['child2'][$key3]['child3']);
                                for ($key4 = 0; $key4 < $lvl4; $key4++) {
                                    ?>

                                    <tr class="zirdaste3">
                                        <td><?php echo $cid = $sortcat[$key1]['child1'][$key2]['child2'][$key3]['child3'][$key4]['id']; ?></td>
                                        <td style="font-size: 11px;color: #b30b31"><?php
                                            if (isset($sortcat[$key1]['child1'][$key2]['child2'][$key3]['child3'])) {
                                                echo $sortcat[$key1]['child1'][$key2]['child2'][$key3]['child3'][$key4]['title'];
                                            }
                                            ?></td>
                                        <td onclick="showzir1(this)"><img src="public/images/angle-arrow-down.png"></td>
                                        <td>زیر دسته سطح سه</td>
                                        <td><a href="admin/attr/<?php echo $cid ?>">مدیریت</a></td>
                                        <td>
                                            <a href="admin/category/edit/<?= $cid ?>">ویرایش</a>
                                        </td>
                                        <td><input type="checkbox" name="ids[]"
                                                   value="<?php echo $cid; ?>">
                                        </td>
                                    </tr>


                                    <?php
                                }
                            }
                        }
                    }
                    ?>


                    </tbody>
                </table>

                <input type="submit" value="حذف موارد انتخابی" class="del-cat">

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