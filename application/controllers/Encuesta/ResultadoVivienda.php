<?php
require_once 'application/controllers/Endes_controller.php';
defined('BASEPATH') OR exit('No direct script access allowed');

class ResultadoVivienda extends Endes_controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Encuesta/ResultadoViviendaModel');
    }

    public function index() {
        $this->VerificarsiAccedeDesdePath();
        $data['layout_body'] = 'Encuesta/ResultadoVivienda/index';
        $data['anios'] = $this->PyENDES_EncuestaModel->obtenerAniosDBEncuesta();
        $data['equipos'] = $this->PyENDES_EncuestaModel->obtenerEquiposDBEncuesta();
        $data['meses'] = $this->PyENDES_EncuestaModel->obtenerMesesDBEncuesta();
        $data['menu']  = $this->CargadoMenuPorusuario();
        $data['modulos']=$this->CargadoModulos();
        $data['title'] = 'Resultado Vivienda';
        $this->load->view('main_template', $data);
    }

    public function obtenerReporte003() {

    	$where = array(
            'DNI'           => $this->input->post('DNI'),
    		'ANIO' 			=> $this->input->post('anio'),
    		'MES'   		=> $this->input->post('mes'),
            'EQUIPO'        => $this->input->post('equipo'),
    		'VIVIENDA' 		=> $this->input->post('vivienda'),
    		'CONGLOMERADO' 	=> $this->input->post('conglomerado'),           
            'NIVEL'         => $this->input->post('nivel') 
		);

    	$resultadoVivModel = $this->ResultadoViviendaModel->obtenerReporte003($where);
        echo json_encode($resultadoVivModel);
    }

    public function obtenerMeses(){
        $meses = $this->PyENDES_EncuestaModel->obtenerMesesDBEncuesta();
        echo json_encode($meses);
    }

    public function cargarConglomerado(){
        $anio           = $this->input->post('anio');
        $equipo         = $this->input->post('equipo');
        $mes            = $this->input->post('mes');
        $data = $this->ResultadoViviendaModel->cargarConglomerado($anio, $equipo, $mes);
        echo json_encode($data);
    }

    public function cargarVivienda(){
        $conglomerado   = $this->input->post('conglomerado');
        $anio   = $this->input->post('anio');
        $data = $this->ResultadoViviendaModel->cargarVivienda($conglomerado,$anio);
        echo json_encode($data);
    }

    public function cargarAnio(){
        $anios = $this->PyENDES_EncuestaModel->obtenerAniosDBEncuesta();
        echo json_encode($anios);
    }   

    public function cargarMes(){
        $meses = $this->PyENDES_EncuestaModel->obtenerMesesDBEncuesta();
        echo json_encode($meses);
    }

    public function cargarEquipo(){
        $equipos = $this->PyENDES_EncuestaModel->obtenerEquiposDBEncuesta();
        echo json_encode($equipos);
    }
}