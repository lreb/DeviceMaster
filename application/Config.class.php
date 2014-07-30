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
	//configuarcion de claves de acceso a bd produccion hotinger
	/*define('DB_TYPE', 'mysql');
	define('DB_HOST', 'http://sql28.hostinger.es/');
	define('DB_NAME', 'u369815175_dema');
	define('DB_USER', 'u369815175_luis');
	define('DB_PASS', '!Luis200687Raul');*/

	//configuarcion de claves de acceso a bd produccion
	/*define('DB_TYPE', 'mysql');
	define('DB_HOST', 'sql306.eshost.es');
	define('DB_NAME', 'eshos_15060310_devicemaster');
	define('DB_USER', 'eshos_15060310');
	define('DB_PASS', 'misitio');*/

	//configuarcion de claves de acceso a bd local
	define('DB_TYPE', 'mysql');
	define('DB_HOST', 'localhost');
	define('DB_NAME', 'devicemaster');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	

	//$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	//descometar solo para pruebas
	/*
	echo DB_TYPE;
	echo DB_HOST;
	echo DB_NAME;
	echo DB_USER;
	echo DB_PASS;
	*/
?>