<?php
require_once 'application/controllers/Endes_controller.php';
defined('BASEPATH') OR exit('No direct script access allowed');
class PaseConsistencia extends Endes_controller{

	 public function __construct(){
        parent::__construct();
        $this->load->model('Encuesta/PaseConsistenciaModel');
    }
       public function index(){
        $this->VerificarsiAccedeDesdePath();
        $data['layout_body'] = 'Encuesta/PaseConsistencia/index';
        $data['title']   = 'Pase a Consistencia';
        $data['anios']   = $this->PyENDES_EncuestaModel->obtenerAniosDBEncuesta();
        $data['meses']   = $this->PyENDES_EncuestaModel->obtenerMesesDBEncuesta();
        $data['equipos'] = $this->PyENDES_EncuestaModel->obtenerEquiposDBEncuesta();
        $data['menu']    = $this->CargadoMenuPorusuario();
        $data['modulos'] = $this->CargadoModulos();
        $this->load->view('main_template', $data);
    }
    public function ObtenerConglomerado(){
         $where = array(
            'ANIO'          => $this->input->post('anio'),
            'EQUIPO'        => $this->input->post('equipo'),
            'MES_INI'       => $this->input->post('mesIni'),
            'MES_FIN'       => $this->input->post('mesFin'),
            'NIVEL'         => $this->input->post('nivel'),
            'ESTADO'        => $this->input->post('estado'),
            'CONGLOMERADO'  => $this->input->post('conglomerado'),
            'DNI'           => $this->input->post('dni'),
        );
         //var_dump($where);
        $consistenciaModel = $this->PaseConsistenciaModel->obtenerconglomerados($where);
        echo json_encode($consistenciaModel);
    }
   public function EjecutarPase(){
    $nivel = $this->input->post('nivel');
    $informacion=$this->input->post('informacion');
    $usuario =$this->session->userdata['session_user']['usuario'];
    if($nivel==1){
       $this->PaseConsistenciaModel->EjecutarPasePorViviendaCompleta($nivel,$informacion,$usuario);
       return true;
   }
   else{
        $this->PaseConsistenciaModel->EjecutarPasePorViviendaIncompleta($nivel,$informacion,$usuario);
        return true;
   }
 }
}