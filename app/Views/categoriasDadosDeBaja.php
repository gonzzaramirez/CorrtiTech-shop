<?php $titulo = "BajaCategorias"; ?>

<?php require('headerADMIN.php') ?>
<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success text-center">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>
<div class="container">
    <div class="row">

        <div class="col">
            <a class="btn btn-dark mt-2 mb-2 float-end" href="<?= base_url('listarCategorias') ?>">Ver categorias dadas de
                alta</a>
        </div>

        <div class="table-responsive">
            <table class="table table-light text-center">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categorias as $categoria) : ?>
                        <?php if ($categoria['activo'] === 'no') : ?>
                            <tr>
                                <td>
                                    <?= $categoria['id_categoria'] ?>
                                </td>

                                <td>
                                    <?= $categoria['nombre'] ?>
                                </td>
                                <td>
                                    <?= $categoria['descripcion'] ?>
                                </td>


                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="<?= base_url('editarCategorias/' . $categoria['id_categoria']); ?>" class="btn btn-success" type="button">Editar</a>
                                        <a href="<?= site_url('/dardealtaCategorias/' . $categoria['id_categoria']) ?>" class="btn btn-success ms-1">Dar de alta</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>