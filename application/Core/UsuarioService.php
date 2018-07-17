<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author locador235dnce
 */
interface UsuarioService {
    //put your code here
    
    function getAllUserbyNameAndPassword($user='',$passwd='');
    function Login($user='',$passwd='');
    function ObtenerMenuparaUsuario($usuario);
    function obtenerClave($usuario);
}
