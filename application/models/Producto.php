<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Producto extends CI_Model {
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
    
}

