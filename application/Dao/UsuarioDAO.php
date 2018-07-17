<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'application/Dao/MasterEncuestaDao.php';
include_once 'application/Core/UsuarioService.php';
/**
 * Description of UsuarioDAO
 *
 * @author locador235dnce
 */
class UsuarioDAO extends MasterEncuestaDAO implements UsuarioService {
    //put your code here
    function __construct() {
        parent::__construct();
    }

    public function getAllUserbyNameAndPassword($user = '', $passwd = '') {
        $this->jkventas_bd->select('USUARIO, CLAVE, NOMBRE, NOMBRES, APELLIDOS');
        $this->jkventas_bd->from('EXISTS_USERINTHESYSTEM');
        $this->jkventas_bd->where('usuario',$user);
        $this->jkventas_bd->where('clave',$passwd);
        $this->jkventas_bd->limit(1);  
        return $this->jkventas_bd->get()->result();
    }
    public function Login($user='',$pass=''){

       return $this->Activarjkventas_bd(true)->select('*')
                          ->from('ENDES_T_USUARIO')
                          ->where('usuario',$user)
                          ->where('CLAVE',$pass)
                          ->limit(1)
                          ->get()->result();
    }
    public function ObtenerMenuparaUsuario($usuario){
        return $this->Activarjkventas_bd(true)->select('ENDES_T_MODULO.MODULO_ID,ENDES_T_AREA.NOMBRE AS AREA,ENDES_T_ROL.NOMBRE AS ROL,ENDES_T_ROL.ROL_ID,ENDES_T_MENU.NOMBRE AS MENU,ENDES_T_MENU.URI,ENDES_T_USUARIO.USUARIO,ENDES_T_USUARIO.CLAVE,ENDES_T_USUARIO.NOMBRES,ENDES_T_USUARIO.APELLIDOS')
                          ->from('ENDES_T_AREA')
                          ->join('ENDES_T_USUARIO ','ENDES_T_USUARIO.AREA_ID=ENDES_T_AREA.AREA_ID')
                          ->join('ENDES_T_ROLES_USUARIO ','ENDES_T_USUARIO.USUARIO_ID=ENDES_T_ROLES_USUARIO.USUARIO_ID')
                          ->join('ENDES_T_ROL ','ENDES_T_ROLES_USUARIO.ROL_ID=ENDES_T_ROL.ROL_ID')
                          ->join('ENDES_T_PERMISO ','ENDES_T_ROLES_USUARIO.ROLES_PERMISO_ID=ENDES_T_PERMISO.ROLES_PERMISO_ID')
                          ->join('ENDES_T_MENU ','ENDES_T_MENU.MENU_ID=ENDES_T_PERMISO.MENU_ID')
                          ->join('ENDES_T_MODULO ','ENDES_T_MENU.MODULO_ID=ENDES_T_MODULO.MODULO_ID')
                          ->where('ENDES_T_USUARIO.USUARIO',$usuario)
                          ->get()->result();
    }
    public function obtenerClave($usuario){
        return $this->Activarjkventas_bd(true)->select('CLAVE')
                ->from('ENDES_T_USUARIO')
                ->where('USUARIO',$usuario)
                ->get()->result();
    }
}
///lkjjm,jmk,jmkm