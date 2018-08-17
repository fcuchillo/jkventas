<?php
require_once 'application/core/Entities.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class MGest_ingresos extends CI_Model {
  public $id;
  public $ingreso_id;
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

    function getIngreso_id() {
        return $this->ingreso_id;
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

    function setIngreso_id($ingreso_id) {
        $this->ingreso_id = $ingreso_id;
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
    
    public function ObtenerTablaIngresos(){
        return $this->db->select('*')->from(Entities::$t_gest_ingresos)->get()->result();
    }
    
    public function ObtenerSPIngresos($parametros) {        
        return $this->db->query('CALL sp_gest_Lista_ingresos(?,?)',[$parametros['tipoingreso'],$parametros['mes']]);
    }
    
    function ObtenerTablaIngresosXingreso_id($ingreso_id) {  
        return $this->db->select('*')->from(Entities::$t_gest_ingresos)->where('ingreso_id',$ingreso_id)->get()->row();
    }   
    
    function ObtenerTablaIngresoMaximoID() {        
        $this->db->select_max('ingreso_id');
        $query = $this->db->get(Entities::$t_gest_ingresos); 
        $id=$query->row();            
        return $id;
    }
    
    function AgregarTablaIngresos($ingreso_id) {        
        return $this->db->insert(Entities::$t_gest_ingresos,$ingreso_id);
    }
    
    function EliminarTablaIngresos($ingreso_id) {        
        return $this->db->where('ingreso_id',$ingreso_id)->delete(Entities::$t_gest_ingresos);
    }
    
    function EditarTablaIngresos($ingreso) {        
        return $this->db->where('ingreso_id',$ingreso['ingreso_id'])->update(Entities::$t_gest_ingresos,$ingreso);                     
    }
    
     
}

