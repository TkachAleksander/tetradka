<?php

class Eng extends Controller
{

    public function index()
    {
        $is_admin = $this->model->is_admin();

        if ($is_admin){      
            require APP . 'view/_templates/header_admin.php';
        } else{
            require APP . 'view/_templates/header.php';
        }
        require APP . 'view/eng/index.php';
        require APP . 'view/_templates/footer.php';
        
    }

    public function entry()
    {
        if(isset($_POST['btn_adm'],$_POST['name_adm'],$_POST['password_adm'])){
            $login = md5($_POST['name_adm']);
            $password = md5($_POST['password_adm']);
            $this->model->entryAdmin($login,$password);
        }
    }

    public function out()
    {
        if(isset($_POST['btn_ex_adm'],$_COOKIE['name'],$_COOKIE['password'])){
            $this->model->exitAdmin($_COOKIE['name'],$_COOKIE['password']);
        } else {
            header("Location: " . URL);
        }       
    }

}
