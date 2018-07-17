<?php
require_once 'application/controllers/Endes_controller.php';
defined('BASEPATH') OR exit('No direct script access allowed');

class Cobertura extends Endes_controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Encuesta/CoberturaModel');
    }

    public function index() {
        $this->VerificarsiAccedeDesdePath();
        $data['layout_body'] = 'Encuesta/Cobertura/index';
//        $data['anios'] = $this->PyENDES_EncuestaModel->obtenerAniosDBEncuesta();
//        $data['equipos'] = $this->PyENDES_EncuestaModel->obtenerEquiposDBEncuesta();
//        $data['meses'] = $this->PyENDES_EncuestaModel->obtenerMesesDBEncuesta();
//        $data['dptos'] = $this->PyENDES_EncuestaModel->obtenerDepartamentosDBEncuesta();
//        $data['menu']  = $this->CargadoMenuPorusuario();
//        $data['modulos']=$this->CargadoModulos();
        $data['title'] = 'Cobertura';
        $this->load->view('main_template', $data);
    }

    public function obtenerReporte004() {

    	$where = array(
            'DNI'           => $this->input->post('DNI'),
    		'ANIO' 			=> $this->input->post('anio'),
    		'MES_INI' 		=> $this->input->post('mesIni'),
    		'MES_FIN' 		=> $this->input->post('mesFin'),
            'EQUIPO'        => $this->input->post('equipo'),
    		'NIVEL' 		=> $this->input->post('nivel'),
    		'ESTADO' 		=> $this->input->post('estado'),
    		'CONGLOMERADO' 	=> $this->input->post('conglomerado')            
		);

    	$coberturaModel = $this->CoberturaModel->obtenerReporte004($where);
    	echo json_encode($coberturaModel);
    }

    public function obtenerMeses(){
        $meses = $this->PyENDES_EncuestaModel->obtenerMesesDBEncuesta();
        echo json_encode($meses);
    }
}