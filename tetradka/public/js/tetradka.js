$(document).ready(function() {

	var cookies = $.cookie('basket');
	if (cookies == null){
		$.cookie('basket', new Array(), { expires: 7, path:'/'});
	}

	$("a.fancyimage").fancybox();

	$('.btn-addInBasket').on('click', function(){
		$name = $(this).data("name");
		$photo = $(this).data("photo");
		$code = $(this).data("code");
		$price = $(this).data("price");
		$category = $(this).data("category");
		$dir = $(this).data("dir");
		showAnimationAddInCart();
		addInCookie($name, $photo, $code, $price, $category, $dir);
	});

	jQuery(function($) {$('#phone').mask('+38(999) 999-99-99'); });
});

function addInCookie(name,photo,code,price,category,dir){
	var cookies = $.cookie('basket');
	if (cookies != 0){
		var tovar = JSON.parse($.cookie('basket'));

		for (var i = 0; i < Object.keys(tovar).length; i++){
			if (tovar[i].code == code){

				tovar[i].amount = parseFloat(tovar[i].amount) + 1;
				$.cookie('basket',JSON.stringify(tovar),{ expires: 7, path:'/'});
				refillBasket();
				return false;
			}
		}
		var tovar;
		tovar.push({'name':name,'photo':photo,'code':code,'price':price,'category':category,'dir':dir,'amount':'1'});
		$.cookie('basket',JSON.stringify(tovar),{ expires: 7, path:'/'});
	} else {
		var tovar;
		tovar = [{'name':name,'photo':photo,'code':code,'price':price,'category':category,'dir':dir,'amount':'1'}];
		$.cookie('basket',JSON.stringify(tovar),{ expires: 7, path:'/'});
	}
	refillBasket(); // перезаполнить
}

function refillBasket(){

	$('.td-basket').remove();
	$('#summa-basket').html(0);

	var cookies = $.cookie('basket');
	if(cookies != 0){
		var tovar = JSON.parse($.cookie('basket'));
		for (var i=0; i < Object.keys(tovar).length; i++){

			$('#th-basket').after('<tr class="active td-basket">'+
									'<td class="name-tovar-basket hide-mobile">'+tovar[i].category+' '+tovar[i].name+
									'<td class="text-center">'+'<img class="img-responsive img-produkt-in-basket" src="/img/products/'+tovar[i].dir+'/'+tovar[i].photo +'">'+
									'<td class="text-center basket-code hide-mobile" data-basCode="'+tovar[i].code+'">'+tovar[i].code+
									'<td class="text-center">'+
										'<img class="img-responsive minus" onclick="basketMinus('+tovar[i].code+')" src="/img/basket/remove.png">'+
										'<input class="count-product text-center" value="'+tovar[i].amount+'">'+
										'<img class="img-responsive plus" onclick="basketPlus('+tovar[i].code+')" src="/img/basket/add.png">'+
										'<img class="img-responsive delete" onclick="basketDelete('+tovar[i].code+')" src="/img/basket/delete.png">'+
									'<td class="sum text-center">'+tovar[i].price);
			var sum = $('#summa-basket').text();
			sum = parseFloat(sum) + (parseFloat(tovar[i].price) * parseFloat(tovar[i].amount));
			$('#summa-basket').text(parseFloat(sum).toFixed(2));
		}
	}
}

function deleteCookie(){
	$.cookie('basket', new Array(), { expires: 7, path:'/'});
	refillBasket();
	window.location = window.location;
}

function deleteCookieNotReload(){
	$.cookie('basket', new Array(), { expires: 7, path:'/'});
	refillBasket();
}

function basketPlus(code){
	var cookies = $.cookie('basket');

	 if (cookies != 0){
		var tovar = JSON.parse($.cookie('basket'));

		for (var i=0; i < Object.keys(tovar).length; i++){
			if (code == tovar[i].code){

				tovar[i].amount = parseFloat(tovar[i].amount) + 1;
				$.cookie('basket', JSON.stringify(tovar),{ expires: 7, path:'/'});
				refillBasket();
			}
		}
	 }
}

