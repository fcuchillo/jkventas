<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class MAdm_menu extends CI_Model {

  function __construct() {
        parent::__construct();
        
    }
    function IsNull($value){
        return empty($value)?null:$value;
    } 
}



