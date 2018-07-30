<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Usuario extends Eloquent {

    protected $primaryKey = 'usuario_id';
    protected $table = 't_usuario';

    public $timestamps = false;
    function isEmpty($value){
        return empty(trim($value))?null:$value;
    }
}