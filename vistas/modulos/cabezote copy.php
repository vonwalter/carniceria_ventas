 <header class="main-header">
 	
	<!--=====================================
	LOGOTIPO
	======================================-->
	<a href="inicio" class="logo">
		
		<!-- logo mini -->
		<span class="logo-mini">
			<img src="vistas/img/plantilla/icono-blanco.png" class="img-responsive" style="padding:10px">
		</span>

		<!-- logo normal -->
		<span class="logo-lg  p-2">
			<img src="vistas/img/plantilla/logo-blanco-lineal.png" class="img-responsive" style="padding:10px 0px" alt="logo carniceria">
		</span>
	</a>

	<!--=====================================
	BARRA DE NAVEGACIÓN
	======================================-->
	<nav class="navbar navbar-static-top" role="navigation">
		
		<!-- Botón de navegación -->
	 	<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">       	
        	<span class="sr-only">Toggle navigation</span>
      	</a>

		<a href="#" class="" data-toggle="push-menu" role="button">       	
        	<span class="sr-only">Toggle navigation</span>
      	</a>
		<!-- perfil de usuario -->
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<?php if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor")
				{?>	
					<li class="pull-left user user-menu">
						<a href="crear-venta">
							
							<i class="fa fa-balance-scale"></i>
							<span>Crear Remito</span>

						</a>
					</li>
				<?php } ?>
				<li class="dropdown user user-menu">
					
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">

					<?php

					if($_SESSION["foto"] != ""){
						echo '<img src="'.$_SESSION["foto"].'" class="user-image">';
					}else{
						echo '<img src="vistas/img/usuarios/default/anonymous.png" class="user-image">';
					}


					?>
						
						<span class="hidden-xs"><?php  echo $_SESSION["nombre"]; ?></span>

					</a>

					<!-- Dropdown-toggle -->

					<ul class="dropdown-menu">
						
						<li class="user-body">
							
							<div class="pull-right">
								
								<a href="salir" class="btn btn-default btn-flat">Salir</a>

							</div>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
 </header>