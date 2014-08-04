<?php
		include_once '../application/Config.class.php';
		include_once '../application/Db.class.php';

		// request
		$referencia=$_POST['Ref'];
		$opcion=$_POST['Opc'];

		if (is_ajax()) {
		  if (isset($_POST["Ref"]) ) { 
		    
		    $db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			$r = $db->query("UPDATE Users SET Deleted = $opcion WHERE Id = $referencia");
		    return_function();
		  }
		}

		/* AJAX FUNCTIONS */

	    //Función para verificar si el request es en AJAX
	    function is_ajax() {
	        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
	    }
		 
		function return_function(){
	        header("HTTP/1.1 301 Moved Permanently"); 
			header("Location: ../views/modules/_userspresentation.php"); 
		}
?>