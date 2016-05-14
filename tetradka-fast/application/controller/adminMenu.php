<?php

class AdminMenu extends Controller
{

    public function index(){}

    public function controlNewOrders(){
        $is_admin = $this->model->is_admin();

        if($is_admin){
            $allOrders = $this->model->getRequestedOrders('обрабатывается');
    
            require APP . 'view/_templates/header_admin.php';
            require APP . 'view/adminMenu/controlNewOrders.php';
            require APP . 'view/_templates/footer.php'; 
        } else { 
            header("Location: " . URL);
        }
    }

    public function controlPackedOrders(){
        $is_admin = $this->model->is_admin();

        if($is_admin){
            $allOrders = $this->model->getRequestedOrders('собирается');
            $secondAllOrders = $this->model->getRequestedOrders('ожидает получателя');
    
            require APP . 'view/_templates/header_admin.php';
            require APP . 'view/adminMenu/controlPackedOrders.php';
            require APP . 'view/_templates/footer.php'; 
        } else { 
            header("Location: " . URL);
        }
    }

    public function controlDeliveryOrders(){
        $is_admin = $this->model->is_admin();

        if($is_admin){
            $allOrders = $this->model->getRequestedOrders('доставка на дом');
    
            require APP . 'view/_templates/header_admin.php';
            require APP . 'view/adminMenu/controlCompletedOrders.php';
            require APP . 'view/_templates/footer.php'; 
        } else { 
            header("Location: " . URL);
        }
    }

    public function controlCancleOrders(){
        $is_admin = $this->model->is_admin();

        if($is_admin){
            $allOrders = $this->model->getAllFromTable('orders_cancle');
    
            require APP . 'view/_templates/header_admin.php';
            require APP . 'view/adminMenu/controlCancleOrders.php';
            require APP . 'view/_templates/footer.php'; 
        } else { 
            header("Location: " . URL);
        }
    }

    public function controlCompletedOrders(){
        $is_admin = $this->model->is_admin();

        if($is_admin){
            $allOrders = $this->model->getRequestedOrders('выполнен');
    
            require APP . 'view/_templates/header_admin.php';
            require APP . 'view/adminMenu/controlCompletedOrders.php';
            require APP . 'view/_templates/footer.php'; 
        } else { 
            header("Location: " . URL);
        }
    }

    public function controlDeleteOrders(){
        $is_admin = $this->model->is_admin();

        if($is_admin){
            $allOrders = $this->model->getAllFromTable('orders_delete');
    
            require APP . 'view/_templates/header_admin.php';
            require APP . 'view/adminMenu/controlCancleOrders.php';
            require APP . 'view/_templates/footer.php'; 
        } else { 
            header("Location: " . URL);
        }
    }

    public function moreAboutOrder(){
        if (isset($_POST['id'])) {
            $ordersInfo = $this->model->getMoreAboutOrder($_POST['id']);
        }
    }

    public function changeStatusOther(){
        if (isset($_POST['id'],$_POST['status'])) {
            $this->model->changeStatusOther($_POST['id'],$_POST['status']);
        }        
    }

    public function sendInOrderTable(){
        if (isset($_POST['id'],$_POST['iz'],$_POST['v'])) {
            $this->model->sendInOrderTable($_POST['id'],$_POST['iz'],$_POST['v']);
        }          
    }




    public function databaseControl(){
        $is_admin = $this->model->is_admin();

        if($is_admin){ 
            $breadcrumbs = $this->model->getAllBreadcrumbs();

            $allCategories = $this->model->getAllCategories();
            $allCharacteristics = $this->model->getAllCharacteristics();
            $allListCharacteristics = $this->model->getAllListCharacteristics();

            require APP . 'view/_templates/header_admin.php';
            require APP . 'view/adminMenu/databaseControl.php';
            require APP . 'view/_templates/footer.php'; 
        } else { 
            header("Location: " . URL);
        }   
    }

    public function addBreadcrumbs(){
        if (isset($_POST['btn-add-breadcrumbs'])){
            $this->model->addBreadcrumbs($_POST['name'],$_POST['parent'],$_POST['href']);
        } 
        header("Location: " . URL . "adminMenu/databaseControl");        
    }


