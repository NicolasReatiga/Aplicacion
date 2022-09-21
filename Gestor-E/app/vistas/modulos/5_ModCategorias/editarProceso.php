<?php
    include '../model/conexion.php';

    session_start();
    $user = $_SESSION['s_user'];
    $userid = $_SESSION['s_userid'];

    if (!isset($_POST['CategoryId'])) {
        header('Location: index.php?mensaje=error');
    }

    $CategoryId = $_POST["CategoryId"];
    $CategoryName = $_POST["CategoryName"];

    if (empty($_POST["CategoryDescription"])) {
        $CategoryDescription = "";
    } else {
        $CategoryDescription = $_POST["CategoryDescription"];
    }

    $CreateDate = date("Y-m-d");
    $Users_UserId = ($userid[0]['UserId']);

    $sentencia = $bd->prepare("UPDATE Categories SET CategoryName = ?, CategoryDescription = ?, CreateDate = ?, Users_UserId = ? where CategoryId = ?;");
    $resultado = $sentencia->execute([$CategoryName, $CategoryDescription, $CreateDate, $Users_UserId, $CategoryId]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
?>