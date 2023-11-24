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


        <a href="<?php echo base_url("listar"); ?>" class=" mt-2 mb-2 btn btn-dark " type="button">Visualizar
            usuarios dados de alta</a>


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
                <?php foreach ($usuario as $usuarios): ?>
                    <?php if ($usuarios['baja'] === 'si'): ?>
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
                                <a href="<?= site_url('/dardealta/' . $usuarios['id']) ?>" class="btn btn-success"
                                    type="button">Dar de alta</a>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>