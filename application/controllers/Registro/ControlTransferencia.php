<?php
require_once 'application/controllers/Endes_controller.php';
defined('BASEPATH') OR exit('No direct script access allowed');

class ControlTransferencia extends Endes_controller {

	private $controlTransferenciaModel;

    public function __construct() {
        parent::__construct();
        $this->load->model('Registro/ControlTransferenciaModel');
   }

    public function index() {
        $this->VerificarsiAccedeDesdePath();
        $data['layout_body'] = 'Registro/ControlTransferencia/index';
        $data['anios'] = $this->PyENDES_RegistroModel->obtenerAniosDBRegistro();
        $data['meses'] = $this->PyENDES_RegistroModel->obtenerMesesDBRegistro();
        $data['title'] = 'Transferencia de Archivos';
        $data['menu']  = $this->CargadoMenuPorusuario();
        $data['modulos']=$this->CargadoModulos();
        $this->load->view('main_template', $data);
    }

    public function obtenerReporte002() {

        $orderByColumnIndex = $this->input->post('order');
        $orderByColumnIndex = $orderByColumnIndex[0]['column'];
        $orderBy = $this->input->post('columns');
        $orderBy = $orderBy[$orderByColumnIndex]['data']; //Nombre Columna para Order.
        $orderType = $this->input->post('order');
        $orderType = $orderType[0]['dir']; //Asc o Desc.

    	$where = array(
    		'ANIO' 			=> $this->input->post('anio'),
    		'MES_INI' 		=> $this->input->post('mesIni'),
    		'MES_FIN' 		=> $this->input->post('mesFin'),
    		'PER_INI' 		=> $this->input->post('perIni'),
    		'PER_FIN' 		=> $this->input->post('perFin'),
    		'NIVEL' 		=> $this->input->post('nivel'),
            'ESTADO'        => $this->input->post('estado'),
    		'CONGLOMERADO' 	=> $this->input->post('conglomerado'),
            'DNI'           => $this->input->post('DNI'),
            /*PAGINACION*/
            'INICIO'        => $this->input->post('start') + 1,
            'FIN'           => $this->input->post('start') + $this->input->post('length'),
            'SORTORDERBY'   => $orderBy,
            'SORTORDERTYPE' => $orderType
            /*END PAGINACION*/
		);

        $draw = $this->input->post('draw');
    	$cantidad = $this->ControlTransferenciaModel->obtenerCantidadRegistros($where);
        $controlTransferenciaModel = json_encode($this->ControlTransferenciaModel->obtenerReporte002($where));

    	echo '{"draw": "'.$draw.'","recordsTotal": '.$cantidad[0]->ID.',"recordsFiltered": '.$cantidad[0]->ID.',"data": '.$controlTransferenciaModel.' }';
    }

    public function obtenerMeses(){
        $meses = $this->PyENDES_RegistroModel->obtenerMesesDBRegistro();
        echo json_encode($meses);
    }

    public function descargarArchivo($nombre){
        header("Content-disposition: attachment; filename=".$nombre."");
        header("Content-type: MIME");
        readfile("/mnt/EndesXmlCartografia/".$nombre."");
    }

}