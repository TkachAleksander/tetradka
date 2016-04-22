<div class="container floor-container">
    <div class="col-md-12">
        <div class="row">
            <div class="products col-lg-offset-1 col-lg-10 floor-content">

                <div class="row row-checkout">
                    <div class="col-lg-7">
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
        
                    <div class="col-lg-offset-1 col-lg-4">
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

                            <button type="submit" class="btn btn-success btn-submit"> Отправить </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
