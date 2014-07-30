
	<div class="container colWidth">
		<header id="main-header">
			<div class="container">
				<div class="row">
					<div class="col-md-6 headerMatch">
						<!-- LOGO -->
						<div id="logo"><a href="#" onclick="loadHome();"><img src="../../img/site/logo_1.png" /></a></div>
					</div>
					<div class="col-md-6 headerMatch">
						<!-- MASTHEAD -->
						<div id="masthead-container">
							<div id="masthead">
								<!-- SOCIAL MEDIA
								<div class="socialmedia">
									<a href="" target="_blank" ><img src="img/icons/facebook.png" /></a>
									<a href="" target="_blank" ><img src="img/icons/twitter.png" /></a>
									<a href="" target="_blank" ><img src="img/icons/youtube.png" /></a>
									<a href="" target="_blank" ><img src="img/icons/instagram.png" /></a>
								</div>
								-->
								<!-- CALL TO ACTION -->
								<div class="call"><h1><?php echo $_SESSION['Nombre']." ".$_SESSION['Apellido']; ?></h1>
								<p>Usuario</p></div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
		
		<nav id="main-nav">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<!-- NAVIGATION -->
						<div class="navbar navbar-default" role="navigation">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							<div class="navbar-collapse collapse">
								<ul class="nav navbar-nav nav-justified">
									<?php
						              if($_SESSION['RolUsuario'] == 1){ 
						            ?>
										<li><a href="#" id="userP">Usuarios</a></li>
										<li><a href="#" id="productP">Productos</a></li>
									<?php  
						            }
						              else{ 
						            ?>
										<li><a href="#" id="tablet">Tablets</a></li>
										<li><a href="#" id="escritorio">Computadoras De Escritorio</a></li>
										<li><a href="#" id="laptop">Laptop</a></li>
									<?php  
						              }
						            ?>

									<li><a href="#" id="profile">Mi Cuenta</a></li>
						            
						            <?php
							        	if($_SESSION['RolUsuario'] == 3){ 
							        ?>
										<li><a href="#" id="mystatement">Mi Estado De Cuenta</a></li>
									<?php  
						            	}
						          	?>  
									<li><a href="../../models/logoutModel.php">Cerrar Sesión</a></li>

									<!--li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Nav Item 6 <b class="caret"></b></a>
										<ul class="dropdown-menu">
											<li><a href="#">Action</a></li>
											<li><a href="#">Another action</a></li>
											<li><a href="#">Something else here</a></li>
											<li class="divider"></li>
											<li class="dropdown-header">Nav header</li>
											<li><a href="#">Separated link</a></li>
											<li><a href="#">One more separated link</a></li>
										</ul>
									</li-->
								</ul>
							</div>
						</div>

					</div>
				</div>
			</div>
		</nav>	
	</div>