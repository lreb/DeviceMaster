<?php
	//referneciamos las clases
	include_once '../application/Config.class.php';
	include_once '../application/Db.class.php';

	// request
	$myusername=$_POST['nUsuario']; 
	$mypassword=$_POST['nContrasena']; 
	// protejemos la consulta a la base de datos
	$myusername = stripslashes($myusername);
	$mypassword = stripslashes($mypassword);
	$myusername = mysql_real_escape_string($myusername);
	$mypassword = mysql_real_escape_string($mypassword);

	// crear conexion
	$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	$r = $db->query("SELECT * FROM Users WHERE User ='$myusername' AND Password ='$mypassword'");
	// si el resultado es uno, si existe
	if ($db->num_rows($r) == 1) {
		//echo "existe";
		while ($x = $db->fetch_array_assoc($r)) {
			session_start();
			$_SESSION['IdUsuario']  = $x['Id'];
		    $_SESSION['RolUsuario']  = $x['RoleRf'];
			$_SESSION['Nombre']  = $x['Name'];
			$_SESSION['Apellido']  = $x['LastName'];
		    /*echo $_SESSION['IdUsuario'];
			echo $_SESSION['RolUsuario'];
			echo $_SESSION['Nombre'];
			echo $_SESSION['Apellido'];*/
			header("HTTP/1.1 301 Moved Permanently"); 
			header("Location: ../views/modules/home.php"); 
		  }
	}
	else{
		echo "no existe";	
		header("location: ../views/modules/signin.php?message=1");
	}
?>