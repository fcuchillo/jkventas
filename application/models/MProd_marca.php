<?php
require_once 'application/core/Entities.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class MProd_marca extends CI_Model {
    public $marca_id;
    public $nombre;
    public $direccion;    
    public $descripcion;
    public $observacion;

    function __construct() {
        parent::__construct();
        
    }
    
    function ObtenerTablaMarcas(){
        return $this->db->select('*')->from(Entities::$t_prod_marca)->get()->result();
    }

}

