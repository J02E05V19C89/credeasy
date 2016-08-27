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
                    $.get("<? echo base_url('Principal/buscarConsecutivo') ?>", function (data) {
                        //console.log(data);
                        var json = JSON.parse(data);
                        //console.log(json);
                        //var js;
                        var html = "";
                        for (tipo_credito in json) {
                            console.log(json[tipo_credito]);                        
                            html = json[tipo_credito].resultado;
                        }

                        $("#txtcredito").val(html);
                        $('#guardar').removeAttr('disabled');
                        $('#restablecer').removeAttr('disabled');
                        $('#txtdescripcion').removeAttr('disabled');
                        $('#nuevo').attr('disabled', 'disabled');

                    });
                });

            });
        </script>
    </head>
    <? if ($this->session->userdata('correo')) { ?>
    <body>
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
                    <div class="clearfix"></div>    
                    <div id="logo" class="col-xs-12 col-sm-12">                       
                        <h1>MODULO TIPO CREDITO</h1>                      

                    </div> 
                    <?
                    echo $contenido;
                    echo form_open(base_url() . "Principal/reg_mod_tipocredito")
                    ?>

                    <div class="col-xs-12 col-sm-3">
                        <div class="form-group">
                            <label for="txtcredito">Codigo credito</label>
                            <input id="txtcredito" name="txtcredito" type="text" class="form-control"disabled="disabled"/>              
                        </div>
                    </div>                    


                    <div class="col-xs-12 col-sm-9">  
                        <div class="form-group">
                            <label for="txtdescripcion">Descripcion</label>
                            <input id="txtdescripcion" name="txtdescripcion" type="text" class="form-control" disabled="disabled" />              
                        </div>
                    </div>                    


                    <div class="col-xs-12 col-sm-4">  
                        <button type="button" id="nuevo" class="btn btn-danger btn-lg ">Nuevo</button>                          
                        <button id="guardar" type="submit"class="btn btn-danger btn-lg " disabled="disabled" >Guardar</button> 
                        <button id="restablecer"type="reset" class="btn btn-danger btn-lg "disabled="disabled">Restablecer"</button>                       
                        


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
        <div id="content"></div>

        <div id="separador">

        </div>


        <footer>

        </footer>

          <? } else { ?>
            <? header("Location: " . base_url('Login')) ?>
        <? } ?>    




    </body>
</html>
