<?php if (!$is_admin) { ?>

	<div class="container floor-container">
		<div class="col-md-12 ">
	   		<div class="row">

					<div class="col-lg-offset-1 col-lg-10 floor-content">
						<div class="row text-center">
							<form action="<?php echo URL; ?>eng/entry" method="POST"> 
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
	
				<h1><b><p class="text-center">Admin panel</p></b></h1>

					<span class="text-center">
					<form action="<?php echo URL; ?>eng/out" method="POST">
					    <input class="btn btn-primary" type="submit" name="btn_ex_adm" value="Exit">	 
					</form>
					</span>
<!-- 					<?php echo md5(''); ?> -->
						
			</div>
		</div>
	</div>

<?php }?>