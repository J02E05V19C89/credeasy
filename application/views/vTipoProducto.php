<html>
    <head>
        <? echo $head; ?>
        <meta charset="UTF-8">
        <title>
            credeasy
        </title>
        <script>
            $(document).ready(function ()
            {
                $("#nuevo").on("click", function () {
                    $.get("<? echo base_url('Principal/buscarProducto') ?>", function (data) {
                        //console.log(data);
                        var json = JSON.parse(data);
                        console.log(json);
                        //ar js;
                        var html = "";
                        for (productos in json) {
                            //console.log(json[productos]);                        
                            html = json[productos].resultado;
                        }

                        $("#txtproducto").val(html);
                        $('#guardar').removeAttr('disabled');
                        $('#restablecer').removeAttr('disabled');
                        $('#txtdescripcion').removeAttr('disabled');
                        $('#nuevo').attr('disabled', 'disabled');

                        //console.log(data);


                    });
                });

            });

        </script>
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
                        echo form_open(base_url() . "Principal/reg_mod_tipoproducto")
                        ?>

                        <div class="clearfix"></div>    
                        <div id="logo" class="col-xs-12 col-sm-12">                       
                            <h1>MODULO TIPO CREDITO </h1>                        
                        </div> 

                        <div class="col-xs-12 col-sm-3">
                            <div class="form-group">
                                <label for="txtproducto">Codigo de Producto</label>
                                <input id="txtproducto" name="txtproducto" type="text" class="form-control"disabled="disabled"/>              
                            </div>
                        </div>                    


                        <div class="col-xs-12 col-sm-9">  
                            <div class="form-group">
                                <label for="txtdescripcion">Descripcion</label>
                                <input id="txtdescripcion" name="txtdescripcion" type="text" class="form-control " disabled="disabled"/>              
                            </div>
                        </div>                    


                        <div class="col-xs-12 col-sm-4">  
                            <button id="guardar" type="submit"class="btn btn-danger btn-lg " disabled="disabled" >Guardar</button> 
                            <button id="restablecer"type="reset" class="btn btn-danger btn-lg "disabled="disabled">Restablecer"</button>                       
                            <button type="button" id="nuevo" class="btn btn-danger btn-lg ">Nuevo</button> 

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
