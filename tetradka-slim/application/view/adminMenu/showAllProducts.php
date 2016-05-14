<div class="container floor-container">
	<div class="col-md-12 ">
   		<div class="row"> 
			
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 floor-admin">
				<div class="col-lg-offset-1 col-lg-10 ">
	
					<p class="text-center topic-admin-panel"><b>Вывод товаров по категориям</b></p>
					
					<form action="<?php echo URL;?>adminMenu/showAllProducts" method="POST">
						<p>
							<select class="selectpicker" id="getCategory"  name="category[]">
								<option value="0"> Все товары </option>
								<?php foreach ($categories as $category) { ?>
									<option value="<?php echo $category->id_category;?>"> <?php echo $category->name; ?> </option>
								<?php } ?>
							</select>
							<input type="submit" class="btn btn-sm btn-primary" name="btn-show-all-products" value=">">
						</p>
						<ul>
							<?php foreach ($categories as $category) { ?> <li><?php echo $category->name; ?></li> <?php } ?> 
						</ul>
					</form>
						
				</div>
			</div>

<?php if (isset($products)) { ?>

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 floor-admin">
				<div class="col-lg-12">	

					<p class="text-center topic-admin-panel"><b> Найденые товары </b></p>

					<table class="table table-bordered table-notebooks">
         				<tr id="th-basket" class="active">
         					<th class="text-center"> Код </th>
       					    <th class="text-center"> Имя товара </th>
       					    <th class="text-center"> Цена </th>
       					    <th class="text-center"> Фото </th> 
       					    <th class="text-center"> Описание </th>
       					    <th class="text-center"> Категория </th>
       					    <th class="text-center"> Show </th>
       					</tr>

       				<?php foreach ($products as $product) { ?>
    					<tr>
    						<td class="text-center"> <?php echo $product->id_prod; ?></td>
    						<td class="text-center"> <?php echo $product->category; ?> <?php echo $product->name; ?></td>
    						<td class="text-center"> <?php echo $product->price; ?></td>
    						<td class="text-center"> <img class="img-product-in-admin img-resposive" src="<?php echo URL; ?>img/products/<?php echo $product->caption; ?>/<?php echo $product->name_img;?>"></td>
    						<td class="text-center"> <?php echo $product->description; ?></td>
    						<td class="text-center"> <?php echo $product->name; ?></td>
    						<td class="text-center">
    							<?php if($product->show){ ?>
    								<input type="submit" class="btn btn-sm btn-primary" name="btn_show" value="1" onclick="showProduct(<?php echo $product->id_prod;?>,'0')">
    							<?php } else { ?>
    								<input type="submit" class="btn btn-sm btn-default" name="btn_show" value="0" onclick="showProduct(<?php echo $product->id_prod;?>,'1')">
    							<?php } ?>
    						</td>
    					</tr>
					<?php } ?>
       					<tr>
       	
       					    <td colspan="6"class="text-center"><b class="pull-right">Всего позиций</b></td> 
       					    <td id="summa-basket" class="text-center"><b><?php echo count($products); ?></b></td>
       					</tr>
       				</table>

				</div>
			</div>
<?php } ?>
		</div>
	</div>
</div>