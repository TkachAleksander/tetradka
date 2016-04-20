<div class="container floor-container">
    <div class="col-md-12 ">
        <div class="row">

            <div class="col-md-12 ">
            	<div class="row">
            	    <div class="col-lg-offset-1 col-lg-10 floor-content">
            			<div class="row" >
            
                            <!-- TEXT -->
                            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 pull-right ">
                            
                                <p class="text-more MarckScript blue-color text-center"><?php echo $product->category; ?> <?php echo $product->name; ?></p>                   
                                <i>
                                    <table class="table table-more">
                                        <tbody>
                                        <!-- <pre> <?php print_r($attr_values); ?> </pre> -->
                                        <?php for( $i=0; $i<count($names_charact); $i++) : ?>
                                            <tr>
                                                <td class="active"> <?php echo $names_charact[$i]->name; ?> </td>
                                                <td class="active"> <?php echo $values_charact[$i]->value; ?> </td>
                                            </tr>
                                        <?php endfor; ?>

                                        </tbody>
                                    </table>
                                </i>
                                <p><?php echo $product->description; ?></p>
                                <div class="block-btn">
                                    <span class="price-more">Цена: <b><?php echo $product->price; ?></b> </span>
                                    <a href="< ?php echo URL; ?>" class="btn btn-primary btn-more-add-cart" role="button">В корзину</a>
                                </div>
                            </div> 
        
                            <!-- PHOTO -->
                            <div class="img-more col-lg-7 col-md-7 col-sm-6 col-xs-12">
                                    
                                    <?php foreach ($morePhotos as $photo) : ?>
                                    <div class="col-md-6 col-sm-6 col-xs-6 big-img-margin">
                                        <a class="fancyimage" data-fancybox-group="group" href="<?php echo URL; ?>img/products/<?php echo $product->nameDir; ?>/<?php echo $photo->name_photo; ?>">
                                            <img class="img-responsive img-thumbnail"  src="<?php echo URL; ?>img/products/<?php echo $product->nameDir; ?>/<?php echo $photo->name_photo; ?>" alt="Фото" >
                                        </a>
                                    </div>
                                    <?php endforeach; if ($morePhotos == null){  
                                        echo '<a class="fancyimage" data-fancybox-group="group" href="'.URL.'img/products/'.$product->nameDir.'/'.$product->name_img.'">
                                            <img class="img-responsive img-thumbnail one-more-photo"  src="'.URL.'img/products/'.$product->nameDir.'/'.$product->name_img.'" alt="Фото" >
                                        </a>';
                                     } ?>
                                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>