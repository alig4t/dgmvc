<?php

class Index extends Controller
{

    function __construct()
    {

    }

    function index()
    {

        $mainSlider = $this->model->mainSlider();
        $discontSlider_DateSpecial = $this->model->slider_discont();
        $discontSlider=$discontSlider_DateSpecial[0];
        $date_special = $discontSlider_DateSpecial[1];
        $newst_product = $this->model->newest();
        $onlydg = $this->model->onlydg();
        $mostVeiw = $this->model->mostVeiw();

        $data = [$mainSlider, $discontSlider, $date_special, $newst_product, $onlydg, $mostVeiw];
        $this->view('index/index', $data);

    }


}


?>