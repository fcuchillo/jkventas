<?php
include_once 'application/Dao/UsuarioDAO.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class UsuarioModel extends CI_Model{

  function __construct() {
        parent::__construct();
        $this->user= new UsuarioDAO();
    }

    function getAllUserbyNameAndPassword($user,$pass){
       return $this->user->getAllUserbyNameAndPassword($user, $pass);
    }
    function Login($user,$pass){
    	return $this->user->Login($user,$pass);
    }
    function getAllMenubyUsuario($usuario){
    	return $this->user->ObtenerMenuparaUsuario($usuario);
    }
    function obtenerClave($usuario){
        return $this->user->obtenerClave($usuario);
    }
}
