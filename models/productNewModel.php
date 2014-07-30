<?php
	include_once '../application/Config.class.php';
	include_once '../application/Db.class.php';

	// request
	$miultimoid=$_POST['iLastId'];
	$miultimoid = $miultimoid + 1;
	//echo $miultimoid;
	$miproducto=$_POST['iProducto'];
	$midescripcion=$_POST['iDescripcion'];
	$micategoria=$_POST['iCategoria'];
	//$miimagen=$_POST['iImagen'];
	$miprecio=$_POST['iPrecio'];
	$micantidad=$_POST['iCantidad'];

	// START UPLOAD FILE
	// obtiene el nombre del archivo
	$file_name = $_FILES["photo"]["name"];

	//formatos permitidos
	$allowedExts = array("gif", "jpeg", "jpg", "png");
	$temp = explode(".", $file_name);
	//obtiene la extencion del archivo
	$extension = end($temp);

	
	// establece la ruta en el servidor para almacenar las imagenes (validar las 3 secciones "Escriotrio, TAblets, Laptop"
	if($micategoria == 1){
		$target_path = "../img/Escritorio/" . $file_name;
	}
	else if($micategoria == 2){
		$target_path = "../img/Laptops/" . $file_name;
	}
	else{
		$target_path = "../img/Tablets/" . $file_name;
	}

	
	// ruta del archivo en la computadora
	$source_path = $_FILES["photo"]["tmp_name"];
	// valida si los formatos son permitidos
	if ((($_FILES["photo"]["type"] == "image/gif")
		|| ($_FILES["photo"]["type"] == "image/jpeg")
		|| ($_FILES["photo"]["type"] == "image/jpg")
		|| ($_FILES["photo"]["type"] == "image/pjpeg")
		|| ($_FILES["photo"]["type"] == "image/x-png")
		|| ($_FILES["photo"]["type"] == "image/png"))
		&& ($_FILES["photo"]["size"] < 500000)
		&& in_array($extension, $allowedExts)) {
			  if ($_FILES["photo"]["error"] > 0) {
			    echo "Return Code: " . $_FILES["photo"]["error"] . "<br>";
			  } else {
			  	// probar valores del archivo
			    /*echo "Upload: " . $_FILES["photo"]["name"] . "<br>";
			    echo "Type: " . $_FILES["photo"]["type"] . "<br>";
			    echo "Size: " . ($_FILES["photo"]["size"] / 1024) . " kB<br>";
			    echo "Temp photo: " . $_FILES["photo"]["tmp_name"] . "<br>";*/
			    if (file_exists($target_path)) {
			      echo $file_name . " already exists. ";
			    } else {
			    	// mueve el archivo al servidor (desde, hasta)
			      	move_uploaded_file($source_path, $target_path);
			      	
			      	//echo "Stored in: " . $target_path;
			      	
			    }
			  }
			} else {
			  echo "Invalid file";
			}
	// FINISH UPLOAD FILE


	//VALIDAMOS SI ES UNA LLAMADA CON AJAX
	if (is_ajax()) {
		  if (isset($_POST["iProducto"]) ) { //Checks if action value exists
		    
			$sql="INSERT INTO Products VALUES ($miultimoid, $micategoria,'$miproducto','$midescripcion','$file_name',$miprecio,$micantidad);";
			echo $sql;

			$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		    //Ejecutamos el query
			$r = $db->query($sql);

			if($registroCreado=$db->last_id()> $_POST['iLastId'] ){
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
			header("Location: ../views/modules/_productpresentation.php"); 
		}	
?>