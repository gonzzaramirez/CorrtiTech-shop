<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/styles5.css') ?>" integrity=" " crossorigin="">
    <script src="assets/js/bootstrap.min.js"></script>
    <title>
        <?php echo $titulo; ?>
    </title>
    <link rel="icon" href="assets/img/logoicon.png" type="image/icon type">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-xl bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?php echo base_url("/"); ?>"><span>Corri</span>Tech</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?php echo base_url("/"); ?>">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url("catalogo"); ?>">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url("quienes-somos"); ?>">Quienes somos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url("comercializacion"); ?>">Comercialización</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url("contacto"); ?>">Contacto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url("term-usos"); ?>">Términos y usos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url("registro"); ?>">Registrarse</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url("ingresar"); ?>">Iniciar sesión</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </header>