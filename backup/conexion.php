<?php 
	//variables de configuracion
	/*error_reporting(E_ALL);
	ini_set("display_errors", 1);

	//definir variables de conexion
	define('DB_TYPE', 'mysql');
	define('DB_SERVER', 'localhost');
	define('DB_NAME', 'devicemaster');
	define('DB_USER', 'root');
	define('DB_PASS', '');

	//datos para la conexion
	$con = mysql_connect(DB_SERVER,DB_USER,DB_PASS);
	mysql_select_db(DB_NAME,$con);	*/
?>


<?php
	$host="localhost"; 			// Host name 
	$db_name="devicemaster"; 	// base de datos
	$username="root"; 			// usuario
	$password=""; 				// password 
		
	//$tbl_name="Users"; 		// Table name 

	$username = "your_name";
	$password = "your_password";
	$hostname = "localhost"; 

	//establece el objeto de conexion
	$dbhandle = mysql_connect($hostname, $username, $password) 
	 or die("Imposible conectar con MySQL");
	echo "Conexion con MySQL<br>";

	//selecciona la base de datos con la que vamos a trabajar
	$selected = mysql_select_db($db_name ,$dbhandle) 
	  or die("No se pudo establecer conexion con la base de datos");

	//ejecuta la consulta
	$result = mysql_query("SELECT id, model,year FROM cars");

	// recorre un arreglo
	while ($row = mysql_fetch_array($result)) {
	   echo "ID:".$row{'id'}." Name:".$row{'model'}."Year: ". //display the results
	   $row{'year'}."<br>";
	}
	//cierra la conexión 
	mysql_close($dbhandle);
?>