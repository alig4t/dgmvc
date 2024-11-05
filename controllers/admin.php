<?php

class Admin extends Controller
{


    function __construct()
    {


    }

    function index()
    {


        $this->view('admin/index', [], 1, 1);

    }


    function category($method = 'index', $id = '')
    {

        if ($method == 'add') {
            if (isset($_POST['btnaddcat'])) {
                $params = $_POST;
            }
            $add = $this->model->addCat($params);

        } elseif ($method == 'delete') {
            $params = $_POST['ids'];
            $delete = $this->model->delCat($params);

        } elseif ($method == 'edit') {

            $cats = $this->model->getCategory($id);
            $allcats = $this->model->getAllCat();
            $data = [$cats, $allcats];
            $this->view('admin/editmenu', $data, 1, 1);
            if (isset($_POST['btneditcat'])) {
                $params = $_POST;
                $edit = $this->model->editCat($params, $id);
            }
        } else {


            $allcats = $this->model->getAllCat();
            $cats = $this->model->getCat();
            $this->view('admin/category', [$cats, $allcats], 1, 1);
        }
    }


    function attr($idcat = '', $method = '')
    {

        switch ($method) {
            case 'add':

                if (isset($_POST['btnattr'])) {
                    $addattr = $this->model->addAttr($_POST, $idcat);
                    if ($addattr) {
                        header('location: ' . publicUrl . 'admin/attr/' . $idcat);
                    }
                }
                break;
            case 'delete':
                if (isset($_POST['delattr'])) {
                    $delattr = $this->model->deleteAttr($_POST['ids'], $idcat);
                    if ($delattr) {
                        header('location: ' . publicUrl . 'admin/attr/' . $idcat);
                    }
                }
                break;

            default:
                $attr = $this->model->getAttr($idcat);
                $data = ['attr' => $attr, 'idcat' => $idcat];
                $this->view('admin/attr/index', $data, 1, 1);

        }


    }


    function product($method = 'index' , $pid='')
    {


        switch ($method) {
            case 'index':
                $products = $this->model->getProducts();
                $data = ['allproducts' => $products];
                $this->view('admin/products/index', $data, 1, 1);
                break;

            case 'addproduct':

                if(isset($_POST['title'])){
                    $pic = $_FILES['pic'];
                    $addpro = $this->model->addProduct($_POST,$pid,$pic);
                    if($addpro){
//                        header('location: ' . publicUrl . 'admin/product');
                    }
                }
                $cats = $this->model->getAllCat();
                $colors = $this->model->getColors();
                $garentee = $this->model->getGarentee();
                $data = ['cats' => $cats, 'colors' => $colors, 'garentee' => $garentee,'pid'=>$pid];
                if($pid != ''){
                    $proInfo = $this->model->getProducts($pid);
                    $data['product'] = $proInfo;
                    $this->view('admin/products/add', $data, 1, 1);
                }else {
                    $this->view('admin/products/add', $data, 1, 1);
                }
                break;



        }


    }


}


?>