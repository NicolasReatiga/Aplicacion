<?php include '../templates/headerMP.php' ?>

<?php
session_start();
$user = $_SESSION['s_user'];
$userid = $_SESSION['s_userid'];

if (!isset($_GET['SupplierId'])) {
    header('Location: index.php?mensaje=error');
    exit();
}

include_once '../model/conexion.php';
$SupplierId = $_GET['SupplierId'];

// $sentencia = $bd->prepare("SELECT suppliers.SupplierId, suppliers.SupplierName, suppliers.SupplierPhone,
//                             suppliers.SupplierAddress, suppliers.SupplierDescription, suppliers.SupplierWeb, suppliers.SupplierEmail, 
//                             suppliers.Users_UserId, users.UserId, users.UserName as UserName FROM suppliers INNER JOIN users on suppliers.Users_UserId = ?;");
$sentencia = $bd->prepare("SELECT * FROM suppliers Where SupplierId = ?;");
$sentencia->execute([$SupplierId]);
$supplier = $sentencia->fetch(PDO::FETCH_OBJ);
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
                        <input type="text" class="form-control" name="SupplierName" autofocus required value="<?php echo $supplier->SupplierName; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Teléfono: </label>
                        <input type="number" class="form-control" name="SupplierPhone" autofocus required value="<?php echo $supplier->SupplierPhone; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Dirección: </label>
                        <input type="text" class="form-control" name="SupplierAddress" autofocus required value="<?php echo $supplier->SupplierAddress; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descipción: </label>
                        <input type="text" class="form-control" name="SupplierDescription" autofocus required value="<?php echo $supplier->SupplierDescription; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Web: </label>
                        <input type="text" class="form-control" name="SupplierWeb" autofocus value="<?php echo $supplier->SupplierWeb; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Correo: </label>
                        <input type="mail" class="form-control" name="SupplierEmail" autofocus value="<?php echo $supplier->SupplierEmail; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha Modificación: </label>
                        <input type="date" class="form-control" name="CreateDate" autofocus disabled value="<?php echo $supplier->CreateDate; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Usuario: </label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="Users_UserId" autofocus disabled value="<?php echo ($userid[0]['UserId']); ?>">
                            <input type="text" class="form-control" name="Users_UserName" autofocus disabled value="<?php echo $user; ?>">
                        </div>
                    </div>

                    <div class="d-grid">
                        <input type="hidden" name="SupplierId" value="<?php echo $supplier->SupplierId; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../templates/footer.php' ?>