<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Illuminate\Database\Eloquent\Model as Eloquent;

class Rol extends Eloquent {
    protected $primaryKey = 'rol_id';
    protected $table = 't_rol';
    public $timestamps = false;
}