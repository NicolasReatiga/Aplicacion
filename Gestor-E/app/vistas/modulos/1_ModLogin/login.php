<?php
    session_start();

    //se llama el archivo que hace la conexión con la base de datos
    include_once "../model/conexion.php";

    //recibir datos enviados por POST
    $username = $_POST['username'];
    $password = $_POST['password']; 

    //se encripta la contraseña del usuario
    $pass = md5($password);

    $consulta = $bd->query("SELECT * FROM users WHERE UserName= '$username' AND password= '$pass'");
    $data = $consulta->fetchAll(PDO::FETCH_ASSOC);
    print_r($data);
     if(empty($data)){
        echo '<script language="javascript">alert("Usuario o Contraseña incorrecta");location.href="login.html";</script>';
    }else{
        $_SESSION["s_user"] = $username;
        $_SESSION["s_userid"] = $data;
        header('location:../2_ModPrincipal/index.php');
    } 
?>