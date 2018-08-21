<?php
require_once 'application/core/Entities.php';
//
class MAdm_usuarios extends CI_Model {

  function __construct() {
        parent::__construct();
        
    }
    function isEmpty($value){
        return empty(trim($value))?null:$value;
    }
    
    public function ObtenerTablaUsuarios() {
        return $this->db->select('*')->from(Entities::$t_adm_usuario)->get()->result();
    }
}