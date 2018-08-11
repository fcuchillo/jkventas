<?php
require_once 'application/core/Entities.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class MProd_categoria extends CI_Model {

  function __construct() {
        parent::__construct();
        
    }
    
    function ObtenerTablaCategorias(){
        return $this->db->select('*')->from(Entities::$t_prod_categoria)->get()->result();
    }

}

