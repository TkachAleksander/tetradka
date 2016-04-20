<div class="container floor-container">
	<div class="col-md-12 ">
   		<div class="row">

      		<div class="col-lg-offset-1 col-lg-10 floor-about hidden-xs">
				<div class="row" >
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 pull-right">
	
						<p class="logo-text-index PatuaOne">Tetradka</p>
						<p class="text-index MarckScript ">Интернет-магазин канцтоваров ориентированный на мелкий опт.</p>
	
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<img class="img-responsive img-about" src="<?php echo URL; ?>/img/about/stock.jpg">
					</div>
				</div>
			</div>

			<div class="col-lg-offset-1 col-lg-10 floor-content">
				<div class="row " id="content-tiles">
				
				    <?php foreach ($products as $product) : ?>
					
				    <div class='col-sm-6 col-md-4 tile basket'>
				        <div class='thumbnail'>
				            <a class='name-tile' href='<?php echo URL . 'products/moreInfo/' . htmlspecialchars($product->id_prod, ENT_QUOTES, 'UTF-8'); ?>'>
				                <p class="text-center"> <?php echo $product->category; ?> <?php echo $product->name; ?>  </p>
				                <img class='img-responsive img-tile' src='<?php echo URL; ?>img/products/<?php echo $product->nameDir; ?>/<?php echo $product->name_img; ?>'>
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