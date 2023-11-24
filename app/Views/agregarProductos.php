<?php $titulo = "AgregarProductos"; ?>
<?php require('headerADMIN.php') ?>
<div class="container">
    <h1 class="text-center">Sección para agregar productos</h1>
    <div class="card mx-auto" style="max-width: 70%;">
        <div class="card-body">
            <h5 class="card-title">Ingresar los datos del producto</h5>
            <form action="<?= base_url('agregarProducto') ?>" method="post" enctype="multipart/form-data">
                <div class="">
                    <label for=" nombre" class="form-label">Nombre:</label>
                    <input id="nombre" value="<?= old('nombre') ?>" class="form-control" type="text" name="nombre">
                </div>
                <div class="">
                    <label for="descripcion" class="form-label">Descripción:</label>
                    <input id="descripcion" value="<?= old('descripcion') ?>" class="form-control" type="text"
                        name="descripcion">
                </div>
                <div class="">
                    <label for="precio" class="form-label">Precio:</label>
                    <input id="precio" value="<?= old('precio') ?>" class="form-control" type="number" name="precio"
                        min="0">
                </div>
                <div class="">
                    <label for="cantidad" class="form-label">Cantidad:</label>
                    <input id="cantidad" value="<?= old('cantidad') ?>" class="form-control" type="number"
                        name="cantidad" min="0">
                </div>
                <div class="">
                    <label for="categoria" class="form-label">Categoría:</label>
                    <select id="categoria" name="categoria" class="form-control">
                        <?php foreach ($categorias as $categoria): ?>
                            <option value="<?= $categoria['id_categoria'] ?>"><?= $categoria['nombre'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="">
                    <label for="imagen" class="form-label mt-3 mb-3">Imagen:</label>
                    <input id="imagen" class="form-control-file" type="file" name="imagen">
                </div>

                <button class="btn btn-success me-md-2 mb-2" type="submit">Guardar</button>
                <a href="<?= base_url('listarProductos') ?>" class="btn btn-danger mb-2">Cancelar</a>

            </form>
        </div>
    </div>
</div>