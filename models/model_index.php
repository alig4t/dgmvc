<?php

class model_index extends Model
{


    function __construct()
    {

        parent::__construct();

    }

    function mainSlider()
    {

        $sql = "SELECT * FROM main_slider";
        $result=$this->doSelect($sql);

        return $result;
    }

    function slider_discont()
    {

        $sql = "SELECT * FROM tbl_product WHERE special=?";
        $result = $this->doSelect($sql,[1]);

        $time_selected = $result[0]['time_special'];
        $result = $this->getDiscount($result);
        $date_special = $this->calSpecial($time_selected);

        return [$result, $date_special];

    }


    function newest()
    {
        $limit = self::get_option('limit_slider');
        $sql = "SELECT * FROM tbl_product ORDER BY id DESC limit " . "$limit";
        $result = $this->doSelect($sql);
        $result = $this->getDiscount($result);

        return $result;
    }


    function onlydg()
    {
        $limit = self::get_option('limit_slider');
        $sql = "SELECT * FROM tbl_product WHERE only_dg=1 limit " . "$limit";
        $result = $this->doSelect($sql);
        $result = $this->getDiscount($result);

        return $result;
    }


    function mostVeiw()
    {
        $limit = self::get_option('limit_slider');
        $sql = "SELECT * FROM tbl_product ORDER BY viewed DESC limit " . "$limit";
        $result = $this->doSelect($sql);
        $result = $this->getDiscount($result);

        return $result;

    }


}


?>