<?php
include_once 'application/Dao/Registro/SamplingtwoDAO.php';
class SamplingtwoModel extends CI_Model{

    function __construct() { 
        parent::__construct();
        $this->samplingtwo = new SamplingtwoDAO();
    }
    function updateWorkbeforetwo($where, $checked){      
        return $this->samplingtwo->updateWorkbeforetwo($where, $checked);
    }
    function getRuralOrUrbantwo($conglomerado){      
        return $this->samplingtwo->getRuralOrUrbantwo($conglomerado);
    }
    function getCpv301two($conglomerado){
        return $this->samplingtwo->getCpv301two($conglomerado);    
    }
    function typeUrbanOrRuraltwo($conglomerado){
         return $this->samplingtwo->typeUrbanOrRuraltwo($conglomerado);
    }            
//    function updateWorkUrbantwo($conglomerado='',$manzana_id='',$viviendaactual='',$checked=''){
//        return $this->samplingtwo->updateWorkUrbantwo($conglomerado,$manzana_id,$viviendaactual,$checked);
//    }   
    public function updatedata($id,$check){
        return $this->samplingtwo->getUpdateGeneralbyID($id,$check);
    }
    function updateWorkRuraltwo($conglomerado='',$cod_centro_poblado='',$viviendaactual='',$checked=''){
       return $this->samplingtwo->updateWorkRuraltwo($conglomerado,$cod_centro_poblado,$viviendaactual,$checked); 
    }
    public function getHouseholdstwo($conglomerado='',$jefe=''){
        return $this->samplingtwo->getHouseholdstwo($conglomerado,$jefe);
    }
    public function getAllPersonsbyHouseholdstwo($conglomerado,$vivienda,$anio){
        return $this->samplingtwo->getAllPersonsbyHouseholdstwo($conglomerado,$vivienda,$anio);
    }
    public function updateWorkDataGeneraltwo($anio='',$conglomerado='', $parentesco='', $vivienda='', $data){
        return $this->samplingtwo->updateWorkDataGeneraltwo($anio,$conglomerado,$parentesco,$vivienda, $data);
    }
  
    public function execWorkBeforeProceduretwo($conglomerado){
        return $this->samplingtwo->execWorkBeforeProceduretwo($conglomerado);
    }
}
