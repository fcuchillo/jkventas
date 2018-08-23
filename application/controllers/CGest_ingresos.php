<?php
 require_once 'application/controllers/jkventas_controller.php';
 defined('BASEPATH') OR exit('No direct script access allowed');

class CGest_ingresos extends jkventas_controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session','form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->model(array('MProd_producto','MGest_mes','MProd_estado','MProd_marca','MProd_categoria','MGest_ingresos','MGest_tipoingresos'));   
    } 
    
    public function index() {        
        $data['menu_padre']     = $this->CargarMenuPadre();
        $data['menu_hijo']      = $this->CargarMenuHijo();        
        $data['layout_body']    = 'Gestion/VGest_Ingresos/index';
        $data['tipoingreso']    = $this->MGest_tipoingresos->ObtenerTablaTipoingresos();
        $data['mes']            = $this->MGest_mes->ObtenerTablaMeses();
        
        $data['title'] = 'Ingresos';
        $this->load->view('main_template', $data);
    }    
    
    public function ObtenerIngreso(){       
       $ingreso_id=$this->input->post('ingreso_id');
       $general['ingreso']      = $this->MGest_ingresos->ObtenerTablaIngresosXingreso_id($ingreso_id); 
       $general['tipoingreso']  = $this->MGest_tipoingresos->ObtenerTablaTipoingresos(); 
       $general['mes']          = $this->MGest_mes->ObtenerTablaMeses();
            
       echo json_encode($general);        
    }
    
    public function ListaIngresos(){         
        $parametros = array (      
            'tipoingreso' =>$this->input->get('tipoingreso'),          
            'mes'       =>$this->input->get('mes'),          
        );
        $resultset = $this->MGest_ingresos->ObtenerSPIngresos($parametros);
        $i=0;
        $response=[];
        foreach ($resultset->result_array()  as $row) {
        $entry  = new MGest_ingresos();
    
        $entry->setId($row['id']);
        $entry->setIngreso_id($row['ingreso_id']);                  
        $entry->setNombre($row['nombre']);       
        $entry->setDescripcion($row['descripcion']);        
        $entry->setMonto($row['monto']);        
        $entry->setFecha($row['fecha']); 

        $response['rows'][$i]['id'] = $entry->getId(); //id
        $response['rows'][$i]['cell'] = array (                                                                  
                                        $entry->getIngreso_id(),                            
                                        $entry->getIngreso_id(),
                                        $entry->getIngreso_id(),
                                        $entry->getNombre(),                                       
                                        $entry->getDescripcion(),
                                        $entry->getMonto(),
                                        $entry->getFecha()
                                    );
        $i++;

        }        
        echo json_encode($response);
    
    }
    
    function AgregarIngreso(){
        $general['tipoingreso']  = $this->MGest_tipoingresos->ObtenerTablaTipoingresos(); 
        $general['mes']          = $this->MGest_ingresos->ObtenerTablaIngresos();        
        echo json_encode($general);
    }
            
    function EliminarIngreso(){
        $ingreso_id=$this->input->post('ingreso_id');
        echo json_encode($this->MGest_ingresos->EliminarTablaIngresos($ingreso_id));
    }
    
    function EditarIngreso(){        
        $result = ['status'=>'success', 'message'=>'Se modificó un registro...'];
        $accion=$this->input->post('accion');        
        $ingreso_id=($accion=='edit'?$this->input->post('ingreso_id'):$this->MGest_ingresos->ObtenerTablaIngresoMaximoID()->ingreso_id+1);
        $data=  array(
                    'ingreso_id'      =>$ingreso_id,                    
                    'tipoingreso_id'  =>$this->input->post('tipoingreso_id'),                    
                    'descripcion'     =>$this->input->post('descripcion'),                    
                    'monto'           =>$this->input->post('monto'),                    
                    'fecha'           =>$this->input->post('fecha')
                );
        
        if($accion=='edit'){                                    
           $this->MGest_ingresos->EditarTablaIngresos($data);
        }
        
        if($accion=='add'){   
            $this->MGest_ingresos->AgregarTablaIngresos($data);
        }
        
        echo json_encode($result);
    }    
}


