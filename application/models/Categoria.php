<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Illuminate\Database\Eloquent\Model as Eloquent;

class Categoria extends Eloquent {

    protected $primaryKey = 'categoria_id';
    protected $table = 't_categoria';

    public $timestamps = false;

}

