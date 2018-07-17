<?php
include_once 'application/Dao/Registro/CoberturaDao.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class CoberturaModel extends CI_Model{

    private $coberturaDao;

    function __construct() {
        parent::__construct();
        $this->coberturaDao = new CoberturaDao();
    }

    public function obtenerReporte003($where) {
        return $this->coberturaDao->obtenerReporte003($where);
    }

}