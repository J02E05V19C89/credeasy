<html>
    <head>
        <? echo $head; ?>
        <meta charset="UTF-8">
        <title>
            credeasy
        </title>
    </head>
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
                            echo form_open(base_url() . "Principal/reg_mod_clientes")
                            ?>

                            <div class="clearfix"></div>    
                            <div id="logo" class="col-xs-12 col-sm-6">                       
                                <h1>MODULO CLIENTES </h1>                        
                            </div> 

                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="txtcedula">Cedula Cliente</label>
                                    <input id="txtcedula" name="txtcedula" type="text" class="form-control" value="<? echo set_value('txtcedula', '') ?> "/>              
                                </div>
                            </div>                    


                            <div class="col-xs-12 col-sm-6">  
                                <div class="form-group">
                                    <label for="txtpnombre">Primer Nombre</label>
                                    <input id="txtpnombre" name="txtpnombre" type="text" class="form-control " value="<? echo set_value('txtpnombre', '') ?>"/>              
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6">  
                                <div class="form-group">
                                    <label for="txtsnombre">Segundo Nombre</label>
                                    <input id="txtsnombre" name="txtsnombre"type="text" class="form-control">              
                                </div>

                            </div>

                            <div class="col-xs-12 col-sm-6">  
                                <div class="form-group">
                                    <label for="txtpapellido">Primer Apellido</label>
                                    <input idpapellido="txtpapellido" name="txtpapellido"type="text" class="form-control"value="<? echo set_value('txtpapellido', '') ?>"/>              
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6">  
                                <div class="form-group">
                                    <label for="txtsapellido">Segundo Apellido</label>
                                    <input id="txtsapellido" name="txtsapellido" type="text" class="form-control">              
                                </div>

                            </div>

                            <div class="col-xs-12 col-sm-4">  
                                <div class="form-group">
                                    <label for="txtciudad">Ciudad</label>
                                    <input id="txtciudad" name="txtciudad" type="text" class="form-control"value="<? echo set_value('txtciudad', '') ?>"/>              
                                </div>

                            </div>

                            <div class="col-xs-12 col-sm-5">  
                                <div class="form-group">
                                    <label for="txtdireccion">Direccion</label>
                                    <input id="txtdireccion" name="txtdireccion"type="text" class="form-control"value="<? echo set_value('txtdireccion', '') ?>"/>              
                                </div>    

                            </div>

                            <div class="col-xs-12 col-sm-3">  
                                <div class="form-group">
                                    <label for="txttelefono">Telefono fijo</label>
                                    <input id="txttelefono" name="txttelefono" type="text" class="form-control"value="<? echo set_value('txttelefono', '') ?>"/>              
                                </div>    

                            </div>   


                            <div class="col-xs-12 col-sm-3">  
                                <div class="form-group">
                                    <label for="txtcelular">Celular</label>
                                    <input id="txtcelular" name="txtcelular" type="text" class="form-control"value="<? echo set_value('txtcelular', '') ?>"/>              
                                </div>
                            </div>  


                            <div class="col-xs-12 col-sm-5">  
                                <div class="form-group">
                                    <label for="txtcorreo">Correo Electronico</label>
                                    <input id="txtcorreo" name="txtcorreo" type="text" class="form-control" value="<? echo set_value('txtcorreo', '') ?>"/>            
                                </div>
                            </div>  


                            <div class="col-xs-12 col-sm-4">  
                                <div class="form-group">
                                    <label for="txtempresa">Empresa</label>
                                    <input id="txtempresa" name="txtempresa" type="text" class="form-control">              
                                </div>
                            </div> 


                            <div class="col-xs-12 col-sm-6">  
                                <div class="form-group">
                                    <label for="txtDempresa">Direccion Empresa</label>
                                    <input id="txtDempresa" name="txtDempresa" type="text" class="form-control">              
                                </div>
                            </div> 

                            <div class="col-xs-12 col-sm-6">  
                                <div class="form-group">
                                    <label for="txtTelEmpresa">Telefono empresa</label>
                                    <input id="txtTelEmpresa" name="txtTelEmpresa"type="text" class="form-control">              
                                </div>
                            </div>  


                            <div class="col-xs-12 col-sm-4">  
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
