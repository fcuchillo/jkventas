<?php

//
class Usuario extends CI_Model {

  function __construct() {
        parent::__construct();
        
    }
    function isEmpty($value){
        return empty(trim($value))?null:$value;
    }
}