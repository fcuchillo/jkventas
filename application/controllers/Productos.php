<?php
 require_once 'application/controllers/jkventas_controller.php';
defined('BASEPATH') OR exit('No direct script access allowed');
//use Illuminate\Support\Facades\DB;
use Illuminate\Database\Capsule\Manager as DB;

class Productos extends jkventas_controller {
    
  
    public function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->model(array('Producto','Mes','Estado','Marca','Categoria'));        
        
    } 
    
    public function index() {
     
//        $this->VerificarsiAccedeDesdePath();
        $data['layout_body']    = 'Productos/index';
        $data['producto']       = DB::select('CALL Lista_Productos(?,?,?,?,?,?)',['2018', 0, 0,0,0,'']);        
        $data['mes']            = Mes::all();
        $data['estado']         = Estado::all();
        $data['marca']          = Marca::all();
        $data['categoria']      = Categoria::all();
//        $data['anios'] = $this->PyENDES_EncuestaModel->obtenerAniosDBEncuesta();
//        $data['equipos'] = $this->PyENDES_EncuestaModel->obtenerEquiposDBEncuesta();
//        $data['meses'] = $this->PyENDES_EncuestaModel->obtenerMesesDBEncuesta();
//        $data['dptos'] = $this->PyENDES_EncuestaModel->obtenerDepartamentosDBEncuesta();
          $data['menu']  = $this->CargadoDelMenu();
//        $data['modulos']=$this->CargadoModulos();
        
        $data['title'] = 'Productos';
        $this->load->view('main_template', $data);
    }    
    
 
}


