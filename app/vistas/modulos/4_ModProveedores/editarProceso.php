<?php
    include '../model/conexion.php';

    session_start();
    $user = $_SESSION['s_user'];
    $userid = $_SESSION['s_userid'];

    if (!isset($_POST['SupplierId'])) {
        header('Location: index.php?mensaje=error');
    }

    $SupplierId = $_POST["SupplierId"];
    $SupplierName = $_POST["SupplierName"];
    $SupplierPhone = $_POST["SupplierPhone"];
    $SupplierAddress = $_POST["SupplierAddress"];

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

    $CreateDate = date("Y-m-d");
    $Users_UserId = ($userid[0]['UserId']);

    $sentencia = $bd->prepare("UPDATE Suppliers SET SupplierName = ?, SupplierPhone = ?, SupplierAddress = ?, SupplierDescription = ?, SupplierWeb = ?, SupplierEmail = ?, CreateDate = ?, Users_UserId = ? where SupplierId = ?;");
    $resultado = $sentencia->execute([$SupplierName, $SupplierPhone, $SupplierAddress, $SupplierDescription, $SupplierWeb, $SupplierEmail, $CreateDate, $Users_UserId, $SupplierId]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
?>