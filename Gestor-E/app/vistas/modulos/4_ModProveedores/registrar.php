<?php
    session_start();
    $userid = $_SESSION['s_userid'];
    include_once '../model/conexion.php';

    if (empty($_POST["oculto"]) || empty($_POST["SupplierName"]) || empty($_POST["SupplierPhone"]) || empty($_POST["SupplierAddress"])) {
        header('Location: index.php?mensaje=falta');
        exit();
    }

    if (empty($_POST["SupplierDescription"])) {
        $SupplierDescription = "";
    } else {
        $SupplierDescription = $_POST["SupplierDescription"];
    }

    if (empty($_POST["SupplierWeb"])) {
        $SupplierWeb = "";
    } else {
        $SupplierWeb = $_POST["SupplierWeb"];
    }

    if (empty($_POST["SupplierEmail"])) {
        $SupplierEmail = "";
    } else {
        $SupplierEmail = $_POST["SupplierEmail"];
    }

    $SupplierName = $_POST["SupplierName"];
    $SupplierPhone = $_POST["SupplierPhone"];
    $SupplierAddress = $_POST["SupplierAddress"];
    $CreateDate = date("Y-m-d");
    $Users_UserId = ($userid[0]['UserId']);

    $sentencia = $bd->prepare("INSERT INTO suppliers(SupplierName,SupplierPhone,SupplierAddress,SupplierDescription,SupplierWeb,SupplierEmail,CreateDate,Users_UserId) VALUES (?,?,?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$SupplierName, $SupplierPhone, $SupplierAddress, $SupplierDescription, $SupplierWeb, $SupplierEmail, $CreateDate, $Users_UserId]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
?>