<?php
include_once "conexion.php";
$objeto = new Conexion();
$Conexion = $objeto->Conectar();

//Recepcion de los datos mediante POST de JS
$opcion     = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$UserId     = (isset($_POST['UserId'])) ? $_POST['UserId'] : '';
$Identification = (isset($_POST['Identification'])) ? $_POST['Identification'] : '';
$Name1     = (isset($_POST['Name1'])) ? $_POST['Name1'] : '';
$Name2     = (isset($_POST['Name2'])) ? $_POST['Name2'] : '';
$Name3     = (isset($_POST['Name3'])) ? $_POST['Name3'] : '';
$Name4     = (isset($_POST['Name4'])) ? $_POST['Name4'] : '';
$UserName  = (isset($_POST['UserName'])) ? $_POST['UserName'] : '';
$Password  = (isset($_POST['Password'])) ? $_POST['Password'] : '';
$UserEmail = (isset($_POST['UserEmail'])) ? $_POST['UserEmail'] : '';
$RolId     = (isset($_POST['RolId'])) ? $_POST['RolId'] : '';

switch ($opcion) {
    case 1: //Creacion
        $Consulta = "INSERT INTO users (UserId, Identification, Name1, Name2, Name3, Name4, UserName, Password, UserEmail, Roles_RolId)
        VALUES('$UserId', '$Identification', '$Name1', '$Name2', '$Name3', '$Name4', '$UserName', '$Password', '$UserEmail', '$RolId') ";
        $Resultado = $Conexion->prepare($Consulta);
        $Resultado->execute();

        //Actualizar en vivo la tabla
        $Consulta = "SELECT * FROM users ORDER BY UserID DESC LIMIT 1";
        $Resultado = $Conexion->prepare($Consulta);
        $Resultado->execute();

        $data = $Resultado->fetchAll(PDO::FETCH_ASSOC);

        break;
    case 2: //Modificacion
        $Consulta = "UPDATE users SET Identification='$Identification', Name1='$Name1', Name2='$Name2', Name3='$Name3', Name4='$Name4',
                     UserName='$UserName', Password='$Password', UserEmail='$UserEmail', Roles_RolId='$RolId' WHERE UserId = '$UserId' ";
        $Resultado = $Conexion->prepare($Consulta);
        $Resultado->execute();   
        
        $Consulta = "SELECT * FROM users WHERE UserId = '$UserId' ";
        $Resultado = $Conexion->prepare($Consulta);
        $Resultado->execute();

        $data = $Resultado->fetchAll(PDO::FETCH_ASSOC);

        break;        
    case 3: //Eliminacion
        $Consulta = "DELETE FROM users WHERE UserId ='$UserId' ";
        $Resultado = $Conexion->prepare($Consulta);
        $Resultado->execute();     
        
        break;
}

//Enviar el arreglo final en formato JSON
print json_encode($data, JSON_UNESCAPED_UNICODE);
$Conexion = NULL;
