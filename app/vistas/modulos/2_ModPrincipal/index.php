<?php
include_once "../model/conexion.php";

session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Bootstrap Example</title>
</head>

<body>

    <!-- Example Code -->
    <div class="container mt-5">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card" style="overflow: hidden; height: 300px;">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text>
                    </svg>

                    <div class="card-body">
                        <h5 class="card-title">Usuarios</h5>
                        <p class="card-text">En este módulo pordrá controlar los usuarios que tienen acceso al aplicativo.</p>
                    </div>
                    <a href="../3_ModUsuarios/index.php" class="stretched-link"></a>
                </div>
            </div>
            <div class="col">
                <div class="card" style="overflow: hidden; height: 300px;">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text>
                    </svg>

                    <div class="card-body">
                        <h5 class="card-title">Proveedores</h5>
                        <p class="card-text">En este módulo podrá hacer la gestión de los proveedores.</p>
                    </div>
                    <a href="../4_ModProveedores/index.php" class="stretched-link"></a>
                </div>
            </div>
            <div class="col">
                <div class="card" style="overflow: hidden; height: 300px;">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text>
                    </svg>

                    <div class="card-body">
                        <h5 class="card-title">Categorías</h5>
                        <p class="card-text">En este módulo podrá hacer la gestión de las categorías utilizadas.</p>
                    </div>
                    <a href="../5_ModCategorias/index.php" class="stretched-link"></a>
                </div>
            </div>
            <div class="col">
                <div class="card" style="overflow: hidden; height: 300px;">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text>
                    </svg>

                    <div class="card-body">
                        <h5 class="card-title">Productos</h5>
                        <p class="card-text">En este módulo podrá hacer la gestión de los productos.</p>
                    </div>
                    <a href="../6_ModProductos/index.php" class="stretched-link"></a>
                </div>
            </div>
            <div class="col">
                <div class="card" style="overflow: hidden; height: 300px;">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text>
                    </svg>

                    <div class="card-body">
                        <h5 class="card-title">Próximamente</h5>
                        <p class="card-text">Próximamente. </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="overflow: hidden; height: 300px;">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text>
                    </svg>

                    <div class="card-body">
                        <h5 class="card-title">Cerrar sesión</h5>
                        <p class="card-text"> </p>
                    </div>
                    <a href="../1_ModLogin/logout.php" class="stretched-link"></a>
                </div>
            </div>
        </div>
    </div>


    <!-- End Example Code -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>