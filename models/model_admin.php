<?php

class model_admin extends Model
{

    public $allChildrenIds = [];

    function __construct()
    {
        parent::__construct();
    }


    function getCategory($id)
    {
        $sql = "select * from tbl_category WHERE id=?";
        $result = $this->doSelect($sql, [$id], 1);
        return $result;
    }

    function getCat()
    {
        $sql = "select * from tbl_category WHERE parent=0";
        $result = $this->doSelect($sql);

        $i = 0;


        foreach ($result as $key => $row) {
            $idcat = $row['id'];
            $sql = "select * from tbl_category WHERE parent=$idcat";
            $ex = $this->doSelect($sql);
            $i++;
            $result[$key]['child1'] = $ex;
            foreach ($ex as $key2 => $row2) {
                $idcat2 = $row2['id'];
                $sql2 = "select * from tbl_category WHERE parent=$idcat2";
                $ex2 = $this->doSelect($sql2);
                $i++;
                $result[$key]['child1'][$key2]['child2'] = $ex2;

                foreach ($ex2 as $key3 => $row3) {
                    $idcat3 = $row3['id'];
                    $sql3 = "select * from tbl_category WHERE parent=$idcat3";
                    $ex3 = $this->doSelect($sql3);
                    $i++;
                    $result[$key]['child1'][$key2]['child2'][$key3]['child3'] = $ex3;
                }

            }
        }


        /*  echo "<pre>";
           print_r($result);
               echo "</pre>";*/


        return $result;
    }


    function getAllCat()
    {
        $sql = "select * from tbl_category";
        $result = $this->doSelect($sql);
        return $result;
    }


    function addCat($data)
    {
        $title = $data['title'];
        $parentId = $data['parent'];

        $sql = "insert into tbl_category (title,parent) VALUES (?,?)";
        $result = $this->doQuery($sql, [$title, $parentId]);

        header('location:' . publicUrl . 'admin/category');
    }


    function getChildren($idcategory)
    {

        $sql = "select * from tbl_category where parent=?";
        $result = $this->doSelect($sql, [$idcategory]);
        return $result;
    }

    function getChilds($catIds)
    {

        $childrenIds = [];
        foreach ($catIds as $catId) {
            $children = $this->getChildren($catId);
            foreach ($children as $child) {
                array_push($childrenIds, $child['id']);
            }
        }
        return $childrenIds;
    }


    function delCat($ids = [])
    {
        $this->allChildrenIds = array_merge($this->allChildrenIds, $ids);

        while (sizeof($ids) > 0) {
            $childrenIds = $this->getChilds($ids);
            $this->allChildrenIds = array_merge($this->allChildrenIds, $childrenIds);
            $ids = $childrenIds;

        }

        $x = join(',', array_values($this->allChildrenIds));

        $sql = "delete  from tbl_category where id IN (" . $x . ")";
        $stmt = self::$conn->prepare($sql);
        $stmt->execute();


        header('location: ' . publicUrl . 'admin/category');
    }


    function editCat($data, $id)
    {


        $title = $data['title'];
        $parentId = $data['parent'];
        $sql = "update tbl_category set title='$title',parent='$parentId' WHERE id=$id";
        $result = $this->doQuery($sql);
        header('location:' . publicUrl . 'admin/category');

    }


    function getAttr($cid)
    {
        $sql = "select * from tbl_attr where idcat=?";
        $result = $this->doSelect($sql, [$cid]);

        $parentArray = [];

        foreach ($result as $row) {
            if ($row['parent'] == 0) {
                array_push($parentArray, $row);
            }
        }

        foreach ($parentArray as $key => $parent) {
            $i = 0;
            foreach ($result as $child) {

                if ($child['parent'] == $parent['id']) {
                    $parentArray[$key]['child'][$i] = $child;
                    $i++;
                }
            }
        }

        return $parentArray;
    }


