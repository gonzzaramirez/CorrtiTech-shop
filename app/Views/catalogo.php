<?php $titulo = "Catalogo"; ?>
<?php require('header.php') ?>

<section class="catalogo">
    <div class="container">
        <div class="row">
            <h1 class="text-center titulo">Catálogo de productos</h1>
        </div>
        <div class="separador"></div>

        <div class="row mt-4 text-center d-flex align-items-center justify-content-center">
            <div class="col-lg-12">
                <div class="filter-section">
                    <label for="categoria">Filtrar por categoría</label>
                    <select id="categoria" name="categoria">
                        <option value="">Todas las categorías</option>
                        <?php foreach ($categorias as $categoria): ?>
                            <option value="<?= $categoria['id_categoria'] ?>"><?= $categoria['nombre'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button id="filtrar-btn" class=" boton2">Filtrar</button>
                </div>
            </div>
        </div>

        <div class="row mt-4 text-center d-flex align-items-center justify-content-center">
            <?php foreach ($productos as $producto): ?>
                <?php if ($producto['activo'] !== 'no' && $producto['cantidad'] > 0): ?>
                    <div class="col-lg-4 col-12 col-md-6 pb-3 producto" data-categoria="<?= $producto['id_categoria'] ?>">
                        <div class="product-card">
                            <img src="<?= base_url('uploads/' . $producto['url_imagen']) ?>" alt="Imagen del producto"
                                class="img-fluid">
                            <div class="product-details">
                                <?php if (isset($producto['categoria'])): ?>
                                    <div class="product-category">
                                        <?= $producto['categoria'] ?>
                                    </div>
                                <?php endif; ?>
                                <div class="product-name">
                                    <?= $producto['nombre'] ?>
                                </div>
                                <div class="product-price">
                                    $
                                    <?= $producto['precio'] ?>
                                </div>
                            </div>
                            <div class="buy-option">
                                <button class="btn text-white" data-bs-toggle="modal" data-bs-target="#myModal">Agregar al
                                    carrito</button>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
</section>



<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¡Atención!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-center">Para poder adquirir los productos, por favor <a
                        href="<?php echo base_url("registro"); ?>">
                        regístrate</a> o <a href="<?php echo base_url("ingresar"); ?>">inicia sesión </a>.</p>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div>


<script>
    // Agregar evento click al botón de filtrar
    document.getElementById("filtrar-btn").addEventListener("click", function () {
        var select = document.getElementById("categoria");
        var selectedValue = select.options[select.selectedIndex].value;

        // Mostrar u ocultar productos según la categoría seleccionada
        var productos = document.getElementsByClassName("producto");
        for (var i = 0; i < productos.length; i++) {
            var categoria = productos[i].getAttribute("data-categoria");
            if (selectedValue === "" || categoria === selectedValue) {
                productos[i].style.display = "block";
            } else {
                productos[i].style.display = "none";
            }
        }
    });
</script>







<?php require('footer.php') ?>