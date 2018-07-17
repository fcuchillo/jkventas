<?php
include_once 'application/Core/PyENDES_EncuestaCore.php';
require_once 'application/Dao/MasterEncuestaDao.php';
//include_once 'application/helpers/endesutil_helper.php';

class PyENDES_EncuestaDao extends MasterEncuestaDao implements PyENDES_EncuestaCore{
 
    public function __construct() {
        parent::__construct();
       
        //var_dump('cerrando registro-> PyENDES_EncuestaDao');
    }
    public function ObtenerMenuparaUsuario($usuario){
        return $this->Activarjkventas_bd(TRUE)->select('*')
                ->from('ENDES_VBLUE_CONTROL_USUARIO')
                ->where('USUARIO', $usuario)
                ->order_by('ORDEN')
                ->get()->result();
    }
    public function ObtenerTodosModulos($usuario){
       $data= $this->Activarjkventas_bd(TRUE)->select('*')
                                          ->from('ENDES_VBLUE_MODULOS')
                                          ->where('USUARIO',$usuario)
                                          ->group_by('MODULO_ID,NOMBRE,DESCRIPCION,ESTADO,USUARIO')
                                          ->get()->result();
        return $data;

    }
    public function obtenerPeriodosDBEncuesta() {
        return $this->Activarjkventas_bd(TRUE)->select('PERIODO')
                ->from('T_ENC_CAPT_MARCO')
                ->group_by('PERIODO')
                ->order_by('PERIODO ASC')
                ->get()->result();
    }
    public function obtenerAniosDBEncuesta(){
        $this->data = $this->Activarjkventas_bd(TRUE)->select('ANIO')
                ->from('T_ENC_CAPT_MARCO')
                ->group_by('ANIO')
                ->order_by('CAST(ANIO AS INT) DESC')
                ->get()->result();
        return $this->data;
    }
    public function obtenerMesesDBEncuesta(){

        $this->data = $this->Activarjkventas_bd(TRUE)->select('DISTINCT (MES), CASE 
                                                                WHEN MES=\'01\' THEN \'Enero\'    
                                                                WHEN MES=\'02\' THEN \'Febrero\'    
                                                                WHEN MES=\'03\' THEN \'Marzo\'    
                                                                WHEN MES=\'04\' THEN \'Abril\'    
                                                                WHEN MES=\'05\' THEN \'Mayo\'    
                                                                WHEN MES=\'06\' THEN \'Junio\'    
                                                                WHEN MES=\'07\' THEN \'Julio\'    
                                                                WHEN MES=\'08\' THEN \'Agosto\'    
                                                                WHEN MES=\'09\' THEN \'Setiembre\'    
                                                                WHEN MES=\'10\' THEN \'Octubre\'    
                                                                WHEN MES=\'11\' THEN \'Noviembre\'    
                                                                WHEN MES=\'12\' THEN \'Diciembre\' END DESCRIPCION ')
                ->from('T_ENC_CAPT_MARCO')
                ->order_by("T_ENC_CAPT_MARCO.MES", "ASC")
                ->get()->result();
        return $this->data;
    }
    public function obtenerDptosDBEncuesta(){
        $this->data = $this->Activarjkventas_bd(TRUE)->select('RIGHT(\'00\' + CAST(ROW_NUMBER() OVER (ORDER BY DEPARTAMENTO) AS VARCHAR),2)   AS ID, DEPARTAMENTO AS DESCRIPCION')
                ->from('T_ENDES_UBIGEO')
                ->group_by('DEPARTAMENTO')
                ->get()->result();
        return $this->data;
    }
    public function obtenerEquipoDBEncuesta(){
        return $this->Activarjkventas_bd(TRUE)->select('EQUIPO, DESCRIPCION')
                ->from('T_ENC_CAPT_EQUIPO')
                ->where('MODULO_ID=2')
                ->where('EQUIPO NOT IN(63)')
                ->group_by('EQUIPO, DESCRIPCION')
                ->order_by('DESCRIPCION')
                ->get()->result(); 
    }
}
