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
  public $estado;
  
  /***ventas**/
  public $venta_id;
  public $fecha;
  public $cantidad;
  public $total;
  public $detalle_venta_id;
  
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
    function getEstado() {
        return $this->estado;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

        /*****/
    function getVenta_id() {
        return $this->venta_id;
    }

    function getCliente_id() {
        return $this->cliente_id;
    }

    function getFecha() {
        return $this->fecha;
    }

    function setVenta_id($venta_id) {
        $this->venta_id = $venta_id;
    }

    function setCliente_id($cliente_id) {
        $this->cliente_id = $cliente_id;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }
    function getCantidad() {
        return $this->cantidad;
    }

    function getTotal() {
        return $this->total;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setTotal($total) {
        $this->total = $total;
    }
    function getDetalle_venta_id() {
        return $this->detalle_venta_id;
    }

    function setDetalle_venta_id($detalle_venta_id) {
        $this->detalle_venta_id = $detalle_venta_id;
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
    
    public function  ObtenerProductoByCodigo($codigo_producto,$usuario){
            $this->db->select('producto_id');
            $this->db->from(Entities::$t_prod_temp_detalle_venta);
            $this->db->where('usuario_id',$usuario);
            $where_clause = $this->db->get_compiled_select();
        return $this->db->select('*')->from(Entities::$t_prod_producto)->where('codigo_id',$codigo_producto)->where("producto_id NOT IN ($where_clause)",NULL,false)->get()->row();                     
    }
    
    public function ObtenerTodoLosProductosaVender($usuario){ 
        return $this->db->query('CALL sp_prod_Lista_Ventas_temp(?)',$usuario);
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
    
    public function ModificarEstadoDeProductoVendido($producto_id){
        return $this->db->where('producto_id',$producto_id)->update(Entities::$t_prod_producto,array('estado_id'=>2));                     
    }
    
    public function EditarVentaTemporal($temporal_id){
        return $this->db->select('*')
                ->from(Entities::$t_prod_temp_detalle_venta)
                ->join(Entities::$t_prod_producto,'t_prod_producto.producto_id=t_prod_temp_detalle_venta.producto_id')
                ->where('temporal_id',$temporal_id)->get()->row();
    }
    
    public function GuardarEdicionDetalleVenta($data){
        return $this->db->where('temporal_id',$data['temporal_id'])->update(Entities::$t_prod_temp_detalle_venta,array('precio'=>$data['precio']));
    }
    
    /***VENTAS GENERALES*****/
    public function ObtenerTodasLasVentasBySession($usuario_id){
        return $this->db->query('CALL sp_prod_Lista_Ventas(?)',$usuario_id);
    }
    
    public function ObtenerTodasLasVentasByVentaId($venta_id){
        return $this->db->query('CALL sp_prod_ReporteDetalleVentaId(?)',$venta_id);
    }
   
}

