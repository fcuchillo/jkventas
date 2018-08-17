<?php
require_once 'application/core/Entities.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class MProd_venta_detalle extends CI_Model {
  public $id;
  public $temporal_id;
  public $usuario_id;
  public $producto_id;
  public $codigo_id;
  public $nombre;
  public $precio;
  
    function __construct() {
        parent::__construct();
        
    }
    function getId() {
        return $this->id;
    }

    function getTemporal_id() {
        return $this->temporal_id;
    }

    function getUsuario_id() {
        return $this->usuario_id;
    }

    function getProducto_id() {
        return $this->producto_id;
    }

    function getCodigo_id() {
        return $this->codigo_id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTemporal_id($temporal_id) {
        $this->temporal_id = $temporal_id;
    }

    function setUsuario_id($usuario_id) {
        $this->usuario_id = $usuario_id;
    }

    function setProducto_id($producto_id) {
        $this->producto_id = $producto_id;
    }

    function setCodigo_id($codigo_id) {
        $this->codigo_id = $codigo_id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    function getPrecio() {
        return $this->precio;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function ObtenerTablaProductosXproducto_id($temporal_id) {  
        return $this->db->select('*')->from(Entities::$t_prod_temp_detalle_venta)->where('temporal_id',$temporal_id)->get()->row();
    }

    
    function EliminarTablaVentaDetalle($temporal_id) {        
        return $this->db->where('temporal_id',$temporal_id)->delete(Entities::$t_prod_temp_detalle_venta);
    }
    
    function AgregarTablaVentaDetalle($detalle_venta) {        
        return $this->db->insert(Entities::$t_prod_temp_detalle_venta,$detalle_venta);
    }
    
    function EditarTablaProductos($detalle_venta) {        
        return $this->db->where('temporal_id',$detalle_venta['producto_id'])->update(Entities::$t_prod_temp_detalle_venta,$detalle_venta);                     
    }
    public function  ObtenerProductoByCodigo($codigo_producto){
        return $this->db->select('*')->from(Entities::$t_prod_producto)->where('codigo_id',$codigo_producto)->get()->row();                     
    }
     public function ObtenerTodoLosProductosaVender($usuario){ 
        return $this->db->query('CALL sp_prod_Lista_Ventas(?)',$usuario);
    }
    public function GuardarDetalleVentatemp($detalleventa){
        return $this->db->insert(Entities::$t_prod_temp_detalle_venta,$detalleventa);
    }
    public function GuardarDetalleVenta($detalleventa){
        return $this->db->insert(Entities::$t_prod_detalle_venta,$detalleventa);
    }
    public function ObtenerClientebyDni($dni){
       return $this->db->select('*')->from(Entities::$t_gest_cliente)->where('dni',$dni)->get()->row();
    }
    public function GuardarVenta($venta){
        return $this->db->insert(Entities::$t_prod_venta,$venta);
    }
    function ObtenerMaximoIDVenta() {        
        $this->db->select_max('venta_id');
        $query = $this->db->get(Entities::$t_prod_venta); 
        $id=$query->row();            
        return $id;
    }
    public function  EliminarporSessiondeUsuario($usuario_id){
      return $this->db->where('usuario_id',$usuario_id)->delete(Entities::$t_prod_temp_detalle_venta);
    }
    public function ObtenerTodoLosRegistrostmp($usuario){ 
        return $this->db->select('*')->from(Entities::$t_prod_temp_detalle_venta)->where('usuario_id',$usuario)->get();
    }
}

