<?php

class Panel extends Controller{

    public $checkLogin='';

    function __construct()
    {
        Model::sessionInit();
         $this->checkLogin = Model::sessionGet('userId');
         if($this->checkLogin == false){
             header('location:'.publicUrl.'login');
         }
    }


    function index(){

        $this->view('panel/index');

    }


}


?>