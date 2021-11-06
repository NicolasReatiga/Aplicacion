<?php
session_start();
if ($_SESSION["s_user"] === null) {
  header("Location: ../1_ModLogin/login.html");
}

include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT * FROM users";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Usuarios</title>

  <!--JQUERY-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Bootstrap-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />

  <!-- Icons from Font Awesome-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css" />
  <script src="https://use.fontawesome.com/releases/v5.0.11/js/all.js"></script>

  <!-- Ionic icons -->
  <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet" />

  <!-- Google  Fonts-->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu" rel="stylesheet" />

  <!-- CSS properties-->
  <link rel="stylesheet" type="text/css" href="../../assets/css/estilo_users.css" th:href="@{/css/index.css}" />

  <!-- Datatables-->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">

</head>

<body>
  <div class="d-flex" id="content-wrapper">
    <!-- Sidebar -->
    <div id="sidebar-container" class="bg-white border-right">
      <div class="logo">
        <h4 class="font-weight-bold mb-0">Gestor-E</h4>
      </div>
      <div class="menu list-group-flush">
        <a href="#" class="
              list-group-item list-group-item-action
              text-muted
              p-3
              border-0
            "><i class="icon ion-md-people lead mr-2"></i> Usuarios</a>
        <a href="#" class="
              list-group-item list-group-item-action
              text-muted
              p-3
              border-0
            "><i class="icon ion-md-cube lead mr-2"></i> Gestión Inventarios</a>
        <a href="#" class="
              list-group-item list-group-item-action
              text-muted
              p-3
              border-0
            "><i class="icon ion-md-business lead mr-2"></i> Proveedores</a>
        <a href="#" class="
              list-group-item list-group-item-action
              text-muted
              p-3
              border-0
            "><i class="icon ion-md-clipboard lead mr-2"></i> Reportes</a>
      </div>
    </div>
    <!-- Fin sidebar -->

    <!-- Page Content -->
    <div id="page-content-wrapper" class="w-100 bg-light">
      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <div class="container">
          <button class="btn btn-primary text-primary" id="menu-toggle">Mostrar / esconder menu</button>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
              <li class="nav-item active">
                <a class="nav-link text-dark" href="User_main.php">Inicio</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo $_SESSION["s_user"]; ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Mi perfil</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="../1_ModLogin/logout.php" role="button">Cerrar sesión</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <button id="btn-add" type="button" class="btn">Agregar usuario</button>
          </div>
        </div>
      </div>

      <!-- Tabla de ususarios -->
      <div id="content" class="container-fluid p-5">
        <div class="tb-users table-responsive table-bordered">
          <table class="table" id="tb-users">
            <thead class="text-center">
              <tr>
                <th scope="col">ID Usuario</th>
                <th scope="col">Documento</th>
                <th scope="col">Nombre 1</th>
                <th scope="col">Nombre 2</th>
                <th scope="col">Apellido 1</th>
                <th scope="col">Apellido 2</th>
                <th scope="col">Nombre de usuario</th>
                <th scope="col">Contraseña</th>
                <th scope="col">Correo</th>
                <th scope="col">Rol</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($data as $dat) {
              ?>
                <tr>
                  <td><?php echo $dat['UserId'] ?></td>
                  <td><?php echo $dat['Identification'] ?></td>
                  <td><?php echo $dat['Name1'] ?></td>
                  <td><?php echo $dat['Name2'] ?></td>
                  <td><?php echo $dat['Name3'] ?></td>
                  <td><?php echo $dat['Name4'] ?></td>
                  <td><?php echo $dat['UserName'] ?></td>
                  <td><?php echo $dat['Password'] ?></td>
                  <td><?php echo $dat['UserEmail'] ?></td>
                  <td><?php echo $dat['Roles_RolId'] ?></td>
                  <td></td>
                </tr>

              <?php
              }
              ?>

            </tbody>
          </table>
        </div>
      </div>

      <!-- Ventana Modal -->
      <div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="formPersonas">
              <div class="modal-body">
                <div class="form-group">
                  <label for="Identification" class="col-form-label">Identificación:</label>
                  <input type="number" class="form-control" id="Identification">
                </div>
                <div class="form-group">
                  <label for="Name1" class="col-form-label">Primer nombre:</label>
                  <input type="text" class="form-control" id="Name1">
                </div>
                <div class="form-group">
                  <label for="Name2" class="col-form-label">Segundo nombre:</label>
                  <input type="text" class="form-control" id="Name2">
                </div>
                <div class="form-group">
                  <label for="Name3" class="col-form-label">Primer apellido:</label>
                  <input type="text" class="form-control" id="Name3">
                </div>
                <div class="form-group">
                  <label for="Name4" class="col-form-label">Segundo apellido:</label>
                  <input type="text" class="form-control" id="Name4">
                </div>
                <div class="form-group">
                  <label for="UserName" class="col-form-label">Nombre de usuario:</label>
                  <input type="text" class="form-control" id="UserName">
                </div>
                <div class="form-group">
                  <label for="Password" class="col-form-label">Contraseña:</label>
                  <input type="password" class="form-control" id="Password">
                </div>
                <div class="form-group">
                  <label for="UserEmail" class="col-form-label">Correo:</label>
                  <input type="text" class="form-control" id="UserEmail">
                </div>
                <div class="form-group">
                  <label for="RolId" class="col-form-label">Rol:</label>
                  <select id="RolId" name="RolId">
                    <option class="form-control" value="1">Administrador</option>
                    <option class="form-control" value="2">Operario Logístico</option>
                    <option class="form-control" value="3">Operario Fábrica</option>
                    <option class="form-control" value="4">Analísta</option>
                  </select>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
              </div>
            </form>
          </div>
        </div>
      </div>

    </div>

    <!-- Fin Page Content -->
  </div>
  <!-- Fin wrapper -->

  <!-- Bootstrap, Popper  y JQuery -->
  <script src="../../assets/js/JQuery/jquery-3.6.0.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

  <!-- datatables -->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
  <script src="../../assets/js/datatable.js/main.js"></script>

  <!-- Abrir / cerrar menu -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#content-wrapper").toggleClass("toggled");
    });
  </script>
</body>

</html>