<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

    private $datosPlantilla;

    public function __construct() {
        parent::__construct();
        $this->load->helper(array("url", "form"));

        $this->load->library(array("form_validation"));
        $this->load->library('Plantillas');

        $this->load->model("ModeloGestion");

        $this->datosPlantilla = array(
            "head" => $this->plantillas->getHead(),
            "titulo" => $this->plantillas->getTitulo(),
        );
    }

    public function __destruct() {
        
    }

    public function index() {

        $this->load->view('modulo', $this->datosPlantilla);



        //$this->load->view('inc/header', $this->datosPlantilla);
    }

    public function reg_mod_clientes() {

        $resultadoBuscarClave = $this->ModeloGestion->buscarClave("cliente", "CedulaCliente", $this->input->post("txtcedula"));

        if ($resultadoBuscarClave->num_rows() == 0) {

            $this->form_validation->set_rules("txtcedula", "Cedula", "trim|required|min_length[6]|max_length[10]");
            $this->form_validation->set_rules("txtpnombre", "Nombre", "trim|required|min_length[3]|max_length[50]");
            $this->form_validation->set_rules("txtpapellido", "Apellidos", "trim|required|min_length[3]|max_length[50]");
            $this->form_validation->set_rules("txtciudad", "Ciudad", "trim|required|min_length[3]|max_length[50]");
            $this->form_validation->set_rules("txtdireccion", "Direccion", "trim|required|min_length[3]|max_length[50]");
            $this->form_validation->set_rules("txttelefono", "Telefono", "trim|required|min_length[3]|max_length[50]");
            $this->form_validation->set_rules("txtcorreo", "Correo", "trim|required|valid_email|max_length[100]");
            $this->form_validation->set_rules("txtcelular", "Celular", "trim|required|min_length[3]|max_length[50]");


            if ($this->form_validation->run() == FALSE) {
                $this->datosPlantilla['contenido'] = "";
            } else {

                $arrayDatos = array(
                    "CedulaCliente" => $this->input->post("txtcedula"),
                    "PrimerNombre" => $this->input->post("txtpnombre"),
                    "SegundoNombre" => $this->input->post("txtsnombre"),
                    "PrimerApellido" => $this->input->post("txtpapellido"),
                    "SegundoApellido" => $this->input->post("txtsapellido"),
                    "CiudadDomicilio" => $this->input->post("txtciudad"),
                    "DireccionDomicilio" => $this->input->post("txtdireccion"),
                    "TelefonoDomicilio" => $this->input->post("txttelefono"),
                    "Correo" => $this->input->post("txtcorreo"),
                    "Celular" => $this->input->post("txtcelular"),
                    "Empresa" => $this->input->post("txtempresa"),
                    "DireccionEmpresa" => $this->input->post("txtDempresa"),
                    "TelefonoEmpresa" => $this->input->post("txtTelEmpresa")
                );

                $this->ModeloGestion->registrarDatos("cliente", $arrayDatos);
                $this->datosPlantilla["contenido"] = "<h3>Registro guardado</h3>";
            }
        } else {

            $this->datosPlantilla["contenido"] = "<h3>El usuario ya esta registrado</h3>";
        }

        $this->load->view("vClientes", $this->datosPlantilla);
    }

    public function reg_mod_tipocredito() {

        $resultadoBuscarClave = $this->ModeloGestion->buscarClave("tipo_credito", "CodigoCredito", $this->input->post("txtcredito"));

        if ($resultadoBuscarClave->num_rows() == 0) {

            $this->form_validation->set_rules("txtdescripcion", "Descripcion", "trim|required|min_length[6]|max_length[50]");

            if ($this->form_validation->run() == FALSE) {
                $this->datosPlantilla['contenido'] = "";
            } else {

                $arrayDatos = array(
                    "Descripcion" => $this->input->post("txtdescripcion"),
                );

                $this->ModeloGestion->registrarDatos("tipo_credito", $arrayDatos);
                $this->datosPlantilla["contenido"] = "<h3>Registro guardado</h3>";
            }
        } else {

            $this->datosPlantilla["contenido"] = "<h3>El codigo esta registrado</h3>";
        }

        $this->load->view("vTipoCredito", $this->datosPlantilla);
    }

    public function reg_mod_tipoproducto() {

        $resultadoBuscarClave = $this->ModeloGestion->buscarClave("productos", "idproducto", $this->input->post("txtproducto"));

        if ($resultadoBuscarClave->num_rows() == 0) {

            $this->form_validation->set_rules("txtdescripcion", "Descripcion", "trim|required|min_length[6]|max_length[50]");

            if ($this->form_validation->run() == FALSE) {
                $this->datosPlantilla['contenido'] = "";
            } else {

                $arrayDatos = array(
                    "descripcion" => $this->input->post("txtdescripcion"),
                );

                $this->ModeloGestion->registrarDatos("productos", $arrayDatos);
                $this->datosPlantilla["contenido"] = "<h3>Registro guardado</h3>";
            }
        } else {

            $this->datosPlantilla["contenido"] = "<h3>El codigo ya esta registrado</h3>";
        }

        $this->load->view("vTipoProducto", $this->datosPlantilla);
    }

    public function buscarConsecutivo() {
        $credito = $this->ModeloGestion->buscarMaxCredito();
        echo json_encode($credito);
    }

    public function buscarProducto() {
        $producto = $this->ModeloGestion->buscarMaxProducto();
        echo json_encode($producto);
    }

    public function buscarNCredito() {
        $producto = $this->ModeloGestion->buscarMaxNCredito();
        echo json_encode($producto);
    }

    public function buscarNAbono() {
        $producto = $this->ModeloGestion->buscarMaxNAbono();
        echo json_encode($producto);
    }

    public function reg_mod_creditos() {
        $camposArray = array("*");
        $this->datosPlantilla["resultadoConsulta"] = $this->ModeloGestion->listarRegistros("tipo_credito", $camposArray, "", 0);
        $this->datosPlantilla["resultadoConsulta2"] = $this->ModeloGestion->listarRegistros("productos", $camposArray, "", 0);

        $this->form_validation->set_rules("txtcliente", "Documento Identidad", "trim|required|min_length[6]|max_length[10]");
        $this->form_validation->set_rules("txtvalor", "Valor credito", "trim|required|min_length[3]|max_length[30]");

        if ($this->form_validation->run() == FALSE) {
            $this->datosPlantilla['contenido'] = "<h3>Registro de datos</h3>";
        } else {
            $arrayDatos = array(
                "CodigoCredito" => $this->input->post("cbotipocredito"),
                "CedulaCliente" => $this->input->post("txtcliente"),
                "idproducto" => $this->input->post("cbotipoproducto"),
                "Total_credito" => $this->input->post("txtvalor"),
                "Observaciones" => $this->input->post("txtobservacion"),
            );

            $this->ModeloGestion->registrarDatos("credito", $arrayDatos);
            $this->datosPlantilla["contenido"] = "<h3>Registro guardado</h3>";
        }

        $this->load->view("VCredito", $this->datosPlantilla);
    }

    public function listarTabla() {
        $producto = $this->ModeloGestion->lista();
        echo json_encode($producto);
    }

    public function buscarCliente() {
        //$campo = 'id';
        $id = $_POST['id'];
        //$campo = 'id';
        $resultado = $this->ModeloGestion->cliente($id);
        echo json_encode($resultado);
    }

    public function reg_mod_abonos() {

        $this->form_validation->set_rules("txtcliente", "Documento Identidad", "trim|required|min_length[6]|max_length[10]");
        $this->form_validation->set_rules("txtvalor", "Valor Abono", "trim|required|min_length[3]|max_length[30]");

        if ($this->form_validation->run() == FALSE) {
            $this->datosPlantilla['contenido'] = "<h3>Registro de datos</h3>";
        } else {
            $arrayDatos = array(
                "Cedula" => $this->input->post("txtcliente"),
                "Total_abono" => $this->input->post("txtvalor"),
                    //"Observaciones" => $this->input->post("txtobservacion"),
            );

            $this->ModeloGestion->registrarDatos("abonos", $arrayDatos);
            $this->datosPlantilla["contenido"] = "<h3>Registro guardado</h3>";
        }

        $this->load->view("vAbono", $this->datosPlantilla);
    }

    public function totalAbonos() {

        $id = $_POST['id'];
        $creditos = $this->ModeloGestion->creditos($id);
        echo json_encode($creditos);
    }

    public function totalAbonos2() {

        $id = $_POST['id'];
        $creditos2 = $this->ModeloGestion->abonos($id);
        echo json_encode($creditos2);
    }

    public function reg_mod_usuarios() {

        $resultadoBuscarClave = $this->ModeloGestion->buscarClave("usuario", "idusuario", $this->input->post("txtidusuario"));

        if ($resultadoBuscarClave->num_rows() == 0) {
            $resultadoBuscarClave = $this->ModeloGestion->buscarClave("usuario", "correo", $this->input->post("txtcorreo"));
            //$resultadoBuscarClave = $this->ModeloGestion->buscarClave("usuario", "correo", $this->input->post("txtcorreo"));

            if ($resultadoBuscarClave->num_rows() == 0) {
                $this->form_validation->set_rules("txtidusuario", "Usuario", "trim|required|min_length[3]|max_length[30]");
                $this->form_validation->set_rules("txtnombre", "Nombre", "trim|required|min_length[3]|max_length[50]");
                $this->form_validation->set_rules("txtcelular", "Celular", "trim|required|min_length[3]|max_length[10]");
                $this->form_validation->set_rules("txtcorreo", "Correo", "trim|required|valid_email|max_length[100]");
                $this->form_validation->set_rules("txtcontrasena1", "Contraseña", "trim|required|matches[txtcontrasena2]|min_length[3]|max_length[30]");
                $this->form_validation->set_rules("txtcontrasena2", "Contraseña", "trim|required");

                if ($this->form_validation->run() == FALSE) {
                    $this->datosPlantilla['contenido'] = "";
                } else {
                    $arrayDatos = array(
                        "idusuario" => $this->input->post("txtidusuario"),
                        "nombre" => $this->input->post("txtnombre"),
                        "correo" => $this->input->post("txtcorreo"),
                        "contrasena" => $this->input->post("txtcontrasena1"),
                        "telefono" => $this->input->post("txtcelular"),
                    );

                    $this->ModeloGestion->registrarUsuarios("usuario", $arrayDatos);
                    $this->datosPlantilla["contenido"] = "<h3>Registro guardado</h3>";
                }
            } else {
                $this->datosPlantilla["contenido"] = "<h3>Este correo ya está registrado</h3>";
            }
        } else {
            $this->datosPlantilla["contenido"] = "<h3>Este usuario ya está registrado</h3>";
        }

        $this->load->view("vUsuarios", $this->datosPlantilla);
    }

    public function reg_mod_listado() {

        $this->load->view("vListadoCredito", $this->datosPlantilla);
    }

    public function consulta_listado() {

        $id = $_POST['resultado'];
        $creditos2 = $this->ModeloGestion->verRegistros($id);
        echo json_encode($creditos2);
    }

}
