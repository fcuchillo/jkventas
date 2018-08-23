<?php
require_once 'application/core/Entities.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class MProd_producto extends CI_Model {
  public $id;
  public $producto_id;
  public $codigo;  
  public $estado;
  public $marca;
  public $categoria;  
  public $nombre;
  public $talla;
  public $color;
  public $precio_compra;
  public $precio_venta;
  public $fecha_compra;  
  public $fechaVenta;
  public $precioVenta;
  public $observacion;
  
  
  
    function __construct() {
        parent::__construct();
        
    }
    
    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

        public function getProducto_id() {
        return $this->producto_id;
    }

    public function getCodigo() {
        return $this->codigo;
    }
    
    function getEstado() {
        return $this->estado;
    }

        public function getMarca() {
        return $this->marca;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getTalla() {
        return $this->talla;
    }

    public function getColor() {
        return $this->color;
    }

    public function getPrecio_compra() {
        return $this->precio_compra;
    }

    public function getPrecio_venta() {
        return $this->precio_venta;
    }

    public function getFecha_compra() {
        return $this->fecha_compra;
    }

    public function getObservacion() {
        return $this->observacion;
    }

    public function setProducto_id($producto_id) {
        $this->producto_id = $producto_id;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }
    
    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setTalla($talla) {
        $this->talla = $talla;
    }

    public function setColor($color) {
        $this->color = $color;
    }

    public function setPrecio_compra($precio_compra) {
        $this->precio_compra = $precio_compra;
    }

    public function setPrecio_venta($precio_venta) {
        $this->precio_venta = $precio_venta;
    }

    public function setFecha_compra($fecha_compra) {
        $this->fecha_compra = $fecha_compra;
    }
    
    public function setObservacion($observacion) {
        $this->observacion = $observacion;
    }

    function getFechaVenta() {
        return $this->fechaVenta;
    }

    function getPrecioVenta() {
        return $this->precioVenta;
    }

    function setFechaVenta($fechaVenta) {
        $this->fechaVenta = $fechaVenta;
    }

    function setPrecioVenta($precioVenta) {
        $this->precioVenta = $precioVenta;
    }

    
    

    
    
    
    function isEmpty($value){
        return empty(trim($value))?null:$value;
    }
    
    function ObtenerTablaProductosXproducto_id($producto_id) {  
        return $this->db->select('*')->from(Entities::$t_prod_producto)->where('producto_id',$producto_id)->get()->row();
    }
    
    public function ObtenerSPProductos($parametros) {        
        return $this->db->query('CALL sp_prod_Lista_Productos(?,?,?,?,?,?)',[$parametros['anio'],$parametros['mes'],$parametros['estado'],$parametros['marca'],$parametros['categoria'],$parametros['codigo']]);
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

