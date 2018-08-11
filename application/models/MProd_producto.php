<?php
require_once 'application/core/Entities.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class MProd_producto extends CI_Model {
  public $producto_id;
  public $marca_id;
  public $categoria_id;
  public $mes_id;
  public $nombre;
  public $talla;
  public $color;
  public $precio_compra;
  public $fecha_compra;
  public $descripcion;
  public $observacion;
  public $anio;
  function __construct() {
        parent::__construct();
        
    }
    
    function isEmpty($value){
        return empty(trim($value))?null:$value;
    }
    
    function ObtenerTablaProductosXproducto_id($producto_id) {  
        return $this->db->select('*')->from(Entities::$t_prod_producto)->where('producto_id',$producto_id)->get()->row();
    }
    
    function ObtenerTablaProductos($parametros) {        
        return $this->db->query('CALL sp_prod_Lista_Productos(?,?,?,?,?,?)',[$parametros['anio'],$parametros['mes'],$parametros['estado'],$parametros['marca'],$parametros['categoria'],$parametros['nombre']])->result_array();
    }
    
    function EliminarTablaProductos($producto_id) {        
        return $this->db->where('producto_id',$producto_id)->delete(Entities::$t_prod_producto);
    }
       
    function ObtenerTablaProductoMaximoID() {        
        $this->db->select_max('producto_id');
        $query = $this->db->get(Entities::$t_prod_producto); 
        $id=$query->row();            
        return $id;
    }
    
    function AgregarTablaProductos($producto) {        
        return $this->db->insert(Entities::$t_prod_producto,$producto);
    }
    
    function EditarTablaProductos($producto) {        
        return $this->db->where('producto_id',$producto['producto_id'])->update(Entities::$t_prod_producto,$producto);                     
    }
    
     
}

