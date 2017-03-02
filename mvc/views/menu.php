<!DOCTYPE >
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- <link rel="stylesheet" type="text/css" href="css/menus.css"> -->		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" href="../libraries/font-awesome/css/font-awesome.css" >
		<script src="../libraries/jquery-1.10.2.min.js"></script>

		<script src="js/general.js"></script>
		

	</head>
	<body>
		<nav>
		<?php
			
		while($men = $menus->fetch_object()){?>
			<ul class="menu">
				<li>
					<a href="<?php echo $men->nombre;?>">
						<i class="icon-home">
						<?php echo $men->nombre;?>
						</i>
					</a>
				<?php $sub = $this->GeneralModel->submenus($men->idmenu);
	
					if($sub->num_rows>0){?>
	
					
							<ul class="sub-menu">
						<?php
								while($submenu = $sub->fetch_object()){?>
	
								<li><a href="<?php echo $submenu->idsubmenu;?>"><?php echo $submenu->nombre;?></a></li>
						<?php } ?>
							</ul>
						
				<?php }?>
				</li>
			</ul>
	<?php } ?>
		
		<a id="touch-menu" class="mobile-menu" href="#"><i class="icon-reorder"></i>Menu</a>	
	</nav>
	</body>
</html>