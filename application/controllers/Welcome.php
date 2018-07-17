<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index() {
        $data['title'] = 'Login';
        $this->load->view('login/index' ,$data);       
    }  
     public function login(){
		$this->load->model("UsuarioModel");
		$this->load->library(array('session','form_validation'));
      	$usuario = $this->input->post('usuario');
      	$clave = $this->input->post('clave');
      	$result = $this->UsuarioModel->getAllUserbyNameAndPassword($usuario,$clave);
      	if($result){
        	$session_data = array(
        		'usuario'       => $result[0]->usuario,    
        		'clave'         => $result[0]->clave,
        		'nombre'        => $result[0]->nombre,
        		'ape_paterno'   => $result[0]->ape_paterno,
        		'ape_materno'   => $result[0]->ape_materno
        	);
        $data["title"]= 'Welcome';
        $this->session->set_userdata('session_user', $session_data);
        $this->load->view('layout/header',$data);
        $this->load->view('layout/menu');
        $this->load->view('transferFile/registry');
        $this->load->view('layout/footer');
      } 
      else{
         // header ("Location: http://webinei.inei.gob.pe/desarrollo/PyENDES/");
         header ("Location: http://webinei.inei.gob.pe/PyENDES/");
      }

   }
   public function signout(){
    // header ("Location: http://webinei.inei.gob.pe/desarrollo/PyENDES/");
      	header ("Location: http://webinei.inei.gob.pe/PyENDES/");
  }
}
