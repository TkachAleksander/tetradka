<?php  if ( isset($_COOKIE['newOrder']) ) { ?>

  <div class="align_center_to_left">
    <div class="alert alert-success alert-dismissible fade in align_center_to_right text-center" role="alert" >
      <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="deleteNewOrder()">
        <span aria-hidden="true">&times;</span>
      </button>
      <strong> Ваш заказ принят! </strong> В ближайшее время мы свяжемся с вами для подтверждения заказа.
    </div>
  </div>

<?php } ?>

<div class="container floor-container">
	<div class="col-md-12">
   		<div class="row">

      		<div class="col-lg-offset-1 col-lg-10 floor-about hidden-xs">
				<div class="row" >
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 pull-right">
	
						<p class="logo-text-index PatuaOne">Tetradka</p>
						<h1 class="text-size-20 MarckScript part">Интернет-магазин канцтоваров ориентированный на мелкий опт.</h1>

					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<img class="img-responsive img-about" src="<?php echo URL; ?>/img/about/stock.jpg" alt="Интернет-магазин канцтоваров ориентированный на мелкий опт" title="Интернет-магазин канцтоваров ориентированный на мелкий опт">
					</div>
				</div>
			</div>

			<div class="col-lg-offset-1 col-lg-10 floor-content">
			    <ol class="breadcrumb">
			    	<?php 
			    		foreach ($crumbs as $key => $crumb) { 
			    			if ($key % 2 == 0) {
			    	?>
						<li><a href="<?php echo $crumb[$key+1];?>"> <?php echo $crumb;?> </a></li>
					<?php }} ?>
	            </ol>

				<div class="row " id="content-tiles">
				
				    <?php foreach ($products as $product) : ?>
					
				    <div class='col-sm-6 col-md-4 tile basket'>
				        <div class='thumbnail'>
				            <a class='name-tile' href='<?php echo URL . 'products/moreInfo/' . htmlspecialchars($product->id_prod, ENT_QUOTES, 'UTF-8'); ?>'>
				                <p class="text-center"> <?php echo $product->category; ?> <?php echo $product->name; ?>  </p>
				                <img class='img-responsive img-tile' src='<?php echo URL; ?>img/products/<?php echo $product->nameDir; ?>/<?php echo $product->name_img; ?>' alt = '<?php echo $product->category." ".$product->name; ?>' title='<?php echo $product->category." ".$product->name; ?>'>
				            </a>
				            <div class='caption'>
				                <p class='text-center price-tile' id='pr'>
				                   <?php echo $product->price;?>
				                   <span class='Georgia'>грн</span>
				                </p> 
				                <p class='text-center btn-tile'>
				                    <a class='btn btn-primary btn-addInBasket' role='button'
				                        data-name='<?php echo $product->name; ?>' 
				                        data-code='<?php echo $product->id_prod; ?>' 
				                        data-price='<?php echo $product->price; ?>' 
				                        data-photo='<?php echo $product->name_img; ?>'
				                        data-category='<?php echo $product->category; ?>'
				                        data-dir='<?php echo $product->nameDir; ?>'>
				                        В корзину
				                    </a>
				                <a href='<?php echo URL . 'products/moreInfo/' . htmlspecialchars($product->id_prod, ENT_QUOTES, 'UTF-8'); ?>' class='btn btn-default btn-more' role='button' data-category='<?php echo $product->category; ?>'>
				                    Подробнее
				                </a>
				            </p>
				            <p class='code-tile'>
				                <?php echo $product->id_prod; ?>
				            </p>
				            </div>
				        </div>
				    </div>
				    
				    <?php endforeach; ?>
				 
				</div>
			</div>

		</div>
	</div>
</div>