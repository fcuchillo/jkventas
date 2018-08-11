<?php
 require_once 'application/controllers/jkventas_controller.php';
defined('BASEPATH') OR exit('No direct script access allowed');

class CAdm_login extends jkventas_controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array('session','form_validation'));
        $this->load->helper(array('url','form'));
    }               
    public function index() {
        $data['title'] = 'login';
        
        $tokenSession = array(
            'tokenSessionPass'       => rand(1,9) * 9999999 + rand(0,10) * rand(0, 99999),
        );
        
        //$this->session->set_userdata('tokenSession', $tokenSession);

        $this->load->view('Admin/VAdm_login/index' ,$data);       
    }    
    public function login(){

//      $this->VerificarsiAccedeDesdePath();
      
      $usuario = $this->input->post('usuario');
      $claveSHA1 = $this->input->post('clave');


//      $tokenSesionPass = $this->session->userdata['tokenSession']['tokenSessionPass'];
      $user = $this->db->select('*')
                       ->from('t_adm_usuario')
                       ->where('usuario',$usuario)
                       ->where('clave',$claveSHA1)->get()->result();
//      $claveBD = $this->UsuarioModel->obtenerClave($usuario);
      
//      $tokenSesionPassTmp = sha1($tokenSesionPass.$claveBD[0]->CLAVE);
    if(isset($user) && isset($user[0]->usuario)){
        $session_data = array(
          'usuario'       => $user[0]->usuario,
          'nombre'        => $user[0]->usuario,
          'area'          => $user[0]->estado,
          'apellidos'     => $user[0]->usuario,
          'clave'         => $user[0]->clave,
          'usuario_id'    => $user[0]->usuario_id
        );
        $data["title"]= 'Welcome';
        $this->session->set_userdata('session_user', $session_data);
        $this->load->view('layout/header',$data);
        $this->load->view('layout/menu',$this->CargadoDelMenu());
        $this->load->view('layout/body');
        $this->load->view('layout/footer');
     } 
      else {
        header ("Location: ".base_url());
      }
   }
    public function authentication() {     
//        $this->VerificarsiAccedeDesdePath();
        $data['title'] = 'login'; 
        $this->load->view('layout/header',$data);
        $this->load->view('layout/menu', $this->CargadoDelMenu());
        $this->load->view('layout/body');
        $this->load->view('layout/footer'); 
    }
      public function signout(){
      $this->session->unset_userdata('usuario');
      $this->session->unset_userdata('nombre');
      $this->session->unset_userdata('area');
      $this->session->unset_userdata('apellidos');
      $this->session->unset_userdata('clave');
      $this->session->sess_destroy();
      header ("Location: ".base_url());
    }
}


