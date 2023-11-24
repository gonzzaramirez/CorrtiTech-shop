
<?php $titulo = "Consulta"; ?>
<?php require('headerIngresado.php') ?>
<section class="contacto" id="contacto">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-6">
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success text-center ">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="row  pb-5">
            <div class="col-sm-12 col-md-12 col-lg-6 parte-mapa">
                <h4 class=" text-white">Contacta con nosotros de manera presencial</h4>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1770.036406958938!2d-58.83077997852152!3d-27.466992410120174!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456ca6d24ec0c9%3A0xb92ce3fedb0d7729!2sFacultad%20de%20Ciencias%20Exactas%20y%20Naturales%20y%20Agrimensura!5e0!3m2!1ses-419!2sar!4v1681742649087!5m2!1ses-419!2sar"
                    width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="contact-group">
                    <div class="address text-white">
                        <p>9 de julio 1449, Corrientes Argentina.
                            <br>Titular: Ramirez Gonzalo Daniel
                            <br> CorriTech SRL.
                        </p>

                    </div>
                    <div class="phone-email text-white">
                        <div class="phone"><a href="https://wa.me/3775439981" class="" target="_blank">Whatsapp!</a>
                        </div>
                        <div class="email"><a href="mailto:gonza37754@gmail.com" class="">Mail!</a></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 parte-formulario pt-5">
                <h3 class="text-white text-uppercase text-center">Dejanos tu mensaje y nos pondremos en contacto contigo

                    <?php echo $session->get('nombre'); ?>
                </h3>
                <div id="alert-div"></div>
                <form action="<?php echo base_url('consulta/guardarConsulta'); ?>" method="post">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" name="asunto" class="form-control" placeholder="Asunto" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control" name="mensaje" placeholder="Mensaje" required></textarea>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <button type="submit" class="btn btn-secondary btn-block">Enviar</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>

<?php require('footerIngresado.php') ?>