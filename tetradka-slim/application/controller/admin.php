<?php 

class Admin extends Controller
{

    public function index()
    {
        //$model = $this->model->getAllProducts();
        $is_adm = $this->model->is_adm();
        
        require APP . 'view/_templates/header.php';
        require APP . 'view/admin/index.php';
        require APP . 'view/_templates/footer.php';
        
    }

    public function entry()
    {
        if(isset($_POST['btn_adm'],$_POST['name_adm'],$_POST['password_adm'])){
            $login = md5($_POST['name_adm']);
            $password = md5($_POST['password_adm']);
            $this->model->entryAdm($login,$password);
        }
    }

}
