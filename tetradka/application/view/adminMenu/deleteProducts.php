<div class="container floor-container">
	<div class="col-md-12 ">
   		<div class="row">
			
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 floor-admin">
				<div class="col-lg-offset-1 col-lg-10 ">
	
					<p class="text-center topic-admin-panel"><b>Удалить товар по коду</b></p>
					
					<form action="<?php echo URL;?>adminMenu/deleteProducts" method="POST">
						<p>
						<div class="row">
						    <div class="input-group">
						    	<span class="input-group-addon">Код товара:</span>
						    	<input type="text" class="form-control" placeholder="141516" name="code" required>
						    </div>
						</div>
						</p>
							
						<a href="<?php echo URL;?>eng" class="btn btn-primary pull-right"> Назад </a>
						<input type="submit" class="btn btn-success pull-right btn_add_notebook" name="btn_search" value="Поиск">
						<input type="submit" class="btn btn-danger" name="btn_delete" value="Удалить">
					</form>
						
				</div>
			</div>

<?php if (isset($allProducts)) { ?>

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 floor-admin">
				<div class="col-lg-12">	

					<p class="text-center topic-admin-panel"><b>Найденые товары по коду</b></p>

					<table class="table table-bordered table-notebooks">
         				<tr id="th-basket" class="active">
         					<th class="text-center">Код</th>
       					    <th class="text-center">Имя товара</th>
       					    <th class="text-center">Цена</th>
       					    <th class="text-center">Фото</th> 
       					    <th class="text-center">Описание</th>
       					    <th class="text-center">Категория</th>
       					</tr>
       				<?php foreach ($allProducts as $product) {
       					if ($product->category == 'ручки'){ $dir = 'pens';}
                        if ($product->category == 'тетради'){ $dir = 'noteBooks';}
                    ?>
    					<tr>
    						<td class="text-center" ><?php echo $product->code; ?></td>
    						<td class="text-center" ><?php echo $product->name; ?></td>
    						<td class="text-center" ><?php echo $product->price; ?></td>
    						<td class="text-center" ><img class="img-product-in-admin img-resposive" src="<?php echo URL; ?>img/<?php echo $dir; ?>/<?php echo $product->name_img;?>"></td>
    						<td class="text-center" ><?php echo $product->description; ?></td>
    						<td class="text-center" ><?php echo $product->category; ?></td>
    					</tr>
					<?php } ?>
       					<tr>
       	
       					    <td colspan="5"class="text-center"><b class="pull-right">Всего позиций</b></td> 
       					    <td id="summa-basket" class="text-center"><b><?php echo count($allProducts); ?></b></td>
       					</tr>
       				</table>

				</div>
			</div>
<?php } ?>
		</div>
	</div>
</div>