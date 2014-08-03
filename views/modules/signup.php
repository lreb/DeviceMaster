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
									<li class="active"><a href="#">Regístrate</a></li>
									<li><a href="../../views/modules/signin.php">Autentifícate</a></li>
								</ul>
							</div>
						</div>

					</div>
				</div>
			</div>
		</nav>		
		
		<div class="content-block">
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
			
			<div class="container">
				<form role="form" method="post" action="../../models/signupModel.php">
					<div class="row">
			      	  <div class="col-md-6 form-group">
					    <label for="InputNombre">Nombre</label>
					    <input type="text" class="form-control" id="iNombre" name="iNombre" placeholder="Introduce tu nombre" required autofocus>
					  </div>
					  <div class="col-md-6 form-group">
					    <label for="InputApellido">Apellido</label>
					    <input type="text" class="form-control" id="iApellido" name="iApellido" placeholder="Introduce tu apellido" required>
					  </div>
					</div>

					<div class="row">
						<div class="col-md-4 form-group">
					    <label for="InputCumpleanos">Cumpleaños</label>
					    <input type="date" class="form-control" id="iCumpleanos" name="iCumpleanos" placeholder="dd/mm/aaaa" required>
					  </div>
					  <div class="col-md-4 form-group">
					    <label for="InputEmail">Email</label>
					    <input type="email" class="form-control" id="iEmail" name="iEmail" placeholder="Introduce tu email" required>
					  </div>
					  <div class="col-md-4 form-group">
					    <label for="InputTelefono">Telefono</label>
					    <input type="number" class="form-control" id="iTelefono" name="iTelefono" placeholder="Introduce tu telefono" onkeypress="return soloNumeros(event);" required>
					  </div>
					</div>

					<div class="row">
						<div class="col-md-4 form-group">
					    <label for="InputPais">Pais</label>
					    <input type="text" class="form-control" id="iPais" name="iPais" placeholder="Introduce el nombre de tu pais" required>
					  </div>
					  <div class="col-md-4 form-group">
					    <label for="InputEstado">Estado</label>
					    <input type="text" class="form-control" id="iEstado"  name="iEstado" placeholder="Introduce el nombre de tu estado" required>
					  </div>
					  <div class="col-md-4 form-group">
					    <label for="InputDireccion">Dirección</label>
					    <input type="text" class="form-control" id="iDireccion" name="iDireccion" placeholder="Introduce tu dirección" required>
					  </div>
					</div>

					<div class="row">
						<div class="col-md-4 form-group">
					    <label for="InputCodigoPostal">Codigo Postal</label>
					    <input type="number" class="form-control" id="iCodigoPostal" name="iCodigoPostal" placeholder="Introduce tu codigo postal" onkeypress="return soloNumeros(event);" required>
					  </div>
					  <div class="col-md-4 form-group">
					    <label for="InputUsuario">Usuario</label>
					    <input type="text" class="form-control" id="iUsuario" name="iUsuario" placeholder="Introduce tu nombre de usuario" required>
					  </div>
					  <div class="col-md-4 form-group">
					    <label for="InputUsuario">Password</label>
					    <input type="password" class="form-control" id="iPassword" name="iPassword" placeholder="Introduce el password" required>
					  </div>
					</div>

					  <button class="btn btn-lg btn-primary btn-block" type="submit">Registrarse</button>
					</form>
			</div>
		</div>		
	
		
	
		
		<div class="content-block" id="conocenos">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Política de privacidad</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-md-14">
						<h2></h2>
						<p>Recopilamos información para brindar mejores servicios a todos nuestros usuarios: 
						desde averiguar cosas básicas como el idioma que usted habla, hasta cosas más complejas 
						como los anuncios que a usted le parecen más útiles o la gente que más le importa en línea.</p>
					</div>
				</div>
			</div>
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
					
<script type="text/javascript" charset="utf-8" async defer>

	//sin espacios
	$(function(){
	    $('#iEmail').bind( 'keyup', function(){
	        $( this).val( function(_, v){
	            return v.replace( /\s+/g, '');
	        });
	    });
	    $('#iUsuario').bind( 'keyup', function(){
	        $( this).val( function(_, v){
	            return v.replace( /\s+/g, '');
	        });
	    });
	    $('#iPassword').bind( 'keyup', function(){
	        $( this).val( function(_, v){
	            return v.replace( /\s+/g, '');
	        });
	    });
	});

	function soloNumeros(e)
	{
	var keynum = window.event ? window.event.keyCode : e.which;
	if ((keynum == 8) || (keynum == 46))
	return true;
	 
	return /\d/.test(String.fromCharCode(keynum));
	}

</script>
				