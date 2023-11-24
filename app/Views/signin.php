<?php $titulo = "Ingresar"; ?>

<?php require('header.php') ?>

<section class="ingresar">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 text-center">

                <h2 class="text-white text-uppercase">ingresar</h2>
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('msg')): ?>
                    <div class="alert alert-warning">
                        <?= session()->getFlashdata('msg') ?>
                    </div>
                <?php endif; ?>



                <form action="<?php echo base_url(); ?>/SigninController/loginAuth" method="post">
                    <div class="form-group mb-3">
                        <input type="text" name="usuario" placeholder="usuario" value="<?= set_value('usuario') ?>"
                            class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="password" placeholder="Contraseña" class="form-control">
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-dark">Ingresar</button>
                    </div>

                </form>
                <a href="<?php echo base_url("registro"); ?>" class="text-center text-white ">¿Aún no tienes cuenta?
                    Regístrate</a>
            </div>
        </div>

    </div>
</section>

<?php require('footer.php') ?>