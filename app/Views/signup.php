<?php $titulo = "Registro"; ?>

<?php require('header.php') ?>



<section class="signup">
    <div class="container text-center align-items-center">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <h2 class="text-center text-white text-uppercase ">Registrarse</h2>
                <?php if (isset($validation)) : ?>
                    <div class="alert alert-danger ">
                        <?= $validation->listErrors() ?>
                    </div>
                <?php endif; ?>
                <form action="<?php echo base_url(); ?>registro" method="post">
                    <div class="form-group mb-3">
                        <input type="text" name="nombre" placeholder="nombre" value="<?= set_value('nombre') ?>" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" name="apellido" placeholder="apellido" value="<?= set_value('apellido') ?>" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <input type="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" name="usuario" placeholder="usuario" value="<?= set_value('usuario') ?>" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="password" placeholder="Contraseña" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="confirmpassword" placeholder="Confirmar Contraseña" class="form-control">
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-dark">Registrarse</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



</section>
<?php require('footer.php') ?>