function basketMinus(code){
	var cookies = $.cookie('basket');

	if (cookies != 0){
		var tovar = JSON.parse($.cookie('basket'));

		for (var i=0; i < Object.keys(tovar).length; i++){
			if (code == tovar[i].code){
				tovar[i].amount = parseFloat(tovar[i].amount) - 1;

				if (tovar[i].amount != 0){
					$.cookie('basket', JSON.stringify(tovar),{ expires: 7, path:'/'});
					refillBasket();
				}
			}
		}
	 }
}

function basketDelete(code){
	var tovar = JSON.parse($.cookie('basket'));
	for (var i=0; i<Object.keys(tovar).length; i++){
		if (code == tovar[i].code){
			tovar.splice(i,1);
			$.cookie('basket', JSON.stringify(tovar),{ expires: 7, path:'/'});
			refillBasket();
		}
	}
}
/**
*	Checkout----------------------------------------------------------------------------------------
**/

	function fillCheckout(){

		$('.td-checkout').remove();
		$('#summa-checkout').html(0);

		var cookies = $.cookie('basket');
		if (cookies != 0){

			var tovar = JSON.parse($.cookie('basket'));
			for (var i=0; i<Object.keys(tovar).length; i++){

				$('#th-checkout').after(
								'<tr class="active td-checkout">'+
									'<td>'+tovar[i].category+' '+tovar[i].name+
									'<td class="text-center">'+'<img class="img-responsive img-checkout" src="/img/products/'+tovar[i].dir+'/'+tovar[i].photo +'">'+
									'<td class="text-center hide-mobile">'+tovar[i].code+
									'<td class="count-prod-td text-center">'+tovar[i].amount+
									'<td class="sum text-center">'+tovar[i].price);
				var sum = $('#summa-checkout').text();
				sum = parseFloat(sum) + (parseFloat(tovar[i].price) * parseFloat(tovar[i].amount));
				sum = $('#summa-checkout').text(parseFloat(sum).toFixed(2));
			}
		}

	}

function inputCheckoutName(){
	var pattern = /[а-яА-яё-]{2,}/g;
	var str = $('.inputCheckoutName').val();
	var value = str.match(pattern);

	if ( $('.inputCheckoutName').val() != value ){

		$('.checkoutNameError').html('Пожалуйста введите имя используя кириллицу.');
		$('.inputCheckoutName').val('');
	} else {
		$('.checkoutNameError').empty();
	}
}

function inputCheckoutLName(){
	var pattern = /[а-яА-яё-]{2,}/g;
	var str = $('.inputCheckoutLName').val();
	var value = str.match(pattern);

	if ( $('.inputCheckoutLName').val() != value ){

		$('.checkoutLNameError').html('Пожалуйста введите фамилию используя кириллицу.');
		$('.inputCheckoutLName').val('');
	} else {
		$('.checkoutLNameError').empty();
	}
}

function newOrder(){
	$name = $('.inputCheckoutName').val();
	$lname = $('.inputCheckoutLName').val();
	$phone = $('#phone').val();

	if ($name.length >= 3 && $lname.length >=3 && $phone.length == 18){
		$.cookie('newOrder', new Array(), { expires: 1, path:'/'});
	}
}

function deleteNewOrder(){ $.cookie('newOrder', new Array(), { expires: -1, path:'/'}); }
/*
** Анимация AddInBasket --------------------------------------------------------------------------------------------
*/
var clearTime;
var click = 0;

function showAnimationAddInCart(){
  if (click == 0){
	click = 1;
	$(".addInBasket").show(0).animate({ top:"60" });
	time = setTimeout( function(){$(".addInBasket").animate({top:"10"});click = 0;}, 3000);
  } else {
	click = 0;
	clearTimeout(time);
	$('.addInBasket').queue("fx", []);
	$(".addInBasket").hide(0).css({ top:"10px" });
	showAnimationAddInCart();
  }
}

