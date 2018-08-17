<?php
 require_once 'application/controllers/jkventas_controller.php';
 defined('BASEPATH') OR exit('No direct script access allowed');

class CProd_categorias extends jkventas_controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session','form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->model(array('MProd_producto','MGest_mes','MProd_estado','MProd_marca','MProd_categoria'));   
    } 
    
    public function index() {        
        $data['menu_padre']     = $this->CargarMenuPadre();
        $data['menu_hijo']      = $this->CargarMenuHijo();        
        $data['layout_body']    = 'Productos/VProd_categorias/index';
        $data['categoria']      = $this->MProd_categoria->ObtenerTablacategorias();
        
        $data['title'] = 'Categorias';
        $this->load->view('main_template', $data);
    }    
    
    public function ObtenerCategoria(){       
       $categoria_id=$this->input->post('categoria_id');
       $general['categoria']       = $this->MProd_categoria->ObtenerTablaCategoriasXcategoria_id($categoria_id); 
       echo json_encode($general);        
    }
    
    public function ListaCategorias(){         
        $parametros = array (      
            'categoria'      =>$this->input->get('categoria'),          
        );
        $resultset = $this->MProd_categoria->ObtenerSPCategorias($parametros);
        $i=0;
        $response=[];
        foreach ($resultset->result_array()  as $row) {
        $entry  = new MProd_categoria();
    
        $entry->setId($row['id']);
        $entry->setCategoria_id($row['categoria_id']);                  
        $entry->setNombre($row['nombre']);                       
        $entry->setObservacion($row['observacion']);

        $response['rows'][$i]['id'] = $entry->getId(); //id
        $response['rows'][$i]['cell'] = array (                                                                  
                                        $entry->getCategoria_id(),                            
                                        $entry->getCategoria_id(),
                                        $entry->getCategoria_id(),
                                        $entry->getNombre(),                                                                               
                                        $entry->getObservacion()
                
                                    );
        $i++;

        }        
        echo json_encode($response);
    
    }
    
    function AgregarCategoria(){
        $general['categoria']          = $this->MProd_categoria->ObtenerTablaCategorias();
        echo json_encode($general);
    }
            
    function EliminarCategoria(){
        $categoria_id=$this->input->post('categoria_id');
        echo json_encode($this->MProd_categoria->EliminarTablaCategorias($categoria_id));
    }
    
    function EditarCategoria(){        
        $result = ['status'=>'success', 'message'=>'Se modificó un registro...'];
        $accion=$this->input->post('accion');        
        $categoria_id=($accion=='edit'?$this->input->post('categoria_id'):$this->MProd_categoria->ObtenerTablaCategoriaMaximoID()->categoria_id+1);
        $data=  array(
                    'categoria_id'  =>$categoria_id,                    
                    'nombre'        =>$this->input->post('nombre'),                                        
                    'observacion'   =>$this->input->post('observacion')
                );
        
        if($accion=='edit'){                                    
           $this->MProd_categoria->EditarTablaCategorias($data);
        }
        
        if($accion=='add'){   
            $this->MProd_categoria->AgregarTablaCategorias($data);
        }
        redirect('../CProd_categorias/index');
    }    
}


