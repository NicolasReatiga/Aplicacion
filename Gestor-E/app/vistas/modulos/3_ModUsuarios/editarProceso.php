<?php
    if(!isset($_POST['UserId'])){
        header('Location: index.php?mensaje=error');
    }

    include '../model/conexion.php';
    $UserId = $_POST['UserId'];
    $Identification = $_POST["Identification"];
    $Name1 = $_POST["Name1"];
    $Name2 = $_POST["Name2"];
    $Name3 = $_POST["Name3"];
    $Name4 = $_POST["Name4"];
    $UserName = $_POST["UserName"];
    $Password = md5($_POST["Password"]);
    $UserEmail = $_POST["UserEmail"];
    $RolId = $_POST["RolId"];

    $sentencia = $bd->prepare("UPDATE users SET Identification = ?, Name1 = ?, Name2 = ?, Name3 = ?, Name4 = ?, UserName = ?, Password = ?, UserEmail = ?, Roles_RolId = ? where UserId = ?;");
    $resultado = $sentencia->execute([$Identification, $Name1, $Name2, $Name3, $Name4, $UserName, $Password, $UserEmail, $RolId, $UserId]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
?>