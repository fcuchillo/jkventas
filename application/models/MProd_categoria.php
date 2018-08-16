<?php
require_once 'application/core/Entities.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class MProd_categoria extends CI_Model {  
  public $categoria_id;
  public $nombre;
  public $observacion;
  
  function getCategoria_id() {
      return $this->categoria_id;
  }

  function getNombre() {
      return $this->nombre;
  }

  function getObservacion() {
      return $this->observacion;
  }

  function setCategoria_id($categoria_id) {
      $this->categoria_id = $categoria_id;
  }

  function setNombre($nombre) {
      $this->nombre = $nombre;
  }

  function setObservacion($observacion) {
      $this->observacion = $observacion;
  }

    
  
    function isEmpty($value){
        return empty(trim($value))?null:$value;
    }
    
    function ObtenerTablaCategoriasXproducto_id($categoria_id) {  
        return $this->db->select('*')->from(Entities::$t_prod_categoria)->where('categoria_id',$categoria_id)->get()->row();
    }
         
    function EliminarTablaCategorias($categoria_id) {        
        return $this->db->where('categoria_id',$categoria_id)->delete(Entities::$t_prod_categoria);
    }
       
    function ObtenerTablaCategoriaMaximoID() {        
        $this->db->select_max('categoria_id');
        $query = $this->db->get(Entities::$t_prod_categoria); 
        $id=$query->row();            
        return $id;
    }
    
    function AgregarTablaCategorias($categoria) {        
        return $this->db->insert(Entities::$t_prod_categoria,$categoria);
    }
    
    function EditarTablaCategorias($categoria) {        
        return $this->db->where('$categoria_id',$categoria['categoria_id'])->update(Entities::$t_prod_categoria,$categoria);                     
    }
    
     
}

