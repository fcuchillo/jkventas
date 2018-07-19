<?php 

class jkventas_controller extends CI_Controller{
	public $datosparamenu;
	  public function __construct() {
    	parent::__construct();
            $this->load->model(array('Menu'));
	  }
	public function CargadoDelMenu(){
	  if(isset($_SESSION['session_user'])) { 
            $usuario =$this->session->userdata['session_user']['usuario'];
            $this->datosparamenu['menu']= Menu::all();
          }
          return $this->datosparamenu;
	}
      public function CargadoMenuPorusuario(){
        /*if(isset($_SESSION['session_user'])) { 
          $usuario =$this->session->userdata['session_user']['usuario'];
         return $this->PyENDES_EncuestaModel->ObtenerMenuparaUsuario($usuario);
         }*/
      }
      public function CargadoModulos(){
        /*if(isset($_SESSION['session_user'])) { 
          $usuario =$this->session->userdata['session_user']['usuario'];
         return $this->PyENDES_EncuestaModel->ObtenerTodosModulos($usuario);
         }*/
      }
      /*public function VerificarsiAccedeDesdePath(){
        //Validamos si es el path principal ? , si lo es deje accesar desde url
        if ($this->uri->uri_string()) {
            //Carga Libraria User_agent
            $this->load->library('user_agent');
            //Verifica si llega desde un enlace
            if ($this->agent->referrer()) {
                //Busca si el enlace llega de una URL diferente
                $post = strpos($this->agent->referrer(), base_url());
                if ($post === FALSE) {
                    //Podemos aqui crear un mensaje antes de redirigir que informe
                    redirect(base_url());
                }
            }
            //Si no se llega desde un enlace se redirecciona al inicio
            else {
                //Podemos aqui crear un mensaje antes de redirigir que informe
                redirect(base_url());
            }
        }
      }*/
}