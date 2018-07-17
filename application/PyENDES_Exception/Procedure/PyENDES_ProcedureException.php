<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PyENDES_ProcedureException extends Exception{
    
    const PyENDES_PROCEDURE_SUCESS = 'La Operación se realizo con Exito';
    const PyENDES_PROCEDURE_ERROR  = 'La Operación ha fallado';
    
    public function __construct($message='', $code = 0, Exception $previous = null) {
        parent::__construct($message, $code, $previous);
    }

    public function errorMessage() {
        switch ($this->code) {
            case 0:
                return SELF::PyENDES_PROCEDURE_ERROR;
            case 1:
                return SELF::PyENDES_PROCEDURE_SUCESS;
        }
    }
}
