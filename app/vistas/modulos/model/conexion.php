<?php 
$contrasena = "";
$usuario = "root";
$nombre_bd = "Gestor-e";

try {
	$bd = new PDO ('mysql:host=localhost;dbname=Gestor-e',$usuario,$contrasena);
} catch (Exception $e) {
	echo "Problema con la conexion: ".$e->getMessage();
	die();
}
?>
