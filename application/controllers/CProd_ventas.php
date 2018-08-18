<?php
require_once 'application/controllers/jkventas_controller.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class CProd_ventas extends jkventas_controller{
    public static $todos="'*'";
    public function __construct() {
        parent::__construct();
        $this->load->library(array('session','form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->model(array('MProd_venta_detalle')); 
    }
        public function index() {
        $data['layout_body']    = 'Productos/VProd_venta/index';
        $data['menu_padre']     = $this->CargarMenuPadre();
        $data['menu_hijo']      = $this->CargarMenuHijo();
        $data['title']          = 'Venta';
        $this->load->view('main_template', $data);    
        //mas modificaciones
    }
    public function ObtenerClienteAuto() {
        $keyword=$this->input->post('keyword');
        $this->db->order_by('cliente_id', 'DESC');
        $this->db->like("dni", $keyword);
        echo json_encode($this->db->get('t_gest_cliente')->result_array());
    }
    public function ObtenerProductoAuto() {
        $keyword=$this->input->post('keyword');
        $this->db->order_by('codigo_id', 'DESC');
        $this->db->like("codigo_id", $keyword);
        echo json_encode($this->db->get('t_prod_producto')->result_array());
    }
    public function GuardaDetalleVenta(){
        $data = array( 'temporal_id'=>'',
                       'producto_id'=>$this->input->post('producto_id'),
                       'usuario_id'=>$this->ObtenerSessionUsuario_id(),
                       'precio'=>$this->input->post('precio'));
        echo json_encode($this->MProd_venta_detalle->GuardarDetalleVentatemp($data));
    }
    public function ObtenerProductoByCodigo(){
          echo json_encode($this->MProd_venta_detalle->ObtenerProductoByCodigo($this->input->post('codigo_id')));
    }
    public function ObtenerTodoLosProductosaVender(){
            $data=$this->MProd_venta_detalle->ObtenerTodoLosProductosaVender($this->ObtenerSessionUsuario_id());
            $i=0;
            $response=[];
            foreach ($data->result_array()  as $row) {
            $entry  = new MProd_venta_detalle();
            $entry->setId ($row['id']);
            $entry->setTemporal_id ($row['temporal_id']);
            $entry->setProducto_id($row['producto_id']);
            $entry->setCodigo_id($row['codigo_id']);
            $entry->setNombre($row['nombre']);
            $entry->setPrecio($row['precio']);
            $response['rows'][$i]['id'] = $entry->getId(); //id
            $response['rows'][$i]['cell'] = array (                                                                  
                                            $entry->getTemporal_id(),                            
                                            $entry->getTemporal_id(),
                                            $entry->getId(),
                                            $entry->getProducto_id(),
                                            $entry->getCodigo_id(),
                                            $entry->getNombre(),
                                            $entry->getPrecio()
                                            );
            $i++;
            }
            echo json_encode($response);
    }
    public function EliminarVentaDetalle(){
          echo json_encode($this->MProd_venta_detalle->EliminarTablaVentaDetalle($this->input->post('venta_id')));
    }
    public function ObtenerClientebyDni(){
      echo json_encode($this->MProd_venta_detalle->ObtenerClientebyDni($this->input->post('dni')));
    }
    public function GuardarCompraGeneral(){
        $result = [];
        $cliente_id=$this->input->post('cliente_id');
        $venta=array(
                    'venta_id'    =>$this->MProd_venta_detalle->ObtenerMaximoIDVenta()->venta_id+1,
                    'usuario_id'  =>$this->ObtenerSessionUsuario_id(),
                    'cliente_id'  =>$cliente_id,
                    'fecha'       =>$this->ObtenerFechaActual()           
                    );
                   
        $this->db->trans_begin();
        $this->MProd_venta_detalle->GuardarVenta($venta);
        $data=$this->MProd_venta_detalle->ObtenerTodoLosRegistrostmp($this->ObtenerSessionUsuario_id());
        foreach ($data->result_array()  as $row) {
        $venta_detalle=array(
                            'detalle_venta_id'  =>'',
                            'venta_id'          =>$this->MProd_venta_detalle->ObtenerMaximoIDVenta()->venta_id,
                            'producto_id'       =>$row['producto_id'],
                            'precio'            =>$row['precio'],
                            'cantidad'          =>1
                            );
          $this->MProd_venta_detalle->GuardarDetalleVenta($venta_detalle);
        }
        $this->MProd_venta_detalle->EliminarporSessiondeUsuario($this->ObtenerSessionUsuario_id());
        if ($this->db->trans_status() === FALSE){
            $result['status']='error';
            $result['message']='error al insertar';
            $this->db->trans_rollback();
        }
        else{
                $this->db->trans_commit();
                $result['status']='succes: ';
        }
     echo json_encode($result);  
    }
    
    /**VENTAS GENERALES**/
    public function ventas() {
        $data['layout_body']    = 'Productos/VProd_venta/ventageneral';
        $data['menu_padre']     = $this->CargarMenuPadre();
        $data['menu_hijo']      = $this->CargarMenuHijo();
        $data['title']          = 'Ventas';
        $this->load->view('main_template', $data);    
        //mas modificaciones
    }
   public function  ObtenerTodasLasVentasBySession(){
      $data=$this->MProd_venta_detalle->ObtenerTodasLasVentasBySession($this->ObtenerSessionUsuario_id()); 
            $i=0;
            $response=[];
            foreach ($data->result_array()  as $row) {
            $entry  = new MProd_venta_detalle();
            $entry->setId ($row['id']);
            $entry->setVenta_id ($row['venta_id']);
            $entry->setNombre($row['nombre']);
            $entry->setFecha($row['fecha']);
            $entry->setCantidad($row['cantidad']);
            $entry->setTotal($row['total']);
            $response['rows'][$i]['id'] = $entry->getVenta_id(); //id
            $response['rows'][$i]['cell'] = array (                                                                  
                                            $entry->getVenta_id(),
                                            $entry->getNombre(),
                                            $entry->getFecha(),
                                            $entry->getCantidad(),
                                            $entry->getTotal()
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
