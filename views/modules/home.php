<?php 
	session_start();
	//echo $_SESSION['RolUsuario'];
	//echo $_SESSION['IdUsuario'];
	//$sUserId = $_SESSION['IdUsuario'];
	/*echo $_SESSION['RolUsuario'];
	echo $_SESSION['Nombre'];
	echo $_SESSION['Apellido'];*/
?>
<!DOCTYPE html>
<html lang="es-ES">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title></title>
		<link rel="shortcut icon" type="image/x-icon" href="../../favicon.png" />
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

			<?php include("../../views/shared/header.php"); ?>

				<div class="container">
					<div class="row">
						<div class="col-md-12"  id="allcontent">

						</div>
					</div>
				</div>

			<?php include("../../views/shared/footer.php"); ?>

       <input type="hidden" name="" id="sIdUsuario" value="<?php echo $_SESSION['IdUsuario']; ?>" placeholder="">
		<!-- SCRIPTS -->
		<script src="../../js/jquery-1.7.2.min.js"></script>
		<script src="../../js/bootstrap-3.1.1.min.js"></script>
		<script src="../../plugins/backstretch/backstretch-2.0.4.min.js"></script>
		<script src="../../plugins/camera-slider/camera-slider-1.3.4.min.js"></script>
		<script src="../../plugins/camera-slider/easing-1.3.min.js"></script>
		<script src="../../plugins/fancybox/fancybox-1.3.4.pack.js"></script>
		<script src="../../plugins/fancybox/klass-1.0.min.js"></script>
		<script src="../../plugins/fancybox/photoswipe-3.0.5.min.js"></script>
		<script src="../../plugins/hover-animations/transform2d.min.js"></script>
		<script src="../../plugins/hover-animations/hover-animations-1.0.min.js"></script>
		<script src="../../plugins/match-height/match-height-0.5.1.min.js"></script>
		<script src="../../plugins/validation/validation-2.2.min.js"></script>
		<!--script src="http://maps.google.com/maps/api/js?sensor=false"></script-->
		<script src="../../js/lollies.min.js"></script>
		<script src="../../js/customInside.js"></script>
	</body>
</html>

<style type="text/css">
	
	.loader{
		width: 200px;
		margin: auto;
		margin-top: 100px;
		margin-bottom: 100px;

        text-align: center;
        font-size: 30px;
        font-weight: bold;
        color: #005B95;
	}

</style>

<script type="text/javascript">
    <?php
        if($_SESSION['RolUsuario'] == 1){ 
    ?>

        $( document ).ready(function() {
            showPreloader();
            loadHome();
        });

    <?php } else { ?>

        $( document ).ready(function() {
            showPreloader();
            loadHomeCustomer();
            //loadEscritorio();
        });

    <?php
        }
    ?>
    

	$('#profile').on('click', function (e) {
		e.preventDefault();
		loadProfile();
		//e.stopPropagation();
	});
    $('#userP').on('click', function (e) {
        e.preventDefault();
        loadUserPresentation();
        //e.stopPropagation();
    });
    $('#productP').on('click', function (e) {
        e.preventDefault();
        loadProductPresentation();
        //e.stopPropagation();
    });

    function loadHomeCustomer(){
        showPreloader();
        $( "#allcontent" ).load( "../../views/modules/_homecustomer.php#f" );
    }

    function loadHome()
    {
        showPreloader();
        $( "#allcontent" ).load( "../../views/modules/_home.php" );
    }

    function loadProfile()
    {
        showPreloader();
        $( "#allcontent" ).load( "../../views/modules/_myprofile.php" );
    }

    function loadUserPresentation()
    {
        showPreloader();
        $( "#allcontent" ).load( "../../views/modules/_userspresentation.php" );
    }

    function loadProductPresentation()
    {
        showPreloader();
        $( "#allcontent" ).load( "../../views/modules/_productpresentation.php" );
    }

    function loadNewProduct()
    {
        showPreloader();
        $( "#allcontent" ).load( "../../views/modules/_productnew.php" );
    }

    function loadEditProduct(idProduct)
    {
        var parametros = {
                "productid" : idProduct
        };

        $.ajax({
                data:  parametros,
                url:   '../../views/modules/_productedit.php',
                type:  'post',
                beforeSend: function () {
                    showPreloader();
                },
                success:  function (response) {
                        $("#allcontent").html(response);
                }
        });
    }

    /*customers*/

    $('#escritorio').on('click', function (e) {
        e.preventDefault();
        loadEscritorio();
    });

    $('#laptop').on('click', function (e) {
        e.preventDefault();
        loadLaptop();
    });

    $('#tablet').on('click', function (e) {
        e.preventDefault();
        loadTablet();
    });

    $('#mystatement').on('click', function (e) {
        e.preventDefault();
        loadStatement();
    });

    function loadEscritorio(){
        showPreloader();
        $( "#allcontent" ).load("../../views/modules/_escritorio.php");
    }

    function loadLaptop(){
        showPreloader();
        $( "#allcontent" ).load("../../views/modules/_laptop.php");
    }

    function loadTablet(){
        showPreloader();
        $( "#allcontent" ).load("../../views/modules/_tablet.php");
    }

    function verficar(Id){
		var cantidad = $("#pCantidad"+Id).val();
		if(cantidad > 0 && cantidad != null){
			comprar(Id);
		}
		else{
			$("#errorMessage"+Id).html("¡Indica la cantidad!");
		}
	}

    function comprar(idProduct){
    	var parametros = {
                "productid" : idProduct,
                "cantidad" : $("#pCantidad"+idProduct).val(),
                "idusuario" : $("#sIdUsuario").val()
                //"sectionrf" : $("sectionRf").val()
        };

        $.ajax({
                data:  parametros,
                url:   '../../models/comprarModel.php',
                type:  'post',
                beforeSend: function () {
                    $("#refresh"+idProduct).html("Procesando…");
                },
                success:  function (response) {
                        $("#refresh"+idProduct).html(response);
                },
			    error: function(XMLHttpRequest, textStatus, errorThrown) { 
			        alert("Status: " + textStatus); alert("Error: " + errorThrown); 
			    }  

        });
    }


    function loadStatement(){
    	showPreloader();
        $( "#allcontent" ).load( "../../views/modules/_mystatement.php" );
    }
    /**/

    function showPreloader()
    {
        //$("#allcontent").html("<div class='loader'><img src='../../img/site/preloader.gif'></div>");
        $("#allcontent").html("<div class='loader'>Procesando...</div>");
    }

    function soloNumeros(e)
    {
    var keynum = window.event ? window.event.keyCode : e.which;
    if ((keynum == 8) || (keynum == 46))
    return true;
     
    return /\d/.test(String.fromCharCode(keynum));
    }

    
    
</script>