<?php
 require_once 'application/controllers/jkventas_controller.php';
 defined('BASEPATH') OR exit('No direct script access allowed');

class CGest_gastos extends jkventas_controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session','form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->model(array('MProd_producto','MGest_mes','MProd_estado','MProd_marca','MProd_categoria','MGest_gastos','MGest_tipogastos'));   
    } 
    
    public function index() {        
        $data['menu_padre']     = $this->CargarMenuPadre();
        $data['menu_hijo']      = $this->CargarMenuHijo();        
        $data['layout_body']    = 'Gestion/VGest_gastos/index';
        $data['tipogasto']      = $this->MGest_tipogastos->ObtenerTablaTipogastos();
        $data['mes']            = $this->MGest_mes->ObtenerTablaMeses();
        
        $data['title'] = 'gastos';
        $this->load->view('main_template', $data);
    }    
    
    public function ObtenerGasto(){       
       $gasto_id=$this->input->post('gasto_id');
       $general['gasto']        = $this->MGest_gastos->ObtenerTablaGastosXgasto_id($gasto_id); 
       $general['tipogasto']    = $this->MGest_tipogastos->ObtenerTablaTipogastos(); 
       $general['mes']          = $this->MGest_mes->ObtenerTablaMeses();
            
       echo json_encode($general);        
    }
    
    public function ListaGastos(){         
        $parametros = array (      
            'tipogasto' =>$this->input->get('tipogasto'),          
            'mes'       =>$this->input->get('mes'),          
        );
        $resultset = $this->MGest_gastos->ObtenerSPGastos($parametros);
        $i=0;
        $response=[];
        foreach ($resultset->result_array()  as $row) {
        $entry  = new MGest_gastos();
    
        $entry->setId($row['id']);
        $entry->setGasto_id($row['gasto_id']);                  
        $entry->setNombre($row['nombre']);       
        $entry->setDescripcion($row['descripcion']);        
        $entry->setMonto($row['monto']);        
        $entry->setFecha($row['fecha']);        
        $entry->setObservacion($row['observacion']);

        $response['rows'][$i]['id'] = $entry->getId(); //id
        $response['rows'][$i]['cell'] = array (                                                                  
                                        $entry->getGasto_id(),                            
                                        $entry->getGasto_id(),
                                        $entry->getGasto_id(),
                                        $entry->getNombre(),                                       
                                        $entry->getDescripcion(),
                                        $entry->getMonto(),
                                        $entry->getFecha(),
                                        $entry->getObservacion()
                
                                    );
        $i++;

        }        
        echo json_encode($response);
    
    }
    
    function AgregarGasto(){
        $general['tipogasto']    = $this->MGest_tipogastos->ObtenerTablaTipogastos(); 
        $general['mes']          = $this->MGest_gastos->ObtenerTablaGastos();        
        echo json_encode($general);
    }
            
    function EliminarGasto(){
        $gasto_id=$this->input->post('gasto_id');
        echo json_encode($this->MGest_gastos->EliminarTablaGastos($gasto_id));
    }
    
    function EditarGasto(){        
        $result = ['status'=>'success', 'message'=>'Se modificó un registro...'];
        $accion=$this->input->post('accion');        
        $gasto_id=($accion=='edit'?$this->input->post('gasto_id'):$this->MGest_gastos->ObtenerTablaGastoMaximoID()->gasto_id+1);
        $data=  array(
                    'gasto_id'      =>$gasto_id,                    
                    'tipogasto_id'  =>$this->input->post('tipogasto_id'),                    
                    'descripcion'   =>$this->input->post('descripcion'),                    
                    'monto'         =>$this->input->post('monto'),                    
                    'fecha'         =>$this->input->post('fecha'),                    
                    'observacion'   =>$this->input->post('observacion')
                );
        
        if($accion=='edit'){                                    
           $this->MGest_gastos->EditarTablaGastos($data);
        }
        
        if($accion=='add'){   
            $this->MGest_gastos->AgregarTablaGastos($data);
        }
        redirect('../CGest_gastos/index');
    }    
}


