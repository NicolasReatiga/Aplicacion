<?php 
    if(!isset($_GET['ProductId'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include '../model/conexion.php';
    $ProductId = $_GET['ProductId'];

    $sentencia = $bd->prepare("DELETE FROM products where ProductId = ?;");
    $resultado = $sentencia->execute([$ProductId]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=eliminado');
    } else {
        header('Location: index.php?mensaje=error');
    }
?>