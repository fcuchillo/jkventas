<?php
require_once 'application/controllers/Endes_controller.php';
defined('BASEPATH') OR exit('No direct script access allowed');

class ControlTransferencia extends Endes_controller {

    private $controlTransferenciaModel;

    public function __construct() {
        parent::__construct();
        $this->load->model('Encuesta/ControlTransferenciaModel');
    }

    public function index() {
        $this->VerificarsiAccedeDesdePath();
        $data['layout_body'] = 'Encuesta/ControlTransferencia/index';
        $data['anios'] = $this->PyENDES_RegistroModel->obtenerAniosDBRegistro();
        $data['equipos'] = $this->PyENDES_EncuestaModel->obtenerEquiposDBEncuesta();
        $data['meses'] = $this->PyENDES_RegistroModel->obtenerMesesDBRegistro();
        $data['title'] = 'Control de Transferencia';
        $data['menu']  = $this->CargadoMenuPorusuario();
        $data['modulos']=$this->CargadoModulos();
        $this->load->view('main_template', $data);
    }

    public function obtenerReporte002() {

        $where = array(
            'ANIO'          => $this->input->post('anio'),
            'EQUIPO'        => $this->input->post('equipo'),
            'MES_INI'       => $this->input->post('mesIni'),
            'MES_FIN'       => $this->input->post('mesFin'),
            'NIVEL'         => $this->input->post('nivel'),
            'ESTADO'        => $this->input->post('estado'),
            'CONGLOMERADO'  => $this->input->post('conglomerado'),
            'DNI'           => $this->input->post('DNI')
        );

        $controlTransferenciaModel = $this->ControlTransferenciaModel->obtenerReporte002($where);
        echo json_encode($controlTransferenciaModel);
    }

    public function obtenerMeses(){
        $meses = $this->PyENDES_RegistroModel->obtenerMesesDBRegistro();
        echo json_encode($meses);
    }

    public function descargarArchivoServer($nombre = ''){
        descargarZipEncuesta($nombre);
    }

    public function descargarArchivoBD($idenvio = ''){
        $stringData = $this->ControlTransferenciaModel->obtenerArchivoXML($idenvio);
        $xml = new SimpleXMLElement($stringData[0]->string_data);
        header('Content-type: "text/xml"; charset="utf8"');
        header('Content-disposition: attachment; filename=20160064.xml');
        echo $xml->asXML();
    }
}