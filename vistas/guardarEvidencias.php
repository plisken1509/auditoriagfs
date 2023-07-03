<?php
include('../conexion/conexion.php');
	$id=$_POST['id'];
	$aid=$_POST['aid'];
	$cumple=$_POST['cumple'];
	$observacion=$_POST['observacion'];
	$numero=1;
	$control=0;
	//Como el elemento es un arreglos utilizamos foreach para extraer todos los valores
	foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name)
	{

		//Validamos que el archivo exista
		if($_FILES["archivo"]["name"][$key]) {
			$filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
			$source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
			
			$directorio = '../evidencias/'; //Declaramos un  variable con la ruta donde guardaremos los archivos
			
			//Validamos si la ruta de destino existe, en caso de no existir la creamos
			if(!file_exists($directorio)){
				mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");	
			}
			
			$dir=opendir($directorio); //Abrimos el directorio de destino
			$target_path = $directorio.'aud'.$aid.'_evidencia'.$numero.'_pregunta'.$id.'.png'; //Indicamos la ruta de destino, así como el nombre del archivo
			
			//Movemos y validamos que el archivo se haya cargado correctamente
			//El primer campo es el origen y el segundo el destino
			if(move_uploaded_file($source, $target_path)) {	
				echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
				$r=$db ->query("Insert into preguntasvisita values(0,'$aid','$id','$cumple','$observacion','$target_path','1')");
				$numero++;
				$control=1;
				} else {	
				echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
			}
			closedir($dir); //Cerramos el directorio de destino
			header('location:auditoria.php?id='.$aid.'#pregunta'.$id);
		}

	}
	if ($control==0) {
		
		$r=$db ->query("Insert into preguntasvisita values(0,'$aid','$id','$cumple','$observacion','','1')");
		header('location:auditoria.php?id='.$aid.'#pregunta'.$id);
	}
	
?>