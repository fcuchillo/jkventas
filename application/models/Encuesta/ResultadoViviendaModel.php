<?php
include_once 'application/Dao/Encuesta/ResultadoViviendaDao.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class ResultadoViviendaModel extends CI_Model{

    private $resVivDao;

    function __construct() {
        parent::__construct();
        $this->resVivDao = new ResultadoViviendaDao();
    }

    public function obtenerReporte003($where) {
        return $this->resVivDao->obtenerReporte003($where);
    }

    public function cargarConglomerado($anio, $equipo, $mes){
    	return $this->resVivDao->cargarConglomerado($anio, $equipo, $mes);
    }

    public function cargarVivienda($conglomerado,$anio){
    	return $this->resVivDao->cargarVivienda($conglomerado,$anio);
    }
}