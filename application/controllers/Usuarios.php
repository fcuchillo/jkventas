<?php
require_once 'application/controllers/jkventas_controller.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Usuarios  extends jkventas_controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array('session','form_validation'));
        $this->load->helper(array('url','form'));
    } 
    public function index() {
        $data['layout_body']    = 'usuario/index';
        $data['menu_padre']     = $this->CargarMenuPadre();
        $data['menu_hijo']      = $this->CargarMenuHijo();
        $data['title']          = 'Usuario';
        $this->load->view('main_template', $data);    
    }
    function Listadodeusuarios(){
        echo json_encode($this->db->select('*')->from('t_usuario')->get()->result());
    }
    public function ObtenerUsuario(){
            $query=$this->db->select('*')->from('t_usuario')->where('usuario_id',$this->input->post('usuario_id'))->get()->result();
            $usuario=$query[0];
            $usuario->accion='edit';
            echo json_encode($usuario);
    }
    public function AgregarUsuario(){
//        $id = $this->DB::table('t_usuario')->max('usuario_id');
        $this->db->select_max('usuario_id');
        $id = $this->db->get('t_usuario');  
        $query= $this->db->select('*')->from('t_usuario')->where('usuario_id',3)->get()->result();
//        $id=$id+1;
//        $usuario[]=null;
        $usuario=$query[0];
        $usuario->usuario_id=4;
        $usuario->accion='add';
//        print_r($usuario);
        echo json_encode($usuario);
    }
    function EditarUsuario(){
        //obtencion de formulario en json
        //$jsonArray = json_decode(file_get_contents('php://input'),true);
        $result = ['status'=>'success', 'message'=>'Se modificó un registro...'];
//        $usuario_id=$this->input->post('usuario_id');
        $accion=$this->input->post('accion');
        if($accion=='edit'){
//        $query= $this->db->select('*')->where('usuario_id','=',$usuario_id)->get()->result();
//        $usuario=$query[0];
        $this->db->where('usuario_id',$this->input->post('usuario_id'));
        $this->db->update('t_usuario', array('usuario' =>$this->IsEmpty($this->input->post('usuario')),
                                             'clave'=>$this->IsEmpty($this->input->post('clave')),
                                             'estado'=>$this->IsEmpty($this->input->post('estado')),
                                             'observacion'=>$this->IsEmpty($this->input->post('observacion'))));
        }
        if($accion=='add'){
        $usuario=new Usuario();
        $this->db->select_max('usuario_id');
        $id = $this->db->get('t_usuario'); 
        $this->db->update('t_usuario', array('usuario_id'=>$id+1,
                                             'usuario' =>$this->IsEmpty($this->input->post('usuario')),
                                             'clave'=>$this->IsEmpty($this->input->post('clave')),
                                             'estado'=>$this->IsEmpty($this->input->post('estado')),
                                             'observacion'=>$this->IsEmpty($this->input->post('observacion'))));
        }
        echo json_encode($result);
    }
    function EliminarUsuario(){
        $usuario_id=$this->input->post('usuario_id');
        $usuario_x_rol= Usuariopor_rol::where('usuario_id','=',$usuario_id)->first();
        if($usuario_x_rol!=NULL){
            $usuario_x_rol->delete();
        }
        $usuario= Usuario::where('usuario_id','=',$usuario_id)->first();
        $usuario->delete();
    }
    function roles(){
        $data['layout_body']    = 'usuario/roles';
        $data['menu_padre']     = $this->CargarMenuPadre();
        $data['menu_hijo']      = $this->CargarMenuHijo();
        $data['title']          = 'Usuario';
        $this->load->view('main_template', $data);   
    }
    function ListadodeRoles(){
      echo json_encode($this->db->select('*')->from('t_rol')->get()->result());  
    }
    function ObtenerMenusporRol(){
      $menus=$this->DB::table("t_menu")->select("menu_id")->whereIn('menu_id',function($query){
                                                        $query->select('menu_id')->from('t_menu_x_rol')->where('rol_id','=',Usuariopor_rol::where('rol_id','=',$this->input->post('rol_id'))->first()->rol_id);
                                                        })->get();
      $datos['todo']=$this->db->select('menu_id,titulo')->from('t_rol')->get()->result();
      $array=[];
      foreach ($menus as $value){ 
        $array[] = $value->menu_id;
      }
      $datos['registrados']=$array;
      echo json_encode($datos);
    }
    public function AsignaciondeMenu(){
        $arreglo=$this->input->post('asignados');
        $rol_id=$this->input->post('rol_id');
        Menu_por_rol::where('rol_id',$rol_id)->delete();
        foreach ($arreglo as $value){
            $data=array (
           'menu_id'=>$value,
            'rol_id'=>$rol_id,
            'estado'=>1
        );
        $this->db->insert('t_menu_x_rol',$data);
      }        
    }
    function ObtenerRol(){
        $id = $this->DB::table('t_rol')->max('rol_id');
        $id=$id+1;
        $rol=new Rol();
        $rol->rol_id=$id;
        echo $this->RenderHtmlRol($rol,'add');
    }
    function MantenimientoRol(){
        $accion=$this->input->post('accion');
        $rol_id=$this->input->post('rol_id');
        if($accion=='edit'){
           $rol=Rol::where('rol_id','=',$rol_id)->first();
           $rol->titulo=$this->input->post('titulo');
           $rol->descripcion=$this->input->post('descripcion');
           $rol->estado=$this->input->post('estado');
           $rol->save();
        }
        else if($accion=='add'){
            $data=array (
            'rol_id'=>$rol_id,
            'titulo'=>$this->input->post('titulo'),
            'descripcion'=>$this->input->post('descripcion'),
            'estado'=>$this->input->post('estado')
        );
        $this->db->insert('t_rol',$data);
     }
    }
    function ObtenerRolEditar(){
        $rol_id=$this->input->post('rol_id');
        $rol=Rol::where('rol_id','=',$rol_id)->first();
        echo $this->RenderHtmlRol($rol,'edit');
    }
    function CargadodeRol(){
        $usuario_id=$this->input->post('usuario_id');
        $rol_id= Usuariopor_rol::where('usuario_id','=',$usuario_id)->first();
        if($rol_id!=NULL){
            $roles['rol']= Rol::select('rol_id')->where('rol_id','=',$rol_id->rol_id)->first();
        }
        else{
            $roles['rol']=[];
        }
        $roles['todo']= Rol::all('rol_id','titulo');
        echo json_encode($roles);
    }
    function AsignacionRoles(){
        $usuario_id=$this->input->post('usuario_id');
        $rol_id=$this->input->post('rol_id');
        if($rol_id==-1){
            $usuario_x_rol= Usuariopor_rol::where('usuario_id','=',$usuario_id)->first();
            $usuario_x_rol->delete();
        }
        else{
            $usuario_x_rol= Usuariopor_rol::where('usuario_id','=',$usuario_id)
                                           ->where('rol_id','=',$rol_id)->first();
                if($usuario_x_rol==NULL){
                    $usuario_x_rol= new Usuariopor_rol();
                    $id = Usuariopor_rol::max('usuario_rol_id');
                    $usuario_x_rol->usuario_rol_id=$id+1;
                    $usuario_x_rol->usuario_id=$usuario_id;
                    $usuario_x_rol->rol_id=$rol_id;
                    $usuario_x_rol->estado=1;
                }
                $usuario_x_rol->save();
        }
    }
    function IsEmpty($value){
        return empty(trim($value))?null:$value;
    }
}