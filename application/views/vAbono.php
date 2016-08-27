<html>
    <head>
        <? echo $head; ?>
        <meta charset="UTF-8">
        <title>
            credeasy
        </title>
        <script>
            $(function () {

                $('#txtcliente').blur(function () {
                    var url = "<? echo base_url('Principal/totalAbonos') ?>";
                    var url2 = "<? echo base_url('Principal/totalAbonos2') ?>";
                    var url3 = "<? echo base_url('Principal/buscarCliente') ?>";
                    var tcre;
                    var taba;
                    var resultado;

                    var id = $('#txtcliente').val();
                    //console.log(id);

                    $.ajax({
                        type: 'POST',
                        url: url3,
                        data: "id=" + id,
                        dataType: "json",
                        success: function (data) {
                            //console.log(data);
                            $('#txtnombre').val("");
                            $('#txtnombre').val(data[0].PrimerNombre + " " + data[0].SegundoNombre + " " + data[0].PrimerApellido + " " + data[0].SegundoApellido);
                        }
                    });


                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: "id=" + id,
                        dataType: "json",
                        success: function (credito) {
                            //console.log(credito);
                            //$('#txtnombre').val("");                          
                            tcre = (credito[0].tcredito);
                            //console.log(tcre);

                        }

                    });
                    $.ajax({
                        type: 'POST',
                        url: url2,
                        data: "id=" + id,
                        dataType: "json",
                        success: function (abonos) {
                            // console.log(abonos);
                            //$('#txtnombre').val("");                         
                            taba = (abonos[0].tabonos);
                            resultado = parseInt(tcre) - parseInt(taba);
                            //console.log(resultado);                           
                            $('#txtsaldo').val(resultado);

                        }


                    });
                    return false;
                });

                $("#nuevo").on("click", function () {
                    $.get("<? echo base_url('Principal/buscarNAbono') ?>", function (data) {
                        //console.log(data);
                        var json = JSON.parse(data);
                        //console.log(json);
                        //var js;
                        var html = "";
                        for (ncredito in json) {
                            //console.log(json[tipo_credito]);                        
                            html = json[ncredito].resultado;
                        }

                        $("#txtnumcredito").val(html);
                        $('#btnguardar').removeAttr('disabled');
                        $('#btnrestablecer').removeAttr('disabled');
                        $('#txtobservacion').removeAttr('disabled');
                        $('#txtvalor').removeAttr('disabled');
                        $('#txtcliente').removeAttr('disabled');
                        $('#cbotipoproducto').removeAttr('disabled');
                        $('#cbotipocredito').removeAttr('disabled');
                        $('#nuevo').attr('disabled', 'disabled');

                    });
                });

            });


        </script>

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
                        //echo $contenido;
                        echo form_open(base_url() . "Principal/reg_mod_abonos")
                        ?>

                        <div class="clearfix"></div>    
                        <div id="logo" class="col-xs-12 col-sm-6">                       
                            <h1>ABONOS</h1>                        
                        </div>

                        <div class="col-xs-12 col-sm-6">  
                            <div class="form-group">
                                <label for="txtfecha">Fecha</label>
                                <input id="txtfecha" name="txtfecha" type="text" class="form-control "  disabled="disabled"  value="<?php echo date('Y-m-d'); ?>"/>              
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-3">
                            <div class="form-group">
                                <label for="txtnumcredito">Numero Credito</label>
                                <input id="txtnumcredito" name="txtnumcredito" type="text" class="form-control" disabled="disabled" />              
                            </div>
                        </div> 

                        <div class="col-xs-12 col-sm-3">  
                            <div class="form-group">
                                <label for="txtcliente">TI Cliente</label>
                                <input id="txtcliente" name="txtcliente" type="text" class="form-control" />              
                            </div>
                        </div>



                        <div class="col-xs-12 col-sm-6">  
                            <div class="form-group">
                                <label for="txtnombre">Nombre</label>
                                <input id="txtnombre" name="txtnombre" type="text" class="form-control" disabled="disabled">              
                            </div>
                        </div>   

                        <div class="col-xs-11 col-sm-3">  
                            <div class="form-group">
                                <label for="txtsaldo">Saldo Actual</label>
                                <input id="txtsaldo" name="txtsaldo" type="text" class="form-control" disabled="disabled">              
                            </div>
                        </div> 


                        <div class="col-xs-12 col-sm-3">  
                            <div class="form-group">
                                <label for="txtvalor">Valor Abono</label>
                                <input id="txtvalor" name="txtvalor" type="text" class="form-control">              
                            </div>
                        </div>   




                        <div class="col-xs-12 col-sm-12">  
                            <div class="form-group">
                                <label for="txtobservacion">Observaciones</label>
                                <textarea id="txtobservacion" name="txtobservacion" class="form-control"></textarea>          
                            </div>
                        </div>                     




                        <div class="col-xs-12 col-sm-12">  
                            <button type="button" id="nuevo" class="btn btn-danger btn-lg ">Nuevo</button>                                                    
                            <button  id="btnguardar" type="submit"class="btn btn-danger btn-lg " disabled="disabled">Guardar"</button> 
                            <button id="btnrestablecer" type="reset" class="btn btn-danger btn-lg " disabled="disabled">Restablecer"</button>                                             

                        </div>


                        <div class="col-xs-12">  

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


