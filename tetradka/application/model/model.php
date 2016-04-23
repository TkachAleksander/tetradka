<?php

class Model
{

    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    function getAllProducts(){

        $sql = "SELECT pr.id_prod, pr.name, pr.price, pr.name_img, cat.name as category, cat.caption as nameDir 
                FROM `products` `pr` 
                JOIN `category` `cat` ON pr.id_category = cat.id_category
                WHERE pr.show = '1'";

        $result = $this->db->prepare($sql);
        $result->execute();
        return $result->fetchAll();
    }

    function sendOrderInDB($f_name,$l_name,$phone,$cookieBasket){

        $siteKey = "6LdaEB4TAAAAAODS86yvVGhD5fDiPxhXjD31qw68";
        $secret = "6LdaEB4TAAAAAMEJWmk4ilYj-uGU5IryThfWfd8W";
        // reCAPTCHA supported 40+ languages listed here: https://developers.google.com/recaptcha/docs/language
        $lang = "ru";
        // The response from reCAPTCHA
        $resp = null;
        // The error code from reCAPTCHA, if any
        $error = null;
        $reCaptcha = new ReCaptcha($secret);
        // Was there a reCAPTCHA response?
        if ($_POST["g-recaptcha-response"]) {
            $resp = $reCaptcha->verifyResponse(
                $_SERVER["REMOTE_ADDR"],
                $_POST["g-recaptcha-response"]
            );
        }

        if ($resp != null && $resp->success) {
            $sql = "INSERT INTO `orders` (f_name, l_name, phone) VALUES (:f_name, :l_name, :phone)";
            
            $result = $this->db->prepare($sql);
            $parameters = array(':f_name' => $f_name, 'l_name' => $l_name, ':phone' => $phone );
            $result->execute($parameters);

            $sql = "SELECT id FROM `orders` ORDER BY id DESC LIMIT 1";
            $query = $this->db->prepare($sql);
            $query->execute();
            $id = $query->fetch();
            $id = $id->id;

            $sum = 0;
            $JsonOrders = json_decode($cookieBasket, true);
            foreach ($JsonOrders as $JsonOrder) 
            {
                $name = $JsonOrder['name'];
                $photo = $JsonOrder['photo'];
                $code = $JsonOrder['code'];
                $price = $JsonOrder['price'];
                $amount = $JsonOrder['amount'];
                $sum += $price*$amount;

                $sql = "INSERT INTO `orders_info` (id, name, photo, code, price, amount) VALUES ('$id','$name','$photo','$code','$price','$amount')";
                $query = $this->db->prepare($sql);
                $query->execute();
            }

            $sql = "UPDATE `orders` SET sum = '$sum' WHERE id = :id";
            $result = $this->db->prepare($sql);
            $parameters = array(':id' => $id);
            $result->execute($parameters);

            include '../phpmailer/PHPMailerAutoload.php';
            // require '/phpmailer/PHPMailerAutoload.php';

            $mail = new PHPMailer;

            $mail->isSMTP(); // указываем что письмо шлем через smtp

            $mail->Host = 'smtp.mail.ru';
            $mail->SMTPAuth = true;
            $mail->Username = 'tetradka_sumy';  // логин почты
            $mail->Password = '242366242366Aa';
            $mail->SMTPSecure = 'ssl';  // протокол шифрование или tls - смотрим в дукументации к smtp ну и там же его порт
            $mail->Port = '465';

            $mail->CharSet = 'UTF-8';
            $mail->From = 'tetradka_sumy@mail.ru'; // от кого письмо 
            $mail->FromName = 'Tetradka';
            $mail->addAddress('tetradka_sumy@mail.ua');  // есть 2 параметра $address - адрес получателя   $name = "" - его имя(необязательный)
            $mail->addBCC('ssori3838@ukr.net', 'Александр');

            $mail->isHTML(true); //  формат в каком будет отправлятся письмо text или html

            $mail->Subject = 'Новый заказ'; // Тема письма
            $srt = 'dfgd ';

            $mail->Body = 'Содержимое письма ';  // Содержимое письма 
            
            $mail->AltBody = 'Альтернативное письмо';  // если у клиента гомно ящик не потдержующий теги
            //$mail->AddAttachment('phpmailer/tetradka_sneg.png'); // путь к картинке, имя с каким прийдет к адрессату
            //$mail->SMTPDebug = 1; // Расширенный перечень ошибок: 0 - как и в ErrorInfo;    1 - еще больше     2 - там вобще "Война и Мир"

            $mail->send();
        }
    }

