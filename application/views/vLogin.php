<html>
    <head>
        <meta charset="UTF-8">        
        <title>login credeasy</title> 
        <? echo $head; ?>       

    </head>
    <body>
        <? echo $this->session->userdata('correo') ?>
        <? if ($this->session->userdata('correo')) { ?>
            <? header("Location: " . base_url('Principal')) ?>
        <? } else { ?>
            <div class="container">           
                <div class="row">                  
                    <div class="wrap">    
                        <p class="form-title">Bienvenido a CREDEASY</p>
                        <form class="login" method="post" action="<?= base_url() ?>Login/iniciarSesion">

                            <input id="txtcorreo" name="txtcorreo" type="text" placeholder="correo" />
                            <input id="txtpassword" name="txtpassword" type="password" placeholder="Password" />
                            <input type="submit" value="Ingresar" class="btn btn-success btn-sm" />
                            <div class="remember-forgot">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" />
                                                RECORDAR
                                            </label>

                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div id="error">
                                <?
                                echo validation_errors();


                                if (!empty($mensajeValidacion)) {
                                    echo $mensajeValidacion;
                                }
                                ?>

                            </div>
                        </form>


                    </div>
                </div>
            </div>

        <? } ?>
    </body>
</html>
