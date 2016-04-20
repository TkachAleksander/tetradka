<div class="container floor-container">
	<div class="col-md-12 ">
   		<div class="row">
			
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 floor-admin">
				<div class="col-lg-offset-1 col-lg-4 ">
					
					<form action="<?php echo URL;?>adminMenu/addProduct" method="POST">
						<p>
						<select class="selectpicker" title="Категория" name="category[]">
							<?php foreach ($categories as $category) { ?>
								<option value="<?php echo $category->id_category;?>" > <?php echo $category->name; ?> </option>
							<?php } ?>
						</select>
						</p><p>
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
							<input type="text" class="form-control" name="description" required>
						</div>
						</p><p>
							<input type="submit" class="btn btn-sm btn-primary" type="text" name="btn-add-products" value="Добавить">
						</p>
					</form>
	
				</div>
			</div>

		</div>
	</div>
</div>