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
            <div id="separador">
                <p><? echo "Usuario Conectado: " . $this->session->userdata['correo']; ?></p>
            </div>

            <div id="cuerpo">
                <div class="container" id="container-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">

                            <h1>Maestros</h1>
                            <table style="margin: auto;">
                                <tr>
                                    <td><a href="<? echo base_url(); ?>Principal/reg_mod_clientes"><button><img src ="<? echo base_url(); ?>assets/imgSis/clientes.jpg"/><br/>Clientes</button></a></td>
                                    <td>&nbsp;&nbsp;</td>  
                                    <td><a href="<? echo base_url(); ?>Principal/reg_mod_usuarios"><button><img src ="<? echo base_url(); ?>assets/imgSis/usuario.jpg"/><br>Usuarios</button></a></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;&nbsp;</td>
                                    <td>&nbsp;&nbsp;</td>
                                </tr>
                                <tr>
                                    <td><a href="<? echo base_url(); ?>Principal/reg_mod_tipocredito"><button><img src ="<? echo base_url(); ?>assets/imgSis/tipocredito.jpg"/><br>Tipo Credito</button></a></td>
                                    <td>&nbsp;&nbsp;</td> 
                                    <td><a href="<? echo base_url(); ?>Principal/reg_mod_tipoproducto"> <button><img src ="<? echo base_url(); ?>assets/imgSis/productos.png"/><br>Producto</button></a></td>
                                </tr>
                                <td>&nbsp;&nbsp;</td>
                                <td>&nbsp;&nbsp;</td> 
                                <tr>                                
                                    <td><a href="<? echo base_url(); ?>Login/cerrarSesion"> <button><img src ="<? echo base_url(); ?>assets/imgSis/cerrar_sesion.png"/><br>Cerrar</button></a></td>                               
                                </tr>
                                <tr>


                                </tr>
                            </table>
                        </div>

                        <div class="col-xs-12 col-sm-6">

                            <h1>Comercial</h1>
                            <table style="margin: auto;">
                                <tr>
                                    <td><a href="<? echo base_url(); ?>Principal/reg_mod_creditos"><button><img src ="<? echo base_url(); ?>assets/imgSis/credito.jpg"/><br/>Credito</button></a></td>
                                    <td>&nbsp;&nbsp;</td>  
                                    <td><a href="<? echo base_url(); ?>Principal/reg_mod_abonos"><button><img src ="<? echo base_url(); ?>assets/imgSis/abonos.jpg"/><br/>Abonos</button></a></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;&nbsp;</td>
                                    <td>&nbsp;&nbsp;</td>
                                </tr>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <div id="separador">
                <h1>Informes</h1>
            </div>

            <div class="informes">
                <br/><br/>
                <div class="container" id="container-footer">
                    <div class="row" style="margin: auto">               
                        <div class="col-xs-12 col-sm-3"  style="margin: auto">

                           <a href="<? echo base_url(); ?>Principal/reg_mod_listado"><button><img src ="<? echo base_url(); ?>assets/imgSis/informe5.jpg"/><br/>Listado Clientes</button></a>
                            &nbsp;&nbsp;    
                            <button><img src ="<? echo base_url(); ?>assets/imgSis/informe2.jpg"/></button>
                            &nbsp;&nbsp;


                        </div>

                        <div class="col-xs-12 col-sm-3">
                            <button><img src ="<? echo base_url(); ?>assets/imgSis/informe3.jpg"/></button>
                            &nbsp;&nbsp;    
                            <button><img src ="<? echo base_url(); ?>assets/imgSis/informe4.jpg"/></button>
                            &nbsp;&nbsp; 
                        </div>

                        <div class="col-xs-12 col-sm-3">
                            <button><img src ="<? echo base_url(); ?>assets/imgSis/informe1.jpg"/></button>
                            &nbsp;&nbsp;    
                            <button><img src ="<? echo base_url(); ?>assets/imgSis/informe6.jpg"/></button>
                            &nbsp;&nbsp; 
                        </div>

                        <div class="col-xs-12 col-sm-3">
                            <button><img src ="<? echo base_url(); ?>assets/imgSis/pdf.png"/></button>
                            &nbsp;&nbsp;    
                            <button><img src ="<? echo base_url(); ?>assets/imgSis/excel.png"/></button>
                            &nbsp;&nbsp; 
                        </div>
                    </div>
                </div>
            </div>
            <footer>

            </footer>

        <? } else { ?>
            <? header("Location: " . base_url('Login')) ?>
        <? } ?>    




    </body>
</html>
