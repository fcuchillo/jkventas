<?php
require_once 'application/controllers/jkventas_controller.php';
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
        $data['menus']          = $this->DB::select('CALL Lista_Menus()');
        $data['title']          = 'Menu';
        $this->load->view('main_template', $data);    
        //mas modificaciones
    }
    public function defaulto(){
        return null;
    }    
}
