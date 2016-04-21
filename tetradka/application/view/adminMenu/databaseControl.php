<div class="container floor-container">
	<div class="col-md-12 ">
   		<div class="row">
			
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 floor-admin">

				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">

					<p class="text-center topic-admin-panel"><b>Добавить категорию</b></p>

					<div class="row">
						<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">

							<p>
							<form action="<?php echo URL; ?>adminMenu/addNewCategory" method="POST">
								<div class="row btn-admin-add-anythin">
									<div class="col-lg-5">
										<input type="text" class="form-control" placeholder="name" name="name_new_category" required>
									</div>
									<div class="col-lg-5">
										<input type="text" class="form-control" placeholder="caption" name="caption_new_category" required>
									</div>
									<div class="col-lg-2">
										<input type="submit" class="btn btn-sm btn-primary" name="btn-add-db-control" value="Добавить">
									</div>
								</div>
							</form>
							</p><p>
							<form action="<?php echo URL; ?>adminMenu/getAutoIncrement" method="POST">
								<div class="row">
									<div class="col-lg-4">
										<input type="text" class="form-control" placeholder="ID A_I" name="auto_increment" required>
									</div>
									<div class="col-lg-6">
										<input type="text" class="form-control" placeholder="category" name="name_tbl" value="category" required>
									</div>
									<div class="col-lg-2">
										<input type="submit" class="btn btn-sm btn-primary" name="btn-getAI-db-control" value="Сменить">
									</div>
								</div>
							</form>
							</p><p>
							<form action="<?php echo URL; ?>adminMenu/deleteCategory" method="POST">
								<div class="row">
									<div class="col-lg-10">
										<input type="text" class="form-control" placeholder="ID категории" name="id_category" required>
									</div>
									<div class="col-lg-2">
										<input type="submit" class="btn btn-sm btn-danger" name="btn-dlt-db-control" value="Удалить">
									</div>
								</div>
							</form>
							</p>
						
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
					<p class="text-center topic-admin-panel"><b>Добавить характеристики</b></p>

					<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
						<p>
						<form action="<?php echo URL; ?>adminMenu/addNewCharact" method="POST">
							<div class="row btn-admin-add-anythin">
								<div class="col-lg-10">
									<input type="text" class="form-control" placeholder="name" name="name_new_charact" required>
								</div>
								<div class="col-lg-2">
									<input type="submit" class="btn btn-sm btn-primary" name="btn-add-db-control" value="Добавить">
								</div>
							</div>
						</form>
						</p><p>
						<form action="<?php echo URL; ?>adminMenu/getAutoIncrement" method="POST">
							<div class="row">
								<div class="col-lg-4">
									<input type="text" class="form-control" placeholder="ID A_I" name="auto_increment" required>
								</div>
								<div class="col-lg-6">
									<input type="text" class="form-control" placeholder="characteristics" name="name_tbl" value="characteristics" required>
								</div>
								<div class="col-lg-2">
									<input type="submit" class="btn btn-sm btn-primary" name="btn-getAI-db-control" value="Сменить">
								</div>
							</div>
						</form>
						</p><p>
						<form action="<?php echo URL; ?>adminMenu/deleteCharact" method="POST">
							<div class="row">
								<div class="col-lg-10">
									<input type="text" class="form-control" placeholder="ID характеристики" name="id_charact" required>
								</div>								
								<div class="col-lg-2">
									<input type="submit" class="btn btn-sm btn-danger" name="btn-dlt-db-control" value="Удалить">
								</div>
							</div>
						</form>
						</p>

					</div>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
					<p class="text-center topic-admin-panel"><b>Связать категорию с характеристиками</b></p>

					<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
						<p>
						<form action="<?php echo URL; ?>adminMenu/addNewListCharact" method="POST">
							<div class="row btn-admin-add-anythin">
								<div class="col-lg-5">
									<input type="text" class="form-control" placeholder="id_category" name="id_new_category" required>
								</div>
								<div class="col-lg-5">
									<input type="text" class="form-control" placeholder="id_charact" name="id_new_charact" required>
								</div>
								<div class="col-lg-2">
									<input type="submit" class="btn btn-sm btn-primary" name="btn-add-db-control" value="Добавить">
								</div>
							</div>
						</form>
						</p><p>
						<form action="<?php echo URL; ?>adminMenu/getAutoIncrement" method="POST">
							<div class="row">
								<div class="col-lg-4">
									<input type="text" class="form-control" placeholder="ID A_I" name="auto_increment" required>
								</div>
								<div class="col-lg-6">
									<input type="text" class="form-control" placeholder="list_characteristics" name="name_tbl" value="list_characteristics" required>
								</div>
								<div class="col-lg-2">
									<input type="submit" class="btn btn-sm btn-primary" name="btn-getAI-db-control" value="Сменить">
								</div>
							</div>
						</form>
						</p><p>
						<form action="<?php echo URL; ?>adminMenu/deleteListCharact" method="POST">
							<div class="row">
								<div class="col-lg-10">
									<input type="text" class="form-control" placeholder="ID характеристики" name="id_list_charact" required>
								</div>								
								<div class="col-lg-2">
									<input type="submit" class="btn btn-sm btn-danger" name="btn-dlt-db-control" value="Удалить">
								</div>
							</div>
						</form>
						</p>

					</div>
				</div>

			</div>

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 floor-admin">

				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
					<table class="table table-bordered table-categories">
         				<tr id="th-basket" class="active">
         					<th class="text-center">ID</th>
       					    <th class="text-center">name</th>
       					    <th class="text-center">caption</th>
       					</tr>

       					<?php foreach ($allCategories as $category) { ?>
    					<tr>
    						<td class="text-center"> <?php echo $category->id_category; ?></td>
    						<td class="text-center"> <?php echo $category->name; ?></td>
    						<td class="text-center"> <?php echo $category->caption; ?></td>
    					</tr>
						<?php } ?>

       				</table>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
					<table class="table table-bordered table-categories">
         				<tr id="th-basket" class="active">
         					<th class="text-center">ID</th>
       					    <th class="text-center">name</th>
       					</tr>

       					<?php foreach ($allCharacteristics as $charact) { ?>
    					<tr>
    						<td class="text-center"> <?php echo $charact->id_charact; ?></td>
    						<td class="text-center"> <?php echo $charact->name; ?></td>
    					</tr>
						<?php } ?>

       				</table>					
				</div>

				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
					<table class="table table-bordered table-categories">
         				<tr id="th-basket" class="active">
         					<th class="text-center">ID</th>
       					    <th class="text-center">id_category</th>
       					    <th class="text-center">id_charact</th>
       					</tr>

       					<?php foreach ($allListCharacteristics as $list_charact) { ?>
    					<tr>
    						<td class="text-center"> <?php echo $list_charact->id_list_charact; ?></td>
    						<td class="text-center"> <?php echo $list_charact->id_category; ?></td>
    						<td class="text-center"> <?php echo $list_charact->id_charact; ?></td>
    					</tr>
						<?php } ?>

       				</table>
				</div>

			</div>

		</div>
	</div>
</div>