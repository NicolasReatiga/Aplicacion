<?php include '../templates/headerMU.php' ?>

<?php
include_once "../model/conexion.php";
$sentencia = $bd->query("select * from users");
$persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <!-- inicio alerta -->
            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta') {
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Rellena todos los campos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }
            ?>

            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Registrado!</strong> Se han agregado los datos correctamente.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }
            ?>

            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Error. Vuelva a intentar.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }
            ?>

            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado') {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Cambiado!</strong> Los datos fueron actualizados correctamente.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }
            ?>

            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {
            ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Eliminado!</strong> Los datos fueron borrados correctamente.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }
            ?>
            <!-- fin alerta -->

            <!-- Card Header -->
            <div class="card">
                <div class="card-header">
                    Lista de personas
                </div>
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Documento</th>
                                <th scope="col">Primer nombre</th>
                                <th scope="col">Segundo nombre</th>
                                <th scope="col">Segundo nombre</th>
                                <th scope="col">Primer apellido</th>
                                <th scope="col">Segundo apellido</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Rol</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            foreach ($persona as $dato) {
                            ?>
                                <tr>
                                    <td scope="row"><?php echo $dato->UserId; ?></td>
                                    <td><?php echo $dato->Identification; ?></td>
                                    <td><?php echo $dato->Name1; ?></td>
                                    <td><?php echo $dato->Name2; ?></td>
                                    <td><?php echo $dato->Name3; ?></td>
                                    <td><?php echo $dato->Name4; ?></td>
                                    <td><?php echo $dato->UserName; ?></td>
                                    <td><?php echo $dato->UserEmail; ?></td>
                                    <td><?php echo $dato->Roles_RolId; ?></td>
                                    <td><a class="text-success" href="editar.php?UserId=<?php echo $dato->UserId; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                    <td><a onclick="return confirm('¿Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?UserId=<?php echo $dato->UserId; ?>"><i class="bi bi-trash"></i></a></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    Ingresar datos:
                </div>
                <form class="p-4" method="POST" action="registrar.php">
                    <div class="mb-3">
                        <label class="form-label">Documento: </label>
                        <input type="number" class="form-control" name="Identification" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Primer nombre: </label>
                        <input type="text" class="form-control" name="Name1" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Segundo nombre: </label>
                        <input type="text" class="form-control" name="Name2" autofocus>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Primer apellido: </label>
                        <input type="text" class="form-control" name="Name3" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Segundo apellido: </label>
                        <input type="text" class="form-control" name="Name4" autofocus>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Usuario: </label>
                        <input type="text" class="form-control" name="UserName" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password: </label>
                        <input type="password" class="form-control" name="Password" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email: </label>
                        <input type="mail" class="form-control" name="UserEmail" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label for="RolId" class="col-form-label">Rol:</label>
                        <select id="RolId" name="RolId">
                            <option class="form-control" value="1">Administrador</option>
                            <option class="form-control" value="2">Operario Logístico</option>
                            <option class="form-control" value="3">Operario Fábrica</option>
                            <option class="form-control" value="4">Analísta</option>
                        </select>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin Page Content -->

<?php include '../templates/footer.php' ?>