<?php 
	//include_once 'Db.class.php';

	/**
	 * Configuration
	 *
	 * esta seccion es para la configuracion global de nuestro sitio
	 */

	//muestra pequeños errores en desarrollo, pero solo los grandes errores en produccion
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	//se define una url (opciona)
	define('URL', 'http://127.0.0.1/php-mvc/');

	//configuarcion de claves de acceso a la base de datos de produccion  http://www.devicemaster.webege.com
	/*
	$mysql_host = "mysql14.000webhost.com";
	$mysql_database = "a5916455_dmdb";
	$mysql_user = "a5916455_dmuser";
	$mysql_password = "Luis200687Raul";
	*/
	/*define('DB_TYPE', 'mysql');
	define('DB_HOST', 'mysql14.000webhost.com');
	define('DB_NAME', 'a5916455_dmdb');
	define('DB_USER', 'a5916455_dmuser');
	define('DB_PASS', 'Luis200687Raul');*/

	//configuarcion de claves de acceso a la base de datos local
	define('DB_TYPE', 'mysql');
	define('DB_HOST', 'localhost');
	define('DB_NAME', 'devicemaster');
	define('DB_USER', 'root');
	define('DB_PASS', '');

	//descometar solo para pruebas
	/*
	echo DB_TYPE;
	echo DB_HOST;
	echo DB_NAME;
	echo DB_USER;
	echo DB_PASS;
	*/
?>