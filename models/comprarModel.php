<?php
	include_once '../application/Config.class.php';
	include_once '../application/Db.class.php';

	// request
	$miproductid=$_POST['productid'];
	$micantidad=$_POST['cantidad'];
	$miidusuario=$_POST['idusuario'];			
	$miseccion = $_POST['sectionrf'];	

	//VALIDAMOS SI ES UNA LLAMADA CON AJAX
	if (is_ajax()) {
		  if (isset($_POST["productid"]) ) { //Checks if action value exists
		    
				$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);

					//recuperar ultimo id del statement
					$sqlproduct="SELECT * FROM products WHERE Id = $miproductid;";
					
					$product = $db->query($sqlproduct);

					$price = 0;
					while ($x = $db->fetch_array_assoc($product)) {
						$price = $x['Price'];
					}

					$amount = $micantidad * $price;

					$sqllaststatement="SELECT Id FROM statements ORDER BY Id DESC LIMIT 1;";
					$laststatement = $db->query($sqllaststatement);

					$idstatement = 0;
					while ($x = $db->fetch_array_assoc($product)) {
						$idstatement = $x['Id'];
					}

					$datenow = date("Y-m-d H:i:s");


					$registroCreado="INSERT INTO statements VALUES($idstatement,$miidusuario,$miproductid,'$datenow',"
						."$micantidad,$amount,0);";
					$record = $db->query($registroCreado);

					if($row=$db->last_id()> $idstatement ){
						//RELOAD
						return_function();
					}
					else{

					}			
		  }
		}

		/* AJAX FUNCTIONS */
	//Function to check if the request is an AJAX request
	function is_ajax() {
	        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
	    }

	function return_function(){
	        header("HTTP/1.1 301 Moved Permanently"); 
			header("Location: ../views/modules/_productbuy.php"); 
		}
?>