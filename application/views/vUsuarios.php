<html>
    <head>
        <? echo $head; ?>
        <meta charset="UTF-8">
        <title>
            credeasy
        </title>
    </head>
    <body>
        <? if ($this->session->userdata('correo')) { ?>
            <header id="header" class="main-header">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <?
                            echo $titulo;
                            ?>
                        </div>
                    </div>
                </div>
            </header>

            <div id="mod_clientes">
                <div class="container">
                    <div class="row">

                        <?
                        echo $contenido;
                        echo form_open(base_url() . "Principal/reg_mod_usuarios")
                        ?>

                        <div class="clearfix"></div>    
                        <div id="logo" class="col-xs-12 col-sm-6">                       
                            <h1>MODULO USUARIOS </h1>                        
                        </div> 

                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="txtidusuario">Id Usuarios</label>
                                <input id="txtidusuario" name="txtidusuario" type="text" class="form-control"/>              
                            </div>
                        </div>                    


                        <div class="col-xs-12 col-sm-6">  
                            <div class="form-group">
                                <label for="txtnombre">Nombre</label>
                                <input id="txtnombre" name="txtnombre" type="text" class="form-control " />              
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6">  
                            <div class="form-group">
                                <label for="txtcorreo">Correo electronico</label>
                                <input id="txtsnombre" name="txtcorreo"type="text" class="form-control">              
                            </div>

                        </div>

                        <div class="col-xs-12 col-sm-6">  
                            <div class="form-group">
                                <label for="txtcontrasena1">Contrasena</label>
                                <input idpapellido="txtcontrasena1" name="txtcontrasena1" type="password" class="form-control"/>              
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6">  
                            <div class="form-group">
                                <label for="txtcontrasena2">Confirme su contrasena</label>
                                <input idpapellido="txtcontrasena2" name="txtcontrasena2" type="password" class="form-control"/>              
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-4">  
                            <div class="form-group">
                                <label for="txtcelular">Telefono celular</label>
                                <input id="txtcelular" name="txtcelular" type="text" class="form-control"value=""/>              
                            </div>                     
                        </div>



                        <div class="col-xs-12 col-sm-12">  
                            <button  type="submit"class="btn btn-danger btn-lg ">Guardar"</button> 
                            <button type="reset" class="btn btn-danger btn-lg ">Restablecer"</button>                       

                        </div>

                        <div class="col-xs-12 col-sm-4">                      
                            <h6><? echo validation_errors() ?></h6>
                        </div>

                        <div class="col-xs-12">
                            <h2><a href="<? echo base_url(); ?>Principal/index">Regresar</a></h2>
                        </div>



                    </div>

                </div>
            </div>

            <div id="separador">

            </div>


            <footer>

            </footer>

        <? } else { ?>
            <? header("Location: " . base_url('Login')) ?>
        <? } ?>    

    </body>
</html>
