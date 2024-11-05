<?php

class model_login extends Model{

    function __construct()
    {
        parent::__construct();
    }


    function checkuser($dataUser){

        $email = $dataUser['email'];
        $password = $dataUser['password'];
        $sql = "select * from tbl_user Where email=? AND password=?";
        $result = $this->doSelect($sql,[$email,$password]);


        if(sizeof($result)> 0 and !empty($email) and !empty($password)){
            echo "correct user pass :) ";
            self::sessionInit();
            self::sessionSet('userId',$result[0]['id']);
            return true;
        }else{
            echo "wrong user or pass";
            self::sessionInit();
            session_destroy();
            return false;
        }


    }


}

?>
