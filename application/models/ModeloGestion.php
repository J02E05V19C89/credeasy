<?php

/**
 * Description of Usuarios
 *
 * @author Jaime
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class ModeloGestion extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function __destruct() {
        
    }

    public function listarRegistros($tabla, $campos, $pagination, $segment) {
        $this->db->select($campos);
        $this->db->from($tabla);
        //$this->db->where('nombre','pedro');
        //$this->db->query("SELECT * FROM $tabla ");
        $this->db->limit($pagination, $segment);
        return $this->db->get();
    }

    public function totalRegistros($tabla) {
        return $this->db->get($tabla)->num_rows();
    }

    public function consultarRegistros($tabla, $campo, $dato) {
        $datosArray = array(
            "usuario.id",
            "usuario.usr",
            "usuario.nombre",
            "usuario.correo",
            "perfil.descripcion",
            "usuario.fechahoraregistro",
        );

        $this->db->select($datosArray);
        $this->db->from($tabla);
        $this->db->join("perfil", "perfil.id=$tabla.idperfil");

        if ($campo != "mostrartodos") {
            $this->db->where($campo, $dato);
        }

        //return $this->db->get($tabla);
        return $this->db->get();
    }

    public function registrarDatos($tabla, $arrayDatos) {
        //$arrayDatos['clave'] = md5($arrayDatos['clave']);
        $this->db->insert($tabla, $arrayDatos);
    }

    public function registrarUsuarios($tabla, $arrayDatos) {
        $arrayDatos['contrasena'] = md5($arrayDatos['contrasena']);
        $this->db->insert($tabla, $arrayDatos);
    }

    public function buscarClave($tabla, $campo, $dato) {
        $this->db->where("UPPER($campo)", strtoupper($dato));
        return $this->db->get($tabla);
    }

    public function buscarClave1($tabla, $campo, $dato) {
        $this->db->where($campo, $dato);
        return $this->db->get($tabla);
    }

    public function eliminarRegistro($tabla, $clausula) {
        $this->db->delete($tabla, $clausula);
    }

    public function actualizarRegistro($tabla, $registro, $id) {
        $this->db->where("id", $id);
        $this->db->update($tabla, $registro);
    }

    public function validarIngreso($registro) {

        $dato = $registro['correo'];
        $clave = $registro['contrasena'];

        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('correo', $dato);
        $this->db->where('contrasena', md5($clave));

        return $this->db->get();
    }

    public function buscarMaxCredito() {


        $this->db->select('Max(CodigoCredito)+ 1 as resultado');
        $this->db->from('tipo_credito');
        return $this->db->get()->result();
    }

    public function buscarMaxProducto() {

        $this->db->select('Max(idproducto)+ 1 as resultado');
        $this->db->from('productos');
        return $this->db->get()->result();
    }

    public function buscarMaxNCredito() {

        $this->db->select('Max(nro_credito)+ 1 as resultado');
        $this->db->from('credito');
        return $this->db->get()->result();
        //comentario
        //otrocomentario
    }

    public function buscarMaxNAbono() {

        $this->db->select('Max(nro_abono)+ 1 as resultado');
        $this->db->from('abonos');
        return $this->db->get()->result();
    }

    public function lista() {

        return $this->db->get('detalle_credito')->result();
    }

    public function cliente($id) {

        $this->db->select('*');
        $this->db->from('cliente');
        $this->db->where('CedulaCliente', $id);
        return $this->db->get()->result();
    }

    public function creditos($id) {
        $this->db->select('SUM(Total_credito) as tcredito');
        $this->db->from('credito');
        $this->db->where('CedulaCliente', $id);
        return $this->db->get()->result();
    }

    public function abonos($id) {
        $this->db->select('SUM(Total_abono) as tabonos');
        $this->db->from('abonos');
        $this->db->where('Cedula', $id);
        return $this->db->get()->result();
    }

    public function total($id) {

        $datosArray = array(
            "sum(Total_abono) as tabono",
            "sum(Total_credito)as tcredito"
        );

        $this->db->select($datosArray);
        $this->db->from('credito');
        $this->db->join('abonos', 'credito.CedulaCliente = abonos.CedulaCliente');
        $this->db->where('credito.CedulaCliente', $id);


        return $this->db->get()->result();
    }

    public function verRegistros($campo) {
        
     $result = $this->db->query("SELECT * FROM CLIENTE WHERE CedulaCliente = '" . $campo . "' OR  PrimerNombre = '" . $campo . "' OR  PrimerApellido = '" . $campo . "' ");
 
        if ($result->num_rows() > 0) {
            return $result->result();
        }else{
            return null;
        }
    }

}

?>
