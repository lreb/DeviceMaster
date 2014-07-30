<?php
	include_once '../application/Config.class.php';
	include_once '../application/Db.class.php';

	// request
	$idusuario=$_POST['iIdUsuario'];

	$minombre=$_POST['iNombre'];
	$miapellido=$_POST['iApellido'];
	$micumpleanos=$_POST['iCumpleanos'];
	$miemail=$_POST['iEmail'];
	$mitelefono=$_POST['iTelefono'];
	$mipais=$_POST['iPais'];
	$miestado=$_POST['iEstado'];
	$midireccion=$_POST['iDireccion'];
	$micp=$_POST['iCodigoPostal'];
	$miusuario=$_POST['iUsuario']; 
	$micontrasena=$_POST['iPassword'];

	// protejemos la consulta a la base de datos
	$minombre = stripslashes($minombre);
	$miapellido = stripslashes($miapellido);
	$miemail = stripslashes($miemail);
	$mipais = stripslashes($mipais);
	$miestado = stripslashes($miestado);
	$midireccion = stripslashes($midireccion);
	$miusuario = stripslashes($miusuario);
	$micontrasena = stripslashes($micontrasena);

	$minombre = mysql_real_escape_string($minombre);
	$miapellido = mysql_real_escape_string($miapellido);
	$miemail = mysql_real_escape_string($miemail);
	$mipais = mysql_real_escape_string($mipais);
	$miestado = mysql_real_escape_string($miestado);
	$midireccion = mysql_real_escape_string($midireccion);
	$micp = mysql_real_escape_string($micp);
	$miusuario = mysql_real_escape_string($miusuario);
	$micontrasena = mysql_real_escape_string($micontrasena);

	/* Creamos un query*/
	//$sql="UPDATE Users SET Name ='$minombre', LastName='$miapellido', BirthDay=$micumpleanos, Email='$miemail', Phone=$mitelefono, 
	//Country='$mipais', State='$miestado',Address='$midireccion', PostalCode=$micp, WHERE Id =$idusuario";
	$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	$r = $db->query("UPDATE Users SET Name='$minombre', LastName='$miapellido', Email='$miemail', Phone=$mitelefono, Country='$mipais', 
		State='$miestado', Address='$midireccion', PostalCode=$micp where Id =$idusuario");

	header("HTTP/1.1 301 Moved Permanently"); 
	header("Location: ../views/modules/home.php"); 
?>