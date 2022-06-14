<?php
    session_start();
    $userid = $_SESSION['s_userid'];
    include_once '../model/conexion.php';

    if (
        empty($_POST["oculto"]) || empty($_POST["ProductName"]) || empty($_POST["ProductPrice"]) || empty($_POST["ProductAmount"]) || empty($_POST["Categories_CategoryId"]) || (empty($_POST["Suppliers_SupplierId"]))) {
        header('Location: index.php?mensaje=falta');
        exit();
    }

    if (empty($_POST["ProductDescription"])) {
        $ProductDescription = "";
    } else {
        $ProductDescription = $_POST["ProductDescription"];
    }

    $ProductName = $_POST["ProductName"];
    $ProductPrice = $_POST["ProductPrice"];
    $ProductAmount = $_POST["ProductAmount"];
    $Categories_CategoryId =  $_POST["Categories_CategoryId"];
    $Suppliers_SupplierId = $_POST["Suppliers_SupplierId"];
    $CreateDate = date("Y-m-d");
    $Users_UserId = ($userid[0]['UserId']);

    $sentencia = $bd->prepare("INSERT INTO products(ProductName,ProductPrice, ProductAmount,ProductDescription,CreateDate,Categories_CategoryId,Suppliers_SupplierId,Users_UserId) VALUES (?,?,?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$ProductName, $ProductPrice, $ProductAmount, $ProductDescription, $CreateDate, $Categories_CategoryId, $Suppliers_SupplierId, $Users_UserId]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
?>