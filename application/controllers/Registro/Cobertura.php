<?php
require_once 'application/controllers/Endes_controller.php';
defined('BASEPATH') OR exit('No direct script access allowed');

class Cobertura extends Endes_controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Registro/CoberturaModel');
    }

    public function index() {
        $this->VerificarsiAccedeDesdePath();
        $data['layout_body'] = 'Registro/Cobertura/index';
        $data['anios'] = $this->PyENDES_RegistroModel->obtenerAniosDBRegistro();
        $data['meses'] = $this->PyENDES_RegistroModel->obtenerMesesDBRegistro();
        $data['dptos'] = $this->PyENDES_RegistroModel->obtenerDepartamentosDBRegistro();
        $data['menu']  = $this->CargadoMenuPorusuario();
        $data['modulos']=$this->CargadoModulos();
        $data['title'] = 'Cobertura';
        $this->load->view('main_template', $data);
    }

    public function obtenerReporte003() {

    	$where = array(
    		'ANIO' 			=> $this->input->post('anio'),
            'DPTO'           => $this->input->post('dpto'),
    		'MES_INI' 		=> $this->input->post('mesIni'),
    		'MES_FIN' 		=> $this->input->post('mesFin'),
    		'PER_INI' 		=> $this->input->post('perIni'),
    		'PER_FIN' 		=> $this->input->post('perFin'),
    		'NIVEL' 		=> $this->input->post('nivel'),
    		'ESTADO' 		=> $this->input->post('estado'),
    		'CONGLOMERADO' 	=> $this->input->post('conglomerado'),
            'DNI'           => $this->input->post('DNI')
		);

    	$coberturaModel = $this->CoberturaModel->obtenerReporte003($where);
    	echo json_encode($coberturaModel);
    }

    public function obtenerMeses(){
        $meses = $this->PyENDES_RegistroModel->obtenerMesesDBRegistro();
        echo json_encode($meses);
    }
}