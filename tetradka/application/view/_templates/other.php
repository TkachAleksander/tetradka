  <!-- BASKET -->
  <div class="modal fade" onclick="fillCheckout()" id="basket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header mobile">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="fillCheckout()">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Корзина</h4>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-basket">
          <tr id="th-basket" class="active">
            <th class="text-center hide-mobile">Имя товара</th>
            <th class="text-center">Фото</th> 
            <th class="text-center hide-mobile">Код</th>
            <th class="text-center">Количество</th>
            <th class="text-center">Цена</th>
          </tr>
          <tr>
            <td colspan="3" class="hide-mobile"></td>
            <td class="hide-pc"></td>
            <td class="text-center "><b>Сумма</b></td> 
            <td id="summa-basket" class="text-center">0 грн</td>
          </tr>
        </table>
      </div> 
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-sm" onclick="deleteCookie()"><b> Очистить корзину </b></button>
        <a href="<?php echo URL; ?>checkout "><button type="button" class="btn btn-success btn-sm"><b> Оформить заказ </b></button></a>
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
          <a href="<?php echo URL; ?>" class="navbar-brand">
              <img src="<?php echo URL; ?>public/img/logo/logo.png" class="logo-img img-responsive" height="30" width="50">
            </a>
            <a href="<?php echo URL; ?>" class="logo-text navbar-brand PatuaOne">Tetradka</a>
          </div> 
    </div>
  </nav>

   <!-- MOBILE MENU -->

  <div class="menu-open" data-toggle="modal" data-target="#myModal">
<span class="glyphicon glyphicon-align-justify"></span>
  </div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body mm">

        <div id='cssmenu'>
          <ul>
            <li><a href='<?php echo URL;?>'><span> Главная </span></a></li> <!--class='active'-->
            <li class='has-sub'><a href='#'><span> Тетради </span></a>
              <ul>
                 <li class='has-sub'><a href='#'><span> Цветные </span></a>
                    <ul>
                        <li class='has-sub'><a href='#'><span> Клетка </span></a>
                          <ul>
                            <li><a href='<?php echo URL;?>products/l4/10/notebooks/color/cell/12'><span> 12 </span></a></li>
                            <li><a href='<?php echo URL;?>products/l4/11/notebooks/color/cell/18'><span> 18 </span></a></li>
                            <li><a href='<?php echo URL;?>products/l4/12/notebooks/color/cell/24'><span> 24 </span></a></li>
                            <li><a href='<?php echo URL;?>products/l4/13/notebooks/color/cell/36'><span> 36 </span></a></li>
                            <li><a href='<?php echo URL;?>products/l4/14/notebooks/color/cell/48'><span> 48 </span></a></li>
                            <li><a href='<?php echo URL;?>products/l4/15/notebooks/color/cell/60'><span> 60 </span></a></li>
                            <li><a href='<?php echo URL;?>products/l4/16/notebooks/color/cell/96'><span> 96 </span></a></li>
                          </ul>
                        </li>
                        <li class='has-sub'><a href='#'><span>Линия</span></a>
                          <ul>
                            <li><a href='<?php echo URL;?>products/l4/17/notebooks/color/line/12'><span> 12 </span></a></li>
                            <li><a href='<?php echo URL;?>products/l4/18/notebooks/color/line/18'><span> 18 </span></a></li>
                            <li><a href='<?php echo URL;?>products/l4/19/notebooks/color/line/24'><span> 24 </span></a></li>
                            <li><a href='<?php echo URL;?>products/l4/20/notebooks/color/line/36'><span> 36 </span></a></li>
                            <li><a href='<?php echo URL;?>products/l4/21/notebooks/color/line/48'><span> 48 </span></a></li>
                            <li><a href='<?php echo URL;?>products/l4/22/notebooks/color/line/60'><span> 60 </span></a></li>
                            <li><a href='<?php echo URL;?>products/l4/23/notebooks/color/line/96'><span> 96 </span></a></li>
                          </ul>
                        </li>
                    </ul>             
                 <li class='has-sub'><a href='#'><span>Офсет</span></a>
                    <ul>
                        <li class='has-sub'><a href='#'><span>Клетка</span></a>
                          <ul>
                            <li><a href='<?php echo URL;?>products/l4/24/notebooks/ofset/cell/12'><span> 12 </span></a></li>
                            <li><a href='<?php echo URL;?>products/l4/25/notebooks/ofset/cell/18'><span> 18 </span></a></li>
                            <li><a href='<?php echo URL;?>products/l4/26/notebooks/ofset/cell/24'><span> 24 </span></a></li>
                          </ul>
                        </li>                        
                        <li class='has-sub'><a href='#'><span>Линия</span></a>
                          <ul>
                            <li><a href='<?php echo URL;?>products/l4/27/notebooks/ofset/line/12'><span> 12 </span></a></li>
                            <li><a href='<?php echo URL;?>products/l4/28/notebooks/ofset/line/18'><span> 18 </span></a></li>
                            <li><a href='<?php echo URL;?>products/l4/29/notebooks/ofset/line/24'><span> 24 </span></a></li>
                          </ul>  
                        </li>                    
                        <li><a href='<?php echo URL;?>products/l4/30/notebooks/ofset/slanting/12'><span>Косая</span></a></li>
                    </ul>
                 </li>
              </ul>
            </li>
            <li><a href='<?php echo URL;?>products/l1/31/pens'><span>Ручки</span></a></li>
            <li class='has-sub'><a href='#'><span>Для рисования</span></a>
              <ul>
                <li><a href='<?php echo URL;?>'><span> Альбомы </span></a></li>
                <li><a href='<?php echo URL;?>'><span> Краски </span></a></li>
                <li><a href='<?php echo URL;?>'><span> Кисточки </span></a></li>
                <li><a href='<?php echo URL;?>'><span> Непроливайки </span></a></li>
                <li><a href='<?php echo URL;?>'><span> Фломастеры </span></a></li>
                <li><a href='<?php echo URL;?>'><span> Маркеры </span></a></li>
                <li class='has-sub'><a href='<?php echo URL;?>'><span> Карандаши </span></a>
                  <ul>
                    <li><a href='<?php echo URL;?>'><span> Цветные </span></a></li>
                    <li><a href='<?php echo URL;?>'><span> Простые </span></a></li>
                  </ul>
                </li>                
                <li><a href='<?php echo URL;?>'><span> Ластики </span></a></li>
                <li><a href='<?php echo URL;?>'><span> Точилки </span></a></li>
              </ul>
            </li>
            <li class="mm-active">
              <a href='#' data-toggle="modal" data-target="#basket" onclick="refillBasket()" data-dismiss="modal" aria-hidden="true">
                <span>Корзина</span><img class="mm-basket" src="<?php echo URL; ?>img/basket/cart.png">
              </a>
            </li>
          </ul>
        </div>

      </div>
    </div>
  </div>
</div>