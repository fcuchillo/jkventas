<?php
 require_once 'application/controllers/jkventas_controller.php';
 include( "assets/plugins/datatables/extensions/Editor/php/DataTables.php" );
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Capsule\Manager as DB;


class Productos extends jkventas_controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->model(array('Producto','Mes','Estado','Marca','Categoria'));        
    } 
    
    public function index() {
        $data['layout_body']    = 'Productos/index';
        $data['producto']       = DB::select('CALL Lista_Productos(?,?,?,?,?,?)',['2018', 0, 0,0,0,'']);  
        $data['mes']            = Mes::all();
        $data['estado']         = Estado::all();
        $data['marca']          = Marca::all();
        $data['categoria']      = Categoria::all();

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
        $datos      = DB::select('CALL Lista_Productos(?,?,?,?,?,?)',[$anio,$mes,$estado,$marca,$categoria,$nombre]); 
        echo json_encode($datos);
    }
    
    public function ObtenerProducto(){       
       $producto_id=$this->input->post('producto_id');
       $producto= Producto::where('producto_id','=',$producto_id)->first();
       $producto->accion='edit';
       $general['mes']=Mes::all();
       $general['estado']= Estado::all();
       $general['marca']= Marca::all();
       $general['categoria']= Categoria::all();
       
       $general['producto']=$producto;
       echo json_encode($general);        
    }
    
    function AgregarProducto(){
        $id= $this->DB::table('t_producto')->max('producto_id');
        $producto=new Producto();
        $id=$id+1;
        $producto->producto_id=$id;
        $producto->accion='add';
        
        $general['mes']=Mes::all();
        $general['estado']= Estado::all();
        $general['marca']= Marca::all();
        $general['categoria']= Categoria::all();
       
        $general['producto']=$producto;       
        echo json_encode($general);
    }
            
    function EliminarProducto(){
        $producto_id= $this->input->post('producto_id');
        $producto= Producto::where('producto_id','=',$producto_id)->first();
        $producto->delete();       
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


