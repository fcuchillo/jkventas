<?php
include_once 'application/Core/Registro/GeoReferenciacionCore.php';
require_once 'application/Dao/MasterEncuestaDao.php';

class GeoReferenciacionDao extends MasterEncuestaDao implements GeoReferenciacionCore{

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
       $data=$this->ActivarRegistro(TRUE)->query("EXEC PBLUE_REGISTRO_REPORTE04  '".$dni."','".$where['ANIO']."', '".$where['DEPARTAMENTO']."', '".$where['MES_INI']."', '".$where['MES_FIN']."', ".$where['P_INI'].", ".$where['P_FIN'].", ".$where['NIVEL'].",".$where['OMISION'].", '".$where['CONGLOMERADO']."'")->result();
       return data_output($data);
    }

    public function obtenerReporte004_PuntosGPS($where){
        return $this->ActivarRegistro(TRUE)->query("EXEC [PBLUE_REGISTRO_REPORTE04_PUNTOS] ".$where['NIVEL'].",".$where['ANIO'].",'".$where['CONGLOMERADO']."','".$where['CP']."','".$where['MZ']."','".$where['MES_INI']."','".$where['MES_FIN']."',".$where['P_INI'].",".$where['P_FIN']."")->result();

    	/*return "EXEC [REGISTRO_PBLUE_REPORTE04_PUNTOS] ".$where['NIVEL'].",".$where['ANIO'].",'".$where['CONGLOMERADO']."','".$where['CP']."','".$where['MZ']."','".$where['MES_INI']."','".$where['MES_FIN']."',".$where['P_INI'].",".$where['P_FIN']."";*/
    }

}