<?php $titulo = "ListaConsulta"; ?>

<?php require('headerADMIN.php') ?>
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success text-center">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>
<!-- Tabla de mensajes no leídos -->
<div class="container">

    <div class="table-responsive">
        <table class="table table-light text-center">
            <thead class="thead-light">
                <tr>
                    <th>#ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Asunto</th>
                    <th>Mensaje</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                    <?php if ($usuario['visto'] !== 'si'): ?>
                        <tr>
                            <td>
                                <?= $usuario['id']; ?>
                            </td>
                            <td>
                                <?= $usuario['usuario']['nombre']; ?>
                            </td>
                            <td>
                                <?= $usuario['usuario']['apellido']; ?>
                            </td>
                            <td>
                                <?= $usuario['usuario']['email']; ?>
                            </td>
                            <td>
                                <?= $usuario['asunto']; ?>
                            </td>
                            <td>
                                <?= $usuario['mensaje']; ?>
                            </td>
                            <td>
                                <a href="<?= site_url('/leido/' . $usuario['id']) ?>" class="btn btn-primary"
                                    type="button">Marcar como leído</a>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>

    <h3 class="text-center pb-4 pt-4">¡Mensajes ya leídos!</h3>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-secondary text-center">
                <thead class="thead-light">
                    <tr>
                        <th>#ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Asunto</th>
                        <th>Mensaje</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario): ?>
                        <?php if ($usuario['visto'] === 'si'): ?>
                            <tr>
                                <td>
                                    <?= $usuario['id']; ?>
                                </td>
                                <td>
                                    <?= $usuario['usuario']['nombre']; ?>
                                </td>
                                <td>
                                    <?= $usuario['usuario']['apellido']; ?>
                                </td>
                                <td>
                                    <?= $usuario['usuario']['email']; ?>
                                </td>
                                <td>
                                    <?= $usuario['asunto']; ?>
                                </td>
                                <td>
                                    <?= $usuario['mensaje']; ?>
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