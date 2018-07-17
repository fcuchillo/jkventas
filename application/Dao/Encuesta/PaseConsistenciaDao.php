<?php
include_once 'application/Core/Encuesta/PaseConsistenciaCore.php';
require_once 'application/Dao/MasterEncuestaDao.php';
class PaseConsistenciaDao extends MasterEncuestaDao implements PaseConsistenciaCore{

    public function __construct() {
        parent::__construct();
    }

    public function obetenerconglomerados($where){
      $data=$this->ActivarEncuesta(TRUE)->query("EXEC [PBLUE_ENCUESTA_REPORTE05] N'".$where['DNI']."',N'".$where['ANIO']."',N'".$where['MES_INI']."',N'".$where['MES_FIN']."',N'".$where['EQUIPO']."',".$where['ESTADO'].",".$where['NIVEL'].",N'".$where['CONGLOMERADO']."' ")->result();
      return data_output($data);
    }
    public function EjecutarPasePorViviendaCompleta($nivel,$viviendas,$usuario){
    	$this->ActivarEncuesta(TRUE)->query("EXEC [PBLUE_ENCUESTA_TRANSFIERE_VIVIENDAS_COMPLETAS] '".$viviendas."'");
        return $this->InsertDataAuditoria($nivel,$viviendas,$usuario);
    }
    public function EjecutarPasePorViviendaIncompleta($nivel,$viviendas,$usuario){
        $this->ActivarEncuesta(TRUE)->query("EXEC [PBLUE_ENCUESTA_TRANSFIERE_VIVIENDAS_INCOMPLETAS] '".$viviendas."'");
        return $this->InsertDataAuditoria($nivel,$viviendas,$usuario);
    }
    public function InsertDataAuditoria($nivel,$viviendas,$usuario){
        $pc=gethostbyaddr($_SERVER['REMOTE_ADDR']); //getenv("REMOTE_ADDR");
        $listado = split(",",$viviendas);
        for($i=0; $i<count($listado); $i++){
            $id=uniqid(rand(), true);
            $data= array(
           'PASECONSISTENCIA_ID'=> $id,
           'ID'                 => $listado[$i],
           'NIVEL'              => $nivel,
           'FECHA_PASE'         => date("Y/m/d h:i:sa"),
           'USUARIOSISTEMA'     => $usuario,
           'NOMBRE_PC'          => $pc,
        );
        $this->ActivarEncuesta(TRUE)->insert('ENDES_T_PASECONSISTENCIA', $data);
        }
        return true;
    }
}