    function getMoreProduct($id_prod){
        $sql = "SELECT pr.id_prod, pr.name, pr.price, pr.name_img, pr.description, cat.name as category, cat.caption as nameDir 
                FROM `products` `pr` 
                JOIN `category` `cat` ON pr.id_category = cat.id_category
                WHERE pr.id_prod = :id_prod";

        $result = $this->db->prepare($sql);
        $parameters = array(':id_prod' => $id_prod);
        $result->execute($parameters);
        return $result->fetch();     
    }

    function getNamesCharacteristics($id_prod){
        $sql = "SELECT charact.name  
        FROM `products` `pr` 
        JOIN `list_characteristics` `list` ON pr.id_category = list.id_category 
        JOIN `characteristics` `charact` ON list.id_charact = charact.id_charact
        WHERE pr.id_prod = :id_prod";

        $result = $this->db->prepare($sql);
        $parameters = array(':id_prod' => $id_prod);
        $result->execute($parameters);
        return $result->fetchAll();
    }

    function getValuesCharacteristics($id_prod){  

        $sql = "SELECT charact.value 
                FROM `products_characteristics` `charact`
                WHERE id_prod = :id_prod";

        $result = $this->db->prepare($sql);
        $parameters = array(':id_prod' => $id_prod);
        $result->execute($parameters);
        return $result->fetchAll();
    }

    function getMorePhoto($id_prod){

        $sql = "SELECT photo.name as name_photo
                FROM `more_photo` `photo`
                WHERE id_prod = :id_prod";

        $result = $this->db->prepare($sql);
        $parameters = array(':id_prod' => $id_prod);
        $result->execute($parameters);
        return $result->fetchAll();
    }


/***********
    MENU
************/


    function l1($param1){

        $sql = "SELECT pr.id_prod, pr.name, pr.price, pr.name_img, cat.name as category, cat.caption as nameDir 
                FROM `products` `pr` JOIN `category` `cat` ON pr.id_category = cat.id_category 
                WHERE cat.caption = :param1 AND pr.show = '1' ";

        $result = $this->db->prepare($sql);
        $parameters = array(':param1' => $param1);
        $result->execute($parameters);
        return $result->fetchAll();
    }

    function l2($param1,$param2){

        $sql = "SELECT pr.id_prod, pr.name, pr.price, pr.name_img, cat.name as category, cat.caption as nameDir
                FROM `products` `pr` 
                JOIN `category` `cat` ON pr.id_category = cat.id_category 
                JOIN `products_characteristics` `charact` ON pr.id_prod = charact.id_prod 
                WHERE cat.caption = :param1 
                AND charact.caption = :param2 AND pr.show = '1'";

        $result = $this->db->prepare($sql);
        $parameters = array(':param1' => $param1, ':param2' => $param2);
        $result->execute($parameters);
        return $result->fetchAll();
    }

    function l3($param1,$param2,$param3){
        $sql = "SELECT pr.id_prod, pr.name, pr.price, pr.name_img, cat.name as category, cat.caption as nameDir
                FROM `products` `pr` 
                JOIN `category` `cat` ON pr.id_category = cat.id_category 
                WHERE cat.caption = :param1
                AND pr.id_prod IN (SELECT id_prod from `products_characteristics` `pc` where `pc`.`caption` = :param2)
                AND pr.id_prod IN (SELECT id_prod from `products_characteristics` `pc` where `pc`.`caption` = :param3)
                AND pr.show = '1'";

        $result = $this->db->prepare($sql);
        $parameters = array(':param1' => $param1, ':param2' => $param2,':param3' => $param3);
        $result->execute($parameters);
        return $result->fetchAll();
    }

