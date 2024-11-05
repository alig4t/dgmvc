<?php

class Controller
{


    function view($viewUrl, $data = [], $noHeader = '', $noFooter = '')
    {

        if($noHeader == '') {
            require_once("header.php");
        }
        require_once("views/" . $viewUrl . ".php");
        if($noFooter == ''){
            require_once("footer.php");
        }


    }

    function getmodel($model_n)
    {

        $modelUrl = "models/model_" . $model_n . ".php";
        require_once($modelUrl);
        $className = "model_" . $model_n;
        $this->model = new $className;

    }


}


?>