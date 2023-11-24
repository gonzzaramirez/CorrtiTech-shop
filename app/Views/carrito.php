<?php $titulo = "Carrito"; ?>
<?php require('headerIngresado.php') ?>

<section class="carrito">
    <div class="container">
        <?php if (session()->has('mensaje')): ?>
            <div class="alert text-center alert-danger">
                <?= session('mensaje') ?>
            </div>
        <?php endif; ?>

        <div class="row">
            <h1 class="titulo text-center">Carrito de compras</h1>
        </div>
        <?php if (!empty($productos)): ?>
            <div class="row mt-4">
                <div class="col-lg-12">
                    <table class="table">
                        <thead class="text-uppercase">
                            <tr>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Subtotal</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($productos as $producto): ?>
                                <tr>
                                    <td>
                                        <?= esc($producto['nombre']) ?>
                                    </td>
                                    <td>$
                                        <?= esc($producto['precio']) ?>
                                    </td>
                                    <td>
                                        <?= esc($producto['cantidad']) ?>

                                        <a href="<?= base_url('carrito/disminuir/' . $producto['id_producto']) ?>"
                                            class="btn btn-sm btn-secondary">-</a>
                                        <a href="<?= base_url('carrito/aumentar/' . $producto['id_producto']) ?>"
                                            class="btn btn-sm btn-secondary">+</a>

                                    </td>
                                    <td>$
                                        <?= esc($producto['subtotal']) ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('carrito/eliminar/' . $producto['id_producto']) ?>"
                                            class="btn btn-danger btn-sm">Eliminar</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>

                                <td colspan="3"></td>
                                <td>Total:</td>
                                <td>$
                                    <?= esc($total) ?>
                                </td>

                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        <?php else: ?>
            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="alert  text-center alert-secondary" role="alert">
                        No hay productos en el carrito.
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="row mt-4 mb-5 text-center">
            <div class="col-lg-12 text-center">
                <a href="<?= base_url('catalogoIngresado') ?>" class="btn btn-secondary">Seguir comprando</a>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal">Confirmar
                    compra</button>


                <a href="<?= base_url('carrito/vaciar') ?>" class="btn btn-danger">Vaciar carrito</a>
            </div>
        </div>
    </div>
</section>


<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¡Atención!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p class="text-center">¿Estás seguro que desea confirmar la compra?</p>
                <a href=" <?= base_url('carrito/checkout') ?>" class="btn btn-success">Confirmar compra</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>

        </div>
    </div>
</div>
<?php require('footerIngresado.php') ?>