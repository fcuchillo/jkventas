<?php 

class jkventas_controller extends CI_Controller{
	public $datosparamenu;
        public $DB;
	public function __construct() {
    	parent::__construct();
            $this->load->model(array('Menu','Usuariopor_rol','Menu_por_rol'));
            $this->DB=$this->load->database('jkventas');
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
//         return $this->DB::table("t_menu")->select("*")->where(array('padre_id' => NULL))
//                                                      ->whereIn('menu_id',function($query){
//                                                       $usuario_id =$this->session->userdata['session_user']['usuario_id'];
//                                                       $rol= Usuariopor_rol::where('usuario_id','=',$usuario_id)->first();
//                                                       $query->select('menu_id')->from('t_menu_x_rol')->where('rol_id','=',$rol->rol_id);
//                                                      })->get();
            $this->db->select('rol_id');
            $this->db->from('t_usuario_x_rol');
            $this->db->where('usuario_id',$this->session->userdata['session_user']['usuario_id']);
            $where_rol=$this->db->get()->row();
//            var_dump($where_rol);
            $this->db->select('menu_id');
            $this->db->from('t_menu_x_rol');
            $this->db->where('rol_id',$where_rol->rol_id);
            $where_clause = $this->db->get_compiled_select();
            return $this->db->select('*')
                            ->from('t_menu')
                            ->where('padre_id')
                            ->where("`menu_id` IN ($where_clause)",NULL,false)
                            ->get()
                            ->result();
         }
      }
      public function CargarMenuHijo(){
        if(isset($_SESSION['session_user'])) { 
          $usuario =$this->session->userdata['session_user']['usuario'];

//          return $this->DB::table("t_menu")->select("*")->whereNotNull('padre_id')
//                                                      ->whereIn('menu_id',function($query){
//                                                       $usuario_id =$this->session->userdata['session_user']['usuario_id'];
//                                                       $rol= Usuariopor_rol::where('usuario_id','=',$usuario_id)->first();
//                                                       $query->select('menu_id')->from('t_menu_x_rol')->where('rol_id','=',$rol->rol_id);
//                                                      })->get()->sortBy('orden');
            $this->db->select('rol_id');
            $this->db->from('t_usuario_x_rol');
            $this->db->where('usuario_id',$this->session->userdata['session_user']['usuario_id']);
            $where_rol=$this->db->get()->row();
//            var_dump($where_rol);
            $this->db->select('menu_id');
            $this->db->from('t_menu_x_rol');
            $this->db->where('rol_id',$where_rol->rol_id);
            $where_clause = $this->db->get_compiled_select();
            return $this->db->select('*')
                            ->from('t_menu')
                            ->where('padre_id IS NOT NULL',NULL,false)
                            ->where("`menu_id` IN ($where_clause)",NULL,false)
                            ->get()
                            ->result();
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