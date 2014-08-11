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


	$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	$r = $db->query("UPDATE users SET Name='$minombre', LastName='$miapellido', Email='$miemail', Phone=$mitelefono, Country='$mipais', 
		State='$miestado', Address='$midireccion', PostalCode=$micp where Id =$idusuario");

	header("HTTP/1.1 301 Moved Permanently"); 
	header("Location: ../views/modules/home.php"); 
?>