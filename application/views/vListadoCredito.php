<html>
    <head>
        <? echo $head; ?>
        <meta charset="UTF-8">
        <title>
            credeasy
        </title>
        <script>
           $(document).ready(function () {
                $('#btnguardar').click(function () {
                    var url = "<? echo base_url('Principal/consulta_listado') ?>";

                    var resultado = $('#txtconsulta').val();
                    //console.log(id);
                    var html = "";

                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: "resultado=" + resultado,
                        dataType: "json",
                        success: function (data) {
                            console.log(data);
                            //var json = JSON.parse(data);
                            var longitud = data.length;

                            html += "<tr>";
                            html += "<th>Numero Documento<th>";
                            html += "<th>Primer Nombre<th>";
                            html += "<th>Primer Apellido<th>";
                            html += "<th>Ciudad<th>";
                            html += "<th>Telefono<th>";
                            html += "<th>Direccion<th>";
                            html += "<th>Correo<th>";
                            html += "<th>Celular<th>";
                            html += "<th>Empresa<th>";
//                            html += "<th>Dir Empresa<th>";
//                            html += "<th>Tel Empresa<th>";
                            html += "</tr>";

                            for ( var cliente = 0; cliente < longitud; cliente ++ ) {
                                html += "<tr>";
                                html += "<th>" + data[cliente].CedulaCliente + "<th>";
                                html += "<th>" + data[cliente].PrimerNombre + "<th>";
                                html += "<th>" + data[cliente].PrimerApellido + "<th>";
                                html += "<th>" + data[cliente].CiudadDomicilio + "<th>";
                                html += "<th>" + data[cliente].TelefonoDomicilio + "<th>";
                                html += "<th>" + data[cliente].DireccionDomicilio + "<th>";
                                html += "<th>" + data[cliente].Correo + "<th>";
                                html += "<th>" + data[cliente].Celular + "<th>";
                                html += "<th>" + data[cliente].Empresa + "<th>";
//                                html += "<th>" + data[cliente].DireccionEmpresa + "<th>";
//                                html += "<th>" + data[cliente].TelefonoEmpresa + "<th>";
                                html += "</tr>";

                            }

//                            html += "<tr>";
//                            html += "<th>" + data[0].CedulaCliente + "<th>";
//                            html += "<th>" + data[0].PrimerNombre + "<th>";
//                            html += "<th>" + data[0].PrimerApellido + "<th>";
//                            html += "<th>" + data[0].CiudadDomicilio + "<th>";
//                            html += "<th>" + data[0].TelefonoDomicilio + "<th>";
//                            html += "<th>" + data[0].DireccionDomicilio + "<th>";
//                            html += "<th>" + data[0].Correo + "<th>";
//                            html += "<th>" + data[0].Celular + "<th>";
//                            html += "<th>" + data[0].Empresa + "<th>";
//                            html += "<th>" + data[0].DireccionEmpresa + "<th>";
//                            html += "<th>" + data[0].TelefonoEmpresa + "<th>";
//                            html += "</tr>";




                            $("#resultado").html(html);

                        }
                    });
                    return false;
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
                            <h1>LISTADO DE CLIENTES</h1>  
                        </div> 

                        <div class="col-xs-12 col-sm-3">
                            <div class="form-group">
                                <h2><a href="<? echo base_url(); ?>Principal/index">Regresar</a></h2>
                                <label for="txtconsulta">Dato de busqueda</label>
                                <input id="txtconsulta" name="txtconsulta" type="text" class="form-control"/>              
                            </div>
                        </div>



                        <div class="col-xs-12 col-sm-4"> 
                            <br/><br/><br/><br/>
                            <button  id="btnguardar" type="button" class="btn btn-danger btn-lg ">Consultar</button> 
                        </div>

                        <table class="table table-striped table-condensed" id="resultado">

                        </table>

                        <div class="col-xs-12 col-sm-4">                      
                            <h6><? echo validation_errors() ?></h6>
                        </div>

                        <div class="col-xs-12">


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
