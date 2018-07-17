<?php
include_once 'application/Core/Encuesta/ControlTransferenciaCore.php';
require_once 'application/Dao/MasterEncuestaDao.php';

class ControlTransferenciaDao extends MasterEncuestaDao implements ControlTransferenciaCore{

    public function __construct() {
        parent::__construct();
    }

    public function obtenerReporte002($where){
         $dni='';
      if($this->VerificacionRolID()){
        $dni='sistemas';
      }
      else{
        $dni=$where['DNI'];
      }
     	$data= $this->ActivarEncuesta(TRUE)->query("EXEC PBLUE_ENCUESTA_REPORTE02 N'".$dni."', N'".$where['ANIO']."', N'".$where['MES_INI']."', N'".$where['MES_FIN']."', N'".$where['EQUIPO']."', ".$where['NIVEL'].", ".$where['ESTADO'].", '".$where['CONGLOMERADO']."'")->result();
        return data_output($data);
    }

    public function obtenerArchivoXML($idenvio) {
   	    return $this->ActivarEncuesta(TRUE)->select("xml_data")
    	        ->from('T_ENC_CAPT_LOGXMLTRANS')
    			->where('id_envio', $idenvio)
    			->get()->result();
    }

}