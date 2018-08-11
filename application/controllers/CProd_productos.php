<?php
 require_once 'application/controllers/jkventas_controller.php';
 defined('BASEPATH') OR exit('No direct script access allowed');

class CProd_productos extends jkventas_controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->model(array('MProd_producto','MGest_mes','MProd_estado','MProd_marca','MProd_categoria'));   
    } 
    
    public function index() {
        //$data['producto']       = $this->db->query('CALL Lista_Productos(?,?,?,?,?,?)',['2018', 0, 0,0,0,''])->result_array();  
        $data['layout_body']    = 'Productos/VProd_productos/index';
        $data['mes']            = $this->MGest_mes->ObtenerTablaMeses();
        $data['estado']         = $this->MProd_estado->ObtenerTablaEstados();
        $data['marca']          = $this->MProd_marca->ObtenerTablaMarcas();
        $data['categoria']      = $this->MProd_categoria->ObtenerTablaCategorias();

        $data['menu']  = $this->CargadoDelMenu();        
        $data['title'] = 'Productos';
        $this->load->view('main_template', $data);
    }    
    
    function ObtenerListaProductos(){
//        $anio       = $this->input->post('anio');
//        $mes        = $this->input->post('mes');
//        $estado     = $this->input->post('estado');
//        $marca      = $this->input->post('marca');
//        $categoria  = $this->input->post('categoria');
//        $nombre     = $this->input->post('nombre');      
        $parametros = array (
            'anio'       =>$this->input->post('anio'),
            'mes'        =>$this->input->post('mes'),
            'estado'     =>$this->input->post('estado'),
            'marca'      =>$this->input->post('marca'),
            'categoria'  =>$this->input->post('categoria'),
            'nombre'     =>$this->input->post('nombre'),
        );
        $datos      = $this->MProd_producto->ObtenerTablaProductos($parametros);
        echo json_encode($datos);
    }
    
    public function ObtenerProducto(){       
       $producto_id=$this->input->post('producto_id');
       $general['producto']       = $this->MProd_producto->ObtenerTablaProductosXproducto_id($producto_id); 
       $general['mes']            = $this->MGest_mes->ObtenerTablaMeses();
       $general['estado']         = $this->MProd_estado->ObtenerTablaEstados();
       $general['marca']          = $this->MProd_marca->ObtenerTablaMarcas();
       $general['categoria']      = $this->MProd_categoria->ObtenerTablaCategorias();
       echo json_encode($general);        
    }
    
    function AgregarProducto(){
        $general['mes']            = $this->MGest_mes->ObtenerTablaMeses();
        $general['estado']         = $this->MProd_estado->ObtenerTablaEstados();
        $general['marca']          = $this->MProd_marca->ObtenerTablaMarcas();
        $general['categoria']      = $this->MProd_categoria->ObtenerTablaCategorias();
        echo json_encode($general);
    }
            
    function EliminarProducto(){
       $producto_id=$this->input->post('producto_id');
       echo json_encode($this->MProd_producto->EliminarTablaProductos($producto_id));
    }
    
    function EditarProducto(){
        
        $result = ['status'=>'success', 'message'=>'Se modificó un registro...'];
        $accion=$this->input->post('accion');        
        $producto_id=($accion=='edit'?$this->input->post('producto_id'):$this->MProd_producto->ObtenerTablaProductoMaximoID()->producto_id+1);
        $data=  array(
                       'producto_id'    =>$producto_id,
                        'anio'          =>$this->input->post('anio'),
                        'mes_id'        =>$this->input->post('mes_id'),
                        'marca_id'      =>$this->input->post('marca_id'),
                        'categoria_id'  =>$this->input->post('marca_id'),
                        'nombre'        =>$this->input->post('nombre'),
                        'color'         =>$this->input->post('talla'),
                        'color'         =>$this->input->post('color'),
                        'precio_compra' =>$this->input->post('precio_compra'),
                        'precio_venta'  =>$this->input->post('precio_venta'),
                        'fecha_compra'  =>$this->input->post('fecha_compra'),
                        'estado_id'     =>$this->input->post('estado_id'),
                        'descripcion'   =>$this->input->post('descripcion'),
                        'observacion'   =>$this->input->post('observacion')
                    );
        
        if($accion=='edit'){                                    
           $this->MProd_producto->EditarTablaProductos($data);
        }
        
        if($accion=='add'){   
            $this->MProd_producto->AgregarTablaProductos($data);
        }
        echo $result;
    }    
}


