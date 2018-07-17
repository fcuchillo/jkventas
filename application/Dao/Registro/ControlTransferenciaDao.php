<?php
include_once 'application/Core/Registro/ControlTransferenciaCore.php';
require_once 'application/Dao/MasterEncuestaDao.php';

class ControlTransferenciaDao extends MasterEncuestaDao implements ControlTransferenciaCore{

    public function __construct() {
        parent::__construct();
    }

    /*public function obtenerReporte002($where){
       $resultado = $this->ActivarRegistro(TRUE)->query("EXEC [REGISTRO_PBLUE_REPORTE02] N'EVAL', N'".$where['ANIO']."', N'".$where['MES_INI']."', N'".$where['MES_FIN']."', ".$where['PER_INI'].", ".$where['PER_FIN'].", ".$where['NIVEL'].", ".$where['ESTADO'].", N'".$where['CONGLOMERADO']."'")->result();
    return $resultado;
    }*/
    public function obtenerReporte002($where){
      $dni='';
      if($this->VerificacionRolID()){
        $dni='sistemas';
      }
      else{
        $dni=$where['DNI'];
      }
       $resultado = $this->ActivarRegistro(TRUE)->query("EXEC [PBLUE_REGISTRO_REPORTE02_PAGINACION] N'".$dni."', N'".$where['ANIO']."', N'".$where['MES_INI']."', N'".$where['MES_FIN']."', ".$where['PER_INI'].", ".$where['PER_FIN'].", ".$where['NIVEL'].", ".$where['ESTADO'].", N'".$where['CONGLOMERADO']."',".$where['INICIO'].",".$where['FIN'].", N'".$where['SORTORDERBY']."', N'".$where['SORTORDERTYPE']."'")->result();
		return data_output($resultado);
    }
    public function cantidadRegistros($where){
      $dni='';
      if($this->VerificacionRolID()){
        $dni='sistemas';
      }
      else{
        $dni=$where['DNI'];
      }
       $resultado = $this->ActivarRegistro(TRUE)->query("EXEC [PBLUE_REGISTRO_REPORTE02_CANTIDAD] N'".$dni."', N'".$where['ANIO']."', N'".$where['MES_INI']."', N'".$where['MES_FIN']."', ".$where['PER_INI'].", ".$where['PER_FIN'].", ".$where['NIVEL'].", ".$where['ESTADO'].", N'".$where['CONGLOMERADO']."'")->result();
		return $resultado;
    }
}