<?php 
	include_once '../../application/Config.class.php';
	include_once '../../application/Db.class.php';
	
	//session_start();
	//$IdUser = $_SESSION['IdUsuario'];
	$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	$r = $db->query("SELECT Id FROM products ORDER BY Id DESC LIMIT 1;");

	$LastProductId = 0;
	while ($x = $db->fetch_array_assoc($r)) {
		$LastProductId = $x['Id'];
	}
	//echo $LastProductId;
	
	//$LastProductId = 0;
	/*while ($x = $db->fetch_array_assoc($category)) {
		echo $x['Id'];
		echo $x['Category'];
	}*/

?>
<br>
<div class="row">
	<h1>Producto Nuevo</h1>
<!--method="post"  action="../../models/productNewModel.php"-->
	<form role="form" id="newProductForm" enctype="multipart/form-data">
		
		<div class="row">
			<div class="form-group col-md-6">
				<label for="InputProduct">Producto</label>
		    	<input type="text" class="form-control" id="iProducto" name="iProducto" value="" 
		    	placeholder="Introduce el nombre del producto" required autofocus>
			</div>
			<div class="form-group col-md-6">
				<label for="InputDescripcion">Descripción</label>
		    	<input type="text" class="form-control" id="iDescripcion" name="iDescripcion" value="" 
		    	placeholder="Introduce la descripción" required>
			</div>
		</div>
		
		<div class="row">
			<div class="form-group col-md-6">
				<label for="InputImagen">Categoria</label>
				<select class="form-control"  name="iCategoria" id="iCategoria" required>
				  <?php
				  		$category = $db->query("SELECT * FROM Categories");
					  	while ($x = $db->fetch_array_assoc($category)) {
				  ?>
							<option value="<?php echo $x['Id']; ?>"> <?php echo $x['Category']; ?> </option> 
				  <?php
						}
				  ?>
				</select>		
			</div>
			<div class="form-group col-md-6">
				<label for="InputImagen">Imagen</label>
		    	<input type="file" class="form-control" id="iImagen" name="photo" value="" 
		    	placeholder="Introduce la ruta de la imagen" >
			</div>
		</div>

		<div class="row">
			<div class="form-group col-md-6">
				<label for="InputPrecio">Precio</label>
		    	<input type="number" class="form-control" id="iPrecio" name="iPrecio" value="" 
		    	placeholder="Introduce el precio" onkeypress="return soloNumeros(event);" required>
			</div>
			<div class="form-group col-md-6">
				<label for="InputCantidad">Cantidad</label>
			    <input type="number" class="form-control" id="iCantidad" name="iCantidad" value="" 
			    placeholder="Introduce la cantidad" onkeypress="return soloNumeros(event);" required>	
			</div>
		</div>
		<br>

		<div class="row">
			<div class="form-group col-md-4">
				<input type="hidden" class="form-control" id="iLastId" name="iLastId" value="<?php echo $LastProductId; ?>">
			</div>
			<div class="form-group col-md-4">
				<button class="btn btn-lg btn-primary btn-block" onclick="loadProductPresentation();" type="button">Cancelar</button>
			</div>
			<div class="form-group col-md-4">
				<button class="btn btn-lg btn-primary btn-block" type="submit">Guardar</button>
			</div>
		</div>
	<br>
	</form>

	<br>	

</div>

<script type="text/javascript">

	$('#newProductForm').on('submit', function (e) {
		var parametros = {
                "iLastId" : $("#iLastId").val(),
                "iProducto" : $("#iProducto").val(),
                "iDescripcion" : $("#iDescripcion").val(),
                "iCategoria" : $( "#iCategoria option:selected" ).val(),
                "iImagen" : $("#iImagen").val(),
                "iPrecio" : $("#iPrecio").val(),
                "iCantidad" : $("#iCantidad").val() 
        };

        $.ajax({
                data:  parametros,
                url:   '../../models/productNewModel.php',
                type:  'post',
                 //imagen
                data:  new FormData(this),
                contentType: false,
				cache: false,
				processData:false,
                beforeSend: function () {
                	showPreloader();
                },
                success:  function (response) {
                        $("#allcontent").html(response);
                }
        });
        e.preventDefault();
    });

</script>