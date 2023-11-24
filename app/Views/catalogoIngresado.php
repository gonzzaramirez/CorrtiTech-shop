<?php $titulo = "Catalogo"; ?>
<?php require('headerIngresado.php') ?>

<section class="catalogo">
    <div class="container">
        <div class="row">
            <h1 class="text-center titulo pt-2">Catálogo de productos</h1>
        </div>
        <div class="separador"></div>
        <?php if (session()->has('mensaje')): ?>
            <div class="alert alert-success text-center" role="alert">
                <?= session('mensaje') ?>
            </div>
        <?php endif; ?>
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
                                <div class="text-secondary">
                                    Stock:
                                    <?= $producto['cantidad'] ?>
                                </div>
                            </div>
                            <div class="buy-option">
                                <a href="<?= base_url('carrito/agregar/' . $producto['id_producto']) ?>"
                                    class="btn  text-white btn-comprar">Agregar la carrito</a>

                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>






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
<?php require('footerIngresado.php') ?>