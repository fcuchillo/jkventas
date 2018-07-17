<?php
include_once 'application/Core/Encuesta/CoberturaCore.php';
require_once 'application/Dao/MasterEncuestaDao.php';

class CoberturaDao extends MasterEncuestaDao implements CoberturaCore{

    public function __construct() {
        parent::__construct();
    }

    public function obtenerReporte004($where){
      $dni='';
      if($this->VerificacionRolID()){
        $dni='sistemas';
      }
      else{
        $dni=$where['DNI'];
      }
       $data=$this->ActivarEncuesta(TRUE)->query("EXEC [PBLUE_ENCUESTA_REPORTE04] N'".$dni."', N'".$where['ANIO']."', N'".$where['MES_INI']."', N'".$where['MES_FIN']."', N'".$where['EQUIPO']."', ".$where['NIVEL'].", ".$where['ESTADO'].", N'".$where['CONGLOMERADO']."'")->result();
       return data_output($data);
    }

}