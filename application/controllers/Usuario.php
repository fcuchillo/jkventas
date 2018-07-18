<?php
require_once 'application/controllers/Endes_controller.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuario
 *
 * @author locador235dnce
 */
class Usuario extends Endes_controller {
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library(array('session','form_validation', 'encryption'));
        $this->load->model('UsuarioModel');
        $this->load->helper('url');
    }
    public function index(){
        $arr = $this->UsuarioModel->getAll();
        echo json_encode($arr); 
    }
    public function login(){

      $this->VerificarsiAccedeDesdePath();
      
      $usuario = $this->input->post('usuario');
      $claveSHA1 = $this->input->post('clave');

      $tokenSesionPass = $this->session->userdata['tokenSession']['tokenSessionPass'];
      $claveBD = $this->UsuarioModel->obtenerClave($usuario);
      
      $tokenSesionPassTmp = sha1($tokenSesionPass.$claveBD[0]->CLAVE);

      if ( isset( $claveSHA1 )  && $claveSHA1 == $tokenSesionPassTmp ) {
        $data_user=$this->UsuarioModel->getAllMenubyUsuario($usuario);
        $session_data = array(
          'usuario'       => $data_user[0]->USUARIO,
          'rol'           => $data_user[0]->ROL,
          'rol_id'        => $data_user[0]->ROL_ID,
          'nombre'        => $data_user[0]->NOMBRES,
          'area'          => $data_user[0]->AREA,
          'apellidos'     => $data_user[0]->APELLIDOS,
          'clave'         => $data_user[0]->CLAVE
        );
        
        $data["title"]= 'Welcome';
        $this->session->set_userdata('session_user', $session_data);
        $this->load->view('layout/header',$data);
        $this->load->view('layout/menu',$this->CargadoDelMenu());
        $this->load->view('layout/body');
        $this->load->view('layout/footer');
      } else {
        header ("Location: http://webinei.inei.gob.pe/desarrollo/PyENDES/");
        //header ("Location: http://webinei.inei.gob.pe/PyENDES/");
      } 
   }
  public function signout(){
      $this->session->unset_userdata('usuario');
      $this->session->unset_userdata('rol');
      $this->session->unset_userdata('rol_id');
      $this->session->unset_userdata('nombre');
      $this->session->unset_userdata('area');
      $this->session->unset_userdata('apellidos');
      $this->session->unset_userdata('clave');
      $this->session->sess_destroy();
      header ("Location: http://webinei.inei.gob.pe/desarrollo/PyENDES/");
      //header ("Location: http://webinei.inei.gob.pe/PyENDES/");
  }
}


//hola mundo cruel