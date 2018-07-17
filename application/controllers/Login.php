<?php
//jghjghghghg
 require_once 'application/controllers/Endes_controller.php';
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends Endes_controller {
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
        
        $this->session->set_userdata('tokenSession', $tokenSession);

        $this->load->view('login/index' ,$data);       
    }    

    public function authentication() {     
        $this->VerificarsiAccedeDesdePath();
        $data['title'] = 'login'; 
        $this->load->view('layout/header',$data);
        $this->load->view('layout/menu', $this->CargadoDelMenu());
        $this->load->view('layout/body');
        $this->load->view('layout/footer'); 
    }
}


