<?php

class model_product extends Model
{

    function __construct()
    {
        parent::__construct();

    }


    function productInfo($id)
    {

        $sql = "SELECT * FROM tbl_product WHERE id=?";
        $result = $this->doSelect($sql, [$id], 1);

        $result = $this->getDiscount($result, 'false');
        if ($result['special'] == 1) {
            $time_selected = $result['time_special'];
            $result['date_special'] = $this->calSpecial($time_selected);
        }

        $colors = $result['color'];
        $colors = explode(',', $colors);
        $colors = array_filter($colors);
        $result['allcolor'] = $this->getColor($colors);


        $garanteeIDs = $result['garantee'];
        $garanteeIDs = explode(',', $garanteeIDs);
        $garanteeIDs = array_filter($garanteeIDs);
        $result['allgarantee'] = $this->getGarantee($garanteeIDs);

        return $result;
    }


    function getColor($colors)
    {
        $allcolor = [];
        foreach ($colors as $colorId) {
            $sql = "SELECT * FROM tbl_color WHERE id = ?";
            $row = $this->doSelect($sql, [$colorId], 1);
            array_push($allcolor, $row);
        }
        return $allcolor;
    }


    function getGarantee($garanteeIDs)
    {
        $allgarantee = [];
        foreach ($garanteeIDs as $gId) {
            $sql = "SELECT * FROM tbl_garantee WHERE id = ?";
            $row = $this->doSelect($sql, [$gId], 1);
            array_push($allgarantee, $row);
        }
        return $allgarantee;
    }


    function onlydg()
    {
        $limit = self::get_option('limit_slider');
        $sql = "SELECT * FROM tbl_product WHERE only_dg=1 limit " . "$limit";
        $result = $this->doSelect($sql);
        $result = $this->getDiscount($result);

        return $result;
    }


    function naghd($pid)
    {
        $sql = "SELECT * FROM tbl_naghd WHERE idproduct=?";
        $result = $this->doSelect($sql, [$pid]);
        return $result;

    }

    function fanni($pid, $cid)
    {

        $sql = "SELECT * FROM tbl_attr WHERE idcat=? AND parent=?";
        $result = $this->doSelect($sql, [$cid, 0]);

        foreach ($result as $key => $parent) {

            $parentId = $parent['id'];

            $sql = "SELECT tbl_attr.title,tbl_product_attr.value from tbl_attr LEFT JOIN tbl_product_attr ON tbl_attr.id=tbl_product_attr.idattr AND tbl_product_attr.idproduct=? WHERE tbl_attr.parent=?";

            $childResult = $this->doSelect($sql, [$pid, $parentId]);

            $result[$key]['child'] = $childResult;

        }


        return $result;

    }


    function getCommentParam($cid, $pid)
    {

        $sql = "SELECT * FROM tbl_comment_param WHERE idcat=?";
        $params = $this->doSelect($sql, [$cid]);


        $sql = "SELECT * FROM tbl_comment WHERE postid=?";
        $comments = $this->doSelect($sql, [$pid]);

        $totalparam = [];

        $comNum = sizeof($comments);

        foreach ($params as $param) {
            $paramKey = $param['id'];

            foreach ($comments as $comment) {
                $cparams = unserialize($comment['param']);

                if (!isset($totalparam[$paramKey])) {
                    $totalparam[$paramKey] = 0;
                }
                if (!isset($cparams[$paramKey])) {
                    $cparams[$paramKey] = 0;
                }

                $totalparam[$paramKey] = $totalparam[$paramKey] + $cparams[$paramKey];
            }
        }


        foreach ($totalparam as $key => $val) {
            $val = $val / $comNum;
            $totalparam[$key] = $val;

        }

        return [$params, $totalparam];
    }


    function getComment($pid)
    {
        $sql = "SELECT * FROM tbl_comment WHERE postid=?";
        $result = $this->doSelect($sql, [$pid]);
        return $result;
    }


    function getQuestion($pid)
    {
        $sql = "SELECT * FROM tbl_question WHERE idproduct=? AND parent=?";
        $result = $this->doSelect($sql, [$pid, 0]);


        $sql = "SELECT * FROM tbl_question WHERE idproduct=? AND parent!=?";
        $answers = $this->doSelect($sql, [$pid, 0]);

        $totalanswers = [];

        foreach ($answers as $row) {

            $qId = $row['parent'];
            $totalanswers[$qId] = $row['text'];
        }

        return [$result, $totalanswers];
    }


    function getGallery($pid)
    {
        $sql = "SELECT * FROM tbl_gallery WHERE idproduct=?";
        $result = $this->doSelect($sql, [$pid]);
        return $result;
    }


    function addToBasket($pid, $color, $garantee)
    {

        $cookie = self::getBasketCookie();
        $check_sql = "select * from tbl_basket WHERE cookie=? AND idproduct=? AND color=? AND garantee=?";
        $params = [$cookie, $pid, $color, $garantee];
        $check_result = $this->doSelect($check_sql, $params);


        if (sizeof($check_result) == 0) {
            $sql = "insert into tbl_basket (cookie,idproduct,tedad,color,garantee) values (?,?,1,?,?)";
            $this->doQuery($sql, $params);
        } else {
            $tedad = $check_result[0]['tedad'] + 1;
            $sql = "UPDATE tbl_basket set tedad=$tedad WHERE cookie=? AND idproduct=? AND color=? AND garantee=?";
            $this->doQuery($sql, $params);
        }

    }

    function updatebasket()
    {
    }


}


?>