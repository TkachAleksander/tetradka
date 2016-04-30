<?php

class Home extends Controller 
{
 
    public function index()
    {
        $this->model->getBreadcrumbs('1');
        $crumbs = $this->model->getCrumbs();

        $products = $this->model->getAllProducts();
        $title = $this->model->getTitle();
        
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
    }

    // public function getBreadcrumbs($id){
    // 	$crumbs = $this->model->getBreadcrumbs($id); 
    // }
} 
