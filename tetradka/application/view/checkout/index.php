<?php if ($checkBasket) { ?>

<div class="container floor-container">
    <div class="col-md-12">
        <div class="row">
            <div class="products col-lg-offset-1 col-lg-10 floor-content">

                <div class="row row-checkout">
                    <div class="col-lg-7 col-md-7"> 
                        <!-- <h1 class="text-center MarckScript">Оформление заказа</h1> -->
                        <table class="table table-bordered table-checkout">
                            <tr id="th-checkout" class="active">
                                <th class="text-center">Имя товара</th>
                                <th class="text-center">Фото</th> 
                                <th class="text-center">Код</th>  
                                <th class="text-center">Количество</th>
                                <th class="text-center">Цена</th>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <td class="text-center"><b>Сумма</b></td>
                                <td id="summa-checkout" class="text-center">0 грн</td>
                            </tr>                 
                        </table>
                    </div>
        
                    <div class="col-lg-offset-1 col-md-offset-1  col-lg-4 col-md-4 ">
                        <form role="form" method="POST" action="<?php echo URL; ?>checkout/sendOrder">
                            <div class="form-group">
                                <label> Как к Вам обращаться ? </label>
                                <p><input required type="text" name="f_name" class="form-control inputCheckoutName" placeholder="Введите имя" onblur="inputCheckoutName()"></p>
                                <p class="checkoutNameError"></p>
                                <input required type="text" name="l_name" class="form-control inputCheckoutLName" placeholder="Введите фамилию" onblur="inputCheckoutLName()">
                                <p class="checkoutLNameError"></p>
                            </div>
                            <div class="form-group">
                                <label> Номер телефона для подтвержения заказа </label>
                                <input required type="text" name="phone" class="form-control" id="phone" placeholder="+38(095)111-22-33"  >
                            </div>

                            <div class="g-recaptcha" data-sitekey="6LdaEB4TAAAAAODS86yvVGhD5fDiPxhXjD31qw68"></div>

                            <a href="<?php echo URL; ?>"><button class="btn btn-primary btn-checkout"> Продолжить покупки </button></a>
                            <button type="submit" class="btn btn-success btn-checkout pull-right" onclick="newOrder()"><b> Отправить </b></button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script type="text/javascript"> fillCheckout(); </script>

<?php } else {?>

<div class="container floor-container">
    <div class="col-md-12">

        <div class="row">
            <div class="products col-lg-offset-1 col-lg-10 floor-content">

                <div class="row row-checkout">
                    <div class="col-lg-7"> 
                        <table class="table table-bordered table-checkout">
                            <tr id="th-checkout" class="active">
                                <td class="text-center">Имя товара</td>
                                <td class="text-center">Фото</td> 
                                <td class="text-center">Код</td>  
                                <td class="text-center">Количество</td>
                                <td class="text-center">Цена</td>
                            </tr>
                            <tr>
                                <td colspan="5" class="text-center text-size-18"><b> Ваша корзина пуста </b></td>
                            </tr>
<!--                             <tr>
                                <td colspan="3"></td>
                                <td class="text-center">Сумма</td>
                                <td id="summa-checkout" class="text-center">0 грн</td>
                            </tr>    -->              
                        </table>
                    </div>

                    <div class=" col-lg-5 text-center">
                        <p class="margin-40">
                            <!-- <span class="text-size-20 MarckScript "> Корзина пуста </span> -->
                            <a href="<?php echo URL; ?>">
                                <button class="btn btn-success"><b> Но это никогда не поздно исправить :) </b></button>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php } ?>