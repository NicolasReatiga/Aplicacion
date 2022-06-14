<?php 
    if(!isset($_GET['SupplierId'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include '../model/conexion.php';
    $SupplierId = $_GET['SupplierId'];

    $sentencia = $bd->prepare("DELETE FROM suppliers where SupplierId = ?;");
    $resultado = $sentencia->execute([$SupplierId]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=eliminado');
    } else {
        header('Location: index.php?mensaje=error');
    }
?>