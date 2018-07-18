<?php
include_once 'application/Core/PyENDES_RegistroCore.php';
 require_once 'application/Dao/MasterEncuestaDao.php';

class PyENDES_RegistroDao extends MasterEncuestaDao implements PyENDES_RegistroCore{
 
    private $data;
    public function __construct() {
        parent::__construct();
    }

    public function obtenerAniosDBRegistro(){
        $this->data = $this->ActivarRegistro(TRUE)->select('ANIO')
                ->from('T_CONGLOMERADO')
                ->group_by('ANIO')
                ->order_by('CAST(ANIO AS INT) DESC')
                ->get()->result();
            return $this->data;
    }
    public function obtenerMesesDBRegistro(){

        $this->data = $this->ActivarRegistro(TRUE)->select('DISTINCT (MES), CASE 
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
                ->from('T_CONGLOMERADO')
                ->order_by("T_CONGLOMERADO.MES", "ASC")
                ->get()->result();
            return $this->data;
    }
    public function obtenerDptosDBRegistro(){
        $this->data = $this->ActivarRegistro(TRUE)->select('RIGHT(\'00\' + CAST(ROW_NUMBER() OVER (ORDER BY DEPARTAMENTO) AS VARCHAR),2)   AS ID, DEPARTAMENTO AS DESCRIPCION')
                ->from('T_UBIGEO')
                ->group_by('DEPARTAMENTO')
                ->get()->result();
        return $this->data;
    }
}

//comentario