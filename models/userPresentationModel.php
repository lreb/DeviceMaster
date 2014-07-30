<?php
		include_once '../application/Config.class.php';
		include_once '../application/Db.class.php';

		// request
		$referencia=$_POST['Ref'];
		$opcion=$_POST['Opc'];
		//echo $opcion;

		if (is_ajax()) {
		  if (isset($_POST["Ref"]) ) { //Checks if action value exists
		    
		    $db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			$r = $db->query("UPDATE Users SET Deleted = $opcion WHERE Id = $referencia");
		    //echo $r;
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
			header("Location: ../views/modules/_userspresentation.php"); 
		}
?>