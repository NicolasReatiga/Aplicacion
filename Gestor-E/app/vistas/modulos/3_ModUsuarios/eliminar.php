<?php 
    if(!isset($_GET['UserId'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include '../model/conexion.php';
    $UserId = $_GET['UserId'];

    $sentencia = $bd->prepare("DELETE FROM users where UserId = ?;");
    $resultado = $sentencia->execute([$UserId]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=eliminado');
    } else {
        header('Location: index.php?mensaje=error');
    }
?>