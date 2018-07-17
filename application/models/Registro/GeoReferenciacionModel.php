<?php
include_once 'application/Dao/Registro/GeoReferenciacionDao.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class GeoReferenciacionModel extends CI_Model{

    private $geoReferenciacionDao;

    function __construct() {
        parent::__construct();
        $this->geoReferenciacionDao = new GeoReferenciacionDao();
    }

    public function obtenerReporte004($where) {
        return $this->geoReferenciacionDao->obtenerReporte004($where);
    }

    public function obtenerReporte004_PuntosGPS($where) {
    	return $this->geoReferenciacionDao->obtenerReporte004_PuntosGPS($where);	
    }
}