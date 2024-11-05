<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ajax</title>

    <script type="text/javascript" src="public/js/jquery-3.2.1.min.js"></script>

</head>
<body>



<?php
/*

$username = 'root';
$password = '';
$conn = new PDO("mysql:host=localhost;dbname=digi_mvc", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES "utf8"'));

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);*/

$arr=['اسلام شهر','اندیشه','بومهن','پاكدشت','تجريش','تهران','چهاردانگه','دماوند','رباط كريم','رودهن','ري','شريف آباد','شهريار','فشم','فيروزكوه','قدس','قرچك','كن','كهريزك','گلستان','لواسان','ملارد','ورامين'];

/*foreach ($arr as $row){
    $sql = "insert into tbl_city (title,idostan) VALUES ('$row',1)";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}*/
?>




<script>
    var garantyLi = $(".garanty-box .garanty-wrapper ul li");
    garantyLi.click(function () {
        var garantitxt = $(this).text();
        var basketRowId = $(this).parents('tr').attr('data-id');
        $(this).parents('.garanty-wrapper').find('.gr-title').text(garantitxt);


        var url = "<?php echo publicUrl;?>cart/updatebasket/" + basketRowId;
        var data = {'tedad': garantitxt};

        $.post(url, data, function (msg) {

            $('#tblbasket tbody tr').remove();

            $.each(msg, function (index, value) {


                var trTag = '<tr data-id="' + value['basketId'] + '"><td><div class="basket-pr-img"><img src="public/images/product/' + value['id'] + '/product_150.jpg"></div><div class="basket-pr-title"><h3><a href="#">' + value['title'] + '</a></h3><h3><a href="#">Philips BT5200/13 Hair Trimmer</a></h3><p>رنگ :<i class="color-circle" style="background-color: #2b2b2b"></i><span>مشکی</span><span style="display: block;margin-top: 10px">گارانتی : گارانتی 2 ساله شکوفا الکتریک</span></p></div></td><td>دیجی کالا</td><td><div class="garanty-box"><div class="garanty-wrapper"><i class="tik"></i><span class="gr-title">' + value['tedad'] + '</span><i class="zirmenu"></i><ul><li>1</li><li>2</li><li>3</li><li>4</li><li>5</li><li>6</li><li>7</li><li>8</li><li>9</li><li>10</li><li>11</li><li>12</li><li>13</li><li>14</li><li>15</li></ul></div></div></td><td><span class="cartprice">' + value['price'] + '</span><span class="carttuman">تومان</span></td><td style="border-left: none"><span class="cartprice">' + value['price'] * value['tedad'] + '</span><span class="carttuman">تومان</span></td><td class="cancell-pr"><i onclick="deleteBasket(' + value['basketId'] + ');"></i></td></tr>';

                $('#tblbasket tbody').append(trTag);

            });

        }, 'json');

    });
</script>











<button>
    click me!
</button>





<script>

    $("button").click(function () {

        var url='test2.php';
        var data={'id':2};

        $.post(url,data,function (msg,status) {
            alert(status);
        });

    });

</script>


</body>
</html>