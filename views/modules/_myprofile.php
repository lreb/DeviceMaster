<?php
	include_once '../../application/Config.class.php';
	include_once '../../application/Db.class.php';
	
	session_start();
	$IdUser = $_SESSION['IdUsuario'];
	$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	$r = $db->query("SELECT * FROM Users WHERE Id = $IdUser");
	
	while ($x = $db->fetch_array_assoc($r)) {
?>

<br>
<div class="row">
	<h1>Mi Cuenta</h1>

<?//php echo $x['BirthDay']; ?>
		<form role="form" method="post" action="../../models/profileModel.php">

			<div class="col-md-12">
				<div class="row">
					<div class="form-group col-md-6">
						<label for="InputNombre">Nombre</label>
		    			<input type="text" class="form-control" id="iNombre" name="iNombre" value="<?php echo $x['Name']; ?>" 
		    			placeholder="Introduce tu nombre" required>
					</div>
					<div class="form-group col-md-6">
						<label for="InputApellido">Apellido</label>
		    			<input type="text" class="form-control" id="iApellido" name="iApellido" value="<?php echo $x['LastName']; ?>" 
		    			placeholder="Introduce tu apellido" required>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-4">
						<label for="InputEmail">Email</label>
		    			<input type="email" class="form-control" id="iEmail" name="iEmail" value="<?php echo $x['Email']; ?>" 
		    			placeholder="Introduce tu email" required>		  
					</div>
					<div class="form-group col-md-4">
						<label for="InputTelefono">Telefono</label>
		   	 			<input type="number" class="form-control" id="iTelefono" name="iTelefono" value="<?php echo $x['Phone']; ?>" 
		   	 			placeholder="Introduce tu telefono" onkeypress="return soloNumeros(event);" required>
					</div>
					<div class="form-group col-md-4">
						<label for="InputPais">Pais</label>
		    			<input type="text" class="form-control" id="iPais" name="iPais" value="<?php echo $x['Country']; ?>" 
		    			placeholder="Introduce el nombre de tu pais" required>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-4">
		  				<label for="InputEstado">Estado</label>
		    			<input type="text" class="form-control" id="iEstado"  name="iEstado" value="<?php echo $x['State']; ?>" 
		    			placeholder="Introduce el nombre de tu estado" required>
					</div>
					<div class="form-group col-md-4">
						<label for="InputDireccion">Dirección</label>
		    			<input type="text" class="form-control" id="iDireccion" name="iDireccion" value="<?php echo $x['Address']; ?>" 
		    			placeholder="Introduce tu dirección" required>
					</div>
					<div class="form-group col-md-4">
						<label for="InputCodigoPostal">Codigo Postal</label>
		    			<input type="number" class="form-control" id="iCodigoPostal" name="iCodigoPostal" value="<?php echo $x['PostalCode']; ?>" 
		    			placeholder="Introduce tu codigo postal" onkeypress="return soloNumeros(event);" required>
					</div>
				</div>

				<!--div class="row">
					<div class="form-group col-md-6">
						
					</div>
					<div class="form-group col-md-6">
						
					</div>
				</div-->
			</div>
		<br>
		<br>
		<br>
		<div class="row">
			<div class="form-group col-md-4">
				<input type="hidden" class="form-control" id="iIdUsuario" name="iIdUsuario" value="<?php echo $_SESSION['IdUsuario']; ?>">	
			</div>
			<div class="form-group col-md-4">
				

				<?php
			        if($_SESSION['RolUsuario'] == 1){ 
			    ?>

			        <button class="btn btn-lg btn-primary btn-block" onclick="loadHome();" type="button">Atras</button>

			    <?php } else { ?>

			        <button class="btn btn-lg btn-primary btn-block" onclick="loadHomeCustomer();" type="button">Atras</button>

			    <?php
			        }
			    ?>

			</div>
			<div class="form-group col-md-4">
				<button class="btn btn-lg btn-primary btn-block" type="submit">Guardar</button>
			</div>
		</div>

		</form>
</div>
<br>
<?php
	}
?>