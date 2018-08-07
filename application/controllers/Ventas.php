<?php
require_once 'application/controllers/jkventas_controller.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Ventas extends jkventas_controller{
      public function __construct() {
        parent::__construct();
        $this->load->library(array('session','form_validation'));
        $this->load->helper(array('url','form'));
    }
        public function index() {
        $data['layout_body']    = 'venta/index';
        $data['menu_padre']     = $this->CargarMenuPadre();
        $data['menu_hijo']      = $this->CargarMenuHijo();
        $data['title']          = 'Venta';
        $this->load->view('main_template', $data);    
        //mas modificaciones
    }
    public function ObtenerClienteAuto() {
        $keyword=$this->input->post('keyword');
        $this->db->order_by('cliente_id', 'DESC');
        $this->db->like("dni", $keyword);
        echo json_encode($this->db->get('t_cliente')->result_array());
    }
    public function ObtenerProductoAuto() {
        $keyword=$this->input->post('keyword');
        $this->db->order_by('producto_id', 'DESC');
        $this->db->like("nombre", $keyword);
        echo json_encode($this->db->get('t_producto')->result_array());
    }
}
