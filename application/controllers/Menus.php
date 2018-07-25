<?php
require_once 'application/controllers/jkventas_controller.php';



//use Exception;
//use aplication\models\Menu;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        echo json_encode($this->DB::select('CALL Lista_Menus()'));
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
        $menu= Menu::where('menu_id','=',$menu_id)->first();
        $s= '<form id="frmMenu" action="../Menus/EditarMenu"><div class="box-body">'
           .'<table id="tblmenu" class="table table-condensed table-striped" data-toggle="table" >'
           .'<label class="PyENDES-Label">Menu_id</label>'
           .'<input type="text" class="form-control" value="'.$menu->menu_id.'" name="menu_id" id="menu_id">'
           .'<label class="PyENDES-Label">Titulo</label>'
           .'<input type="text" class="form-control" value="'.$menu->titulo.'" name="titulo" id="titulo">'
           .'<label class="PyENDES-Label">Icono</label>'
           .'<input type="text" class="form-control" value="'.$menu->icono.'" name="icono" id="icono">'
           .'<label class="PyENDES-Label">Icono</label>'
           .'<input type="text" class="form-control" value="'.$menu->link.'" name="link" id="link">'
           .'<label class="PyENDES-Label">Descripción</label>'
           .'<input type="text" class="form-control" value="'.$menu->descripcion.'" name="descripcion" id="descripcion">'
           .'<label class="PyENDES-Label">Orden</label>'
           .'<input type="text" class="form-control" value="'.$menu->orden.'" name="orden" id="orden">'
           .'<label class="PyENDES-Label">Padre</label>'
           .'<input type="text" class="form-control" value="'.$menu->padre_id.'" name="padre_id" id="padre_id">'
           .'<label class="PyENDES-Label">Estado</label>'
           .'<input type="text" class="form-control" value="'.$menu->estado.'" name="estado" id="estado">'
           .'</table>'
           .'</div></form>';
        
//        $s=$s
//            .'<div class="modal-content"> <div class="modal-header">'
//            .'<button type="button" class="btn btn-block btn-danger btn-sm" id="btnGuardar" name="btnGuardar">Aceptar</button>'
//            .'</div> </div>';
        echo $s;
    }
    
    function EditarMenu(){
        $menu_id=$this->input->post('menu_id');
//        $menu_id=$this->input->post('titulo');
//        $menu_id=$this->input->post('icono');
//        $menu_id=$this->input->post('link');
//        $menu_id=$this->input->post('descripcion');
//        $menu_id=$this->input->post('orden');
//        $menu_id=$this->input->post('padre_id');
//        $menu_id=$this->input->post('estado');
        
         
            
        $menu= Menu::where('menu_id','=',$menu_id)->first();
//        $model  = $request->all();
//        $menu->fill($model);
         $menu->setMenu_descripcion($this->input->post('descripcion'));
         $menu->save();
//        var_dump($menu);
    }
}
