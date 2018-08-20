<?php
 require_once 'application/controllers/jkventas_controller.php';
 defined('BASEPATH') OR exit('No direct script access allowed');

class CProd_productos extends jkventas_controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session','form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->model(array('MProd_producto','MGest_mes','MProd_estado','MProd_marca','MProd_categoria'));   
    } 
    
    public function index() {
        $data['menu_padre']     = $this->CargarMenuPadre();
        $data['menu_hijo']      = $this->CargarMenuHijo();        
        $data['layout_body']    = 'Productos/VProd_productos/index';
        $data['mes']            = $this->MGest_mes->ObtenerTablaMeses();
        $data['estado']         = $this->MProd_estado->ObtenerTablaEstados();
        $data['marca']          = $this->MProd_marca->ObtenerTablaMarcas();
        $data['categoria']      = $this->MProd_categoria->ObtenerTablaCategorias();
 
        $data['title'] = 'Productos';
        $this->load->view('main_template', $data);
    }    
    
//    function ObtenerListaProductos(){    
//        $parametros = array (
//            'anio'       =>$this->input->post('anio'),
//            'mes'        =>$this->input->post('mes'),
//            'estado'     =>$this->input->post('estado'),
//            'marca'      =>$this->input->post('marca'),
//            'categoria'  =>$this->input->post('categoria'),
//            'codigo'     =>$this->input->post('codigo'),
//        );
//        $datos      = $this->MProd_producto->ObtenerSPProductos($parametros);
//        echo json_encode($datos);
//    }
    
    public function ObtenerProducto(){       
       $producto_id=$this->input->post('producto_id');
       $general['producto']       = $this->MProd_producto->ObtenerTablaProductosXproducto_id($producto_id); 
       $general['mes']            = $this->MGest_mes->ObtenerTablaMeses();
       $general['estado']         = $this->MProd_estado->ObtenerTablaEstados();
       $general['marca']          = $this->MProd_marca->ObtenerTablaMarcas();
       $general['categoria']      = $this->MProd_categoria->ObtenerTablaCategorias();
       echo json_encode($general);        
    }
    
    public function ListaProductos(){       
//       $producto_id=$this->input->post('producto_id');      
//       echo json_encode($general);    
//       $resultset = $this->db->select('*')->from('t_prod_producto')->get()->result();
        
        $parametros = array (
            'anio'       =>$this->input->get('anio'),
            'mes'        =>$this->input->get('mes'),
            'estado'     =>$this->input->get('estado'),
            'marca'      =>$this->input->get('marca'),
            'categoria'  =>$this->input->get('categoria'),
            'codigo'     =>$this->input->get('codigo'),
        );
        $resultset = $this->MProd_producto->ObtenerSPProductos($parametros);        
        $i=0;
        $response=[];
        foreach ($resultset->result_array()  as $row) {
        $entry  = new MProd_producto();

        $entry->setId($row['id']);
        $entry->setProducto_id($row['producto_id']);
        $entry->setCodigo($row['codigo']);
        $entry->setAnio($row['anio']);
        $entry->setEstado($row['estado']);
        $entry->setMarca($row['marca']);
        $entry->setCategoria($row['categoria']);        
        $entry->setNombre($row['nombre']);
        $entry->setTalla($row['talla']);
        $entry->setColor($row['color']);
        $entry->setPrecio_compra($row['precio_compra']);
        $entry->setPrecio_venta($row['precio_venta']);
        $entry->setFecha_compra($row['fecha_compra']);        
        $entry->setObservacion($row['observacion']);

        $response['rows'][$i]['id'] = $entry->getId(); //id
        $response['rows'][$i]['cell'] = array (                                                                  
                                        $entry->getProducto_id(),                            
                                        $entry->getProducto_id(),
                                        $entry->getProducto_id(),
                                        $entry->getCodigo(),
                                        $entry->getAnio(),
                                        $entry->getEstado(),    
                                        $entry->getMarca(),
                                        $entry->getCategoria(),                                        
                                        $entry->getNombre(),
                                        $entry->getTalla(),
                                        $entry->getColor(),
                                        $entry->getPrecio_compra(),
                                        $entry->getPrecio_venta(),
                                        $entry->getFecha_compra(),                                        
                                        $entry->getObservacion()
                
                                    );
        $i++;

        }        
        echo json_encode($response);
    
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
                    'producto_id'   =>$producto_id,
                    'codigo_id'     =>$this->input->post('codigo_id'),
                    'anio'          =>$this->input->post('anio'),
                    'estado_id'     =>$this->input->post('estado_id'),
                    'marca_id'      =>$this->input->post('marca_id'),
                    'categoria_id'  =>$this->input->post('marca_id'),
                    'nombre'        =>$this->input->post('nombre'),
                    'talla'         =>$this->input->post('talla'),
                    'color'         =>$this->input->post('color'),
                    'precio_compra' =>$this->input->post('precio_compra'),
                    'precio_venta'  =>$this->input->post('precio_venta'),
                    'fecha_compra'  =>$this->input->post('fecha_compra'),
                    'estado_id'     =>$this->input->post('estado_id'),                    
                    'observacion'   =>$this->input->post('observacion')
                );
        
        if($accion=='edit'){                                    
           $this->MProd_producto->EditarTablaProductos($data);
        }
        
        if($accion=='add'){   
            $this->MProd_producto->AgregarTablaProductos($data);
        }
        redirect('../CProd_productos/index');
    }    
}


