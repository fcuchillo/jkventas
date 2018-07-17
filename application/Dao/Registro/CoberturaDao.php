<?php
include_once 'application/Core/Registro/CoberturaCore.php';
require_once 'application/Dao/MasterEncuestaDao.php';

class CoberturaDao extends MasterEncuestaDao implements CoberturaCore{

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
       $data=$this->ActivarRegistro(TRUE)->query("EXEC PBLUE_REGISTRO_REPORTE03 '".$dni."','".$where['ANIO']."','".$where['DPTO']."','".$where['MES_INI']."','".$where['MES_FIN']."',".$where['PER_INI'].",".$where['PER_FIN'].",".$where['ESTADO'].",'".$where['CONGLOMERADO']."',".$where['NIVEL']."")->result();
       return data_output($data);
    }

}