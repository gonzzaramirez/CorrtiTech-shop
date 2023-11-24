<?php $titulo = "CorriTech"; ?>
<?php require('header.php') ?>


<section class="inicio" id="inicio">
    <div class="container ">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 order-2 order-md-1 ">
                <h2 class="titulo">Productos de calidad</h2>
                <p>En CorriTech ofrecemos una amplia selección de productos tecnológicos de marcas líderes en el
                    mercado.</p>
                <a href="<?php echo base_url("catalogo"); ?>" class="boton">Ver productos</a>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 order-1 order-md-2">
                <img src="assets/img/notebook-inicio.png" class="img-fluid note-inicio">
            </div>
        </div>
    </div>
</section>
<section class="carrusel">
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/img/carrusel1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="assets/img/carrusel2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="assets/img/carrusel3.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
<section class="inicio-2" id="inicio-2">
    <div class="container ">
        <div class="row">
            <div class="col-12 ">
                <h2 class="text-center titulo">La experiencia nos define</h2>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-12">
                <img src="assets/img/pc-inicio.png" alt="" class="img-fluid">
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 mt-5 parrafo-inicio-2">
                <p class="text-center">somos una empresa argentina que se dedica a la venta de componentes tecnológicos.
                    Nuestro equipo está compuesto por apasionados de la tecnología, siempre buscando ofrecer productos
                    de alta calidad para satisfacer las necesidades de nuestros clientes. Nos enorgullecemos de brindar
                    un servicio al cliente excepcional, con asesoramiento experto y opciones de productos actualizados.
                </p>
                <div class="text-center">
                    <a href="<?php echo base_url("quienes-somos"); ?>" class="boton">Conócenos</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="productos mx-auto pb-5">
    <div class=" ea row text-center">
        <h2>Gran variedad de hardware</h2>
        <div class="card-group">
            <div class="card">
                <a href="<?php echo base_url("/catalogo"); ?>" class="card-link">
                    <div class="card-body">
                        <svg class="bi" width="32" height="32" fill="currentColor">
                            <use xlink:href="assets/icons/bootstrap-icons.svg#device-hdd" />
                        </svg>
                        <p>Discos Rigidos</p>
                    </div>
                </a>
            </div>
            <div class="card">
                <a href="<?php echo base_url("/catalogo"); ?>" class="card-link">
                    <div class="card-body">
                        <svg class="bi" width="32" height="32" fill="currentColor">
                            <use xlink:href="assets/icons/bootstrap-icons.svg#memory" />
                        </svg>
                        <p>Memorias ram</p>
                    </div>
                </a>
            </div>
            <div class="card">
                <a href="<?php echo base_url("/catalogo"); ?>" class="card-link">
                    <div class="card-body">
                        <svg class="bi" width="32" height="32" fill="currentColor">
                            <use xlink:href="assets/icons/bootstrap-icons.svg#gpu-card" />
                        </svg>
                        <p>Placas de video</p>
                    </div>
                </a>
            </div>
            <div class="card">
                <a href="<?php echo base_url("/catalogo"); ?>" class="card-link">
                    <div class="card-body">
                        <svg class="bi" width="32" height="32" fill="currentColor">
                            <use xlink:href="assets/icons/bootstrap-icons.svg#display" />
                        </svg>
                        <p>Monitores</p>
                    </div>
                </a>
            </div>
            <div class="card">
                <a href="<?php echo base_url("/catalogo"); ?>" class="card-link">
                    <div class="card-body">
                        <svg class="bi" width="32" height="32" fill="currentColor">
                            <use xlink:href="assets/icons/bootstrap-icons.svg#mouse" />
                        </svg>
                        <p>Mouses</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="card-group">
            <div class="card">
                <a href="<?php echo base_url("/catalogo"); ?>" class="card-link">
                    <div class="card-body">
                        <svg class="bi" width="32" height="32" fill="currentColor">
                            <use xlink:href="assets/icons/bootstrap-icons.svg#device-ssd" />
                        </svg>
                        <p>SSD</p>
                    </div>
                </a>
            </div>
            <div class="card">
                <a href="<?php echo base_url("/catalogo"); ?>" class="card-link">
                    <div class="card-body">
                        <svg class="bi" width="32" height="32" fill="currentColor">
                            <use xlink:href="assets/icons/bootstrap-icons.svg#cpu" />
                        </svg>
                        <p>Procesadores</p>
                    </div>
                </a>
            </div>
            <div class="card">
                <a href="<?php echo base_url("/catalogo"); ?>" class="card-link">
                    <div class="card-body">
                        <svg class="bi" width="32" height="32" fill="currentColor">
                            <use xlink:href="assets/icons/bootstrap-icons.svg#motherboard" />
                        </svg>
                        <p>Motherboards</p>
                    </div>
                </a>
            </div>
            <div class="card">
                <a href="<?php echo base_url("/catalogo"); ?>" class="card-link">
                    <div class="card-body">
                        <svg class="bi" width="32" height="32" fill="currentColor">
                            <use xlink:href="assets/icons/bootstrap-icons.svg#headset" />
                        </svg <p>Auricuales</p>
                    </div>
                </a>
            </div>
            <div class="card">
                <a href="<?php echo base_url("/catalogo"); ?>" class="card-link">
                    <div class="card-body">
                        <svg class="bi" width="32" height="32" fill="currentColor">
                            <use xlink:href="assets/icons/bootstrap-icons.svg#keyboard" />
                        </svg>
                        <p>Teclados</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="marcas pt-5">
    <div class="row">
        <div class="col-12">
            <h2 class="text-center">Las mejores marcas para vos</h2>
        </div>
        <div class="col-12">
            <div class="slide-track">
                <div class="slide">
                    <img src="assets/img/marcas/amd.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="assets/img/marcas/asus.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="assets/img/marcas/coolermaster.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="assets/img/marcas/corrsair.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="assets/img/marcas/gigabyte.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="assets/img/marcas/hp.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="assets/img/marcas/hyperx.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="assets/img/marcas/intel.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="assets/img/marcas/kingston.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="assets/img/marcas/logitech.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="assets/img/marcas/msi.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="assets/img/marcas/razer.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="assets/img/marcas/redragon.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="assets/img/marcas/thermaltake.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="assets/img/marcas/wd.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="assets/img/marcas/amd.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="assets/img/marcas/asus.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="assets/img/marcas/coolermaster.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="assets/img/marcas/corrsair.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="assets/img/marcas/gigabyte.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="assets/img/marcas/hp.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="assets/img/marcas/hyperx.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="assets/img/marcas/intel.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="assets/img/marcas/kingston.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="assets/img/marcas/logitech.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="assets/img/marcas/msi.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="assets/img/marcas/razer.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="assets/img/marcas/redragon.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="assets/img/marcas/thermaltake.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="assets/img/marcas/wd.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</section>





<?php require('footer.php') ?>