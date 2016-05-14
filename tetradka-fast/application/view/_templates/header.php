<!DOCTYPE html>
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <title><?php echo $title; ?></title>

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
    <script type="text/javascript" src="<?php echo URL; ?>js/jquery.mobile.custom.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>js/jquery.rotate.js"></script>
    <!-- FONTS -->
    <link rel="icon" type="img/ico" href="<?php echo URL; ?>/img/logo/favicon.ico">
    <link href='https://fonts.googleapis.com/css?family=Marck+Script&subset=latin,cyrillic' rel='stylesheet' type='text/css'> <!-- Основной -->
    <link href='https://fonts.googleapis.com/css?family=Patua+One' rel='stylesheet' type='text/css'> <!-- Лого -->
    <link href='https://fonts.googleapis.com/css?family=Kelly+Slab&subset=latin,cyrillic' rel='stylesheet' type='text/css'> <!-- Цена -->
    <link href='https://fonts.googleapis.com/css?family=Philosopher:400italic&subset=latin,cyrillic' rel='stylesheet' type='text/css'> <!-- Кнопки tile -->
    
    <!-- RECAPTCHA -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <?php include "other.php";?>

    
</head>
<body>
    
    <nav class="navbar navbar-inverse navbar-static-top navbar-fixed-top" role="navigation">
        <div class="container-fluid container-fluid-menu MarckScript">
            <div class="navbar-header">
                <a href="<?php echo URL; ?>" class="navbar-brand">
                    <img src="<?php echo URL; ?>public/img/logo/logo.png" class="logo-img img-responsive" height="30" width="50" alt="Интернет магазин канцтоваров Tetradka" title="Интернет магазин канцтоваров Tetradka">
                </a>
                <a href="<?php echo URL; ?>" class="logo-text navbar-brand PatuaOne">Tetradka</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav firstMenu style-menu ">
                    <li class="dropdown">
                    
                    <?php function htmlspch($value) { return htmlspecialchars($value, ENT_QUOTES, 'UTF-8'); } ?>

                    <a href="<?php echo URL . 'products/l1/2/'.htmlspch('notebooks');?>" > Тетради <b class="caret caret-menu"></b></a>
                      <ul class="dropdown-menu style-menu nextLevel">
                        <li class="cross-over"><a href="<?php echo URL .'products/l2/3/'. htmlspch('notebooks') .'/'. htmlspch('color'); ?>" > Цветные </a>
                            <ul class="dropdown-menu style-menu nextLevel">
                              <li class="cross-over"><a href="<?php echo URL .'products/l3/5/'. htmlspch('notebooks') .'/'. htmlspch('color') .'/'. htmlspch('cell'); ?>" > Клетка </a>
                                <ul class="dropdown-menu style-menu nextLevel">
                                  <li><a href="<?php echo URL .'products/l4/10/'. htmlspch('notebooks') .'/'. htmlspch('color') .'/'. htmlspch('cell') .'/'. htmlspch('12') ;?>" >12 листов </a></li>
                                  <li><a href="<?php echo URL .'products/l4/11/'. htmlspch('notebooks') .'/'. htmlspch('color') .'/'. htmlspch('cell') .'/'. htmlspch('18') ;?>" >18 листов </a></li>
                                  <li><a href="<?php echo URL .'products/l4/12/'. htmlspch('notebooks') .'/'. htmlspch('color') .'/'. htmlspch('cell') .'/'. htmlspch('24') ;?>" >24 листа  </a></li>
                                  <li><a href="<?php echo URL .'products/l4/13/'. htmlspch('notebooks') .'/'. htmlspch('color') .'/'. htmlspch('cell') .'/'. htmlspch('36') ;?>" >36 листов </a></li>
                                  <li><a href="<?php echo URL .'products/l4/14/'. htmlspch('notebooks') .'/'. htmlspch('color') .'/'. htmlspch('cell') .'/'. htmlspch('48') ;?>" >48 листов </a></li>
                                  <li><a href="<?php echo URL .'products/l4/15/'. htmlspch('notebooks') .'/'. htmlspch('color') .'/'. htmlspch('cell') .'/'. htmlspch('60') ;?>" >60 листов </a></li>
                                  <li><a href="<?php echo URL .'products/l4/16/'. htmlspch('notebooks') .'/'. htmlspch('color') .'/'. htmlspch('cell') .'/'. htmlspch('96') ;?>" >96 листов </a></li>
                                </ul>
                              </li>
                              <li class="cross-over"><a href="<?php echo URL .'products/l3/6/'. htmlspch('notebooks') .'/'. htmlspch('color') .'/'. htmlspch('line'); ?>" > Линия </a>
                                <ul class="dropdown-menu style-menu nextLevel">
                                  <li><a href="<?php echo URL . 'products/l4/17/'. htmlspch('notebooks') .'/'. htmlspch('color') .'/'. htmlspch('line') .'/'. htmlspch('12'); ?>" >12 листов </a></li>
                                  <li><a href="<?php echo URL . 'products/l4/18/'. htmlspch('notebooks') .'/'. htmlspch('color') .'/'. htmlspch('line') .'/'. htmlspch('18'); ?>" >18 листов </a></li>
                                  <li><a href="<?php echo URL . 'products/l4/19/'. htmlspch('notebooks') .'/'. htmlspch('color') .'/'. htmlspch('line') .'/'. htmlspch('24'); ?>" >24 листа  </a></li>
                                  <li><a href="<?php echo URL . 'products/l4/20/'. htmlspch('notebooks') .'/'. htmlspch('color') .'/'. htmlspch('line') .'/'. htmlspch('36'); ?>" >36 листов </a></li>
                                  <li><a href="<?php echo URL . 'products/l4/21/'. htmlspch('notebooks') .'/'. htmlspch('color') .'/'. htmlspch('line') .'/'. htmlspch('48'); ?>" >48 листов </a></li>
                                  <li><a href="<?php echo URL . 'products/l4/22/'. htmlspch('notebooks') .'/'. htmlspch('color') .'/'. htmlspch('line') .'/'. htmlspch('60'); ?>" >60 листов </a></li>
                                  <li><a href="<?php echo URL . 'products/l4/23/'. htmlspch('notebooks') .'/'. htmlspch('color') .'/'. htmlspch('line') .'/'. htmlspch('96'); ?>" >96 листов </a></li>
                                </ul>
                              </li>
                            </ul>
                          </li>
                          <li class="cross-over"><a href="<?php echo URL .'products/l2/4/
                          '. htmlspch('notebooks') .'/'. htmlspch('ofset'); ?>" >Офсет</a>
                            <ul class="dropdown-menu style-menu nextLevel">
                              <li class="cross-over"><a href="<?php echo URL .'products/l3/7/'. htmlspch('notebooks') .'/'. htmlspch('ofset') .'/'. htmlspch('cell'); ?>" > Клетка </a>
                                <ul class="dropdown-menu style-menu nextLevel">
                                  <li><a href="<?php echo URL .'products/l4/24/'. htmlspch('notebooks') .'/'. htmlspch('ofset') .'/'. htmlspch('cell') .'/'. htmlspch('12'); ?>" > 12 листков </a></li>
                                  <li><a href="<?php echo URL .'products/l4/25/'. htmlspch('notebooks') .'/'. htmlspch('ofset') .'/'. htmlspch('cell') .'/'. htmlspch('18'); ?>" > 18 листков </a></li>
                                  <li><a href="<?php echo URL .'products/l4/26/'. htmlspch('notebooks') .'/'. htmlspch('ofset') .'/'. htmlspch('cell') .'/'. htmlspch('24'); ?>" > 24 листа   </a></li>
                                </ul>
                              </li>
                              <li class="cross-over"><a href="<?php echo URL .'products/l3/8/'. htmlspch('notebooks') .'/'. htmlspch('ofset') .'/'. htmlspch('line') ;?>" > Линия </a>
                                <ul class="dropdown-menu style-menu nextLevel">
                                  <li><a href="<?php echo URL .'products/l4/27/'. htmlspch('notebooks') .'/'. htmlspch('ofset') .'/'. htmlspch('line') .'/'. htmlspch('12'); ?>" > 12 листков </a></li>
                                  <li><a href="<?php echo URL .'products/l4/28/'. htmlspch('notebooks') .'/'. htmlspch('ofset') .'/'. htmlspch('line') .'/'. htmlspch('18'); ?>" > 18 листков </a></li>
                                  <li><a href="<?php echo URL .'products/l4/29/'. htmlspch('notebooks') .'/'. htmlspch('ofset') .'/'. htmlspch('line') .'/'. htmlspch('24'); ?>" > 24 листа   </a></li>
                                </ul>
                              </li>
                              <li class="cross-over"><a href="<?php echo URL .'products/l3/9/'. htmlspch('notebooks') .'/'. htmlspch('ofset') .'/'. htmlspch('slanting'); ?>" > Косая </a>
                                <ul class="dropdown-menu style-menu nextLevel">
                                  <li><a href="<?php echo URL .'products/l4/30/'. htmlspch('notebooks') .'/'. htmlspch('ofset') .'/'. htmlspch('slanting') .'/'. htmlspch('12'); ?>" > 12 листков </a></li>
                                </ul>
                              </li>
                            </ul>
                          </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                      <a href="#"> Для рисования <b class="caret"></b></a>
                      <ul class="dropdown-menu style-menu nextLevel">
                        <li><a href="<?php echo URL .'products/l1/31/'. htmlspch('pens'); ?>"> Ручки </a></li>
                        <li class="cross-over"><a href="<?php echo URL .'products/l1/4/'. htmlspch('album'); ?>">Альбомы</a>
                          <ul class="dropdown-menu style-menu nextLevel">
                            <li><a href="<?php echo URL .'products/l2/4/'. htmlspch('album') .'/'. htmlspch('12'); ?>"> 12 листов </a></li>
                            <li><a href="#"> 24 листов </a></li>
                            <li><a href="#"> 30 листов </a></li>
                            <li><a href="#"> 40 листов </a></li>
                          </ul>
                        </li>
                        <li><a href="#"> Краски </a></li>
                        <li><a href="#"> Кисточки </a></li>
                        <li><a href="#"> Непроливайки </a></li>
                        <li class="cross-over"><a href="#"> Цветные карандаши </a>
                          <ul class="dropdown-menu style-menu nextLevel">
                            <li><a href="#"> 6 цветов </a></li>
                            <li><a href="#"> 12 цветов </a></li>
                            <li><a href="#"> 24 цвета </a></li>
                            <li><a href="#"> 36 цветов </a></li>
                          </ul>
                        </li>
                        <li class="cross-over"><a href="#"> Фломастеры </a>
                          <ul class="dropdown-menu style-menu nextLevel">
                            <li><a href="#"> 6 цветов </a></li>
                            <li><a href="#"> 12 цветов </a></li>
                            <li><a href="#"> 24 цвета </a></li>
                            <li><a href="#"> 30 цветов </a></li>
                          </ul>
                        </li>
                        <li><a href="#"> Маркеры </a></li>
                        <li><a href="#"> Простые карандаши </a></li>
                        <li><a href="#"> Ластики </a></li>
                        <li><a href="#"> Точилки </a></li>
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a href="#"> Для труда <b class="caret"></b></a>
                      <ul class="dropdown-menu style-menu nextLevel">
                        <li class="cross-over"><a href="#"> Папки </a>
                          <ul class="dropdown-menu style-menu nextLevel">
                            <li><a href="#"> Формат А4 </a></li>
                            <li><a href="#"> Формат А5 </a></li>
                          </ul>
                        </li>
                        <li><a href="#"> Пластилин </a></li>
                        <li><a href="#"> Ножницы </a></li>
                        <li><a href="#"> Клей </a></li>
                      </ul>
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



  