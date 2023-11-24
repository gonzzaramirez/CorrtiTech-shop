<?php $titulo = "Editarcateogorias"; ?>
<?php require('headerADMIN.php') ?>

<div class="container ">
    <h1 class="text-center">Sección para editar Categorias</h1>
    <div class="card mx-auto" style="max-width: 70%;">
        <div class="card-body">
            <h5 class="card-title">Ingresar Datos de la categoria:</h5>
            <form method="post" action="<?= site_url('/actualizarCategorias') ?>" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?= $categoria['id_categoria'] ?>">
                <div class="">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input id="nombre" value="<?= $categoria['nombre'] ?>" class="form-control" type="text" name="nombre">
                </div>

                <div class="">
                    <label for="descripcion" class="form-label">Descripción:</label>
                    <input id="descripcion" value="<?= $categoria['descripcion'] ?>" class="form-control" type="text" name="descripcion">
                </div>

                <div>
                    <button class="btn btn-success" type="submit">Guardar</button>
                    <a href="<?= base_url('listarCategorias') ?>" class="btn btn-danger ">Cancelar</a>
                </div>

            </form>
        </div>
    </div>
</div>