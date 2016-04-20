<?php

class Checkout extends Controller
{

    public function index()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/checkout/index.php';
        require APP . 'view/_templates/footer.php';
    }
    public function sendOrder()
    {
    	if(isset($_POST['f_name'],$_POST['l_name'],$_POST['phone'],$_COOKIE['basket']))
        {
    		$id = $this->model->sendOrderInDB($_POST['f_name'],$_POST['l_name'],$_POST['phone'],$_COOKIE['basket']);
    	}

        header('location: ' . URL . 'order');
    }
}
