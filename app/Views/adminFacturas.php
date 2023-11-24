<?php $titulo = "Detalles de Facturas"; ?>
<?php require('headerADMIN.php') ?>

<div class="container pt-5">
    <a class=" mb-2 btn btn-success " href="<?= site_url('listar') ?>">Regresar</a>
    <?php if (empty($facturas)): ?>
        <p>No se encontraron facturas para este usuario.</p>
    <?php else: ?>
        <div class="accordion pb-3" id="facturasAccordion">
            <?php foreach ($facturas as $factura): ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading<?= $factura['id'] ?>">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse<?= $factura['id'] ?>" aria-expanded="false"
                            aria-controls="collapse<?= $factura['id'] ?>">
                            Factura ID: <?= $factura['id'] ?>
                        </button>
                    </h2>
                    <div id="collapse<?= $factura['id'] ?>" class="accordion-collapse collapse"
                        aria-labelledby="heading<?= $factura['id'] ?>" data-bs-parent="#facturasAccordion">
                        <div class="accordion-body">
                            <p class="card-text">Importe Total: $
                                <?= $factura['importe_total'] ?>
                            </p>
                            <p class="card-text">Fecha:
                                <?= date('Y-m-d', strtotime($factura['fecha'])) ?>
                            </p>
                            <h4 class="card-subtitle mb-2">Detalles de Factura:</h4>
                            <?php if (empty($factura['detalles'])): ?>
                                <p>No se encontraron detalles de factura para esta factura.</p>
                            <?php else: ?>
                                <table class="table table-light text-center">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                            <th>Precio Unitario</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($factura['detalles'] as $detalle): ?>
                                            <tr>
                                                <td>
                                                    <?= $detalle['producto']['nombre'] ?>
                                                </td>
                                                <td>
                                                    <?= $detalle['cantidad'] ?>
                                                </td>
                                                <td>$
                                                    <?= $detalle['producto']['precio'] ?>
                                                </td>
                                                <td>$
                                                    <?= $detalle['subtotal'] ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?php require('footer.php') ?>