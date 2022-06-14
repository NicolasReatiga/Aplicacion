<?php include '../templates/headerMP.php' ?>

<?php
session_start();
$user = $_SESSION['s_user'];
$userid = $_SESSION['s_userid'];

if (!isset($_GET['CategoryId'])) {
    header('Location: index.php?mensaje=error');
    exit();
}

include_once '../model/conexion.php';
$CategoryId = $_GET['CategoryId'];

// $sentencia = $bd->prepare("SELECT Categorys.CategoryId, Categorys.CategoryName, Categorys.CategoryPhone,
//                             Categorys.CategoryAddress, Categorys.CategoryDescription, Categorys.CategoryWeb, Categorys.CategoryEmail, 
//                             Categorys.Users_UserId, users.UserId, users.UserName as UserName FROM Categorys INNER JOIN users on Categorys.Users_UserId = ?;");
$sentencia = $bd->prepare("SELECT * FROM categories Where CategoryId = ?;");
$sentencia->execute([$CategoryId]);
$Category = $sentencia->fetch(PDO::FETCH_OBJ);
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
                        <input type="text" class="form-control" name="CategoryName" autofocus required value="<?php echo $Category->CategoryName; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descipción: </label>
                        <input type="text" class="form-control" name="CategoryDescription" autofocus required value="<?php echo $Category->CategoryDescription; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha Modificación: </label>
                        <input type="date" class="form-control" name="CreateDate" autofocus disabled value="<?php echo $Category->CreateDate; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Usuario: </label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="Users_UserId" autofocus disabled value="<?php echo ($userid[0]['UserId']); ?>">
                            <input type="text" class="form-control" name="Users_UserName" autofocus disabled value="<?php echo $user; ?>">
                        </div>
                    </div>

                    <div class="d-grid">
                        <input type="hidden" name="CategoryId" value="<?php echo $Category->CategoryId; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../templates/footer.php' ?>