<?php if (!$is_adm) { ?> 

	<div class="container floor-container">
		<div class="col-md-12 ">
	   		<div class="row">

					<div class="col-lg-offset-1 col-lg-10 floor-content">
						<div class="row" >
							<form action="<?php echo URL; ?>admin/entry" method="POST">
							    <input type="password" name="name_adm">		
							    <input type="password" name="password_adm">	
							    <input type="submit" name="btn_adm" value=">">	 
							</form>
						</div>
					</div>

			</div>
		</div>
	</div>

<?php } else { ?>

<div class="container floor-container">
	<div class="col-md-12 ">
   		<div class="row">
			<h1><b><p class="text-center">Никаких админок, только хардкор !</p></b></h1>
		</div>
	</div>
</div>

<?php }?>