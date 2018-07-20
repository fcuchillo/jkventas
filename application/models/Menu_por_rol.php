<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Illuminate\Database\Eloquent\Model as Eloquent;

class Menu_por_rol extends Eloquent {

    protected $primaryKey = 'menu_rol_id';
    protected $table = 't_menu_x_rol';

    public $timestamps = false;

}
