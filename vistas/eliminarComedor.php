<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "../conexion/conexion.php";

$query = "DELETE FROM comedor WHERE id = '$id'";
$resultado=mysqli_query($db, $query);


if($resultado === TRUE){
    header('location:comedores.php');
	exit;
}
else echo "Algo salió mal";
?>