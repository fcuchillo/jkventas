<?php
require_once 'application/controllers/Endes_controller.php';
defined('BASEPATH') OR exit('No direct script access allowed');

class TransferenciaArchivos extends Endes_controller {

    public function __construct(){
        parent::__construct();
    }
    
    public function index(){
        $this->VerificarsiAccedeDesdePath();
        $data['layout_body'] = 'Encuesta/TransferenciaArchivos/index';
        $data['title'] = 'Transferencia de Archivos.';
        $data['menu']  = $this->CargadoMenuPorusuario();
        $data['modulos']=$this->CargadoModulos();
        $this->load->view('main_template', $data);
    }
}	