<?php
require_once 'application/controllers/jkventas_controller.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class CProd_ventas extends jkventas_controller{
      public function __construct() {
        parent::__construct();
        $this->load->library(array('session','form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->model(array('MProd_venta_detalle')); 
    }
        public function index() {
        $data['layout_body']    = 'Productos/VProd_venta/index';
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
        echo json_encode($this->db->get('t_gest_cliente')->result_array());
    }
    public function ObtenerProductoAuto() {
        $keyword=$this->input->post('keyword');
        $this->db->order_by('codigo_id', 'DESC');
        $this->db->like("codigo_id", $keyword);
        echo json_encode($this->db->get('t_prod_producto')->result_array());
    }
    public function GuardaDetalleVenta(){
        $array = array('producto_id'=>$this->input->post('producto_id'),
                       'usuario_id'=>$this->session->userdata['session_user']['usuario'],
                       'cantidad'=>$this->input->post('cantidad'));
        
    }
}
