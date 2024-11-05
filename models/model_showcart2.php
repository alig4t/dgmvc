<?php

class model_showcart2 extends Model
{


    function __construct()
    {
        parent::__construct();
    }


    function getAddress($userId)
    {

        $sql = "select a.*,o.title as ostanTitle,c.title as cityTitle
        from tbl_address a
        LEFT JOIN tbl_ostan o ON a.ostan=o.id
        LEFT JOIN tbl_city c ON a.city=c.id
        WHERE iduser=? ORDER BY id ASC";

        $result = $this->doSelect($sql, [$userId]);
        return $result;

    }


    function addAddress($data, $iduser, $editId)
    {


        $fullname = $data['fullname'];
        $mobile = $data['mobile'];
        $tel = $data['tel'];
        $state = $data['state'];
        $city = $data['city'];
        $mahale = $data['mahale'];
        $address = $data['address'];
        $postal = $data['postal'];

        if ($editId == "") {

             $sql = "insert into tbl_address (ostan, city, mahale, address, tell, mobile, postal, fullname, iduser) VALUES (?,?,?,?,?,?,?,?,?)";

            $params = [$state, $city, $mahale, $address, $tel, $mobile, $postal, $fullname, $iduser];
        } else {
            $sql = "update tbl_address set ostan=?, city=?, mahale=?, address=?, tell=?, mobile=?, postal=?, fullname=? WHERE id=?";
            $params = [$state, $city, $mahale, $address, $tel, $mobile, $postal, $fullname, $editId];
        }

        $this->doQuery($sql, $params);

    }

    function deleteAdress($addressId){
        $sql = "delete from tbl_address WHERE id=?";
        $param=[$addressId];
        $this->doQuery($sql,$param);
    }

    function getAddressInfo($addressId)
    {
        $sql = "select * from tbl_address WHERE id=?";
        $result = $this->doSelect($sql, [$addressId], 1);
        return $result;
    }




}


?>