<?php $titulo = "AgregarCategorias"; ?>
<?php require('headerADMIN.php') ?>

<div class="container">
    <h1 class="text-center">Sección para agregar Categorias</h1>
    <div class="card mx-auto" style="max-width: 70%;">
        <div class="card-body">
            <h5 class="card-title">Ingresar los datos de la categoria</h5>
            <form action="<?= base_url('agregarCategorias') ?>" method="post" enctype="multipart/form-data">
                <div class="">
                    <label for=" nombre" class="form-label">Nombre:</label>
                    <input id="nombre" value="<?= old('nombre') ?>" class="form-control" type="text" name="nombre">
                </div>
                <div class="">
                    <label for="descripcion" class="form-label">Descripción:</label>
                    <input id="descripcion" value="<?= old('descripcion') ?>" class="form-control" type="text" name="descripcion">
                </div>
                <div class="mt-2">
                    <button class="btn btn-success me-md-2 mb-2" type="submit">Guardar</button>
                    <a href="<?= base_url('listarCategorias') ?>" class="btn btn-danger mb-2">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>