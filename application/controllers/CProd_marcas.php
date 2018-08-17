<?php
 require_once 'application/controllers/jkventas_controller.php';
 defined('BASEPATH') OR exit('No direct script access allowed');

class CProd_marcas extends jkventas_controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session','form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->model(array('MProd_producto','MGest_mes','MProd_estado','MProd_marca','MProd_categoria'));   
    } 
    
    public function index() {        
        $data['menu_padre']     = $this->CargarMenuPadre();
        $data['menu_hijo']      = $this->CargarMenuHijo();        
        $data['layout_body']    = 'Productos/VProd_marcas/index';
        $data['marca']          = $this->MProd_marca->ObtenerTablaMarcas();
        
        $data['title'] = 'Marcas';
        $this->load->view('main_template', $data);
    }    
    
    public function ObtenerMarca(){       
       $marca_id=$this->input->post('marca_id');
       $general['marca']       = $this->MProd_marca->ObtenerTablaMarcasXmarca_id($marca_id); 
       echo json_encode($general);        
    }
    
    public function ListaMarcas(){         
        $parametros = array (      
            'marca'      =>$this->input->get('marca'),          
        );
        $resultset = $this->MProd_marca->ObtenerSPMarcas($parametros);
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
    
    function AgregarMarca(){
        $general['marca']          = $this->MProd_marca->ObtenerTablaMarcas();
        echo json_encode($general);
    }
            
    function EliminarMarca(){
        $marca_id=$this->input->post('marca_id');
        echo json_encode($this->MProd_marca->EliminarTablaMarcas($marca_id));
    }
    
    function EditarMarca(){        
        $result = ['status'=>'success', 'message'=>'Se modificó un registro...'];
        $accion=$this->input->post('accion');        
        $marca_id=($accion=='edit'?$this->input->post('marca_id'):$this->MProd_marca->ObtenerTablaMarcaMaximoID()->marca_id+1);
        $data=  array(
                    'marca_id'      =>$marca_id,                    
                    'nombre'        =>$this->input->post('nombre'),                    
                    'direccion'     =>$this->input->post('direccion'),                    
                    'observacion'   =>$this->input->post('observacion')
                );
        
        if($accion=='edit'){                                    
           $this->MProd_marca->EditarTablaMarcas($data);
        }
        
        if($accion=='add'){   
            $this->MProd_marca->AgregarTablaMarcas($data);
        }
        redirect('../CProd_marcas/index');
    }    
}