    function addAttr($data, $cid)
    {

        $sql = "insert into tbl_attr (title,parent,idcat) VALUES (?,?,?)";
        $params = [$data['title'], $data['parent'], $cid];
        $result = $this->doQuery($sql, $params);
        return true;
    }


    function deleteAttr($ids, $cid)
    {


        $sql = "select * from tbl_attr where idcat=?";
        $allattr = $this->doSelect($sql, [$cid]);

        foreach ($ids as $id) {
            foreach ($allattr as $attr) {
                if ($attr['parent'] == $id) {
                    array_push($ids, $attr['id']);
                }
            }
        }

        $ids = array_unique($ids);
        $ids = join(',', $ids);


        $sql = "delete from tbl_attr where id IN (" . $ids . ")";
        $result = $this->doQuery($sql);

        return true;

    }


    function getProducts($pid = '')
    {

        if ($pid == '') {
            $sql = "select * from tbl_product ORDER BY id desc";
            $products = $this->doSelect($sql);
            $cats = $this->getAllCat();
            $newcat = [];

            foreach ($cats as $cat) {
                $id = $cat['id'];
                $newcat[$id] = $cat;
            }

            foreach ($products as $key => $pro) {
                $pcat = $pro['cat'];
                $catName = $newcat[$pcat]['title'];
                $products[$key]['catname'] = $catName;
            }

            return $products;

        } else {
            $sql = "select * from tbl_product WHERE id=?";
            $product = $this->doSelect($sql, [$pid], 1);
            return $product;
        }


    }


    function getColors()
    {
        $sql = "select * from tbl_color";
        $result = $this->doSelect($sql);
        return $result;
    }

    function getGarentee()
    {
        $sql = "select * from tbl_garantee";
        $result = $this->doSelect($sql);
        return $result;
    }


    function addProduct($data, $pid, $pic = [])
    {

        $title = $data['title'];
        $cat = $data['cat'];
        $price = $data['price'];
        $discount = $data['discount'];
        $introduction = $data['introduction'];
        if (isset($data['color'])) {
            $color = join(',', $data['color']);
        } else {
            $color = '';
        }
        $garentee = $data['garentee'];
        $params = [$title, $price, $discount, $cat, $introduction, $color, $garentee];


        if ($pid != '') {
            $sql = "update tbl_product set title=?,price=?,discount=?,cat=?,introduction=?,color=?,garantee=? WHERE id=$pid";
            $result = $this->doQuery($sql, $params);
        } else {
            $sql = "INSERT INTO tbl_product (title,price,discount,cat,introduction,color,garantee) VALUES (?,?,?,?,?,?,?)";
            $result = $this->doQuery($sql, $params);
            $idcurrent = parent::$conn->lastInsertId();
            $directory = "public/images/product/" . $idcurrent;
            mkdir($directory);
        }


        $imgName = $pic['name'];
        $imgType = $pic['type'];
        $imgTmp = $pic['tmp_name'];
        $imgSize = $pic['size'];
        $upload = 1;
        if ($imgType != 'image/jpeg' AND $imgType != 'image/jpg') {
            $upload = 0;
        }
        if ($imgSize > 5242880) {
            $upload = 0;
        }


        if ($upload == 1) {

            if(!isset($directory)){
                $proInfo = $this->getProducts($pid);
                $idcurrent = $proInfo['id'];
                $directory = "public/images/product/".$idcurrent;
            }
            $ext = pathinfo($imgName, PATHINFO_EXTENSION);
            $zoomImg = "product_zoom." . $ext;
            $img220 = $directory."/"."product_220." . $ext;
            $img350 = $directory."/"."product_350." . $ext;
            $to = $directory . "/" . $zoomImg;
            move_uploaded_file($imgTmp, $to);



            $this->create_thumbnail($to, $img220, 220, 220);
            $this->create_thumbnail($to, $img350, 350, 350);


        }


        return true;

    }


}


?>