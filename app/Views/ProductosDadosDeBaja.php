<?php $titulo = "ProductosBaja"; ?>

<?php require('headerADMIN.php') ?>
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success text-center">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>




<section class="listar">
    <div class="container">


        <div class="row">
            <div class="col">
                <a href="<?php echo base_url("listarProductos"); ?>" class="mt-2 mb-2 btn btn-dark float-end"
                    type="button">Ver productos dados de alta</a>
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
                        <?php foreach ($productos as $producto): ?>
                            <?php if ($producto['activo'] === 'no'): ?>
                                <tr>
                                    <td>
                                        <?= $producto['id_producto'] ?>
                                    </td>
                                    <td>
                                        <img src="<?= base_url('uploads/' . $producto['url_imagen']) ?>"
                                            alt="Imagen del producto" class="img-fluid" style="max-width: 100px;">
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
                                        <!-- Aquí está el botón de editar -->
                                        <a href="<?= base_url('editar/' . $producto['id_producto']); ?>" class="btn btn-success"
                                            type="button">Editar</a>


                                        <!-- Agrega aquí el botón de eliminar -->
                                        <a href=" <?= site_url('/dardealtaProducto/' . $producto['id_producto']) ?>"
                                            class="btn btn-success">Dar de alta</a>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>