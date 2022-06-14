<?php include '../templates/headerMP.php' ?>

<?php
session_start();
$user = $_SESSION['s_user'];
$userid = $_SESSION['s_userid'];

if (!isset($_GET['ProductId'])) {
    header('Location: index.php?mensaje=error');
    exit();
}

include_once '../model/conexion.php';
$ProductId = $_GET['ProductId'];

// $sentencia = $bd->prepare("SELECT Productss.ProductId, Productss.ProductsName, Productss.ProductsPhone,
//                             Productss.ProductsAddress, Productss.ProductsDescription, Productss.ProductsWeb, Productss.ProductsEmail, 
//                             Productss.Users_UserId, users.UserId, users.UserName as UserName FROM Productss INNER JOIN users on Productss.Users_UserId = ?;");
$sentencia = $bd->prepare("SELECT * FROM Products Where ProductId = ?;");
$sentencia->execute([$ProductId]);
$Products = $sentencia->fetch(PDO::FETCH_OBJ);

$sentencia = $bd->query("select * from categories");
$Categories = $sentencia->fetchAll(PDO::FETCH_OBJ);

$sentencia = $bd->query("select * from suppliers");
$Suppliers = $sentencia->fetchAll(PDO::FETCH_OBJ);
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
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="ProductName" autofocus required value="<?php echo $Products->ProductName; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Precio: </label>
                        <input type="number" class="form-control" name="ProductPrice" autofocus required value="<?php echo $Products->ProductPrice; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cantidad: </label>
                        <input type="number" class="form-control" name="ProductAmount" autofocus required value="<?php echo $Products->ProductAmount; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripción: </label>
                        <input type="text" class="form-control" name="ProductDescription" autofocus value="<?php echo $Products->ProductDescription; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha Modificación: </label>
                        <input type="date" class="form-control" name="CreateDate" autofocus disabled value="<?php echo $Products->CreateDate; ?>">
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
                        <input type="hidden" name="ProductId" value="<?php echo $Products->ProductId; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../templates/footer.php' ?>