    function l4Notebook($param1,$param2,$param3,$param4){
        $sql = "SELECT pr.id_prod, pr.name, pr.price, pr.name_img, cat.name as category, cat.caption as nameDir
                FROM `products` `pr` 
                JOIN `category` `cat` ON pr.id_category = cat.id_category 
                WHERE cat.caption = :param1
                AND pr.id_prod IN (SELECT id_prod from `products_characteristics` `pc` where `pc`.`caption` = :param2)
                AND pr.id_prod IN (SELECT id_prod from `products_characteristics` `pc` where `pc`.`caption` = :param3)
                AND pr.id_prod IN (SELECT id_prod from `products_characteristics` `pc` where `pc`.`caption` = :param4)
                AND pr.show = '1'";

        $result = $this->db->prepare($sql);
        $parameters = array(':param1' => $param1, ':param2' => $param2,':param3' => $param3,':param4' => $param4);
        $result->execute($parameters);
        return $result->fetchAll();
    }


    function checkCookieBasket(){
        $cookie = $_COOKIE['basket'];
        if($cookie == null || $cookie == '%5B%5D'){
            return false;
        } else {
            return true;
        }
    }

/**********
   ADMIN
**********/


    function is_admin(){

        if (isset($_COOKIE['name']) && isset($_COOKIE['password'])) {
            return $this->entryAdmin($_COOKIE['name'], $_COOKIE['password']);
        } else {
            return false;
        }
    }

    function entryAdmin($name,$password){

        $sql = "SELECT admin FROM `admin` WHERE name = :name AND password = :password";
        $result = $this->db->prepare($sql);
        $parameters = array(':name' => $name, ':password' => $password);
        $result->execute($parameters);
        $row = $result->fetch();

        if ($row->admin == "1") {
            if (!isset($_COOKIE['name']) && !isset($_COOKIE['password'])) {
                setcookie("name", $name, time()+60*60*24*4, "/");
                setcookie("password", $password, time()+60*60*24*4, "/");

                header("Location: " . URL . "eng");
            }

            return true;
        } else {
            if (isset($_COOKIE['name']) && isset($_COOKIE['password'])) {
                setcookie("name", $name, time()-60*60*24*4, "/");
                setcookie("password", $password, time()-60*60*24*4, "/");
            }

            header("Location: " . URL . "eng");
        }
    }

        function is_adm(){

        if (isset($_COOKIE['name']) && isset($_COOKIE['password'])) {
            return $this->entryAdm($_COOKIE['name'], $_COOKIE['password']);
        } else {
            return false;
        }
    }

    function entryAdm($name,$password){

        $sql = "SELECT admin FROM `admin` WHERE name = :name AND password = :password";
        $result = $this->db->prepare($sql);
        $parameters = array(':name' => $name, ':password' => $password);
        $result->execute($parameters);
        $row = $result->fetch();

        if ($row->admin == '2') {
            if (!isset($_COOKIE['name']) && !isset($_COOKIE['password'])) {
                setcookie("name", $name, time()+60*60*24*4, "/");
                setcookie("password", $password, time()+60*60*24*4, "/");

                header("Location: " . URL . "admin");
            }

            return true;
        } else {
            if (isset($_COOKIE['name']) && isset($_COOKIE['password'])) {
                setcookie("name", $name, time()-60*60*24*4, "/");
                setcookie("password", $password, time()-60*60*24*4, "/");
            }

            header("Location: " . URL . "admin");
        }
    }

    function exitAdmin($name,$password){

        if (isset($_COOKIE['name']) && isset($_COOKIE['password'])) {
            setcookie("name", $name, time()-60*60*24*4, "/");
            setcookie("password", $password, time()-60*60*24*4, "/");
        } 
        header("Location: " . URL);
    }

    function getRequestedOrders($status){

        $sql = "SELECT * FROM `orders` WHERE status = :status";

        $result = $this->db->prepare($sql);
        $parameters = array(':status' => $status);
        $result->execute($parameters);
        return $result->fetchAll();
    }

