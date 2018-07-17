<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'application/controllers/Endes_controller.php';
class Samplingtwo extends Endes_controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Registro/SamplingtwoModel');
    }

    public function index() {
        $this->VerificarsiAccedeDesdePath();
        $data['layout_body'] = 'Registro/Samplingtwo/index';
        $data['title'] =  "Identificación de Viviviendas";
        $data['menu']  = $this->CargadoMenuPorusuario();
        $data['modulos']=$this->CargadoModulos();
	    $this->load->view('main_template', $data);
    }
    public function getSamplingtwo() {
        $conglomerado=$this->input->post('conglomerado');
        $sampling = $this->SamplingtwoModel->getRuralOrUrbantwo($conglomerado);        
        echo json_encode($sampling);
    }
    public function getCPV301two(){
        $conglomerado=$this->input->post('conglomerado');
        $cpv301 = $this->SamplingtwoModel->getCpv301two($conglomerado);        
        echo json_encode($cpv301);
    }
    public function updateWorkBeforetwo(){        
        $conglomerado = $this->input->post('conglomerado');
        $vivienda = $this->input->post('vivienda');
        $anio = $this->input->post('anio');
        $data = array(
            'TRABAJ_ANIO_ANTERIOR' => $this->input->post('checked')
        );
        $exec = $this->SamplingtwoModel->updateWorkDataGeneraltwo($anio,$conglomerado, 1, $vivienda, $data);
        echo json_encode($exec);
    }
    public function execWorkBeforetwo(){
        $conglomerado = $this->input->post('conglomerado');
        try{
            $this->SamplingtwoModel->execWorkBeforeProceduretwo($conglomerado);
        }
        catch(PyENDES_ProcedureException $e){
             echo $e->errorMessage();
        }
    }
//    public function updateWorkAndGettwo(){
//        
//        $id=$this->input->post('id');
//        $checked=$this->input->post('checked');
//        $data = array(
//            'TRABAJ_ANIO_ANTERIOR' => $checked
//        );
//        
//        if ($this->SamplingtwoModel->typeUrbanOrRuraltwo($conglomerado)->TIPO == 1) {
//            $exec1 = $this->SamplingtwoModel->updateWorkUrbantwo($conglomerado, $manzana_id, $viviendaactual, $checked);
//            echo json_encode($exec1);
//        } else {
//            $exec2 = $this->SamplingtwoModel->updateWorkRuraltwo($conglomerado, $centropoblado, $viviendaactual, $checked);
//            echo json_encode($exec2);
//        }
//    }
    public function updateWorkAndGettwo(){
        $id=$this->input->post('id');
        $checked=$this->input->post('checked');
        $exec2 = $this->SamplingtwoModel->updatedata($id,$checked);
        echo json_encode($exec2);
    }
    public function getHouseholdstwo(){
        $conglomerado=$this->input->post('conglomerado');
        $datatoInquestLastYear=$this->SamplingtwoModel->getHouseholdstwo($conglomerado,1);
        echo json_encode($datatoInquestLastYear);
    }
    public function getAllPersonsbyHouseholdstwo(){
        $conglomerado=$this->input->post('conglomerado');
        $vivienda=$this->input->post('vivienda');
        $anio=$this->input->post('anio');
        $getAllpersonsHouseholds=$this->SamplingtwoModel->getAllPersonsbyHouseholdstwo($conglomerado,$vivienda,$anio);
        echo json_encode($getAllpersonsHouseholds);
    }
}