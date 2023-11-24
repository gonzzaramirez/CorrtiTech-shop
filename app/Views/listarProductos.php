<?php $titulo = "ListaProductos"; ?>

<?php require('headerADMIN.php') ?>
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success text-center">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>
<div class="container">
    <div class="row">
        <div class="col-4">
            <a class="btn btn-success mt-2 mb-2" href="<?= base_url('agregarProducto') ?>">Agregar Producto</a>
        </div>
        <div class="col-4 mt-2">
            <form action="<?= base_url('listarProductos') ?>" method="post" class="mb-3">
                <div class="input-group">
                    <input type="text" name="busqueda" class="form-control" placeholder="Buscar por nombre">
                    <button type="submit" class="btn btn-dark">Buscar</button>
                    <?php if (isset($_POST['busqueda'])): ?>
                        <a href="<?php echo base_url("/listarProductos"); ?>" class="btn btn-outline-dark">
                            <div class="d-flex align-items-center">
                                <svg class="bi me-1" width="24" height="24" fill="currentColor">
                                    <use xlink:href="assets/icons/bootstrap-icons.svg#arrow-clockwise" />
                                </svg>
                               
                            </div>
                        </a>
                        <!-- Mostrar botón de reinicio solo cuando se realiza una búsqueda -->
                    <?php endif; ?>
                </div>
            </form>
        </div>

        <div class="col-4">
            <a class="btn btn-dark mt-2 mb-2 float-end" href="<?= base_url('productosDadosDeBaja') ?>">Ver Productos
                dados de baja</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-light text-center">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Categoría</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($error)): ?>
                    <tr>
                        <td colspan="8">
                            <div class="alert alert-danger">
                                <?= $error ?>
                            </div>
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($productos as $producto): ?>
                        <?php if ($producto['activo'] !== 'no'): ?>
                            <tr>
                                <td>
                                    <?= $producto['id_producto'] ?>
                                </td>
                                <td>
                                    <img src="<?= base_url('uploads/' . $producto['url_imagen']) ?>" alt="Imagen del producto"
                                        class="img-fluid" style="max-width: 100px;">
                                </td>
                                <td>
                                    <?= $producto['nombre'] ?>
                                </td>
                                <td>
                                    <?= $producto['descripcion'] ?>
                                </td>
                                <td>
                                    <?php
                                    // Obtener la categoría del producto
                                    $categoriaModel = new \App\Models\CategoriaModel();
                                    $categoria = $categoriaModel->find($producto['id_categoria']);
                                    if ($categoria && isset($categoria['nombre'])) {
                                        echo $categoria['nombre'];
                                    } else {
                                        echo 'Sin categoría';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?= $producto['precio'] ?>
                                </td>
                                <td>
                                    <?= $producto['cantidad'] ?>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="<?= base_url('editar/' . $producto['id_producto']); ?>" class="btn btn-success"
                                            type="button">Editar</a>
                                        <a href="<?= site_url('/dardebajaProducto/' . $producto['id_producto']) ?>"
                                            class="btn btn-danger">Dar de baja</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>