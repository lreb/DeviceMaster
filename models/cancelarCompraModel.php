<?php
	include_once '../application/Config.class.php';
	include_once '../application/Db.class.php';

	// request
	$miregistro=$_POST['idregistro'];
	
	//VALIDAMOS SI ES UNA LLAMADA CON AJAX
	if (is_ajax()) {
		if (isset($_POST["idregistro"]) ) { //Checks if action value exists
			
			$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);

			$sql="UPDATE statements set Deleted = 1 where id = $miregistro;";

			$cancel = $db->query($sql);

			return_function();
		}
	}


	/* AJAX FUNCTIONS */
	//Function to check if the request is an AJAX request
	function is_ajax() {
	        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
	    }

	function return_function(){
	        header("HTTP/1.1 301 Moved Permanently"); 
			header("Location: ../views/modules/_mystatement.php"); 
		}
?>