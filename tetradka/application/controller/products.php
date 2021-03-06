<?php

class Products extends Controller
{

    public function index()
    {
        $products = $this->model->getAllProducts();

        require APP . 'view/_templates/header.php'; 
        require APP . 'view/products/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function moreInfo($id_prod)
    { 
    	if (isset($id_prod)){
            $product = $this->model->getMoreProduct($id_prod);
            
            $names_charact = $this->model->getNamesCharacteristics($id_prod);
            $values_charact = $this->model->getValuesCharacteristics($id_prod);

    		$morePhotos = $this->model->getMorePhoto($id_prod);
            $title= $this->model->getTitle();
            $crumbs = $this->model->getBreadcrumbs('3');
    	}

        require APP . 'view/_templates/header.php';
        require APP . 'view/more/index.php';
        require APP . 'view/_templates/footer.php'; 
    }

    public function l1($idCrumb,$param1){
        if(isset($param1)){
            $products = $this->model->l1($param1);
            $title= $this->model->getTitle();
        }
        if(isset($idCrumb)){
            $crumbs = $this->model->getBreadcrumbs($idCrumb);
        }
        require APP . 'view/_templates/header.php';
        require APP . 'view/products/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function l2($idCrumb,$param1,$param2){
        if (isset($param1,$param2)){
            $products = $this->model->l2($param1,$param2);
            $title= $this->model->getTitle();
        }
        if(isset($idCrumb)){
            $crumbs = $this->model->getBreadcrumbs($idCrumb);
        }
        require APP . 'view/_templates/header.php';
        require APP . 'view/products/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function l3($idCrumb,$param1,$param2,$param3){
        if (isset($param1,$param2,$param3)){
            $products = $this->model->l3($param1,$param2,$param3);
            $title= $this->model->getTitle();
        }
        if(isset($idCrumb)){
            $crumbs = $this->model->getBreadcrumbs($idCrumb);
        }
        require APP . 'view/_templates/header.php';
        require APP . 'view/products/index.php';
        require APP . 'view/_templates/footer.php';        
    }

    public function l4($idCrumb,$param1,$param2,$param3,$param4){
        if (isset($param1,$param2,$param3,$param4)){
            $products = $this->model->l4($param1,$param2,$param3,$param4);
            $title= $this->model->getTitle();
        }
        if(isset($idCrumb)){
            $crumbs = $this->model->getBreadcrumbs($idCrumb);
        }
        require APP . 'view/_templates/header.php';
        require APP . 'view/products/index.php';
        require APP . 'view/_templates/footer.php';        
    }
}
