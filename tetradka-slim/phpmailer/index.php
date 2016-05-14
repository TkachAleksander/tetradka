
<?php

$headers = "Content-type: text/html; Charset = utf-8"; // кодировка письма text/plain - обычная кодировка(если будут теги будут отображатся как обычный текст)
														// кодировка письма text/html - для тегов

if( mail( 'ssori3838@ukr.net', 'Саня кинул письмо', 'Я звезда', $headers) ){
	echo 'Pismo otpravleno';
}else{
	echo 'Fail';
}

  




?>
