<?php

class Login extends Controller
{

    function __construct()
    {

    }

    function index($wrong = '')
    {
        $data = [];
        if (isset($wrong)) {
            if ($wrong == 'wrong-user-pass') {
                $errorT = 1;
                $data = ["errorMode" => $errorT];
            }
        }
        $this->view("login/index", $data);
    }


    function checkuser()
    {
        $dataUser = $_POST;
        $checkuser = $this->model->checkuser($dataUser);

        $check = Model::sessionGet('userId');
        if ($check == false) {
            echo "login Failed";
            header('location:' . publicUrl . 'login/index/wrong-user-pass');
        } else {
            echo "login Succed";
            header('location:' . publicUrl . 'panel');
        }


    }


}

?>