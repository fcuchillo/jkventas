<?php 

class jkventas_controller extends CI_Controller{
	public $datosparamenu;
	  public function __construct() {
    	parent::__construct();
            $this->load->model(array('Menu','Usuariopor_rol','Menu_por_rol'));
	  }
	public function CargadoDelMenu(){
	  if(isset($_SESSION['session_user'])) { 
            $usuario =$this->session->userdata['session_user']['usuario'];
            $usuario_id =$this->session->userdata['session_user']['usuario_id'];
            $rol= Usuariopor_rol::where('usuario_id','=',$usuario_id)->first();
//          $menu_rol= Menu_por_rol::all();
//          $menu_rol= Menu_por_rol::select('menu_id')->where('rol_id','=',$rol->rol_id)->get();
//          foreach ($menu_rol as $v){
//                print_r($v->menu_id);
//            }
       /*     $this->datosparamenu['menu_padre']= Menu::where(array('padre_id' => NULL))
                                                      ->whereIn('menu_id',function($query){
                                                       $menu_rol= Menu_por_rol::select('menu_id')->where('rol_id','=',1)->get();
                                                       $query->select('menu_id')->from($menu_rol);
                                                      })->get();
            $this->datosparamenu['menu_hijo']= Menu::all();*/
            $this->datosparamenu['menu_padre']= Menu::where(array('padre_id' => NULL))->get();
            $this->datosparamenu['menu_hijo']= Menu::all();
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