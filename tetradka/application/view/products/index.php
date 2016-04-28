<div class="container floor-container">
    <div class="col-md-12 ">
        <div class="row">

            <div class="col-lg-offset-1 col-lg-10 floor-about">

<!--             <ol class="breadcrumb">
                <li><a href="<?php echo URL;?>">Главная</a></li>
                <li><?php echo $breadcrumb;?></li>

            </ol> -->
                <div class="row " id="content-tiles">

<!-- <pre> <?php print_r($breadcrumb)?> </pre> -->

                <?php foreach ($products as $product) : ?> 
                    
                    <div class='col-sm-6 col-md-4 tile basket'>
                        <div class='thumbnail'>
                            <a class='name-tile' href='<?php echo URL .'products/moreInfo/'. htmlspch($product->id_prod); ?>'>
                                <p class="text-center"> <?php echo $product->category; ?> <?php echo $product->name; ?>  </p>
                                <img class='img-responsive img-tile' src='<?php echo URL; ?>img/products/<?php echo $product->nameDir; ?>/<?php echo $product->name_img; ?>'alt = '<?php echo $product->category." ".$product->name; ?>' title='<?php echo $product->category." ".$product->name; ?>'>
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
                                <a href='<?php echo URL .'products/moreInfo/'. htmlspch($product->id_prod); ?>' class='btn btn-default btn-more' role='button' data-category='<?php echo $product->category; ?>'>
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

                <?php if ($products == null) { echo '<h2 class="text-center MarckScript"> Товар находится в дороге </h2>'; } ?>
                 
                </div>              
            </div>
            
        </div>
    </div>
</div>