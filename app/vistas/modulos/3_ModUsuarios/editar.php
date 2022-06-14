<?php include '../templates/headerMU.php' ?>

<?php
if (!isset($_GET['UserId'])) {
    header('Location: index.php?mensaje=error');
    exit();
}

include_once '../model/conexion.php';
$UserId = $_GET['UserId'];

$sentencia = $bd->prepare("select * from users where UserId = ?;");
$sentencia->execute([$UserId]);
$persona = $sentencia->fetch(PDO::FETCH_OBJ);
//print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Identificacion: </label>
                        <input type="number" class="form-control" name="Identification" required value="<?php echo $persona->Identification; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Primer nombre: </label>
                        <input type="text" class="form-control" name="Name1" autofocus required value="<?php echo $persona->Name1; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Segundo nombre: </label>
                        <input type="text" class="form-control" name="Name2" autofocus value="<?php echo $persona->Name2; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Primer apellido: </label>
                        <input type="text" class="form-control" name="Name3" autofocus required value="<?php echo $persona->Name3; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Segundo apellido: </label>
                        <input type="text" class="form-control" name="Name4" autofocus value="<?php echo $persona->Name4; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Usuario: </label>
                        <input type="text" class="form-control" name="UserName" autofocus required value="<?php echo $persona->UserName; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Contraseña: </label>
                        <input type="password" class="form-control" name="Password" autofocus required value="<?php echo $persona->Password; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email: </label>
                        <input type="mail" class="form-control" name="UserEmail" autofocus required value="<?php echo $persona->UserEmail; ?>">
                    </div>
                    <!-- <div class="mb-3">
                        <label class="form-label">Rol: </label>
                        <input type="text" class="form-control" name="RolId" autofocus required value="<?php echo $persona->RolId; ?>">
                    </div> -->

                    <div class="mb-3">
                        <label for="RolId" class="col-form-label">Rol:</label>
                        <select id="RolId" name="RolId" autofocus required value="<?php echo $persona->RolId; ?>">
                            <option class="form-control" value="1">Administrador</option>
                            <option class="form-control" value="2">Operario Logístico</option>
                            <option class="form-control" value="3">Operario Fábrica</option>
                            <option class="form-control" value="4">Analísta</option>
                        </select>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="UserId" value="<?php echo $persona->UserId; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../templates/footer.php' ?>