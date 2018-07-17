<?php
include_once 'application/Core/Encuesta/ResultadoViviendaCore.php';
require_once 'application/Dao/MasterEncuestaDao.php';

class ResultadoViviendaDao extends MasterEncuestaDao implements ResultadoViviendaCore{

    public function __construct() {
        parent::__construct();
    }

    public function obtenerReporte003($where){
      $dni='';
      if($this->VerificacionRolID()){
        $dni='sistemas';
      }
      else{
        $dni=$where['DNI'];
      }
       $data =$this->ActivarEncuesta(TRUE)->query("EXEC [PBLUE_ENCUESTA_REPORTE03] N'".$dni."', N'".$where['ANIO']."', N'".$where['MES']."', N'".$where['EQUIPO']."', N'".$where['CONGLOMERADO']."', N'".$where['VIVIENDA']."', ".$where['NIVEL'])->result(); 
       return data_output($data);
    }

    public function cargarConglomerado($anio, $equipo, $mes){
        return $this->ActivarEncuesta(TRUE)->select('CONGLOMERADO')
                ->from('T_ENC_CAPT_SEGMENTACION')
                ->where('MES', $mes)
                ->where('ANIO', $anio)
                ->where('EQUIPO', $equipo)
                ->get()->result();
    }

    public function cargarVivienda($conglomerado,$anio){
        return $this->ActivarEncuesta(TRUE)->select('NSELV AS VIVIENDA')
                ->from('T_ENC_CAPT_MARCO')
                ->where('CONGLOMERADO', $conglomerado)
                ->where('ANIO', $anio)
                ->get()->result();
    }

}