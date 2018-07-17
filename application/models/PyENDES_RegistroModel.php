<?php
include_once 'application/Dao/PyENDES_RegistroDao.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PyENDES_RegistroModel extends CI_Model {
    
    private $endesDao;
    
    function __construct() {
        parent::__construct();
        $this->endesDao = new PyENDES_RegistroDao();
    } 
    
    public function obtenerAniosDBRegistro(){
        return $this->endesDao->obtenerAniosDBRegistro();
    }
    public function obtenerMesesDBRegistro(){
        return $this->endesDao->obtenerMesesDBRegistro();
    }
    public function obtenerDepartamentosDBRegistro(){
        return $this->endesDao->obtenerDptosDBRegistro();   
    }    
}

