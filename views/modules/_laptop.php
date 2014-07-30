<?php 
	include_once '../../application/Config.class.php';
	include_once '../../application/Db.class.php';

	session_start();
	$IdUser = $_SESSION['IdUsuario'];

	$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	$r = $db->query("SELECT * FROM products WHERE CategoryRf = 2;");	


/*while ($x = $db->fetch_array_assoc($r)) {
		echo $x['Id'];
		echo $x['CategoryRf'];
		echo $x['Product'];
		echo $x['Description'];
		echo $x['Image'];
		echo $x['Price'];
		echo $x['Quantity'];

}*/
?>
<br>
		<input type="hidden" name="" id="sectionRf" value="2" placeholder="">
<div class="row">
	<div class="col-md-12">
		<h1>Laptops</h1>
			
			<?php
				while ($x = $db->fetch_array_assoc($r)) {
			?>
		
				<div class="row">
					<div class="form-group col-md-3">
							<img src="../../img/Laptops/<?php echo $x['Image']; ?>" alt=""/ style="">
					</div>	
					<div class="form-group col-md-5">
						<div class="row">
							<div class="form-group col-md-12">
								<h4> <?php echo $x['Product']; ?> </h4>
							</div>	
						</div>
						<div class="row">
							<div class="form-group col-md-12">
								<?php echo $x['Description']; ?>
							</div>	
						</div>
					</div>
					<div class="form-group col-md-2">
						<h3> $<?php echo $x['Price']; ?> </h3>
						<br>
						<?php // echo $x['Quantity'];  ?>
					</div>
					<div class="form-group col-md-2">
						<?php  
							if($x['Quantity'] == 0){
						?>
							<?php echo "no disponible";?>
						<?php	
						}
						else
						{
						?>
							<div class="form-group" id="refresh<?php echo $x['Id']; ?>">
								<label>Cantidad</label>

								<input type="number" id="pCantidad<?php echo $x['Id']; ?>" name="" value="" onkeypress="return soloNumeros(event);" placeholder="">
								<br>
								<bR>
								<button class="btn btn-lg btn-primary btn-block" onclick="verficar(<?php echo $x['Id']; ?>);" >comprar</button>
								<div id="errorMessage<?php echo $x['Id']; ?>" style="text-align: center;
									font-size: 16px;
									font-weight: bold;
									color: red;
									margin-top: 20px;
									margin-bottom: 20px;">
									
								</div>
							</div>
						<?php
							}
						?> 
					</div>
				</div>

				<hr class="featurette-divider">

			<?php
				}
			?>

	</div>
</div>

<script type="text/javascript">
	
</script>