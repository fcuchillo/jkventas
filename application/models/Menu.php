<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Builder;

class Menu extends Eloquent {

    protected $primaryKey = 'menu_id';
    protected $table = 't_menu';

    public $timestamps = false;
    public function setMenu_menu_id($value){
        $this->attributes['menu_id'] = $this->IsNull($value);
    }
    public function setMenu_titulo($value){
        $this->attributes['titulo'] = $this->IsNull($value);
    }
    public function setMenu_icono($value){
        $this->attributes['icono'] = $this->IsNull($value);
    }
    public function setMenu_link($value){
        $this->attributes['link'] = $this->IsNull($value);
    }
    public function setMenu_descripcion($value){
        $this->attributes['descripcion'] = $this->IsNull($value);
    }
    public function setMenu_orden($value){
        $this->attributes['orden'] = $this->IsNull($value);
    }
    public function setMenu_padre($value){
        $this->attributes['padre_id'] = $this->IsNull($value);
    }
    public function setMenu_estado($value){
        $this->attributes['estado'] = $this->IsNull($value);
    }
    function IsNull($value){
        return empty($value)?null:$value;
    } 
}



