<?php
require_once 'application/core/Entities.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class MGest_gastos extends CI_Model {
  public $id;
  public $gasto_id;
  public $nombre;  
  public $descripcion;
  public $monto;
  public $fecha;
  public $observacion;
    
  
    function __construct() {
        parent::__construct();
        
    }
    
    function getId() {
        return $this->id;
    }

    function getGasto_id() {
        return $this->gasto_id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getMonto() {
        return $this->monto;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getObservacion() {
        return $this->observacion;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setGasto_id($gasto_id) {
        $this->gasto_id = $gasto_id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setMonto($monto) {
        $this->monto = $monto;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setObservacion($observacion) {
        $this->observacion = $observacion;
    }
    
    function isEmpty($value){
        return empty(trim($value))?null:$value;
    }
    
    public function ObtenerTablaGastos(){
        return $this->db->select('*')->from(Entities::$t_gest_gastos)->get()->result();
    }
    
    public function ObtenerSPGastos($parametros) {        
        return $this->db->query('CALL sp_gest_Lista_Gastos(?,?)',[$parametros['tipogasto'],$parametros['mes']]);
    }
    
    function ObtenerTablaGastosXgasto_id($gasto_id) {  
        return $this->db->select('*')->from(Entities::$t_gest_gastos)->where('gasto_id',$gasto_id)->get()->row();
    }   
    
    function ObtenerTablaGastoMaximoID() {        
        $this->db->select_max('gasto_id');
        $query = $this->db->get(Entities::$t_gest_gastos); 
        $id=$query->row();            
        return $id;
    }
    
    function AgregarTablaGastos($gasto_id) {        
        return $this->db->insert(Entities::$t_gest_gastos,$gasto_id);
    }
    
    function EliminarTablaGastos($gasto_id) {        
        return $this->db->where('gasto_id',$gasto_id)->delete(Entities::$t_gest_gastos);
    }
    
    function EditarTablaGastos($gasto) {        
        return $this->db->where('gasto_id',$gasto['gasto_id'])->update(Entities::$t_gest_gastos,$gasto);                     
    }
    
     
}

