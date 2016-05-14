<div class="container floor-container">
	<div class="col-md-12 ">
   		<div class="row">
			
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 floor-content">
				<div class="col-lg-offset-1 col-lg-10">

					<p class="text-center topic-admin-panel"><b> Выполненые заказы </b></p>
					<table class="table table-bordered table-orders">
         				<tr id="th-basket" class="active">
         					<th class="text-center">ID</th>
       					    <th class="text-center">Имя</th>
       					    <th class="text-center">Фамилия</th>
       					    <th class="text-center">Номер</th> 
       					    <th class="text-center">Сумма</th>
       					    <th class="text-center">Статус</th>
       					    <th class="text-center">Действия</th>
       					</tr>
       				<?php foreach ($allOrders as $order) { ?>
    					<tr>
    						<td class="text-center"><?php echo $order->id; ?></td>
    						<td class="text-center"><?php echo $order->f_name; ?></td>
    						<td class="text-center"><?php echo $order->l_name; ?></td>
    						<td class="text-center"><?php echo $order->phone; ?></td>
    						<td class="text-center"><?php echo $order->sum; ?></td>
    						<td class="text-center"><?php echo $order->status; ?></td>
    						<td class="text-center">
    							<img class="img-responsive img-more-admin" src="/img/admin/glyphicons-30-notes-2.png" onclick="moreAboutOrder('<?php echo $order->id; ?>')" data-toggle="modal" data-target="#more-about-order" title="Подробнее">
                  <img class="img-responsive img-cancle-admin" src="/img/admin/delete.png" onclick="sendInOrderTable('<?php echo $order->id; ?>','orders','orders_delete')" title="Удалить">
    						</td>
    					</tr>
					<?php } ?>
       					<tr>
       					    <td colspan="5"class="text-center"><b class="pull-right">Всего позиций</b></td> 
       					    <td id="summa-basket" class="text-center"><b><?php echo count($allOrders); ?></b></td>
       					    <td></td>
       					</tr>
       				</table>

					<a href="<?php echo URL ?>eng" class="btn btn-primary pull-right"> Назад </a>
				</form>

				</div>
			</div>

		</div>
	</div>
</div>


<div class="modal fade" id="more-about-order" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
  	  	<div class="modal-content">

  	  	  	<div class="modal-header">
  	  	  		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  	  	  	  	<h4 class="modal-title" id="myModalLabel">Описание заказа</h4>
  	  	  	</div>

  	  	  	<div class="modal-body">
  	  	  		<table class="table table-bordered table-order">
  	  	  			<tbody>
  	  	  				<tr class="active">
							<th>№</th>
							<th>Имя</th>
							<th>Фото</th>
							<th>Код</th>
							<th>Количество</th>
							<th>Цена</th>
  	  	  				</tr>
  	  	  			</tbody>
  	  	  		</table>
  	  	  	</div>

  	  	  	<div class="modal-footer">
  	  	  	  	<button type="button" class="btn btn-primary" data-dismiss="modal">Закрыть</button>
  	  	  	</div>

  	  	</div>
  	</div>
</div>