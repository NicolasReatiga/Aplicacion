<?php include '../templates/headerMPr.php' ?>

<?php
include_once "../model/conexion.php";

session_start();
$user = $_SESSION['s_user'];
$userid = $_SESSION['s_userid'];
$sentencia = $bd->query("select * from Products");
$Products = $sentencia->fetchAll(PDO::FETCH_OBJ);

$sentencia = $bd->query("select * from categories");
$Categories = $sentencia->fetchAll(PDO::FETCH_OBJ);

$sentencia = $bd->query("select * from suppliers");
$Suppliers = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <!-- inicio alerta -->
            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta') {
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>¡Error!</strong> Rellena los campos necesarios.
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
                    Lista de productos
                </div>
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Producto</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Categoría</th>
                                <th scope="col">Proveedor</th>
                                <th scope="col">Usuario</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            foreach ($Products as $dato) {
                            ?>
                                <tr>
                                    <td scope="row"><?php echo $dato->ProductId; ?></td>
                                    <td><?php echo $dato->ProductName; ?></td>
                                    <td><?php echo $dato->ProductPrice; ?></td>
                                    <td><?php echo $dato->ProductAmount; ?></td>
                                    <td><?php echo $dato->ProductDescription; ?></td>
                                    <td><?php echo $dato->CreateDate; ?></td>
                                    <td><?php echo $dato->Categories_CategoryId; ?></td>
                                    <td><?php echo $dato->Suppliers_SupplierId; ?></td>
                                    <td><?php echo $dato->Users_UserId; ?></td>
                                    <td><a class="text-success" href="editar.php?ProductId=<?php echo $dato->ProductId; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                    <td><a onclick="return confirm('¿Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?ProductId=<?php echo $dato->ProductId; ?>"><i class="bi bi-trash"></i></a></td>
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
                        <input type="text" class="form-control" name="ProductName" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Precio: </label>
                        <input type="number" class="form-control" name="ProductPrice" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cantidad: </label>
                        <input type="number" class="form-control" name="ProductAmount" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripción: </label>
                        <input type="text" class="form-control" name="ProductDescription" autofocus>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha: </label>
                        <input type="date" class="form-control" name="CreationDate" autofocus disabled>
                    </div>
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="Categories_CategoryId" class="col-form-label">Categoría: </label>
                            <select id="Categories_CategoryId" name="Categories_CategoryId">

                                <?php
                                foreach ($Categories as $cat) {
                                ?>
                                    <option class="form-control" value="<?php echo $cat->CategoryId; ?>"> <?php echo $cat->CategoryId, ' - ', $cat->CategoryName; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="Suppliers_SupplierId" class="col-form-label">Proveedor: </label>
                            <select id="Suppliers_SupplierId" name="Suppliers_SupplierId">

                                <?php
                                foreach ($Suppliers as $sup) {
                                ?>
                                    <option class="form-control" value="<?php echo $sup->SupplierId; ?>"> <?php echo $sup->SupplierId, ' - ', $sup->SupplierName; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Usuario: </label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="Users_UserId" autofocus disabled value="<?php echo ($userid[0]['UserId']); ?>">
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