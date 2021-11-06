<?php
    session_start();

    //se llama el archivo que hace la conexión con la base de datos
    include_once "conexion.php";

    //Se invoca el metodo    
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    //recibir datos enviados por POST desde ajax
    $username = (isset($_POST['username'])) ? $_POST['username'] : '';
    $password = (isset($_POST['password'])) ? $_POST['password'] : '';

    //se encripta la contraseña del usuario
    $pass = md5($password);

    $consulta = "SELECT * FROM users WHERE UserName = '$username' AND password = '$password'";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();

    if($resultado->rowCount() >= 1){
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION["s_user"] = $username;
        
    }else{
        $_SESSION["s_user"] = null;
        $data=null;
    }
    print json_encode($data);
    $Conexion=null;
?>