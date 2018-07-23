<?php
 require_once 'application/controllers/jkventas_controller.php';
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends jkventas_controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->model(array('Producto','Mes','Estado','Marca','Categoria'));        
    } 
    
    public function index() {
        $data['layout_body']    = 'Productos/index';
        $data['producto']       = $this->DB::select('CALL Lista_Productos(?,?,?,?,?,?)',['2018', 0, 0,0,0,'']);        
        $data['mes']            = Mes::all();
        $data['estado']         = Estado::all();
        $data['marca']          = Marca::all();
        $data['categoria']      = Categoria::all();

        $data['menu']  = $this->CargadoDelMenu();        
        $data['title'] = 'Productos';
        $this->load->view('main_template', $data);
    }    
    
    public function ObtenerProductos(){
        $anio       = $this->input->post('anio');
        $mes        = $this->input->post('mes');
        $estado     = $this->input->post('estado');
        $marca      = $this->input->post('marca');
        $categoria  = $this->input->post('categoria');
        $nombre     = $this->input->post('nombre');        
        $datos      = DB::select('CALL Lista_Productos(?,?,?,?,?,?)',[$anio,$mes,$estado,$marca,$categoria,$nombre]); 
       echo json_encode($datos);
    }
 
}


