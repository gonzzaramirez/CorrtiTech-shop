<?php $titulo = "ConfirmarPago"; ?>
<?php require('headerIngresado.php') ?>

<div class="container">
    <h1 class="mt-4 titulo text-center">Pago confirmado</h1>
    <p class="text-center">¡Gracias por tu compra! El pago se ha confirmado correctamente.</p>

    <!-- Mostrar el comprobante de pago -->
    <div class="card">
        <div class="card-header text-center">
            <h2>Comprobante de pago</h2>
        </div>
        <div class="card-body">
            <?php if (isset($factura['id'])): ?>
                <p>Número de Factura:
                    <?= $factura['id'] ?>
                </p>
            <?php endif; ?>

            <?php if (isset($factura['usuario'])): ?>
                <p>Usuario:
                    <?= $factura['usuario'] ?>
                </p>
            <?php endif; ?>

            <!-- Detalles de la factura -->
            <h3>Detalles de la factura</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Subtotal</th>
                        <th>Fecha de Compra</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($detalles as $detalle): ?>
                        <tr>
                            <td>
                                <?= $detalle['producto']->nombre ?>
                            </td>
                            <td>
                                <?= $detalle['cantidad'] ?>
                            </td>
                            <td>
                                $<?= $detalle['producto']->precio ?>
                            </td>
                            <td>
                               $<?= $detalle['subtotal'] ?>
                            </td>
                            <td>
                                <?= $factura['fecha'] ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-end">Total:</th>
                        <th>
                            
                            $<?= $factura['importe_total'] ?>
                        </th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
            <!-- Fin de detalles de la factura -->
        </div>
    </div>
</div>