<?php
require_once 'application/controllers/jkventas_controller.php';
//use Exception;
//use aplication\models\Menu;

//use Illuminate\Database\Capsule\Manager as DB;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Menus extends jkventas_controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array('session','form_validation'));
        $this->load->helper(array('url','form'));
    } 
    public function index() {
        $data['layout_body']    = 'menu/index';
        $data['menu_padre']     = $this->CargarMenuPadre();
        $data['menu_hijo']      = $this->CargarMenuHijo();
        $data['menus']          = null;//$this->DB::select('CALL Lista_Menus()');
        $data['title']          = 'Menu';
        $this->load->view('main_template', $data);    
        //mas modificaciones
    }
    public function ObtenerListadodeMenu(){
        $query = $this->db->query("CALL Lista_Menus()");
        echo json_encode( $query->result());
    }
//    public function EditarMenu(){
////        $result=new  Array();
//         $menu = Menu::where('menu_id', '=', 1)->first();
//         $menus=$this->input->post($data);
//         foreach ($menus as $valor) {
//            print_r($valor->menu);
//        }
//        print_r($menu);
//        try {
//            $menu->save();
//        } catch (Exception $e) {
//            $result['status'] = 'error';
//            $result['message'] = 'Ocurrió un problema al actualizar... '.$e->getMessage();
//        }
//        return $result;   
//    }
    public function ObtenerMenu(){
        $menu_id=$this->input->post('menu_id');
//        $menu= Menu::where('menu_id','=',$menu_id)->first();
//        echo $this->renderizarhtml($menu,$menu_id,'edit');       
    }
    public function AgregarMenu(){
//        $id = $this->DB::table('t_menu')->max('menu_id');
//        $menu= new Menu();
//        $id=$id+1;
//        $menu->setMenu_menu_id($id);
//        echo $this->renderizarhtml($menu,$id,'add');
    }
    function EditarMenu(){
        //obtencion de formulario en json
        //$jsonArray = json_decode(file_get_contents('php://input'),true);
        $result = ['status'=>'success', 'message'=>'Se modificó un registro...'];
        $menu_id=$this->input->post('menu_id');
        $accion=$this->input->post('accion');
        if($accion=='edit'){
//        $menu= Menu::where('menu_id','=',$menu_id)->first();
//        $menu->titulo=$this->input->post('titulo');
//        $menu->icono=$this->input->post('icono');
//        $menu->link=$this->input->post('link');
//        $menu->descripcion=$this->input->post('descripcion');
//        $menu->orden=$this->input->post('orden');
//        $menu->padre_id=$this->input->post('padre_id');
//        $menu->estado=$this->input->post('estado');
//        $menu->save();
        }
        else if($accion=='add'){
//        $menu=new Menu();
//        $id = $this->DB::table('t_menu')->max('menu_id');
//        $id=$id+1;
//        $data=array (
//           'menu_id'=>$id,
//           'titulo'=>$this->input->post('titulo'),
//            'icono'=>$this->input->post('icono'),
//            'link'=>$this->input->post('link'),
//            'descripcion'=>$this->input->post('descripcion'),
//            'orden'=>$this->input->post('orden'),
//            'padre_id'=>$this->input->post('padre_id'),
//            'estado'=>$this->input->post('estado')
//        );
//        $this->db->insert('t_menu',$data);
        }
        echo $result;
    }
    function renderizarhtml(Menu $menu,$menu_id,$accion){
        $s= '<form id="frmMenu" action="../Menus/EditarMenu"><div class="box-body">'
           .'<table id="tblmenu" class="table table-condensed table-striped" data-toggle="table" >'
           .'<label class="PyENDES-Label">Menu_id</label>'
           .'<input type="text" class="form-control" value="'.$menu->menu_id.'" name="menu_id" id="menu_id" readonly>'
           .'<input type="hidden" class="form-control" value="'.$accion.'" name="accion" id="accion">'
           .'<label class="PyENDES-Label">Titulo</label>'
           .'<input type="text" class="form-control" value="'.$menu->titulo.'" name="titulo" id="titulo">'
           .'<label class="PyENDES-Label">Icono</label>'
           .'<input type="text" class="form-control" value="'.$menu->icono.'" name="icono" id="icono">'
           .'<label class="PyENDES-Label">Ruta</label>'
           .'<input type="text" class="form-control" value="'.$menu->link.'" name="link" id="link">'
           .'<label class="PyENDES-Label">Descripción</label>'
           .'<input type="text" class="form-control" value="'.$menu->descripcion.'" name="descripcion" id="descripcion">'
           .'<label class="PyENDES-Label">Orden</label>'
           .'<input type="text" class="form-control" value="'.$menu->orden.'" name="orden" id="orden">'
           .'<label class="PyENDES-Label">Padre</label>';
          $padre='<select class="form-control input-sm" name="padre_id" id="padre_id">';   
          $option='<option value="'.null.'">Ninguno</option>';
          foreach ($this->CargarDatosPadre($menu_id) as $value){
           $option=$option.'<option value="'.$value->menu_id.'" '.($value->menu_id== $menu->padre_id? "selected='selected'":"").'>'.$value->titulo.'</option>'; 
          }
           $padre=$padre.$option.'</select>';
           $s=$s.$padre;
           $s=$s.'<label class="PyENDES-Label">Estado</label>'
           .'<select class="form-control input-sm" name="estado" id="estado"><option value="0" '.("0"== $menu->estado? "selected='selected'":"").'>Inactivo</option>'
           .'<option value="1" '.("1"== $menu->estado? "selected='selected'":"").'>Activo</option></select>'
           .'</table>'
           .'</div></form>';
        return $s;
    }
    function EliminarMenu(){
//        $menu_id=$this->input->post('menu_id');
//        $menu=Menu::where('menu_id','=',$menu_id)->first();
//        $menu->delete();
    }
    function ObtenerRolporMenu(){
//        $roles=$this->DB::table("t_rol")->select("rol_id")->whereIn('rol_id',function($query){
////                                                      $query->select('rol_id')->from('t_usuario_x_rol')->whereIn('rol_id','=', Menu_por_rol::where('menu_id','=',$this->input->post('menu_id'))->get());
//                                                        $query->select('rol_id')->from('t_menu_x_rol')->where('menu_id','=',$this->input->post('menu_id'))->get();
//                                                        })->get();
//      $datos['todo']=Rol::all('rol_id','titulo');
//      $array=[];
//      foreach ($roles as $value){ 
//        $array[] = $value->rol_id;
//      }
//      $datos['registrados']=$array;
//      echo json_encode($datos);
    }
    function AsignaciondeRol(){
//        $arreglo=$this->input->post('asignados');
//        $menu_id=$this->input->post('menu_id');
////        Menu_por_rol::where('menu_id',$menu_id)->delete();
//        foreach ($arreglo as $value){
//            $data=array (
//           'menu_id'=>$menu_id,
//           'rol_id'=>$value,
//           'estado'=>1
//        );
//        $this->db->insert('t_menu_x_rol',$data);
//      }
    }
}
