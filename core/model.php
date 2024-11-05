<?php

class Model
{

    static $conn = '';

    function __construct()
    {
        $username = 'root';
        $password = '';
        self::$conn = new PDO("mysql:host=localhost;dbname=digi_mvc", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES "utf8"'));

        self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }


    static function get_option($fild = '')
    {

        if ($fild != '') {
            $sql = "SELECT * FROM tbl_option WHERE setting = ?";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindParam(1, $fild);
            $stmt->execute();
            $result = $stmt->fetch();

            return $result['value'];


        } else {
            $sql = "SELECT * FROM tbl_option";
            $stmt = self::$conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $newOption = [];
            foreach ($result as $row) {
                $setting = $row['setting'];
                $value = $row['value'];
                $newOption[$setting] = $value;
            }
            return $newOption;
        }
    }


    function getDiscount($result, $fetchAll = 'true')
    {

        if ($fetchAll == 'false') {

            $result['total_price'] = $result['price'] - $result['discount'];

        } else {

            foreach ($result as $key => $row) {
                $price = $row['price'];
                $discount = $row['discount'];
                $total_price = $price - $discount;
                $result[$key]['total_price'] = $total_price;
            }
        }
        return $result;
    }


    function calSpecial($time_selected)
    {

        $duration = self::get_option('time_special');
        $time_duration = $time_selected + $duration;
        date_default_timezone_set("Asia/Tehran");
        $date_special = date('F d,Y H:i:s', $time_duration);
        return $date_special;
    }


    function doSelect($sql, $values = [], $fetch = 0, $fetch_style = PDO::FETCH_ASSOC)
    {
        $stmt = self::$conn->prepare($sql);

        foreach ($values as $key => $val) {
            $stmt->bindValue($key + 1, $val);
        }

        $stmt->execute();

        if ($fetch == 0) {
            $result = $stmt->fetchAll($fetch_style);
        } else {
            $result = $stmt->fetch($fetch_style);
        }

        return $result;
    }


    function doQuery($sql, $values = [])
    {

        $stmt = self::$conn->prepare($sql);
        foreach ($values as $key => $val) {
            $stmt->bindValue($key + 1, $val);
        }

        $stmt->execute();
    }


    function create_thumbnail($file, $pathToSave = '', $w, $h = '', $crop = FALSE)
    {

        $new_height = $h;

        list($width, $height) = getimagesize($file);

        $r = $width / $height;

        if ($crop) {
            if ($width > $height) {
                $width = ceil($width - ($width * abs($r - $w / $h)));
            } else {
                $height = ceil($height - ($height * abs($r - $w / $h)));
            }
            $newwidth = $w;
            $newheight = $h;
        } else {
            if ($w / $h > $r) {
                $newwidth = $h * $r;
                $newheight = $h;
            } else {
                $newheight = $w / $r;
                $newwidth = $w;
            }
        }

        $what = getimagesize($file);

        switch (strtolower($what['mime'])) {
            case 'image/png':
                $src = imagecreatefrompng($file);

                break;
            case 'image/jpeg':
                $src = imagecreatefromjpeg($file);
                break;
            case 'image/gif':
                $src = imagecreatefromgif($file);
                break;
            default:
                //die();
        }

        if ($new_height != '') {
            $newheight = $new_height;
        }

        $dst = imagecreatetruecolor($newwidth, $newheight);//the new image
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);//az function

        imagejpeg($dst, $pathToSave, 95);//pish farz in tabe 75 darsad quality ast

        return $dst;


    }


    public static function sessionInit()
    {
        session_start();
    }

    public static function sessionSet($name, $val)
    {
        $_SESSION[$name] = $val;
    }

    public static function sessionGet($name)
    {
        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        } else {
            return false;
        }
    }

    public static function getBasketCookie()
    {

        if (isset($_COOKIE['basket'])) {
            $cookie = $_COOKIE['basket'];
        } else {

            $value = time().rand(0,9);
            $expire = time()+7*24*3600;
            setcookie('basket',$value,$expire,'/');
            $cookie = $value;
        }

        return $cookie;
    }


}


?>