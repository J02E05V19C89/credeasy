<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    private $datosPlantilla;
    private $datosPlantilla2;

    public function __construct() {
        parent::__construct();
        $this->load->helper(array("url", "form", "cookie"));
        $this->load->library(array("form_validation"));

        $this->load->library('Plantillas2');
        $this->load->model("ModeloGestion");

        $this->datosPlantilla2 = array(
            "head" => $this->plantillas2->getHead(),
        );
    }

    public function index() {
        $this->load->view("vLogin", $this->datosPlantilla2);
    }

    public function iniciarSesion() {
        $this->form_validation->set_rules('txtcorreo', 'correo', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('txtpassword', 'password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $registro = array(
            'correo' => $this->input->post('txtcorreo'),
            'contrasena' => $this->input->post('txtpassword'),
            'login' => false


            );
            $result = $this->ModeloGestion->validarIngreso($registro);

            if ($result->num_rows() == 0) {
                $this->datosPlantilla2['mensajeValidacion'] = "<p><h4>Usuario o  contraseña incorrecta</h4><p>";
            } else {

                
                $this->session->set_userdata($registro);
                $this->datosPlantilla2['datosSesion'] = "Usuario conectado: " . $this->session->userdata['correo'];
            }

            $this->load->view("vlogin", $this->datosPlantilla2);
//            
        }
    }

    public function cerrarSesion() {
        $this->session->sess_destroy();
        $this->datosPlantilla2['mensajeSesion'] = "Sesión finalizada";
        $this->load->view("vlogin", $this->datosPlantilla2);
    }

}
