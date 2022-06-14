<?php include '../templates/headerMP.php' ?>

<?php
include_once "../model/conexion.php";

session_start();
$user = $_SESSION['s_user'];
$userid = $_SESSION['s_userid'];
$sentencia = $bd->query("select * from suppliers");
$supplier = $sentencia->fetchAll(PDO::FETCH_OBJ);
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
                    Lista de proveedores
                </div>
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Dirección</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Web</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Usuario</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            foreach ($supplier as $dato) {
                            ?>
                                <tr>
                                    <td scope="row"><?php echo $dato->SupplierId; ?></td>
                                    <td><?php echo $dato->SupplierName; ?></td>
                                    <td><?php echo $dato->SupplierPhone; ?></td>
                                    <td><?php echo $dato->SupplierAddress; ?></td>
                                    <td><?php echo $dato->SupplierDescription; ?></td>
                                    <td><?php echo $dato->SupplierWeb; ?></td>
                                    <td><?php echo $dato->SupplierEmail; ?></td>
                                    <td><?php echo $dato->CreateDate; ?></td>
                                    <td><?php echo $dato->Users_UserId; ?></td>
                                    <td><a class="text-success" href="editar.php?SupplierId=<?php echo $dato->SupplierId; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                    <td><a onclick="return confirm('¿Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?SupplierId=<?php echo $dato->SupplierId; ?>"><i class="bi bi-trash"></i></a></td>
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
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="SupplierName" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Teléfono: </label>
                        <input type="number" class="form-control" name="SupplierPhone" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Dirección: </label>
                        <input type="text" class="form-control" name="SupplierAddress" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripción: </label>
                        <input type="text" class="form-control" name="SupplierDescription" autofocus>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Web: </label>
                        <input type="text" class="form-control" name="SupplierWeb" autofocus>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email: </label>
                        <input type="mail" class="form-control" name="SupplierEmail" autofocus>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha: </label>
                        <input type="date" class="form-control" name="CreationDate" autofocus disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Usuario: </label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="Users_UserId" autofocus disabled value="<?php echo ($userid[0]['UserId']); ?>">
                            <input type="text" class="form-control" name="Users_UserName" autofocus disabled value="<?php echo $user; ?>">
                        </div>
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