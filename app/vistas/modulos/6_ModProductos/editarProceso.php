<?php
    include '../model/conexion.php';

    session_start();
    $user = $_SESSION['s_user'];
    $userid = $_SESSION['s_userid'];

    if (!isset($_POST['ProductId'])) {
        header('Location: index.php?mensaje=error');
    }

    $ProductId = $_POST["ProductId"];
    $ProductName = $_POST["ProductName"];
    $ProductPrice = $_POST["ProductPrice"];
    $ProductAmount = $_POST["ProductAmount"];

    if (empty($_POST["ProductDescription"])) {
        $ProductyDescription = "";
    } else {
        $ProductDescription = $_POST["ProductDescription"];
    }

    $CreateDate = date("Y-m-d");
    $Categories_CategoryId = $_POST["Categories_CategoryId"];
    $Suppliers_SupplierId = $_POST["Suppliers_SupplierId"];
    $Users_UserId = ($userid[0]['UserId']);

    $sentencia = $bd->prepare("UPDATE Products SET ProductName = ?, ProductPrice = ?, ProductAmount = ?, ProductDescription = ?, CreateDate = ?, Categories_CategoryId = ?, Suppliers_SupplierId = ?, Users_UserId = ? where ProductId = ?;");
    $resultado = $sentencia->execute([$ProductName, $ProductPrice, $ProductAmount, $ProductDescription, $CreateDate, $Categories_CategoryId, $Suppliers_SupplierId, $Users_UserId, $ProductId]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
?>