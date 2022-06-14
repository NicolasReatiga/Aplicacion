<?php
    session_start();
    $userid = $_SESSION['s_userid'];
    include_once '../model/conexion.php';

    if (empty($_POST["oculto"]) || empty($_POST["CategoryName"])) {
        header('Location: index.php?mensaje=falta');
        exit();
    }

    if (empty($_POST["CategoryDescription"])) {
        $CategoryDescription = "";
    } else {
        $CategoryDescription = $_POST["CategoryDescription"];
    }

    $CategoryName = $_POST["CategoryName"];
    $CreateDate = date("Y-m-d");
    $Users_UserId = ($userid[0]['UserId']);

    $sentencia = $bd->prepare("INSERT INTO categories(CategoryName,CategoryDescription,CreateDate,Users_UserId) VALUES (?,?,?,?);");
    $resultado = $sentencia->execute([$CategoryName, $CategoryDescription, $CreateDate, $Users_UserId]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
?>