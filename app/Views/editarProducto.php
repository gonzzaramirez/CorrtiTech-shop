<?php $titulo = "ListaProductos"; ?>
<?php require('headerADMIN.php') ?>

<div class="container ">
    <h1 class="text-center">Sección para editar productos</h1>
    <div class="card mx-auto" style="max-width: 70%;">
        <div class="card-body">
            <h5 class="card-title">Ingresar Datos del producto:</h5>
            <form method="post" action="<?= site_url('/actualizar') ?>" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?= $producto['id_producto'] ?>">
                <div class="">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input id="nombre" value="<?= $producto['nombre'] ?>" class="form-control" type="text" name="nombre">
                </div>

                <div class="">
                    <label for="descripcion" class="form-label">Descripción:</label>
                    <input id="descripcion" value="<?= $producto['descripcion'] ?>" class="form-control" type="text" name="descripcion">
                </div>

                <div class="">
                    <label for="precio" class="form-label">Precio:</label>
                    <input id="precio" value="<?= $producto['precio'] ?>" class="form-control" type="text" name="precio">
                </div>

                <div class="">
                    <label for="cantidad" class="form-label">Cantidad:</label>
                    <input id="cantidad" value="<?= $producto['cantidad'] ?>" class="form-control" type="number" name="cantidad">
                </div>

                <div class="">
                    <label for="categoria" class="form-label">Categoría:</label>
                    <select id="categoria" name="categoria" class="form-control">
                        <?php
                        foreach ($categorias as $categoria) : ?>
                            <?php if ($categoria['id_categoria'] == $producto['id_categoria']) { ?>
                                <option value="<?= $categoria['id_categoria'] ?>" selected><?= $categoria['nombre'] ?></option>
                            <?php } else { ?>
                                <option value="<?= $categoria['id_categoria'] ?>"><?= $categoria['nombre'] ?></option>
                            <?php } ?>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mt-2">

                    <div class="text-center">
                        <img class="img-thumbnail mx-auto d-block " src="<?= base_url() ?>uploads/<?= $producto['url_imagen']; ?>" alt="thumbnail" style="max-width: 200px;">
                    </div>
                    <input id="imagen" class="form-control mt-2 mb-2" type="file" name="imagen">
                </div>

                <div>
                    <button class="btn btn-success" type="submit">Guardar</button>
                    <a href="<?= base_url('listarProductos') ?>" class="btn btn-danger ">Cancelar</a>
                </div>

            </form>
        </div>
    </div>
</div>