<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title><?php echo "Tetradka"; ?></title>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/jquery.fancybox.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/bootstrap-select.css">
  
    <!-- JS -->
    <script type="text/javascript" src="<?php echo URL; ?>js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>js/jquery.cookie.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>js/jquery.fancybox.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>js/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>js/tetradka.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>js/jquery.mask.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>js/bootstrap-select.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>js/i18n/defaults-ru_RU.js"></script>

    <!-- FONTS -->
    <link rel="icon" type="img/ico" href="<?php echo URL; ?>/img/logo/favicon.ico">
    <link href='https://fonts.googleapis.com/css?family=Marck+Script&subset=latin,cyrillic' rel='stylesheet' type='text/css'> <!-- Основной -->
    <link href='https://fonts.googleapis.com/css?family=Patua+One' rel='stylesheet' type='text/css'> <!-- Лого -->
    <link href='https://fonts.googleapis.com/css?family=Kelly+Slab&subset=latin,cyrillic' rel='stylesheet' type='text/css'> <!-- Цена -->
    <link href='https://fonts.googleapis.com/css?family=Philosopher:400italic&subset=latin,cyrillic' rel='stylesheet' type='text/css'> <!-- Кнопки tile -->
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>fonts/glyphicons-halflings-regular.wof">
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>fonts/glyphicons-halflings-regular.wof2">
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>fonts/glyphicons-halflings-regular.ttf">

<body>

    <nav class="navbar navbar-inverse navbar-static-top navbar-fixed-top" role="navigation">
        <div class="container-fluid container-fluid-menu MarckScript">
            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a href="<?php echo URL; ?>" class="navbar-brand">
                    <img src="<?php echo URL; ?>public/img/logo/logo.png" class="logo-img img-responsive" height="30" width="50">
                </a>
                <a href="<?php echo URL; ?>" class="logo-text navbar-brand PatuaOne">Tetradka</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav firstMenu style-menu">
                    <li class="dropdown">
                        <a href="#"> Управление товарами </a>
                        <ul class="dropdown-menu style-menu nextLevel">                            
                            <li><a href="<?php echo URL; ?>adminMenu/addProducts"> Добавить </a></li>
                            <li><a href="<?php echo URL; ?>adminMenu/deleteProducts"> Удалить </a></li>
                            <li class="cross-over"><a href="<?php echo URL; ?>adminMenu/databaseControl"> Управление БД  </a></li>
                        </ul>                    
                    </li>
                    <li class="dropdown">
                        <a href="#"> Управление заказами <b class="caret caret-menu"></b></a>
                        <ul class="dropdown-menu style-menu nextLevel">
                            <li><a href="<?php echo URL; ?>adminMenu/controlNewOrders"> Новые заказы </a></li>
                            <li><a href="<?php echo URL; ?>adminMenu/controlPackedOrders"> Заказы на упаковку </a></li>  
                            <li><a href="<?php echo URL; ?>adminMenu/controlCompletedOrders"> Выполненные заказы </a></li>  
                            <li><a href="<?php echo URL; ?>adminMenu/controlDeliveryOrders"> Заказы на дом </a></li>
                            <li class="admin-divider"></li>
                            <li><a href="<?php echo URL; ?>adminMenu/controlCancleOrders"> Отмененные заказы </a></li> 
                            <li><a href="<?php echo URL; ?>adminMenu/controlDeleteOrders"> Удаленные заказы </a></li> 
                        </ul>
                    </li>

                    <li class="dropdown">
                         <a href="<?php echo URL; ?>eng"> Выход </a>
                    </li>                
                </ul>

                <ul class="nav navbar-nav navbar-right enter">
                    <li>
                        <a class="basket" data-toggle="modal" data-target="#basket" onclick="refillBasket()">
                            <img class="img-responsive" src="<?php echo URL; ?>img/basket/cart.png" alt="Корзина">
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

  <!-- BASKET -->
  <div class="modal fade" id="basket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Корзина</h4>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-basket">
          <tr id="th-basket" class="active">
            <th class="text-center">Имя товара</th>
            <th class="text-center">Фото</th> 
            <th class="text-center">Код</th>
            <th class="text-center">Количество</th>
            <th class="text-center">Цена</th>
          </tr>
          <tr>
            <td colspan="3"></td>
            <td class="text-center"><b>Сумма</b></td> 
            <td id="summa-basket" class="text-center">0 грн</td>
          </tr>
        </table>
      </div> 
      <div class="modal-footer">
        <a href="#"><button type="button" class="btn btn-default btn-sm" onclick="deleteCookie()"><b>Очистить корзину</b></button></a>
        <a href="<?php echo URL; ?>checkout "><button type="button" class="btn btn-success btn-sm" onclick="fillCheckout()" ><b>Оформить заказ</b></button></a>
      </div>
    </div>
  </div> 
  </div>

  <!-- MESSAGE ADD IN BASKET -->
  <div class="addInBasket MarckScript">
    Товар добавлен в корзину
    <div id="off" onclick="offAnimation()">  X  </div>
  </div> 

  <!-- MOBILE HEADER -->
  <nav class="navbar navbar-inverse navbar-fixed-top mobile-menu" role="navigation">
    <div class="container">
      <div class="navbar-header">
          <button type="button" class="navbar-toggle btn-mobile-menu" >
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
          <a href="<?php echo URL; ?>" class="navbar-brand">
              <img src="<?php echo URL; ?>public/img/logo/logo.png" class="logo-img img-responsive" height="30" width="50">
            </a>
            <a href="<?php echo URL; ?>" class="logo-text navbar-brand PatuaOne">Tetradka</a>
          </div> 
    </div>
  </nav>