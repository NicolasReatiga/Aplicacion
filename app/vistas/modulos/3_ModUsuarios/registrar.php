<?php
    if (
        empty($_POST["oculto"]) || empty($_POST["Identification"]) || empty($_POST["Name1"]) || empty($_POST["Name3"]) || empty($_POST["UserName"])
        || empty($_POST["Password"]) || empty($_POST["UserEmail"]) || empty($_POST["RolId"])
    ) {
        header('Location: index.php?mensaje=falta');
        exit();
    }

    if (empty($_POST["Name2"])) {
        $Name2 = "";
    } else {
        $Name2 = $_POST["Name2"];
    }

    if (empty($_POST["Name4"])) {
        $Name4 = "";
    } else {
        $Name4 = $_POST["Name4"];
    }

    include_once '../model/conexion.php';
    $Identification = $_POST["Identification"];
    $Name1 = $_POST["Name1"];
    $Name3 = $_POST["Name3"];
    $UserName = $_POST["UserName"];
    $Password = md5($_POST["Password"]);
    $UserEmail = $_POST["UserEmail"];
    $RolId = $_POST["RolId"];

    $sentencia = $bd->prepare("INSERT INTO users(Identification,Name1,Name2,Name3,Name4,UserName,Password,UserEmail,Roles_RolId) VALUES (?,?,?,?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$Identification, $Name1, $Name2, $Name3, $Name4, $UserName, $Password, $UserEmail, $RolId]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
?>