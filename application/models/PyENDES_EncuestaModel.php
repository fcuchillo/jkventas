<?php
include_once 'application/Dao/PyENDES_EncuestaDao.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PyENDES_EncuestaModel extends CI_Model {
    
    private $endesDao;
    
    function __construct() {
        parent::__construct();
        $this->endesDao = new PyENDES_EncuestaDao();
    } 
    public function ObtenerMenuparaUsuario($usuario){
        return $this->endesDao->ObtenerMenuparaUsuario($usuario);
    }
    public function ObtenerTodosModulos($usuario){
        return $this->endesDao->ObtenerTodosModulos($usuario);
    }
    public function obtenerPeriodosDBEncuesta() {
        return $this->endesDao->obtenerPeriodosDBEncuesta();
    }
    public function obtenerAniosDBEncuesta(){
        return $this->endesDao->obtenerAniosDBEncuesta();
    }
    public function obtenerMesesDBEncuesta(){
        return $this->endesDao->obtenerMesesDBEncuesta();
    }
    public function obtenerDepartamentosDBEncuesta(){
        return $this->endesDao->obtenerDptosDBEncuesta();   
    }   
    public function obtenerEquiposDBEncuesta(){
        return $this->endesDao->obtenerEquipoDBEncuesta();
    }
}


