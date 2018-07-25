<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Menu extends Eloquent {

    protected $primaryKey = 'menu_id';
    protected $table = 't_menu';

    public $timestamps = false;
    
    public function setMenu_descripcion($value){
        $this->attributes['descripcion'] = $value;
    }
//    public function setManzana_final_id($value){
//        $this->attributes['MANZANA_FINAL_ID'] = strtoupper($value);
//    }

}



