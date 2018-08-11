<?php
require_once 'application/controllers/jkventas_controller.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class CAdm_usuarios  extends jkventas_controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array('session','form_validation'));
        $this->load->helper(array('url','form'));
    } 
    public function index() {
        $data['layout_body']    = 'Admin/VAdm_usuario/index';
        $data['menu_padre']     = $this->CargarMenuPadre();
        $data['menu_hijo']      = $this->CargarMenuHijo();
        $data['title']          = 'Usuario';
        $this->load->view('main_template', $data);    
    }
    function Listadodeusuarios(){
        echo json_encode($this->db->select('*')->from('t_adm_usuario')->get()->result());
    }
    public function ObtenerUsuario(){
            $query=$this->db->select('*')->from('t_adm_usuario')->where('usuario_id',$this->input->post('usuario_id'))->get()->result();
            $usuario=$query[0];
            $usuario->accion='edit';
            echo json_encode($usuario);
    }
//    public function AgregarUsuario(){
////        $id = $this->DB::table('t_usuario')->max('usuario_id');
//        $this->db->select_max('usuario_id');
//        $id = $this->db->get('t_usuario');  
//        $query= $this->db->select('*')->from('t_usuario')->where('usuario_id',3)->get()->result();
////        $id=$id+1;
////        $usuario[]=null;
//        $usuario=$query[0];
//        $usuario->usuario_id=4;
//        $usuario->accion='add';
////        print_r($usuario);
//        echo json_encode($usuario);
//    }
    function EditarUsuario(){
        //obtencion de formulario en json
        //$jsonArray = json_decode(file_get_contents('php://input'),true);
        $result = ['status'=>'success', 'message'=>'Se modificó un registro...'];
//        $usuario_id=$this->input->post('usuario_id');
        $accion=$this->input->post('accion');
        if($accion=='edit'){
        $this->db->where('usuario_id',$this->input->post('usuario_id'));
        $this->db->update('t_adm_usuario', array('usuario' =>$this->IsEmpty($this->input->post('usuario')),
                                             'clave'=>$this->IsEmpty($this->input->post('clave')),
                                             'estado'=>$this->IsEmpty($this->input->post('estado')),
                                             'observacion'=>$this->IsEmpty($this->input->post('observacion'))));
        }
        if($accion=='add'){
        $this->db->select_max('usuario_id');
        $query = $this->db->get('t_adm_usuario'); 
        $id=$query->row();
        $this->db->insert('t_adm_usuario', array('usuario_id'=>$id->usuario_id+1,
                                             'usuario' =>$this->IsEmpty($this->input->post('usuario')),
                                             'clave'=>$this->IsEmpty($this->input->post('clave')),
                                             'estado'=>$this->IsEmpty($this->input->post('estado')),
                                             'observacion'=>$this->IsEmpty($this->input->post('observacion'))));
        }
        echo json_encode($result);
    }
    function EliminarUsuario(){
        $usuario_id=$this->input->post('usuario_id');
        $this->db->where('usuario_id',$usuario_id);
        $this->db->delete('t_adm_usuario_x_rol');
        $this->db->where('usuario_id',$usuario_id);
        $this->db->delete('t_adm_usuario');
    }
    function roles(){
        $data['layout_body']    = 'Admin/VAdm_usuario/roles';
        $data['menu_padre']     = $this->CargarMenuPadre();
        $data['menu_hijo']      = $this->CargarMenuHijo();
        $data['title']          = 'Usuario';
        $this->load->view('main_template', $data);   
    }
    function ListadodeRoles(){
      echo json_encode($this->db->select('*')->from('t_adm_rol')->get()->result());  
    }
    function ObtenerMenusporRol(){
            $this->db->select('rol_id');
            $this->db->from('t_adm_usuario_x_rol');
            $this->db->where('rol_id',$this->input->post('rol_id'));
            $where_rol=$this->db->get()->row();
            
            $this->db->select('menu_id');
            $this->db->from('t_adm_menu_x_rol');
            $this->db->where('rol_id',$where_rol->rol_id);
            $where_clause = $this->db->get_compiled_select();
            $menus= $this->db->select('menu_id')
                            ->from('t_adm_menu')
                            ->where("`menu_id` IN ($where_clause)",NULL,false)
                            ->get()
                            ->result();
      $datos['todo']=$this->db->select('menu_id,titulo')->from('t_adm_menu')->get()->result();
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
        
//        Menu_por_rol::where('rol_id',$rol_id)->delete();
        $this->db->where('rol_id',$rol_id);
        $this->db->delete('t_adm_menu_x_rol');
        foreach ($arreglo as $value){
            $data=array (
           'menu_id'=>$value,
            'rol_id'=>$rol_id,
            'estado'=>1
        );
        $this->db->insert('t_adm_menu_x_rol',$data);
      }        
    }
    function MantenimientoRol(){
        $accion=$this->input->post('accion');
//        $rol_id=$this->input->post('rol_id');
//        echo json_encode($this->input->post('rol_idd'));
        if($accion=='edit'){
        $this->db->where('rol_id',$this->input->post('rol_idd'));
        $this->db->update('t_adm_rol', array('titulo'=> $this->IsEmpty($this->input->post('titulo')),
                                         'descripcion'=>$this->IsEmpty($this->input->post('descripcion')),
                                         'estado'=>$this->IsEmpty($this->input->post('estado'))));
        }
        if($accion=='add'){
        $this->db->select_max('rol_id');
        $query = $this->db->get('t_adm_rol'); 
        $id=$query->row();
        $this->db->insert('t_adm_rol', array('rol_id'=>$id->rol_id+1,
                                             'titulo' =>$this->IsEmpty($this->input->post('titulo')),
                                             'descripcion'=>$this->IsEmpty($this->input->post('descripcion')),
                                             'estado'=>$this->IsEmpty($this->input->post('estado'))));
        }
    }
    function ObtenerRolEditar(){
        $rol_id=$this->input->post('rol_id');
        $query=$this->db->select('*')->from('t_adm_rol')->where('rol_id',$rol_id)->get()->result();
        $rol=$query[0];
        $rol->accion='edit';
        echo json_encode($rol);
    }
    function CargadodeRol(){
        $usuario_id=$this->input->post('usuario_id');
        $this->db->select('rol_id');
        $this->db->where('usuario_id',$usuario_id);
        $query = $this->db->get('t_adm_usuario_x_rol'); 
        $rol_id=$query->row();
        if($rol_id!=NULL){
            $query =$this->db->select('rol_id')->from('t_adm_rol')->where('rol_id',$rol_id->rol_id)->get()->result();
            $roles['rol']= $query[0];
        }
        else{
            $roles['rol']=[];
        }
        $roles['todo']= $this->db->select('rol_id,titulo')->from('t_adm_rol')->get()->result();
        echo json_encode($roles);
    }
    function AsignacionRoles(){
        $usuario_id=$this->input->post('usuario_id');
        $rol_id=$this->input->post('rol_id');
        
        if($rol_id==-1){
             $this->db->where('usuario_id',$usuario_id);
             $this->db->delete('t_adm_usuario_x_rol');
        }
        else{
            $this->db->where('usuario_id',$usuario_id);
            $this->db->delete('t_adm_usuario_x_rol');
            
            $usuario_x_rol=$this->db->select('*')->from('t_adm_usuario_x_rol')->where('usuario_id',$usuario_id)->where('rol_id',$rol_id)->get();
            if($usuario_x_rol->num_rows()==0){
                    $this->db->select_max('usuario_rol_id');
                    $query = $this->db->get('t_adm_usuario_x_rol'); 
                    $id=$query->row();
                    
                    $this->db->insert('t_adm_usuario_x_rol',array('usuario_rol_id'=>$id->usuario_rol_id+1,
                                                              'usuario_id'=>$usuario_id,
                                                              'rol_id'=>$rol_id,
                                                              'estado'=>1));
            }
        }
    }
        function EliminarRol(){
        $rol_id=$this->input->post('rol_id');
        $this->db->where('rol_id',$rol_id);
        $this->db->delete('t_adm_menu_x_rol');

        $this->db->where('rol_id',$rol_id);
        $this->db->delete('t_adm_rol');
    }
    function IsEmpty($value){
        return empty(trim($value))?null:$value;
    }
}