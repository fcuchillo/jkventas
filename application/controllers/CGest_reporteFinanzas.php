<?php
 require_once 'application/controllers/jkventas_controller.php';
 defined('BASEPATH') OR exit('No direct script access allowed');

class CGest_reporteFinanzas extends jkventas_controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session','form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->model(array('MProd_producto','MGest_mes','MProd_estado','MProd_marca','MProd_categoria','MGest_ingresos','MGest_reporteFinanzas'));   
    } 
    
    public function index() {        
        $data['menu_padre']     = $this->CargarMenuPadre();
        $data['menu_hijo']      = $this->CargarMenuHijo();        
        $data['layout_body']    = 'Gestion/VGest_reporteFinanzas/index';
                
        $data['title'] = 'Finanzas';
        $this->load->view('main_template', $data);
    }    
           
    public function ListaReporteFinanzas(){         
        $parametros = array (      
            'anio' =>$this->input->get('anio'),          
            'tipo' =>$this->input->get('tipo'),          
        );
        
       $resultset = $this->MGest_reporteFinanzas->ObtenerSPReporteFinanzas($parametros);
        $i=0;
        $response=[];
        foreach ($resultset->result_array()  as $row) {
        $entry  = new MGest_reporteFinanzas();
    
        $entry->setId($row['id']);
        $entry->setTipoDescripcion($row['tipoDescripcion']);                  
        $entry->setTotalProductosC($row['totalProductosC']);       
        $entry->setTotalMontoC($row['totalMontoC']);        
        $entry->setTotalProductosV($row['totalProductosV']);        
        $entry->setTotalMontoV($row['totalMontoV']); 
        $entry->setTotalMontoI($row['totalMontoI']); 
        $entry->setTotalMontoG($row['totalMontoG']); 
        $entry->setVentasMenosGastos($row['ventasMenosGastos']); 
        $entry->setIngresosMenosGastos($row['ingresosMenosGastos']); 

        $response['rows'][$i]['id'] = $entry->getId();
        $response['rows'][$i]['cell'] = array (                                                                  
                                        $entry->getTipoDescripcion(),                            
                                        $entry->getTotalProductosC(),
                                        $entry->getTotalMontoC(),
                                        $entry->getTotalProductosV(),                                       
                                        $entry->getTotalMontoV(),
                                        $entry->getTotalMontoI(),
                                        $entry->getTotalMontoG(),
                                        $entry->getVentasMenosGastos(),
                                        $entry->getIngresosMenosGastos(),
                                    );
        $i++;

        }        
        echo json_encode($response);
    
    }
    
       
}


