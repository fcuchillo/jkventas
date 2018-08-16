<?php
require_once 'application/core/Entities.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class MProd_venta_detalle extends CI_Model {
  public $temporal_id;
  public $usuario_id;
  public $producto_id;
  public $cantidad;
  
  
  
    function __construct() {
        parent::__construct();
        
    }
    function getTemporal_id() {
        return $this->temporal_id;
    }

    function setTemporal_id($temporal_id) {
        $this->temporal_id = $temporal_id;
    }

        function getUsuario_id() {
        return $this->usuario_id;
    }

    function getProducto_id() {
        return $this->producto_id;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function setUsuario_id($usuario_id) {
        $this->usuario_id = $usuario_id;
    }

    function setProducto_id($producto_id) {
        $this->producto_id = $producto_id;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }
     
    function ObtenerTablaProductosXproducto_id($temporal_id) {  
        return $this->db->select('*')->from(Entities::$t_prod_temp_detalle_venta)->where('temporal_id',$temporal_id)->get()->row();
    }

    
    function EliminarTablaProductos($temporal_id) {        
        return $this->db->where('temporal_id',$temporal_id)->delete(Entities::$t_prod_temp_detalle_venta);
    }
    
    function AgregarTablaProductos($detalle_venta) {        
        return $this->db->insert(Entities::$t_prod_temp_detalle_venta,$detalle_venta);
    }
    
    function EditarTablaProductos($detalle_venta) {        
        return $this->db->where('temporal_id',$detalle_venta['producto_id'])->update(Entities::$t_prod_temp_detalle_venta,$detalle_venta);                     
    }
    
     
}

