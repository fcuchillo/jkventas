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
        echo json_encode(Usuario::all());
    }
    public function ObtenerUsuario(){
        $usuario_id=$this->input->post('usuario_id');
        $usuario= Usuario::where('usuario_id','=',$usuario_id)->first();
        $usuario->accion='edit';
        echo json_encode($usuario);
//        echo $this->renderizarhtml($usuario,'edit');       
    }
    public function AgregarUsuario(){
        $id = $this->DB::table('t_usuario')->max('usuario_id');
        $usuario= new Usuario();
        $id=$id+1;
        $usuario->usuario_id=$id;
        $usuario->accion='add';
        echo json_encode($usuario);
//        echo $this->renderizarhtml($usuario,'add');
    }
    function EditarUsuario(){
        //obtencion de formulario en json
        //$jsonArray = json_decode(file_get_contents('php://input'),true);
        $result = ['status'=>'success', 'message'=>'Se modificó un registro...'];
        $usuario_id=$this->input->post('usuario_id');
        $accion=$this->input->post('accion');
        if($accion=='edit'){
        $usuario= Usuario::where('usuario_id','=',$usuario_id)->first();
        }
        if($accion=='add'){
        $usuario=new Usuario();
        $id = $this->DB::table('t_usuario')->max('usuario_id');
        $usuario->usuario_id=$id+1;
        }
        //campos generales
        $usuario->usuario=$usuario->isEmpty($this->input->post('usuario'));
        $usuario->clave=$usuario->isEmpty($this->input->post('clave'));
        $usuario->observacion=$usuario->isEmpty($this->input->post('observacion'));
        $usuario->estado=$this->input->post('estado')==1?true:false;
        $usuario->save();
        
//        else if($accion=='add'){
//        
//        $usuario->usuario=$nombre;
//        $usuario->clave=$clave;
//        $usuario->observacion=$observacion;
//        $usuario->estado=$estado;
//        $usuario->save();
//        $id=$id+1;
//        $data=array (
//           'usuario_id'=>$id,
//           'usuario'=>$this->input->post('titulo'),
//            'clave'=>$this->input->post('clave'),
//            'estado'=>$this->input->post('estado'),
//            'observacion'=>$this->input->post('observacion'),
//        );
//        $this->db->insert('t_usuario',$data);
//        }
        echo $result;
    }
    function renderizarhtml(Usuario $usuario,$accion){
        $s= '<form id="frmMenu" action="../Menus/EditarUsuario"><div class="box-body">'
           .'<table id="tblmenu" class="table table-condensed table-striped" data-toggle="table" >'
           .'<label class="PyENDES-Label">Usuario_id</label>'
           .'<input type="text" class="form-control" value="'.$usuario->usuario_id.'" name="usuario_id" id="usuario_id" readonly>'
           .'<input type="hidden" class="form-control" value="'.$accion.'" name="accion" id="accion">'
           .'<label class="PyENDES-Label">Nombre de Usuario</label>'
           .'<input type="text" class="form-control" value="'.$usuario->usuario.'" name="usuario" id="usuario">'
           .'<label class="PyENDES-Label">Clave</label>'
           .'<input type="password" class="form-control" value="'.$usuario->clave.'" name="clave" id="clave">';
           $s=$s.'<label class="PyENDES-Label">Estado</label>'
           .'<select class="form-control input-sm" name="estado" id="estado"><option value="0" '.("0"== $usuario->estado? "selected='selected'":"").'>Inactivo</option>'
           .'<option value="1" '.("1"== $usuario->estado? "selected='selected'":"").'>Activo</option></select>'
           .'<label class="PyENDES-Label">Observacion</label>'
           .'<textarea id="observacion" name="observacion" class="form-control input-sm" rows="3" cols="5" maxlength="100"
                  wrap="hard">'.$usuario->observacion.'</textarea>'
           .'</table>'
           .'</div></form>';
        return $s;
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
      echo json_encode(Rol::all());  
    }
    function ObtenerMenusporRol(){
      $menus=$this->DB::table("t_menu")->select("menu_id")->whereIn('menu_id',function($query){
                                                        $query->select('menu_id')->from('t_menu_x_rol')->where('rol_id','=',Usuariopor_rol::where('rol_id','=',$this->input->post('rol_id'))->first()->rol_id);
                                                        })->get();
      $datos['todo']=Menu::all('menu_id','titulo');
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
    function RenderHtmlRol(Rol $rol,$accion){
        $s= '<form id="frmRol"><div class="box-body">'
           .'<table id="tblrol" class="table table-condensed table-striped" data-toggle="table" >'
           .'<label class="PyENDES-Label">Rol_id</label>'
           .'<input type="text" class="form-control input-sm" value="'.$rol->rol_id.'" name="rol_id" id="rol_id" readonly>'
           .'<input type="hidden" class="form-control" value="'.$accion.'" name="accion" id="accion">'
           .'<label class="PyENDES-Label">Nombre de Rol</label>'
           .'<input type="text" class="form-control input-sm" value="'.$rol->titulo.'" name="titulo" id="titulo">'
           .'<label class="PyENDES-Label">Descripción</label>'
           .'<textarea id="descripcion" name="descripcion" class="form-control input-sm" rows="3" cols="5" maxlength="100"
                  wrap="hard">'.$rol->descripcion.'</textarea>';
           $s=$s.'<label class="PyENDES-Label">Estado</label>'
           .'<select class="form-control input-sm" name="estado" id="estado"><option value="0" '.("0"== $rol->estado? "selected='selected'":"").'>Inactivo</option>'
           .'<option value="1" '.("1"== $rol->estado? "selected='selected'":"").'>Activo</option></select>'
           .'</table>'
           .'</div></form>';
        return $s;
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
}