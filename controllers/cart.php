<?php

class Cart extends Controller
{

    function __construct()
    {
    }

    function index()
    {

        $basketInfo = $this->model->getBasket();
        $data = ['basket' => $basketInfo[0], 'allpricetotal' => $basketInfo[1]];
        $this->view('cart/index', $data);
    }

    function updatebasket($basketId)
    {


        $this->model->updateBasket($_POST);
        $basketInfo = $this->model->getBasket();
        echo json_encode($basketInfo);
    }

    function deletebasket($basketId)
    {

        $this->model->deleteBasket($basketId);
        $basketInfo = $this->model->getBasket();
        echo json_encode($basketInfo);
    }


}

?>