<div class="container floor-container">
	<div class="col-md-12 ">
   		<div class="row">
			
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 floor-admin">
				<form action="<?php echo URL;?>adminMenu/addProduct" method="POST">
				<div class="row">
					<div class="col-lg-12">
						
						<p >
						<select class="selectpicker" id="getCategory" title="Категория" name="category[]">
							<?php foreach ($categories as $category) { ?>
								<option value="<?php echo $category->id_category;?>"> <?php echo $category->name; ?> </option>
							<?php } ?>
						</select>
						</p>
	
					</div>
				</div>

				<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
					<p>
					<div class="input-group">
						<span class="input-group-addon">Имя товара:</span>
						<input type="text" class="form-control" name="product_name" required>
					</div>
					</p><p>
					<div class="input-group">
						<span class="input-group-addon">Цена:</span>
						<input type="text" class="form-control" name="price" required>
					</div>
					</p><p>
					<div class="input-group">
						<span class="input-group-addon">Имя картинки:</span>
						<input type="text" class="form-control" name="name_img" required>
					</div>
					</p><p>
					<div class="input-group">
						<span class="input-group-addon">Описание:</span>
						<input type="text" class="form-control" name="description">
					</div>
					</p>
					<input type="checkbox" name="checkbox_photo" value="yes" checked> фото в подробнее
					<input class="count-product text-center" name="amount"> шт.
<!-- 					<label class="label-mas-photo">
      					<img class="img-responsiv" src="<?php echo URL;?>img/mas-photo.png">
      					<input type="file" name="filename" class="mas-photo" accept="image/*" multiple>
      				</label>
      				<input type="submit" value="Загрузить"> -->
				</div>

				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">	
					<p class="addCharact"></p>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
					<p class="addCaption"></p>
				</div>

				</div>
				<p>
					<input type="submit" class="btn btn-sm btn-primary" type="text" name="btn-add-products" value="Добавить">
				</p>

				</form>
<!--       			<form action="upload.php" method="post" >
      				<label class="label-mas-photo">
      					<img class="img-responsiv" src="<?php echo URL;?>img/mas-photo.png">
      					<input type="file" name="filename" class="mas-photo" accept="image/*" multiple>
      				</label>
      				<input type="submit" value="Загрузить">
      			</form> -->
			</div>
		</div>

		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 floor-admin">
				<div class="col-lg-12">

					<table class="table table-bordered">
						<tbody>
							<tr>
								<th class="text-center"> ID </th>
								<th class="text-center"> name </th>
								<th class="text-center"> price </th>
								<th class="text-center"> name_img </th>
								<th class="text-center"> description </th>
								<th class="text-center"> id_category </th>
							</tr>

							<?php foreach($products as $product) { ?>
							<tr>
								<td> <?php echo $product->id_prod; ?></td>
								<td> <?php echo $product->name; ?></td>
								<td class="text-center"> <?php echo $product->price; ?></td>
								<td class="text-center"> <?php echo $product->name_img; ?></td>
								<td class="text-center"> <?php echo $product->description; ?></td>
								<td class="text-center"> <?php echo $product->category; ?></td>
							</tr>
							<?php } ?>
							
						</tbody>
					</table>

				</div>
			</div>

			<div class=" col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-lg-5 col-md-5 col-sm-5 col-xs-5 floor-admin">
				<div class="col-lg-12">

					<table class="table table-bordered">
						<tbody>
							<tr>
								<th class="text-center"> ID </th>
								<th class="text-center"> id_prod </th>
								<th class="text-center"> id_charact </th>
								<th class="text-center"> value </th>
								<th class="text-center"> caption </th>
							</tr>
				
							<?php foreach($products_characteristics as $charact) { ?>
							<tr>
								<td> <?php echo $charact->id_all; ?></td>
								<td> <?php echo $charact->id_prod; ?></td>
								<td class="text-center"> <?php echo $charact->id_charact; ?></td>
								<td class="text-center"> <?php echo $charact->value; ?></td>
								<td class="text-center"> <?php echo $charact->caption; ?></td>
							</tr>
							<?php } ?>
							
						</tbody>
					</table>

				</div>
			</div>
		</div>

	</div>
</div>