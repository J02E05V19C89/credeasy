<?php

class Plantillas2 {

    private $head;
//    private $titulo;
//    private $menu;
//    private $pie;
//    private $fechahora;

    public function __construct() {
        //date_default_timezone_set("America/Bogota");
        //$this->fechahora = date("Y-m-d H:i:s");

        $this->head = '  <meta charset="utf-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1"> 
                        <link href="' . base_url() . 'assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">                       
                        <link href="' . base_url() . 'assets/css/style2.css" rel="stylesheet">                       
                        <script src="' . base_url() . 'assets/js/codigo.js"></script>                      
                        <script src="' . base_url() . 'assets/jquery/jquery.js"></script>                      
                        
                      ';

        //$this->titulo = "<h1>Credeasy</h1>";

//        $this->pie = "Gestión de Usuario<br>
//                      Medellín<br>  
//                      2016";

        
    }

    public function __destruct() {
        
    }

    public function getHead() {
        return $this->head;
    }

//    2

   
}