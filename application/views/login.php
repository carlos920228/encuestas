<section>
<div class="container">
    <div class="row justify-content-center m-4 p-5">
        <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="<?php echo base_url() ?>evaluacion/login" name="frmLogin" id="frmLogin" method="POST" accept-charset="utf-8">
                    <div class="form-group text-center">
                    <img src="<?php echo base_url() ?>image/IUVcolorr.png">
                    </div>

                    <div class="form-group">
                    <label>Usuario:</label>
                    <input type="text" name="correo" class="form-control">
                    </div>

                    <div class="form-group">
                    <label>Contraseña:</label>
                    <input type="password" name="contraseña" class="form-control">
                    </div>

                    <div class="form-group">
                    <?php if($this->session->flashdata('error')){?>
                    <div class="alert alert-danger" role="alert" id="alertMsg"><?php echo $this->session->flashdata('error')?></div>
                    <?php } ?>
                    </div>

                    <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                    </div>

                    <div class="form-group">

                    </div>
                    </form>	
                </div>
            </div>
        </div>
    </div>
</div>
</section>