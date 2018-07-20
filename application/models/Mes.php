<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Illuminate\Database\Eloquent\Model as Eloquent;

class Mes extends Eloquent {

    protected $primaryKey = 'mes_id';
    protected $table = 't_mes';

    public $timestamps = false;

}

