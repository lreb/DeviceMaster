<?php
	include_once '../../application/Config.class.php';
	include_once '../../application/Db.class.php';
	
	session_start();
	$IdUser = $_SESSION['IdUsuario'];
	$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	$r = $db->query("SELECT u.Id AS 'iduser',r.Role AS 'role', u.Name AS 'name', u.LastName AS 'lastname', u.Email AS 'email', 
		u.Phone AS 'phone', u.Country AS 'country', u.Deleted AS 'deleted' FROM users AS u INNER JOIN Roles AS r on u.RoleRf = r.Id");	
	
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
	<h1>Lista de usuarios</h1>
	<div class="col-md-12">
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr style="font-weight: bold;">
						<td>Rol</td>
						<td>Nombre</td>
						<td>Apellido</td>
						<td>Email</td>
						<td>Telefono</td>
						<td>Pais</td>
						<td>Opcion</td>	
					</tr>
				</thead>
				<tbody>
					<?php 
					while ($x = $db->fetch_array_assoc($r)) {
						?>	
						<tr>
							<td><?php echo $x['role']; ?></td>
							<td><?php echo $x['name']; ?></td>
							<td><?php echo $x['lastname']; ?></td>
							<td><?php echo $x['email']; ?></td>
							<td><?php echo $x['phone']; ?></td>
							<td><?php echo $x['country']; ?></td>
							<td>
								<?php 
									if($x['deleted'] == 0){
								?>
									<!--form role="form" action="../../models/userPresentationModel.php?opc=1" method="post" -->
										<button class="btn btn-warning" type="button" onclick="SendAction(<?php echo $x['iduser']; ?>,1);">
										Inhabilitar</button>
									<!--/form-->
								<?php 
								}else{
								?>
									<!--form role="form" action="userPresentationModel.php?opc=0" method="post" -->
										<button class="btn btn-success" type="button" onclick="SendAction(<?php echo $x['iduser']; ?>,0);">
										Habilitar</button>
									<!--/form-->
								<?php
								}
								?>
							</td>
						</tr>
						<?php 
							}
						?>
				</tbody>
			</table>

		</div>

		<div class="row">
		  	<div class="form-group col-md-4"></div>
		 	<div class="form-group col-md-4">
		 		
		 	</div>
		  	<div class="form-group col-md-4" style="text-align:center;">
		  		<button class="btn btn-lg btn-primary btn-block" onclick="loadHome();">Regresar</button>
		  	</div>
		</div>

	</div>
</div>

<script>

	function SendAction(Id,oPc)
	{
		var parametros = {
                "Ref" : Id,
                "Opc" : oPc
        };
        $.ajax({
                data:  parametros,
                url:   '../../models/userPresentationModel.php',
                type:  'post',
                beforeSend: function () {
                	showPreloader();
                },
                success:  function (response) {
                        $("#allcontent").html(response);
                }
        });
	}

</script>