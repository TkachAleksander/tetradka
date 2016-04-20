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

        $sql = "SELECT pr.id_prod, pr.name, pr.price, pr.name_img, cat.name as category, cat.caption as nameDir FROM `products` `pr` JOIN `category` `cat` ON pr.id_category = cat.id_category";

        $result = $this->db->prepare($sql);
        $result->execute();
        return $result->fetchAll();
    }

    function sendOrderInDB($f_name,$l_name,$phone,$cookieBasket){

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

    function l1($param1){

        $sql = "SELECT pr.id_prod, pr.name, pr.price, pr.name_img, cat.name as category, cat.caption as nameDir 
                FROM `products` `pr` JOIN `category` `cat` ON pr.id_category = cat.id_category 
                WHERE cat.caption = :param1 ";

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
                AND charact.caption = :param2";

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
                AND pr.id_prod IN (SELECT id_prod from `products_characteristics` `pc` where `pc`.`caption` = :param3)";

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
                AND pr.id_prod IN (SELECT id_prod from `products_characteristics` `pc` where `pc`.`caption` = :param4)";

        $result = $this->db->prepare($sql);
        $parameters = array(':param1' => $param1, ':param2' => $param2,':param3' => $param3,':param4' => $param4);
        $result->execute($parameters);
        return $result->fetchAll();
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

    function getAllProductsAdmin($more_info_table){
        $sql = "SELECT * FROM `products` `pr` JOIN `".$more_info_table."` `mon` ON pr.code = mon.code  ORDER BY pr.code DESC ";

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









    function addNotebook($product_name,$price,$name_img,$description,$category,$cover_type,$type_sheet,$size_notebook,$amount_in_package){
        
        $sql = "INSERT INTO `products` (name, price, name_img, description, category) 
                VALUES (:product_name, :price, :name_img, :description, :category)";
        
            $result = $this->db->prepare($sql);
            $parameters = array(':product_name' => $product_name, ':price' => $price, ':name_img' => $name_img, ':description' => $description , ':category' => $category );
            $result->execute($parameters);

        $sql = "SELECT code FROM `products` 
                WHERE name = :product_name AND price = :price AND name_img = :name_img AND description = :description AND category = :category";
        
            $result = $this->db->prepare($sql);
            $parameters = array(':product_name' => $product_name, ':price' => $price, ':name_img' => $name_img, ':description' => $description , ':category' => $category );
            $result->execute($parameters);
            $code =  $result->fetch();
            $code = $code->code;

        $sql = "INSERT INTO `more_info_notebooks` (code, cover_type, type_sheet, size_notebook, amount_in_package) 
                VALUES ('$code', :cover_type, :type_sheet, :size_notebook, :amount_in_package)";

            $result = $this->db->prepare($sql);
            $parameters = array(':cover_type' => $cover_type, ':type_sheet' => $type_sheet , ':size_notebook' => $size_notebook, ':amount_in_package' => $amount_in_package);
            $value = $result->execute($parameters);  
 
        $sql = "SELECT * FROM `name_characteristics` WHERE category = 'тетради'";

            $result = $this->db->prepare($sql);
            $result->execute(); 
            $characteristics = $result->fetchAll();
            $count = count($characteristics);
        
        $masValue = array($cover_type, $type_sheet, $size_notebook, $amount_in_package);

        for ($i=0; $i<$count; $i++){
            $attribut_name = $characteristics[$i]->name_characteristic;
            $attribut_value = $masValue[$i];
            $sql = "INSERT INTO `more_info` (code, attribut_name, attribut_value) 
                    VALUES ('$code', :attribut_name, :attribut_value)"; 

            $result = $this->db->prepare($sql);
            $parameters = array(':attribut_name' => $attribut_name, ':attribut_value' => $attribut_value);
            $result->execute($parameters); 
        }

    }

    function addPen($product_name,$price,$name_img,$description,$category,$type,$color_inc,$color_body,$amount_in_package){
        
        $sql = "INSERT INTO `products` (name, price, name_img, description, category) 
                VALUES (:product_name, :price, :name_img, :description, :category)";
        
            $result = $this->db->prepare($sql);
            $parameters = array(':product_name' => $product_name, ':price' => $price, ':name_img' => $name_img, ':description' => $description , ':category' => $category );
            $result->execute($parameters);

        $sql = "SELECT code FROM `products` 
                WHERE name = :product_name AND price = :price AND name_img = :name_img AND description = :description AND category = :category";
        
            $result = $this->db->prepare($sql);
            $parameters = array(':product_name' => $product_name, ':price' => $price, ':name_img' => $name_img, ':description' => $description , ':category' => $category );
            $result->execute($parameters);
            $code =  $result->fetch();
            $code = $code->code;

        $sql = "INSERT INTO `more_info_pens` (code, type, color_inc, color_body, amount_in_package) 
                VALUES ('$code', :type, :color_inc, :color_body, :amount_in_package)";

            $result = $this->db->prepare($sql);
            $parameters = array(':type' => $type, ':color_inc' => $color_inc , ':color_body' => $color_body, ':amount_in_package' => $amount_in_package);
            $value = $result->execute($parameters);  
 
        $sql = "SELECT * FROM `name_characteristics` WHERE category = 'ручки'";

            $result = $this->db->prepare($sql);
            $result->execute(); 
            $characteristics = $result->fetchAll();
            $count = count($characteristics);
        
        $masValue = array($type, $color_inc, $color_body, $amount_in_package);

        for ($i=0; $i<$count; $i++){
            $attribut_name = $characteristics[$i]->name_characteristic;
            $attribut_value = $masValue[$i];
            $sql = "INSERT INTO `more_info` (code, attribut_name, attribut_value) 
                    VALUES ('$code', :attribut_name, :attribut_value)"; 

            $result = $this->db->prepare($sql);
            $parameters = array(':attribut_name' => $attribut_name, ':attribut_value' => $attribut_value);
            $result->execute($parameters); 
        }

    }

    function addProducts($category){
        $sql = "SELECT * FROM `name_characteristics` WHERE category = :category";

        $result = $this->db->prepare($sql);
        $parameters = array(':category' => $category);
        $result->execute($parameters);

        return $result->fetchAll();

    }

    function searchProduct($code){
        $sql = "SELECT * FROM `products` WHERE code = :code";

        $result = $this->db->prepare($sql);
        $parameters = array(':code' => $code);
        $result->execute($parameters);

        return $result->fetchAll();
    }

    function dltProduct($code){

        $sql = "DELETE FROM `more_info` WHERE code = :code";
        $result = $this->db->prepare($sql);
        $parameters = array(':code' => $code);
        $result->execute($parameters);

        $sql = "DELETE FROM `more_info_notebooks` WHERE code = :code";
        $result = $this->db->prepare($sql);
        $parameters = array(':code' => $code);
        $result->execute($parameters);

        $sql = "DELETE FROM `more_info_pens` WHERE code = :code";
        $result = $this->db->prepare($sql);
        $parameters = array(':code' => $code);
        $result->execute($parameters);

        $sql = "DELETE FROM `products` WHERE code = :code";
        $result = $this->db->prepare($sql);
        $parameters = array(':code' => $code);
        $result->execute($parameters);

    }
}