function offAnimation(){
	$('.addInBasket').css({ top: '10px' });
	clearTimeout(time);
}

/*
** Orders --------------------------------------------------------------------------------------------
*/

function moreAboutOrder(id)
{
	$.ajax({
		type: "POST",
		url: "/adminMenu/moreAboutOrder",
		data: "id=" + id,
		dataType: "json",
		success: handleData
			// console.log(id);
	});
}
function handleData(data){
	$('.table-order-tr').remove();
	for(var i = 0; i < data.length; i++){
		$('.table-adm-more').append(
			  	'<tr class="table-order-tr">'+
  	   	  			'<td>'+data[i].name+'</td>'+
  	  	  			'<td class="text-center">'+data[i].photo+'</td>'+
  	  	  			'<td class="text-center">'+data[i].code+'</td>'+
  	  	  			'<td class="text-center">'+data[i].amount+'</td>'+
  	  	  			'<td class="text-center">'+data[i].price+'</td>'+
  	  	  			'<td class="text-center"><a href="http://tetradka.sumy.ua/products/moreInfo/'+data[i].code+'" target="_blank"><img class="img-responsive img-more-admin" src="/img/admin/glyphicons-30-notes-2.png"></a></td>'+
  	  	  		'</tr>'
		);
	}

}

function changeStatusOther(id,status)
{
	$.ajax({
		type: "POST",
		url: "/adminMenu/changeStatusOther",
		data: { id: id, status:status },
		dataType: "json",
		success: function(data){

		}
	});
		location.reload();
}

function sendInOrderTable(id,iz,v){

	$.ajax({
		type: "POST",
		url: "/adminMenu/sendInOrderTable",
		data: { id: id, iz: iz, v: v },
		dataType: "json",
		success: function(data){

		}
	});
		location.reload();
}

/*
** addProducts --------------------------------------------------------------------------------------------
*/

/* функция вызывается в файле bootstrap-select.js 477 строка*/
function getCharacterisrics(){
	var id = $('#getCategory').val();

	if (id != 0){
		$.ajax({
			type: "POST",
			url: "/adminMenu/getCharacterisrics",
			data: { id: id},
			dataType: "json",
			success: function(data){

				$('.addCharact').empty();
				$('.addCaption').empty();

				for(var i = 0; i < data.length; i++){
					$('.addCharact').append(
						'<p><div class="input-group">'+
							'<span class="input-group-addon"><b>></b> '+data[i].name+':</span>'+
							'<input type="text" class="form-control" name="characteristics['+data[i].id_charact+']" required>'+
						'</div></p>');
					$('.addCaption').append(
						'<p><div class="input-group">'+
							'<span class="input-group-addon">caption:</span>'+
							'<input type="text" class="form-control" name="captions['+data[i].id_charact+']" required>'+
					'	</div></p>');
					}
			}
		});
	}
}

/*
** deleteProducts --------------------------------------------------------------------------------------------
*/

function showProduct(id_prod, bool){
	$.ajax({
		type: "POST",
		url: "/adminMenu/showProduct",
		data: { id_prod: id_prod, bool: bool },
		dataType: "json",
		success: function(data){

		}
	});
		location.reload();
}

/*
** mobile menu --------------------------------------------------------------------------------------------
*/
$(document).ready(function () {
    $('#cssmenu li.has-sub > a').on('click', function(){
        $(this).removeAttr('href');
        var element = $(this).parent('li');
        if (element.hasClass('open')) {
            element.removeClass('open');
            element.find('li').removeClass('open');
            element.find('ul').slideUp();
        }
        else {
            element.addClass('open');
            element.children('ul').slideDown();
            element.siblings('li').children('ul').slideUp();
            element.siblings('li').removeClass('open');
            element.siblings('li').find('li').removeClass('open');
            element.siblings('li').find('ul').slideUp();
        }
    });

    $('#cssmenu>ul>li.has-sub>a').append('<span class="holder"></span>');
});