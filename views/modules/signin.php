<!DOCTYPE html>
<html lang="es-ES">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Device Master</title>
		<link rel="shortcut icon" type="image/x-icon" href="../../favicon.ico" />
		<link href="../../fonts/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet">
		<link href="../../css/bootstrap-3.1.1.min.css" rel="stylesheet">
		<link href="../../css/lollies.min.css" rel="stylesheet">
		<link href="../../css/custom.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="js/html5shiv-3.7.0.js"></script>
			<script src="js/respond-1.4.2.js"></script>
		<![endif]-->	
	</head>
	<body>
						
		<header id="main-header">
			<div class="container">
				<div class="row">
					<div class="col-md-3 spacer"></div>
					<div class="col-md-6">
						<!-- LOGO -->
						<div id="logo"><a href="/">
						<!--img src="http://placehold.it/720x200/149cd7/149cd7" /-->
							<img src="../../img/site/logo_1.png" alt="">
						</a></div>
					</div>
					<div class="col-md-3 spacer"></div>
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
								<ul class="nav navbar-nav nav-justified ">
									<li><a href="../../index.php">Inicio</a></li>
									<li><!--a href="#"></a--></li>
									<li><!--a href="#"></a--></li>
									<li><!--a href="#"></a--></li>
									<li><!--a href="#"></a--></li>
									<li><a href="../../views/modules/signup.php">Regístrate</a></li>
									<li class="active"><a href="#">Autentifícate</a></li>
								</ul>
							</div>
						</div>

					</div>
				</div>
			</div>
		</nav>		
		
		<!--div class="content-block">
			<div class="container">
				<div class="row">
					<div class="col-md-12" id="nosotros">
						<h1>Adelante</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-md-14">
						<h2></h2>
						<p>Te invitamos a que proporciones tus datos personales para poder 
						ofrecerte un mejor servicio y que disfrutes lo antes posible de 
						todos los beneficios de estar haciendo negocios con nosotros. Estas 
						a punto de tomar una excelente decisión.</p>
					</div>					
				</div>
			</div>

		</div-->		
	
		<div class="content-block">
			<div class="container">
				<div class="row">
					<div class="col-md-12" id="nosotros">
						<h1>Bienvenido</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-md-14">
						<h2></h2>
						<p>Te invitamos a que te autentifiques y comiences tus compras.</p>
					</div>					
				</div>
			</div>

			
			<div class="container">

		      <form class="form-signin" role="form" method="post" action="../../models/signinModel.php">
		        <h2 class="form-signin-heading">Introduce tus claves de acceso</h2>

		        <div class="row">
		        	<div class="col-md-2">        		
		        	</div>
		        	<div class="col-md-4">
		        		<input type="text" class="form-control" id="iUsuario" name="nUsuario" placeholder="Tu usuario" required>
		        	</div>	
		        	<div class="col-md-4">
		        		<input type="password" class="form-control" id="iContrasena" name="nContrasena" placeholder="Tu Contraseña" required>
		        	</div>	
		        	<div class="col-md-2">        		
		        	</div>	
		        </div>
				<br>
		        <div class="row">
		        	<div class="col-md-4">
		        	</div>
		        	<div class="col-md-4">
		        		<button class="btn btn-lg btn-primary btn-block" type="submit">Autentificarme</button>
		        	</div>
		        	<div class="col-md-4">
		        	</div>
		        </div>

		        
		        
		        <!--label class="checkbox"-->
		          <!--input type="checkbox" value="remember-me"-> 
		        </label-->
		        
		      </form>
		      
		      <?php 
		        // valida si existe una variable que indique que existe un error para mostrar un mensaje
		        // valida no este vacia
		        if (empty($_REQUEST['message'])) {
		        }
		        else
		        {
		          // si es igual a 1 existe un error
		          if($_REQUEST['message']==1)
		          {
		            echo "<div style='text-align: center; color: red; font-weight: bold; font-size: 16px;''> El usuario y la contraseña son invalidos </div>";
		          } 
		          elseif ($_REQUEST['message']==2)
		          {
		            echo "<div style='text-align: center; color: green; font-weight: bold; font-size: 16px;''>Tu registro fue exitoso, ¡Autentifícate!</div>";
		          } 
		          else{

		          }
		        }
		        
		      ?>

	    	</div> <!-- /container -->

		</div>	

		<div class="copyright-block">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12 left">
						&copy; 2014 Device Master - Tecnologia en tus manos.
					</div>
					<div class="col-md-6 col-sm-6 right hidephone">
						Privacidad | Aviso legal | Marcas Registradas | Sobre nuestra publicidad
					</div>
				</div>
			</div>
		</div>
						
		<!-- SCRIPTS -->
		<script src="../../js/jquery-1.7.2.min.js"></script>
		<script src="../../js/bootstrap-3.1.1.min.js"></script>
		<script src="../../plugins/backstretch/backstretch-2.0.4.min.js"></script>
		<!--script src="../../plugins/camera-slider/camera-slider-1.3.4.min.js"></script>
		<script src="../../plugins/camera-slider/easing-1.3.min.js"></script-->
		<script src="../../plugins/fancybox/fancybox-1.3.4.pack.js"></script>
		<script src="../../plugins/fancybox/klass-1.0.min.js"></script>
		<script src="../../plugins/fancybox/photoswipe-3.0.5.min.js"></script>
		<script src="../../plugins/hover-animations/transform2d.min.js"></script>
		<script src="../../plugins/hover-animations/hover-animations-1.0.min.js"></script>
		<script src="../../plugins/match-height/match-height-0.5.1.min.js"></script>
		<script src="../../plugins/validation/validation-2.2.min.js"></script>
		<!--script src="../../http://maps.google.com/maps/api/js?sensor=false"></script-->
		<script src="../../js/lollies.min.js"></script>
		<!--script src="../../js/custom.js"></script-->
	</body>
</html>
					

				