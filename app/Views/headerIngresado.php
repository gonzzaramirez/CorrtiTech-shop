<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>" integrity=" " crossorigin="">
    <link rel="stylesheet" href="<?= base_url('assets/css/stylesIngresados.css') ?>" integrity=" " crossorigin="">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
        crossorigin="anonymous"></script>
    <title>
        <?php echo $titulo; ?>
    </title>
    <link rel="icon" href="assets/img/logoicon.png" type="image/icon type">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?php echo base_url("/indexIngresado"); ?>"><span>Corri</span>Tech</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page"
                                href="<?php echo base_url("indexIngresado"); ?>">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url("catalogoIngresado"); ?>">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url("quienes-somosIngresado"); ?>">Quienes
                                somos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                                href="<?php echo base_url("comercializacionIngresado"); ?>">Comercialización</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url("consulta"); ?>">Consulta</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url("term-usosIngresado"); ?>">Terminos y usos</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Perfil
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li class="pb-2">
                                    <a href="<?php echo base_url("misCompras"); ?>"
                                        class="btn btn-warning btn-sm d-block mx-auto text-dark dropdown-item w-100 smaller-text custom-link">Mis compras</a>
                                </li>
                               

                                <li>
                                    <form method="post" action="<?php echo base_url('logout'); ?>">
                                        <input type="submit"
                                            class="btn btn-warning btn-sm d-block mx-auto dropdown-item btn-block"
                                            value="Cerrar sesión">
                                    </form>
                                </li>
                            </ul>
                        </li>







                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url("carrito"); ?>">
                                <svg class="bi" width="28" height="28" fill="currentColor">
                                    <use xlink:href="assets/icons/bootstrap-icons.svg#cart3" />
                                </svg>
                                <span id="cantidad-carrito"></span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>


    <script>
        fetch('<?= base_url('carrito/obtenerCantidad') ?>')
            .then(response => response.json())
            .then(data => {
                // Actualizar el contenido del contenedor con la cantidad de productos
                document.getElementById('cantidad-carrito').textContent = data.cantidad;
            })
            .catch(error => console.error(error));
    </script>