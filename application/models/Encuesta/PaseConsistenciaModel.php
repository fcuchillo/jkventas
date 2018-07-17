<?php
include_once 'application/Dao/Encuesta/PaseConsistenciaDao.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class PaseConsistenciaModel extends CI_Model{

    private $consistenciaDao;

    function __construct() {
        parent::__construct();
        $this->consistenciaDao = new PaseConsistenciaDao();
    }

    public function obtenerconglomerados($where) {
        return $this->consistenciaDao->obetenerconglomerados($where);
    }
    public function EjecutarPasePorViviendaCompleta($nivel,$conglomerados,$usuario){
    	return $this->consistenciaDao->EjecutarPasePorViviendaCompleta($nivel,$conglomerados,$usuario);
    }
    public function EjecutarPasePorViviendaIncompleta($nivel,$viviendas,$usuario){
    	return $this->consistenciaDao->EjecutarPasePorViviendaIncompleta($nivel,$viviendas,$usuario);
    }
}