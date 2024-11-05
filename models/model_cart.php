<?php

class model_cart extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getBasket()
    {
        $cookie = self::getBasketCookie();

        $sql = "select b.tedad,b.id as basketId,p.*,c.title as colorTitle,c.hex,g.title as garanteeTitle 
        from tbl_basket b 
        JOIN tbl_product p ON b.idproduct=p.id 
        JOIN tbl_color c ON b.color=c.id
        JOIN tbl_garantee g ON b.garantee=g.id
        WHERE cookie=?
        ";

        $result = $this->doSelect($sql, [$cookie]);

        $allTotalprice = 0;

        foreach ($result as $row) {
            $price = $row['price'];
            $tedad = $row['tedad'];
            $totalprice = $price * $tedad;
            $allTotalprice = $allTotalprice + $totalprice;
        }

        return [$result, $allTotalprice];
    }

    function updateBasket($data)
    {

        $newTedad = $data['tedad'];
        $basketRow = $data['basketId'];

        $sql = "update tbl_basket set tedad=? WHERE id=?";
        $params = [$newTedad, $basketRow];
        $this->doQuery($sql, $params);

    }

    function deleteBasket($basketRow)
    {
        $sql = "delete from tbl_basket WHERE id=?";
        $params = [$basketRow];
        $this->doQuery($sql, $params);
    }


}