<div class="container floor-container">
	<div class="col-md-12 ">
   		<div class="row">
			
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 floor-admin">
				<div class="col-lg-offset-1 col-lg-10 ">
	
					<p class="text-center topic-admin-panel"><b>Добавить новую Ручку</b></p>
		
					<form action="<?php echo URL;?>adminMenu/addPen" method="POST">
						<div class="row">
						    <div class="input-group">
						    	<span class="input-group-addon">Имя товара:</span>
						    	<input type="text" class="form-control" placeholder="Ручка ''MaxWriter'' " name="product_name" required>								</div>
						</div>
		
						<p><div class="row">
						    <div class="input-group">
						    	<span class="input-group-addon">Цена:</span>
						    	<input type="text" class="form-control" placeholder="00.00" name="price" required>
							</div>
						</div></p>
		
						<p><div class="row">
						    <div class="input-group">
						    	<span class="input-group-addon">Имя фото:</span>
						    	<input type="text" class="form-control" placeholder="01.jpg" name="name_img" value="noimage.png">
							</div>
						</div></p>
		
						<!-- Придумать форму загрузки фото на сервер -->
		
						<p><div class="row">
						    <div class="input-group">
						    	<span class="input-group-addon">Описание:</span>
						    	<input type="text" class="form-control" placeholder="Изделие является безопасным для здоровья. Не содер..." name="description" >
							</div>
						</div></p>
		
						<p><div class="row">
						    <div class="input-group">
						    	<span class="input-group-addon">Категория:</span>
						    	<input type="text" class="form-control" placeholder="ручки" name="category" required value="ручки">
							</div>
						</div></p>
		
						<p><div class="row">
						    <div class="input-group">
						    	<span class="input-group-addon"> Тип: </span>
								<input type="text" class="form-control" placeholder="шариковая" name="type" required>
							</div>
						</div></p>

						<p><div class="row">
						    <div class="input-group">
						    	<span class="input-group-addon"> Цвет чернил: </span>
								<input type="text" class="form-control" placeholder="синий" name="color_inc" required>
							</div>
						</div></p>	

						<p><div class="row">
						    <div class="input-group">
						    	<span class="input-group-addon"> Цвет корпуса: </span>
								<input type="text" class="form-control" placeholder="черный" name="color_body" required>
							</div>
						</div></p>		
						
						<p><div class="row">
						    <div class="input-group">
						    	<span class="input-group-addon"> Количество в упаковке: </span>
								<input type="text" class="form-control" placeholder="1" name="amount_in_package" required>
							</div>
						</div></p>														
						<a href="<?php echo URL ?>eng" class="btn btn-primary pull-right"> Назад </a>
						<input type="submit" class="btn btn-success pull-right btn_add_notebook" name="btn_add_pen" value="Добавить">
					</form>

				</div>
			</div>

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 floor-admin">
				<div class="col-lg-12">	

					<p class="text-center topic-admin-panel"><b>Полный список тетрадей</b></p>

					<table class="table table-bordered table-notebooks">
         				<tr id="th-basket" class="active">
         					<th class="text-center">Код</th>
       					    <th class="text-center">Имя товара</th>
       					    <th class="text-center">Цена</th>
       					    <th class="text-center">Фото</th> 
       					    <th class="text-center">Описание</th>
       					    <th class="text-center">Категория</th>
       					    <th class="text-center">Тип </th>
       					    <th class="text-center">Цвет чернил</th>
       					    <th class="text-center">Цвет корпуса</th>
       					    <th class="text-center">Количество в упаковке</th>
       					</tr>
       				<?php foreach ($allProducts as $product) { ?>
    					<tr>
    						<td><?php echo $product->code; ?></td>
    						<td><?php echo $product->name; ?></td>
    						<td><?php echo $product->price; ?></td>
    						<td><?php echo $product->name_img; ?></td>
    						<td><?php echo $product->description; ?></td>
    						<td class="text-center" ><?php echo $product->category; ?></td>
    						<td class="text-center" ><?php echo $product->type; ?></td>
    						<td class="text-center" ><?php echo $product->color_inc; ?></td>
    						<td class="text-center" ><?php echo $product->color_body; ?></td>
    						<td class="text-center" ><?php echo $product->amount_in_package; ?></td>
    					</tr>
					<?php } ?>
       					<tr>
       	
       					    <td colspan="9"class="text-center"><b class="pull-right">Всего позиций</b></td> 
       					    <td id="summa-basket" class="text-center"><b><?php echo count($allProducts); ?></b></td>
       					</tr>
       				</table>

				</div>
			</div>

		</div>
	</div>
</div>