    public function addNewCategory(){
        if (isset($_POST['btn-add-db-control'])){
            $this->model->addNewCategory($_POST['name_new_category'],$_POST['caption_new_category']);
        } 
        header("Location: " . URL . "adminMenu/databaseControl");
    }
    public function addNewCharact(){
        if (isset($_POST['btn-add-db-control'])){
            $this->model->addNewCharact($_POST['name_new_charact']);
        } 
        header("Location: " . URL . "adminMenu/databaseControl");        
    }
    public function addNewListCharact(){
        if (isset($_POST['btn-add-db-control'])){
            $this->model->addNewListCharact($_POST['id_new_category'],$_POST['id_new_charact']);
        } 
        header("Location: " . URL . "adminMenu/databaseControl");         
    }


    public function deleteCategory(){
        if (isset($_POST['btn-dlt-db-control'])){
            $this->model->deleteCategory($_POST['id_category']);
        } 
        header("Location: " . URL . "adminMenu/databaseControl");
    }
    public function deleteCharact(){
        if (isset($_POST['btn-dlt-db-control'])){
            $this->model->deleteCharact($_POST['id_charact']);
        } 
        header("Location: " . URL . "adminMenu/databaseControl");        
    }
    public function deleteListCharact(){
        if (isset($_POST['btn-dlt-db-control'])){
            $this->model->deleteListCharact($_POST['id_list_charact']);
        } 
        header("Location: " . URL . "adminMenu/databaseControl");         
    }
    public function deleteBreadcrumbs(){
        if (isset($_POST['btn-dlt-db-control'])){
            $this->model->deleteBreadcrumbs($_POST['id_breadcrumbs']);
        } 
        header("Location: " . URL . "adminMenu/databaseControl");        
    }


    public function getAutoIncrement(){
        if (isset($_POST['btn-getAI-db-control'])){
            $this->model->getAutoIncrement($_POST['auto_increment'],$_POST['name_tbl']);
        } 
        header("Location: " . URL . "adminMenu/databaseControl");
    }




    public function addProducts(){
        $is_admin = $this->model->is_admin();

        if($is_admin){ 
            $categories = $this->model->getAllCategories();
            $products = $this->model->getAllProductsAdmin();
            $products_characteristics = $this->model->getAllProductCharacteristics();
    
            require APP . 'view/_templates/header_admin.php';
            require APP . 'view/adminMenu/addProducts.php';
            require APP . 'view/_templates/footer.php'; 
        } else { 
            header("Location: " . URL);
        }              
    }
    public function addProduct(){
        if (isset($_POST['btn-add-products'])){
            $this->model->addProduct($_POST['checkbox_photo'],$_POST['amount'],$_POST['category'],$_POST['product_name'],$_POST['price'],$_POST['name_img'],$_POST['description'],$_POST['characteristics'],$_POST['captions']);
        } 
        header("Location: " . URL . "adminMenu/addProducts");        
    }
    public function addProductCharacteristics(){
        if (isset($_POST['btn-add-products'])){
            $this->model->addProductCharacteristics($_POST['charact']);
        } 
        header("Location: " . URL . "adminMenu/addProducts");            
    }

    public function deleteProducts(){
        $is_admin = $this->model->is_admin();

        if($is_admin){ 
            $products = $this->model->searchProducts($_POST['code']);
            if (isset($_POST['btn_delete'])){
                $this->model->deleteProducts($_POST['code']);
                header("Location: " . URL . "adminMenu/deleteProducts");
            }

            require APP . 'view/_templates/header_admin.php';
            require APP . 'view/adminMenu/deleteProducts.php';
            require APP . 'view/_templates/footer.php';
        } else { 
            header("Location: " . URL);
        }       
    }

    public function getCharacterisrics(){
        $this->model->getCharacterisrics($_POST['id']);
    }

    public function showProduct(){
            $this->model->showProduct($_POST['id_prod'],$_POST['bool']);
    }

    public function showAllProducts(){
        $is_admin = $this->model->is_admin();

        if($is_admin){ 
            $categories = $this->model->getAllCategories();
            $products = $this->model->getProductsFromCategory($_POST['category']);

            require APP . 'view/_templates/header_admin.php';
            require APP . 'view/adminMenu/showAllProducts.php';
            require APP . 'view/_templates/footer.php';
        } else { 
            header("Location: " . URL);
        }                 
    }

}