    function getMoreAboutOrder($id){

        $sql = "SELECT * FROM `orders_info` WHERE id = :id";

        $result = $this->db->prepare($sql);
        $parameters = array(':id' => $id);
        $result->execute($parameters);
        $result = $result->fetchAll();

        echo json_encode($result);
    }

    function changeStatusOther($id,$status){
        $sql = "UPDATE `orders` SET status = :status WHERE id = :id";

        $result = $this->db->prepare($sql);
        $parameters = array(':id' => $id, ':status' => $status);
        $result->execute($parameters);
        $result->fetch();

        echo json_encode();        
    }

    function sendInOrderTable($id, $iz, $v){
        $sql = "SELECT * FROM `".$iz."` WHERE id = :id";

        $result = $this->db->prepare($sql);
        $parameters = array(':id' => $id);
        $result->execute($parameters);
        $order = $result->fetch();

        $id = $order->id;
        $f_name = $order->f_name;
        $l_name = $order->l_name;
        $phone = $order->phone;
        $status = $order->status;
        $sum = $order->sum;

        $sql = "INSERT INTO `".$v."` (id, f_name, l_name, phone, sum, status) VALUES ('$id','$f_name','$l_name','$phone','$sum','$status')";
        $result = $this->db->prepare($sql);
        $result->execute();

        $sql = "DELETE FROM `".$iz."` WHERE id=$id";
        $result = $this->db->prepare($sql);
        $result->execute();

        echo json_encode(); 
    }

    function getAllFromTable($table){
        $sql = "SELECT * FROM `".$table."`";

        $result = $this->db->prepare($sql);
        $result->execute();
        return $result->fetchAll();        
    }


/******************
 DATA BASE CONTROL
*******************/


    function getAllCategories(){
        $sql = "SELECT * FROM `category`";

        $result = $this->db->prepare($sql);
        $result->execute();
        return $result->fetchAll();
    }
    function getAllCharacteristics(){
        $sql = "SELECT * FROM `characteristics`";

        $result = $this->db->prepare($sql);
        $result->execute();
        return $result->fetchAll();        
    }
    function getAllListCharacteristics(){
        $sql = "SELECT * FROM `list_characteristics`";

        $result = $this->db->prepare($sql);
        $result->execute();
        return $result->fetchAll();          
    }


    function addNewCategory($nameNewCategory,$captionNewCategory){
        $sql = "INSERT INTO `category` (name, caption) VALUES (:nameNewCategory, :captionNewCategory)";

        $result = $this->db->prepare($sql);
        $parameters = array(':nameNewCategory' => $nameNewCategory, ':captionNewCategory' => $captionNewCategory);
        $result->execute($parameters);
    }
    function addNewCharact($nameNewCharact){
        $sql = "INSERT INTO `characteristics` (name) VALUES (:nameNewCharact)";

        $result = $this->db->prepare($sql);
        $parameters = array(':nameNewCharact' => $nameNewCharact);
        $result->execute($parameters);
    }
    function addNewListCharact($id_category,$id_charact){
        $sql = "INSERT INTO `list_characteristics` (id_category,id_charact) VALUES (:id_category,:id_charact)";

        $result = $this->db->prepare($sql);
        $parameters = array(':id_category' => $id_category, ':id_charact' => $id_charact);
        $result->execute($parameters);
    }


    function deleteCategory($id_category){
        $sql = "DELETE FROM `category` WHERE :id_category = id_category";

        $result = $this->db->prepare($sql);
        $parameters = array(':id_category' => $id_category);
        $result->execute($parameters);
    }
    function deleteCharact($id_charact){
        $sql = "DELETE FROM `characteristics` WHERE :id_charact = id_charact";

        $result = $this->db->prepare($sql);
        $parameters = array(':id_charact' => $id_charact);
        $result->execute($parameters);        
    }
    function deleteListCharact($id_list_charact){
        $sql = "DELETE FROM `list_characteristics` WHERE :id_list_charact = id_list_charact";

        $result = $this->db->prepare($sql);
        $parameters = array(':id_list_charact' => $id_list_charact);
        $result->execute($parameters);  
    }


