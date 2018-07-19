<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Illuminate\Database\Eloquent\Model as Eloquent;

class Usuariopor_rol extends Eloquent {

    protected $primaryKey = 'usuario_rol_id';
    protected $table = 't_usuario_x_rol';

    public $timestamps = false;

}
