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
        $this->db->select_max('producto_id');
        $query = $this->db->get('t_producto'); 
        $id=$query->row();
        $fields = $this->db->field_data('t_producto');
        foreach ($fields as $key => $value) {
            print_r($value);
        }
//        $producto = new Producto();
//        $producto->producto_id=$id->producto_id+1;
//        echo json_encode($producto);
//        $producto->accion='add';
//        $general['mes']            = $this->db->select('*')->from('t_mes')->get()->result();
//        $general['estado']         = $this->db->select('*')->from('t_estado')->get()->result();
//        $general['marca']          = $this->db->select('*')->from('t_marca')->get()->result();
//        $general['categoria']      = $this->db->select('*')->from('t_categoria')->get()->result();
//        echo json_encode($general);
    }
            
    function EliminarProducto(){
        $producto_id= $this->input->post('producto_id');
        $this->db->where('producto_id',$producto_id);
        $this->delete('t_producto');
    }
    
    function EditarProducto(){
        $result = ['status'=>'success', 'message'=>'Se modificó un registro...'];
        $producto_id=$this->input->post('producto_id');
        $accion=$this->input->post('accion');
        
        if($accion=='edit'){
            $producto= Producto::where('producto_id','=',$producto_id)->first();
        }
        
        if($accion=='add'){
            $producto=new Producto();
            $id = $this->DB::table('t_producto')->max('producto_id');
            $producto->producto_id=$id+1;
        }
       
        $producto->anio         = $producto->isEmpty($this->input->post('anio'));
        $producto->mes_id       = $producto->isEmpty($this->input->post('mes_id'));
        $producto->marca_id     = $producto->isEmpty($this->input->post('marca_id'));
        $producto->categoria_id = $producto->isEmpty($this->input->post('categoria_id'));
        $producto->nombre       = $producto->isEmpty($this->input->post('nombre'));
        $producto->talla        = $producto->isEmpty($this->input->post('talla'));
        $producto->color        = $producto->isEmpty($this->input->post('color'));
        $producto->precio_compra= $producto->isEmpty($this->input->post('precio_compra'));
        $producto->precio_venta = $producto->isEmpty($this->input->post('precio_venta'));
        $producto->fecha_compra = $producto->isEmpty($this->input->post('fecha_compra'));
        $producto->estado_id    = $producto->isEmpty($this->input->post('estado_id')); //para cambiar el estado el prudcto debe estar vendido
        $producto->descripcion  = $producto->isEmpty($this->input->post('descripcion'));
        $producto->observacion  = $producto->isEmpty($this->input->post('observacion'));
                
        $producto->save();
        echo $result;
    }    
 
}


