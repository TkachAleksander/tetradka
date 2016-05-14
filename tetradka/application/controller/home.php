<?php

class Home extends Controller 
{
 
    public function index()
    {
        $crumbs = $this->model->getBreadcrumbs('1');
        $products = $this->model->getAllProducts();
        $title= $this->model->getTitle();
        
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
    }
} 
