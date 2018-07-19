<?php
 require_once 'application/controllers/jkventas_controller.php';
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends jkventas_controller {
    private $ModelEncuesta;
    public function __construct() {
        parent::__construct();
        $this->load->library(array('session','form_validation'));
        $this->load->helper(array('url','form'));
    }               
    public function index() {
        $data['title'] = 'Login';
        
        $tokenSession = array(
            'tokenSessionPass'       => rand(1,9) * 9999999 + rand(0,10) * rand(0, 99999),
        );
        
        //$this->session->set_userdata('tokenSession', $tokenSession);

        $this->load->view('login/index' ,$data);       
    }    
    public function login(){

//      $this->VerificarsiAccedeDesdePath();
      
      $usuario = $this->input->post('usuario');
      $claveSHA1 = $this->input->post('clave');


//      $tokenSesionPass = $this->session->userdata['tokenSession']['tokenSessionPass'];
      $user = Usuario::where('usuario','=',''.$usuario.'')
                        ->where('clave','=',''.$claveSHA1.'')->get();
//      $claveBD = $this->UsuarioModel->obtenerClave($usuario);
      
//      $tokenSesionPassTmp = sha1($tokenSesionPass.$claveBD[0]->CLAVE);


        //$data_user=$this->UsuarioModel->getAllMenubyUsuario($usuario);
        $session_data = array(
          'usuario'       => $user[0]->USUARIO,
          'nombre'        => $user[0]->USUARIO,
          'area'          => $user[0]->ESTADO,
          'apellidos'     => $user[0]->USUARIO,
          'clave'         => $user[0]->CLAVE
        );
        
        $data["title"]= 'Welcome';
        $this->session->set_userdata('session_user', $session_data);
        //$this->load->view('layout/header',$data);
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $this->load->view('layout/body');
        $this->load->view('layout/footer');
     /* } else {
        header ("Location: http://webinei.inei.gob.pe/desarrollo/PyENDES/");
        //header ("Location: http://webinei.inei.gob.pe/PyENDES/");
      }*/ 
   }
    public function authentication() {     
        $this->VerificarsiAccedeDesdePath();
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
      header ("Location: http://localhost:8080/jkventas/");
  }
}


