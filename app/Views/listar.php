<?php $titulo = "ListaUsuarios"; ?>

<?php require('headerADMIN.php') ?>
<section class="listar">
    <div class="container">
        <!-- Mostrar mensaje de sesión -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success text-center">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-6">

                <a href="<?php echo base_url("bajausuarios"); ?>" class=" mt-2 mb-2 btn btn-dark "
                    type="button">Visualizar
                    usuarios dados de baja</a>
            </div>
            <div class="col-6 mt-2">
                <form action="<?= base_url('listar') ?>" method="post" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="busqueda" class="form-control" placeholder="Buscar nombre usuario">
                        <button type="submit" class="btn btn-dark">Buscar</button>
                        <?php if (isset($_POST['busqueda'])): ?>
                            <a href="<?php echo base_url("/listar"); ?>" class="btn btn-outline-dark">
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
        </div>

        <table class="table table-light text-center">
            <thead class="thead-light">
                <tr>
                    <th>#ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Usuario</th>
                    <th>ROL</th>
                    <th>Accion</th>
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
                    <?php foreach ($usuario as $usuarios): ?>
                        <?php if ($usuarios['baja'] !== 'si'): ?>
                            <tr>
                                <td>
                                    <?= $usuarios['id']; ?>
                                </td>
                                <td>
                                    <?= $usuarios['nombre']; ?>
                                </td>
                                <td>
                                    <?= $usuarios['apellido']; ?>
                                </td>
                                <td>
                                    <?= $usuarios['email']; ?>
                                </td>
                                <td>
                                    <?= $usuarios['usuario']; ?>
                                </td>
                                <td>
                                    <?php
                                    if ($usuarios['perfil_id'] == 1) {
                                        echo "admin";
                                    } elseif ($usuarios['perfil_id'] == 2) {
                                        echo "usuario";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="<?= site_url('/dardebaja/' . $usuarios['id']) ?>" class="btn btn-danger"
                                        type="button">Dar de baja</a>
                                    <a href="<?= site_url('/facturas/' . $usuarios['id']) ?>" class=" text-white btn btn-secondary"
                                        type="button">
                                        facturas</a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>