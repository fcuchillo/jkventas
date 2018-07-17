<?php
include_once 'application/Dao/Encuesta/ControlTransferenciaDao.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class ControlTransferenciaModel extends CI_Model{

    private $controlTransferenciaDao;

    function __construct() {
        parent::__construct();
        $this->controlTransferenciaDao = new ControlTransferenciaDao();
    }

    public function obtenerReporte002($where) {
        return $this->controlTransferenciaDao->obtenerReporte002($where);
    }

    public function obtenerArchivoXML($idenvio) {
    	return $this->controlTransferenciaDao->obtenerArchivoXML($idenvio);
    }
}