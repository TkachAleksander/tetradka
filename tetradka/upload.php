<?php
   if($_FILES["filename"]["size"] > 1024*1*1024)
   {
     echo ("Размер файла превышает 1 мегабайт");
     exit;
   }
   // Проверяем загружен ли файл
   if(is_uploaded_file($_FILES["filename"]["tmp_name"]))
   {
     // Если файл загружен успешно, перемещаем его
     // из временной директории в конечную
     move_uploaded_file($_FILES["filename"]["tmp_name"], "public/img/noteBooks/".$_FILES["filename"]["name"]);
   } else {
      echo("Ошибка загрузки файла");
   }
   header("Location: http://sumdu2/");
?>