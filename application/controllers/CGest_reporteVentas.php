<?php
 require_once 'application/controllers/jkventas_controller.php';
 defined('BASEPATH') OR exit('No direct script access allowed');

class CGest_reporteVentas extends jkventas_controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session','form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->model(array('MProd_producto','MGest_mes','MProd_estado','MProd_marca','MProd_categoria','MGest_reporteVentas','MAdm_usuarios','MGest_clientes','MProd_venta_detalle'));   
    } 
    
    public function index() {
        $data['menu_padre']     = $this->CargarMenuPadre();
        $data['menu_hijo']      = $this->CargarMenuHijo();        
        $data['layout_body']    = 'Gestion/VGest_reporteVentas/index';
        $data['mes']            = $this->MGest_mes->ObtenerTablaMeses();
        $data['usuario']        = $this->MAdm_usuarios->ObtenerTablaUsuarios();
        $data['cliente']        = $this->MGest_clientes->ObtenerTablaClientes();
        
 
        $data['title'] = 'Productos';
        $this->load->view('main_template', $data);
    }    
    
    public function ListaReporteVentas(){  
        $parametros = array (
            'anio'       =>$this->input->get('anio'),
            'mes'        =>$this->input->get('mes'),
            'usuario'     =>$this->input->get('usuario')          
        );
        $resultset = $this->MGest_reporteVentas->ObtenerSPReporteVentas($parametros);        
        $i=0;
        $response=[];
        foreach ($resultset->result_array()  as $row) {
        $entry  = new MGest_reporteVentas();

        $entry->setId($row['id']);
        $entry->setVenta_id($row['venta_id']);                
        $entry->setUsuario($row['usuario']);
        $entry->setCliente($row['cliente']);
        $entry->setFecha($row['fecha']);        
        $entry->setCantidad($row['cantidad']);
        $entry->setTotal($row['total']);
        
        $response['rows'][$i]['id'] = $entry->getVenta_id(); //id
        $response['rows'][$i]['cell'] = array (                                                                                                          
                                        $entry->getVenta_id(),                                        
                                        $entry->getUsuario(),    
                                        $entry->getCliente(),
                                        $entry->getFecha(),                                        
                                        $entry->getCantidad(),
                                        $entry->getTotal(),
                                    );
        $i++;
        }        
        echo json_encode($response);    
    }
    
    public function ObtenerTodoLosProductosporVenta(){
        $data=$this->MProd_venta_detalle->ObtenerTodasLasVentasByVentaId($this->input->get('parentRowID'));
        $i=0;
        $response=[];
        foreach ($data->result_array()  as $row) {
            $entry  = new MProd_venta_detalle();
            $entry->setId ($row['id']);
            $entry->setDetalle_venta_id ($row['detalle_venta_id']);
            $entry->setProducto_id($row['producto_id']);
            $entry->setCodigo_id($row['codigo_id']);
            $entry->setNombre($row['nombre']);
            $entry->setPrecio($row['precio']);
            $response['rows'][$i]['id'] = $entry->getId(); //id
            $response['rows'][$i]['cell'] = array (                                                                  
                                            $entry->getDetalle_venta_id(),
                                            $entry->getProducto_id(),
                                            $entry->getCodigo_id(),
                                            $entry->getNombre(),
                                            $entry->getPrecio()
                                            );
            $i++;
        }
        echo json_encode($response);
    }
    
}


