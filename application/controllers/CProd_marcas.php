<?php
 require_once 'application/controllers/jkventas_controller.php';
 defined('BASEPATH') OR exit('No direct script access allowed');

class CProd_marcas extends jkventas_controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->model(array('MProd_producto','MGest_mes','MProd_estado','MProd_marca','MProd_categoria'));   
    } 
    
    public function index() {        
        $data['layout_body']    = 'Productos/VProd_marcas/index';
        $data['marca']          = $this->MProd_marca->ObtenerTablaMarcas();

        $data['menu']  = $this->CargadoDelMenu();        
        $data['title'] = 'Categorias';
        $this->load->view('main_template', $data);
    }    
    
    function ObtenerListaProductos(){    
        $parametros = array (
            'marca'      =>$this->input->post('marca'),   
        );
        $datos      = $this->MProd_marca->ObtenerTablaMarcas($parametros);
        echo json_encode($datos);
    }
    
    public function ObtenerMarca(){       
       $marca_id=$this->input->post('marca_id');
       $general['marca']       = $this->MProd_marca->ObtenerTablaMArcasXmarca_id($marcas_id); 
       $general['marca']       = $this->MProd_marca->ObtenerTablaMarcas();
       echo json_encode($general);        
    }
    
    public function ListaMarcas(){         
        $parametros = array (      
            'marca'      =>$this->input->get('marca'),          
        );
        $resultset = $this->MProd_marca->ObtenerTablaMarcas($parametros);
        $i=0;
        $response=[];
        foreach ($resultset->result_array()  as $row) {
        $entry  = new MProd_marca();
    
        $entry->setId($row['id']);
        $entry->setMarca_id($row['marca_id']);                  
        $entry->setNombre($row['nombre']);       
        $entry->setDireccion($row['direccion']);        
        $entry->setObservacion($row['observacion']);

        $response['rows'][$i]['id'] = $entry->getId(); //id
        $response['rows'][$i]['cell'] = array (                                                                  
                                        $entry->getMarca_id(),                            
                                        $entry->getMarca_id(),
                                        $entry->getMarca_id(),
                                        $entry->getNombre(),                                       
                                        $entry->getDireccion(),                                                                               
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
            
    function EliminarMarca(){
       $marca_id=$this->input->post('marca_id');
       echo json_encode($this->MProd_marca->EliminarTablaMarcas($marca_id));
    }
    
    function EditarProducto(){
        
        $result = ['status'=>'success', 'message'=>'Se modificó un registro...'];
        $accion=$this->input->post('accion');        
        $producto_id=($accion=='edit'?$this->input->post('producto_id'):$this->MProd_producto->ObtenerTablaProductoMaximoID()->producto_id+1);
        $data=  array(
                    'producto_id'   =>$producto_id,
                    'codigo_id'     =>$this->input->post('codigo_id'),
                    'anio'          =>$this->input->post('anio'),
                    'mes_id'        =>$this->input->post('mes_id'),
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