    function getAutoIncrement($auto_increment,$name_tbl){
        $sql = "ALTER TABLE `".$name_tbl."` AUTO_INCREMENT = ".$auto_increment."";

        $result = $this->db->prepare($sql);
        $result->execute();
    }


/******************
    ADD PRODUCT
*******************/

    
    function addProduct($category, $product_name, $price, $name_img, $description, $characteristics, $captions){
        $sql = "INSERT INTO `products` (name, price, name_img, description, id_category) 
                VALUES ( :product_name, :price, :name_img, :description, :category)";

        $result = $this->db->prepare($sql);
        $parameters = array(':product_name' => $product_name, ':price' => $price, ':name_img' => $name_img, ':description' => $description, ':category' => $category[0]);
        $result->execute($parameters);

        $sql = "SELECT id_prod FROM `products` ORDER BY id_prod DESC LIMIT 1";
        $result = $this->db->prepare($sql);
        $result->execute();

        $id_prod = $result->fetch();
        $id_prod = $id_prod->id_prod;

        foreach ($characteristics as $key => $value) {

            $caption = $captions[$key];
            $sql = "INSERT INTO `products_characteristics` (id_prod, id_charact, value, caption)
                    VALUES (:id_prod, :id_charact, :value, :caption)";

            $result = $this->db->prepare($sql);
            
            $parameters = array(
                ':id_prod' => $id_prod, 
                ':id_charact' => $key,
                ':value' => $value,
                ':caption' => $caption
            );

            $result->execute($parameters);
        }
    }


    


    function getAllProductsAdmin(){
        $sql = "SELECT pr.id_prod, pr.name, pr.price, pr.name_img, pr.description, cat.name as category, cat.caption as nameDir 
                FROM `products` `pr` 
                JOIN `category` `cat` ON pr.id_category = cat.id_category 
                ORDER BY pr.id_prod DESC";

        $result = $this->db->prepare($sql);
        $result->execute();
        return $result->fetchAll();
    }

    function getCharacterisrics($id_category){
        $sql = "SELECT charact.name, charact.id_charact
                FROM `list_characteristics` `list` 
                JOIN `characteristics` `charact` ON list.id_charact = charact.id_charact
                WHERE list.id_category = :id_category";

        $result = $this->db->prepare($sql);
        $parameters = array(':id_category' => $id_category);
        $result->execute($parameters);
        echo json_encode($result->fetchAll());
    }

    function getAllProductCharacteristics(){
        $sql = "SELECT * FROM `products_characteristics` ORDER BY id_all DESC";

        $result = $this->db->prepare($sql);
        $result->execute();
        return $result->fetchAll();        
    }



/******************
  DELETE PRODUCTS
*******************/


    function searchProducts($code){
        $sql = "SELECT cat.caption, cat.name as category, pr.id_prod, pr.name, pr.price, pr.name_img, pr.description, pr.show 
                FROM `products` `pr`   
                JOIN `category` `cat` ON pr.id_category = cat.id_category
                WHERE pr.id_prod = :code";

        $result = $this->db->prepare($sql);
        $parameters = array(':code' => $code);
        $result->execute($parameters);
        return $result->fetchAll();        
    }
    function deleteProducts($code){
        $sql = "DELETE FROM `products` WHERE id_prod = :code";

        $result = $this->db->prepare($sql);
        $parameters = array(':code' => $code);
        $result->execute($parameters);
    }

    function showProduct($id_prod, $bool){
        $sql = "UPDATE `products`  SET `show` = :bool WHERE id_prod = :id_prod";

        $result = $this->db->prepare($sql);
        $parameters = array(':bool' => $bool, ':id_prod' => $id_prod);
        $result->execute($parameters);

        echo json_encode();    
    }

    function getProductsFromCategory($id_category){
        $sql = "SELECT * FROM `products` `pr`JOIN `category` `cat` ON cat.id_category = pr.id_category";
        if ($id_category != 0){
            $sql = $sql . " WHERE cat.id_category = :id_category";
        }
                
        $result = $this->db->prepare($sql);
        $parameters = array(':id_category' => $id_category[0]);
        $result->execute($parameters);
        return $result->fetchAll();
    }
}