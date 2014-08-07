<?php
	include_once '../../application/Config.class.php';
	include_once '../../application/Db.class.php';
	
	session_start();
	$IdUser = $_SESSION['IdUsuario'];

	$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	$r = $db->query("select s.Id as 'sId', s.Registry as 'sDate', s.Quantity as 'sQuantity', s.Amount as 'sAmount',
		c.Category as 'cCategory', p.Product as 'pProduct', p.Description as 'pDescription', p.Price as 'pPrice', s.deleted as 'sDeleted'
		from statements as s inner join users as u on s.UserRf = u.Id
		inner join products as p on s.ProductRf = p.Id
		inner join categories as c on p.CategoryRf = c.Id
		where s.UserRf = $IdUser and s.deleted = 0;");	
	
		$total = 0;

?>

<br>
<div class="row">
	<h1>Mi estado de cuenta</h1>
	
	<div class="col-md-12">
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr style="font-weight: bold;">
						<td>Producto</td>
						<td>Descripción</td>
						<td>Categoria</td>
						<td>Fecha de Compra</td>
						<td>Cantidad</td>
						<td>Precio Unitario</td>
						<td>Monto</td>	
						<td>Cancelar</td>
					</tr>
				</thead>
				<tbody>			
					<?php 
						while ($x = $db->fetch_array_assoc($r)) {
					?>	
					<tr>
						<td><?php echo $x['pProduct']; ?></td>
						<td style="width: 40%;"><?php echo $x['pDescription']; ?></td>
						<td><?php echo $x['cCategory']; ?></td>
						<td><?php echo $x['sDate']; ?></td>
						<td><?php echo $x['sQuantity']; ?></td>
						<td><?php echo $x['pPrice']; ?></td>
						<td><?php echo $x['sAmount']; ?></td>
						<td>
							<button class="btn btn-success" type="button" onclick="cancelarCompra(<?php echo $x['sId']; ?>)">
								Cancelar
							</button>
						</td>
					</tr>
					 <?php $total = $total + $x['sAmount']; ?>
					<?php 
						}
					?>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td><h3>Total</h3></td>
						<td><h3>$<?php echo $total; ?></h3></td>
						<td></td>
					</tr>
				</tbody>				
			</table>
		</div>
		
		<!--div class="row">
		    <div class="form-group col-md-4">
		    	
		    </div>
		  	<div class="form-group col-md-4" style="text-align:center;">
		  		<button class="btn btn-lg btn-primary btn-block" onclick="loadNewProduct();">Nuevo</button>
		  	</div>
		  	<div class="form-group col-md-4" style="text-align:center;">
		  		<button class="btn btn-lg btn-primary btn-block" onclick="loadHome();">Regresar</button>
		  	</div>
		</div-->
		<br>
	</div>
</div>

<script type="text/javascript">

function cancelarCompra(idRegistro){
    	var parametros = {
                "idregistro" : idRegistro
        };

        $.ajax({
                data:  parametros,
                url:   '../../models/cancelarCompraModel.php',
                type:  'post',
                beforeSend: function () {
                    showPreloader();
                },
                success:  function (response) {
                    $("#allcontent").html(response);
                },
			    error: function(XMLHttpRequest, textStatus, errorThrown) { 
			        alert("Status: " + textStatus); alert("Error: " + errorThrown); 
			    }  

        });
    }

    </script>