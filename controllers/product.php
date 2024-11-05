<?php

class Product extends Controller
{

    function __construct()
    {

    }

    function index($id)
    {

        if (strpos($id, 'dkp') != -1) {
            $id = ltrim($id, 'dkp-');
        }


        $productInfo = $this->model->productInfo($id);

        $onlydg = $this->model->onlydg();
        $gallery = $this->model->getGallery($id);
        $data = [$productInfo, $onlydg, $gallery];
        $this->view('product/index', $data);
    }


    function tabs($pid, $cid)
    {

        $number = $_POST['number'];
        if ($number == 0) {
            $naghd = $this->model->naghd($pid);
            $this->view('product/tab1', [$naghd], 1, 1);
        } elseif ($number == 1) {

            $fanni = $this->model->fanni($pid, $cid);
            $this->view('product/tab2', [$fanni], 1, 1);


        } elseif ($number == 2) {

            $getcomParam = $this->model->getCommentParam($cid, $pid);
            $params = $getcomParam[0];
            $paramsAvg = $getcomParam[1];

            $getComment = $this->model->getComment($pid);

            $data = [$params, $getComment, $paramsAvg];
            $this->view('product/tab3', $data, 1, 1);
        } elseif ($number == 3) {

            $getquestionAnswer = $this->model->getQuestion($pid);
            $questions = $getquestionAnswer[0];
            $answers = $getquestionAnswer[1];

            $data = [$questions, $answers];
            $this->view('product/tab4', $data, 1, 1);
        } elseif ($number == 4) {
            $this->view('product/tab5', [], 1, 1);
        }
    }


    function addtobasket($productId, $color, $garantee = 0)
    {


        $this->model->addToBasket($productId, $color, $garantee);


    }

    function updatebasket($basketRow)
    {


//        $this->model->updateBasket($basketRow);
    }


}


?>