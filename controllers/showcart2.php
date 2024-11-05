<?php

class Showcart2 extends Controller {

    public $login='';


    function __construct()
    {
        Model::sessionInit();
        $this->login = Model::sessionGet('userId');
        if($this->login == false){
            header('location:'.publicUrl.'showcart1');
        }
    }

    function index(){

        $address = $this->model->getAddress($this->login);
        $data=['address'=>$address];
        $this->view('cart2/index',$data);
    }



    function addadress($editId=""){

        $this->model->addAddress($_POST,$this->login,$editId);
    }


    function editaddress($addressId){
        $addressInfo = $this->model->getAddressInfo($addressId);
        echo json_encode($addressInfo);
    }

    function deleteadress($addressId){
        $this->model->deleteAdress($addressId);
    }


    function showaddresses(){

        $addressHa = $this->model->getAddress($this->login);
        echo json_encode($addressHa);
    }



}

?>