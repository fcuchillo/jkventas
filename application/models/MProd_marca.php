<?php
require_once 'application/core/Entities.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class MProd_marca extends CI_Model {
  public $id;
  public $marca_id;
  public $nombre;
  public $direccion;
  public $descripcion;   
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

        function getMarca_id() {
        return $this->marca_id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getObservacion() {
        return $this->observacion;
    }

    function setMarca_id($marca_id) {
        $this->marca_id = $marca_id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setObservacion($observacion) {
        $this->observacion = $observacion;
    }

            
    
    function isEmpty($value){
        return empty(trim($value))?null:$value;
    }
    
    
    function ObtenerTablaMArcasXmarca_id($marca_id) {  
        return $this->db->select('*')->from(Entities::$t_prod_marca)->where('marca_id',$marca_id)->get()->row();
    }  

    function EliminarTablaMarcas($marca_id) {        
        return $this->db->where('marca_id',$marca_id)->delete(Entities::$t_prod_marca);
    }
    
    public function ObtenerSPMarcas($parametros) {        
        return $this->db->query('CALL sp_prod_Lista_Marcas(?)',[$parametros['marca']]);
    }
    
    public function ObtenerTablaMarcas(){
        return $this->db->select('*')->from(Entities::$t_prod_marca)->get()->result();
    }
    
    function ObtenerTablaMarcaMaximoID() {        
        $this->db->select_max('marca_id');
        $query = $this->db->get(Entities::$t_prod_marca); 
        $id=$query->row();            
        return $id;
    }
    
    function AgregarTablaMarcas($marca) {        
        return $this->db->insert(Entities::$t_prod_marca,$marca);
    }
    
    function EditarTablaMarcas($producto) {        
        return $this->db->where('marca_id',$producto['marca_id'])->update(Entities::$t_prod_marca,$marca);                     
    }
    
     
}

