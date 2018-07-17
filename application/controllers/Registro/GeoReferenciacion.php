<?php
require_once 'application/controllers/Endes_controller.php';
defined('BASEPATH') OR exit('No direct script access allowed');

class GeoReferenciacion extends Endes_controller {

	private $georeferenciacionModel;

    public function __construct() {
        parent::__construct();
        $this->load->model('Registro/GeoReferenciacionModel');
        $this->load->library('googlemaps');
    }

    public function index() {
        $this->VerificarsiAccedeDesdePath();
        $data['layout_body'] = 'Registro/GeoReferenciacion/index';
        $data['anios'] = $this->PyENDES_RegistroModel->obtenerAniosDBRegistro();
        $data['meses'] = $this->PyENDES_RegistroModel->obtenerMesesDBRegistro();
        $data['dptos'] = $this->PyENDES_RegistroModel->obtenerDepartamentosDBRegistro();
        $data['menu']  = $this->CargadoMenuPorusuario();
        $data['modulos']=$this->CargadoModulos();
        $data['title'] = 'GeoReferenciación';
        $this->load->view('main_template', $data);
    }

    public function obtenerReporte004() {

    	$where = array(
    		'ANIO' 			=> $this->input->post('anio'),
            'DEPARTAMENTO'  => $this->input->post('dpto'),
    		'MES_INI' 		=> $this->input->post('mesIni'),
    		'MES_FIN' 		=> $this->input->post('mesFin'),
    		'P_INI' 		=> $this->input->post('perIni'),
    		'P_FIN' 		=> $this->input->post('perFin'),
    		'NIVEL' 		=> $this->input->post('nivel'),
            'OMISION'       => $this->input->post('omision'),
    		'CONGLOMERADO' 	=> $this->input->post('conglomerado'),
            'DNI'           => $this->input->post('DNI')
		);

    	$georeferenciacionModel = $this->GeoReferenciacionModel->obtenerReporte004($where);
    	echo json_encode($georeferenciacionModel);
    }
    
    public function obtenerMeses(){
        $meses = $this->PyENDES_RegistroModel->obtenerMesesDBRegistro();
        echo json_encode($meses);
    }

    public function obtenerReporte004_PuntosGPS() {
        $where = array(
            'NIVEL'             => $this->input->post('nivel'),
            'ANIO'              => $this->input->post('anio'),
            'CONGLOMERADO'      => $this->input->post('conglomerado'),
            'CP'                => $this->input->post('ccpp'),
            'MZ'                => $this->input->post('manzana'),
            'MES_INI'           => $this->input->post('mesIni'),
            'MES_FIN'           => $this->input->post('mesFin'),
            'P_INI'             => $this->input->post('perIni'),
            'P_FIN'             => $this->input->post('perFin')
        );

        $georeferenciacionModel = $this->GeoReferenciacionModel->obtenerReporte004_PuntosGPS($where);
        echo json_encode($georeferenciacionModel);
    }
}