<?php

class App
{

    public $controller = 'index';
    public $method = 'index';
    public $params = [];

    function __construct()
    {
        if (isset($_GET['url'])) {
            $url = $_GET['url'];
            $url = $this->parseUrl($url);

            $this->controller = $url[0];
            unset($url[0]);
            if (isset($url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }

            $this->params = array_values($url);

        }

        $dirController = "controllers/" . $this->controller . ".php";
        if (file_exists($dirController)) {
            require_once($dirController);
            $obj = new $this->controller;


            $obj->getmodel($this->controller);


            if (method_exists($obj, $this->method)) {
                call_user_func_array([$obj, $this->method], $this->params);
            }
        }
    }


    public function parseUrl($url)
    {
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url=rtrim($url,'/');
        $url = explode('/', $url);
        /*if (end($url) == '') {
            $i = count($url) - 1;
            unset($url[$i]);
        }*/
        return $url;
    }

}


?>