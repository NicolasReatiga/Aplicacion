<?php 
    if(!isset($_GET['CategoryId'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include '../model/conexion.php';
    $CategoryId = $_GET['CategoryId'];

    $sentencia = $bd->prepare("DELETE FROM categories where CategoryId = ?;");
    $resultado = $sentencia->execute([$CategoryId]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=eliminado');
    } else {
        header('Location: index.php?mensaje=error');
    }
?>