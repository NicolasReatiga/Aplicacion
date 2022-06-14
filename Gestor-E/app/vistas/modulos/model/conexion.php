<?php 
$contrasena = "";
$usuario = "root";
$nombre_bd = "Gestor-e v3";

try {
	$bd = new PDO ('mysql:host=localhost;dbname=Gestor-e v3',$usuario,$contrasena);
} catch (Exception $e) {
	echo "Problema con la conexion: ".$e->getMessage();
	die();
}
?>
