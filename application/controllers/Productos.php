<?php
 require_once 'application/controllers/jkventas_controller.php';
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends jkventas_controller {
    
  
    public function __construct() {
        parent::__construct();
        $this->load->library(array('session','form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->model(array('Producto'));
    } 
    
    public function index() {
     
//        $this->VerificarsiAccedeDesdePath();
        $data['layout_body'] = 'Productos/index';
        $data['producto'] = Producto::all();
//        $data['anios'] = $this->PyENDES_EncuestaModel->obtenerAniosDBEncuesta();
//        $data['equipos'] = $this->PyENDES_EncuestaModel->obtenerEquiposDBEncuesta();
//        $data['meses'] = $this->PyENDES_EncuestaModel->obtenerMesesDBEncuesta();
//        $data['dptos'] = $this->PyENDES_EncuestaModel->obtenerDepartamentosDBEncuesta();
//        $data['menu']  = $this->CargadoMenuPorusuario();
//        $data['modulos']=$this->CargadoModulos();
        
        $data['title'] = 'Cobertura';
        $this->load->view('main_template', $data);
    }    
    
 
}


