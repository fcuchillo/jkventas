<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Producto extends CI_Model {

  function __construct() {
        parent::__construct();
        
    }
    
    function isEmpty($value){
        return empty(trim($value))?null:$value;
    }
    
}

