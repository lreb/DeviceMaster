<?php 
	include_once '../../application/Config.class.php';
	include_once '../../application/Db.class.php';
	
	$productid=$_POST['productid'];

	$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	$r = $db->query("SELECT * FROM products WHERE Id = $productid ORDER BY Id;");

	while ($x = $db->fetch_array_assoc($r)) {

		$categoryrf =  $x['CategoryRf'];
		$price = $x['Price'];
		$quantity = $x['Quantity']; 														
?>
<br>
<div class="row">
	<h1>Editar Producto</h1>
<!--method="post"  action="../../models/productNewModel.php"-->
	<form role="form" id="editProductForm" enctype="multipart/form-data">
		
		<div class="row">
			<div class="form-group col-md-6">
				<label for="InputProduct">Producto</label>
		    	<input type="text" class="form-control" id="iProducto" name="iProducto" value="<?php echo $x['Product']; ?>" 
		    	placeholder="Introduce el nombre del producto" required autofocus>
			</div>
			<div class="form-group col-md-6">
				<label for="InputDescripcion">Descripción</label>
		    	<input type="text" class="form-control" id="iDescripcion" name="iDescripcion" value="<?php echo $x['Description']; ?>" 
		    	placeholder="Introduce la descripción" required>
			</div>
		</div>
		
		<div class="row">
			<div class="form-group col-md-6">
				<label for="InputImagen">Categoria</label>
				<select class="form-control"  name="iCategoria" id="iCategoria" required>
				  <?php
				  		$category = $db->query("SELECT * FROM Categories");
					  	while ($z = $db->fetch_array_assoc($category)) {
				  ?>
							<option value="<?php echo $z['Id']; ?>" 
								<?php
									if ($categoryrf == $z['Id']){
										echo "Selected";
									}
								?> 
							> <?php echo $z['Category']; ?> </option> 
				  <?php
						}
				  ?>
				</select>		
			</div>
			<div class="form-group col-md-6">
				<label for="InputImagen">Imagen</label>
		    	<input type="file" class="form-control" id="iImagen" name="photo" value="<?php echo $x['Image']; ?>" 
		    	placeholder="Introduce la ruta de la imagen" >
			</div>
		</div>

		<div class="row">
			<div class="form-group col-md-6">
				<label for="InputPrecio">Precio</label>
		    	<input type="number" class="form-control" id="iPrecio" name="iPrecio" value="<?php echo $price; ?>" 
		    	placeholder="Introduce el precio" onkeypress="return soloNumeros(event);" required>
			</div>
			<div class="form-group col-md-6">
				<label for="InputCantidad">Cantidad <?php echo $x['Quantity']; ?></label>

			    <input type="number" class="form-control" id="iCantidad" name="iCantidad" value="<?php echo $quantity; ?>" 
			    placeholder="Introduce la cantidad" onkeypress="return soloNumeros(event);" required>	
			</div>
		</div>
		<br>

		<div class="row">
			<div class="form-group col-md-4">
				<input type="hidden" class="form-control" id="iProductId" name="iProductId" value="<?php echo $productid; ?>">
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

<?php
}
?>

<script type="text/javascript">

	$('#editProductForm').on('submit', function (e) {
		var parametros = {
                "iProductId" : $("#iProductId").val(),
                "iProducto" : $("#iProducto").val(),
                "iDescripcion" : $("#iDescripcion").val(),
                "iCategoria" : $( "#iCategoria option:selected" ).val(),
                "iImagen" : $("#iImagen").val(),
                "iPrecio" : $("#iPrecio").val(),
                "iCantidad" : $("#iCantidad").val() 
        };

        $.ajax({
                data:  parametros,
                url:   '../../models/productEditModel.php',
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