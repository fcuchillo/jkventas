<?php
require_once 'application/core/Entities.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class MProd_reporteVentas extends CI_Model {
  public $id;
  public $venta_id;  
  public $usuario;
  public $cliente;
  public $fecha;
  public $cantidad;  
  public $total;

  
    function __construct() {
        parent::__construct();        
    }
    
    function getId() {
        return $this->id;
    }

    function getVenta_id() {
        return $this->venta_id;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getCliente() {
        return $this->cliente;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function getTotal() {
        return $this->total;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setVenta_id($venta_id) {
        $this->venta_id = $venta_id;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setTotal($total) {
        $this->total = $total;
    }

    
        
    public function ObtenerSPReporteVentas($parametros) {        
        return $this->db->query('CALL sp_prod_RerpoteVentas(?,?,?)',[$parametros['anio'],$parametros['mes'],$parametros['usuario']]);
    }
     
}

