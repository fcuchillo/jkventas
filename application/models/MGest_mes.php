<?php
require_once 'application/core/Entities.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class MGest_mes extends CI_Model {

  function __construct() {
        parent::__construct();
        
    }

    public function ObtenerTablaMeses() {
        return $this->db->select('*')->from(Entities::$t_gest_mes)->get()->result();
    }

}

