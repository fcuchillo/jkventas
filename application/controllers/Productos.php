<?php
 require_once 'application/controllers/jkventas_controller.php';
 defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends jkventas_controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->model(array('Producto','Mes','Estado','Marca','Categoria'));        
    } 
    
    public function index() {
        $data['layout_body']    = 'Productos/index';
//        $data['producto']       = $this->db->query('CALL Lista_Productos(?,?,?,?,?,?)',['2018', 0, 0,0,0,''])->result_array();  
        $data['mes']            = $this->db->select('*')->from('t_mes')->get()->result();
        $data['estado']         = $this->db->select('*')->from('t_estado')->get()->result();
        $data['marca']          = $this->db->select('*')->from('t_marca')->get()->result();
        $data['categoria']      = $this->db->select('*')->from('t_categoria')->get()->result();

        $data['menu']  = $this->CargadoDelMenu();        
        $data['title'] = 'Productos';
        $this->load->view('main_template', $data);
    }    
    
    function ObtenerListaProductos(){
        $anio       = $this->input->post('anio');
        $mes        = $this->input->post('mes');
        $estado     = $this->input->post('estado');
        $marca      = $this->input->post('marca');
        $categoria  = $this->input->post('categoria');
        $nombre     = $this->input->post('nombre');        
        $datos      = $this->db->query('CALL Lista_Productos(?,?,?,?,?,?)',[$anio,$mes,$estado,$marca,$categoria,$nombre])->result_array();
        echo json_encode($datos);
    }
    
    public function ObtenerProducto(){       
       $producto_id=$this->input->post('producto_id');
       $producto= $this->db->select('*')->from('t_producto')->where('producto_id',$producto_id)->get()->row();
       $producto->accion='edit';
        $general['mes']            = $this->db->select('*')->from('t_mes')->get()->result();
        $general['estado']         = $this->db->select('*')->from('t_estado')->get()->result();
        $general['marca']          = $this->db->select('*')->from('t_marca')->get()->result();
        $general['categoria']      = $this->db->select('*')->from('t_categoria')->get()->result();
       
       $general['producto']=$producto;
       echo json_encode($general);        
    }
    
    function AgregarProducto(){
        $general['mes']            = $this->db->select('*')->from('t_mes')->get()->result();
        $general['estado']         = $this->db->select('*')->from('t_estado')->get()->result();
        $general['marca']          = $this->db->select('*')->from('t_marca')->get()->result();
        $general['categoria']      = $this->db->select('*')->from('t_categoria')->get()->result();
        echo json_encode($general);
    }
            
    function EliminarProducto(){
        $this->db->where('producto_id',$this->input->post('producto_id'));
        $this->db->delete('t_producto');
    }
    
    function EditarProducto(){
        $result = ['status'=>'success', 'message'=>'Se modificó un registro...'];
        $producto_id=$this->input->post('producto_id');
        $accion=$this->input->post('accion');
        
        if($accion=='edit'){
            $this->db->where('producto_id',$producto_id);
            $this->db->update('t_producto', array('anio'=>$this->input->post('anio'),
                                              'mes_id'=>$this->input->post('mes_id'),
                                              'marca_id'=>$this->input->post('marca_id'),
                                              'categoria_id'=>$this->input->post('marca_id'),
                                              'nombre'=>$this->input->post('nombre'),
                                              'color'=>$this->input->post('talla'),
                                              'color'=>$this->input->post('color'),
                                              'precio_compra'=>$this->input->post('precio_compra'),
                                              'precio_venta'=>$this->input->post('precio_venta'),
                                              'fecha_compra'=>$this->input->post('fecha_compra'),
                                              'estado_id'=>$this->input->post('estado_id'),
                                              'descripcion'=>$this->input->post('descripcion'),
                                              'observacion'=>$this->input->post('observacion')));
        }
        
        if($accion=='add'){
            $this->db->select_max('producto_id');
            $query = $this->db->get('t_producto'); 
            $id=$query->row();
            $this->db->insert('t_producto', array('producto_id'=>$id->producto_id+1,
                                              'anio'=>$this->input->post('anio'),
                                              'mes_id'=>$this->input->post('mes_id'),
                                              'marca_id'=>$this->input->post('marca_id'),
                                              'categoria_id'=>$this->input->post('marca_id'),
                                              'nombre'=>$this->input->post('nombre'),
                                              'talla'=>$this->input->post('talla'),
                                              'color'=>$this->input->post('color'),
                                              'precio_compra'=>$this->input->post('precio_compra'),
                                              'precio_venta'=>$this->input->post('precio_venta'),
                                              'fecha_compra'=>$this->input->post('fecha_compra'),
                                              'estado_id'=>$this->input->post('estado_id'),
                                              'descripcion'=>$this->input->post('descripcion'),
                                              'observacion'=>$this->input->post('observacion')));
        }
        echo $result;
    }    
}


