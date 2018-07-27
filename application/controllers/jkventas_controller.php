<?php 

class jkventas_controller extends CI_Controller{
	public $datosparamenu;
	  public function __construct() {
    	parent::__construct();
            $this->load->model(array('Menu','Usuariopor_rol','Menu_por_rol'));
            $this->DB=new Illuminate\Database\Capsule\Manager;
	  }
	public function CargadoDelMenu(){
	  if(isset($_SESSION['session_user'])) { 
            $usuario =$this->session->userdata['session_user']['usuario'];
            $this->datosparamenu['menu_padre']= $this->CargarMenuPadre();
            $this->datosparamenu['menu_hijo'] = $this->CargarMenuHijo();
            }
          return $this->datosparamenu;
	}
      public function CargarMenuPadre(){
        if(isset($_SESSION['session_user'])) { 
         return $this->datosparamenu['menu_padre']= $this->DB::table("t_menu")->select("*")->where(array('padre_id' => NULL))
                                                      ->whereIn('menu_id',function($query){
                                                       $usuario_id =$this->session->userdata['session_user']['usuario_id'];
                                                       $rol= Usuariopor_rol::where('usuario_id','=',$usuario_id)->first();
                                                       $query->select('menu_id')->from('t_menu_x_rol')->where('rol_id','=',$rol->rol_id);
                                                      })->get();
         }
      }
      public function CargarMenuHijo(){
        if(isset($_SESSION['session_user'])) { 
          $usuario =$this->session->userdata['session_user']['usuario'];
         return Menu::all()->sortBy('orden');
         }
      }
      public function CargarDatosPadre($menu_id){
          //falta no cargar el mismo
//          return Menu::where(array('padre_id' => NULL))->whereNotIn('menu_id',$menu_id)->get();
          return Menu::where(array('padre_id' => NULL))->get();
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