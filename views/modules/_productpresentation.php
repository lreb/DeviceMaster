<?php
	include_once '../../application/Config.class.php';
	include_once '../../application/Db.class.php';
	
	//session_start();
	//$IdUser = $_SESSION['IdUsuario'];
	$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	$r = $db->query("SELECT p.Id AS 'id', p.Product AS 'product', p.Description AS 'description', p.Price AS 'price', p.Quantity AS 'quantity', c.Category AS 'category' FROM products AS p INNER JOIN categories AS c ON p.CategoryRf = c.Id ORDER BY p.Id;");	
	
		/*echo $x['role'];
		echo $x['name'];
		echo $x['lastname'];
		echo $x['email'];
		echo $x['phone'];
		echo $x['country'];
		echo $x['deleted'];*/
?>
<br>
<div class="row">
	<h1>Lista de productos</h1>
	
	<div class="col-md-12">
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr style="font-weight: bold;">
						<td>Id</td>
						<td>Nombre</td>
						<td>Descripción</td>
						<td>Precio</td>
						<td>Cantidad</td>
						<td>Categoria</td>
						<td>Opción</td>	
					</tr>
				</thead>
				<tbody>			
					<?php 
						while ($x = $db->fetch_array_assoc($r)) {
					?>	
					<tr>
						<td><?php echo $x['id']; ?></td>
						<td><?php echo $x['product']; ?></td>
						<td><?php echo $x['description']; ?></td>
						<td><?php echo $x['price']; ?></td>
						<td><?php echo $x['quantity']; ?></td>
						<td><?php echo $x['category']; ?></td>
						<td>
							<button class="btn btn-success" type="button" onclick="loadEditProduct(<?php echo $x['id']; ?>)">Editar</button>
						</td>
					</tr>
					<?php 
						}
					?>
				</tbody>				
			</table>
		</div>
		
		<div class="row">
		    <div class="form-group col-md-4">
		    	
		    </div>
		  	<div class="form-group col-md-4" style="text-align:center;">
		  		<button class="btn btn-lg btn-primary btn-block" onclick="loadNewProduct();">Nuevo</button>
		  	</div>
		  	<div class="form-group col-md-4" style="text-align:center;">
		  		<button class="btn btn-lg btn-primary btn-block" onclick="loadHome();">Regresar</button>
		  	</div>
		</div>
		<br>

	</div>
</div>

