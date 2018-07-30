<?php
 require_once 'application/controllers/jkventas_controller.php';
// require_once 'assets/plugins/datatables/extensions/Editor/php/DataTables.php';
 include( "assets/plugins/datatables/extensions/Editor/php/DataTables.php" );
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Capsule\Manager as DB;
use DataTables\Editor,
    DataTables\Editor\Field,
    DataTables\Editor\Format,
    DataTables\Editor\Mjoin,
    DataTables\Editor\Options,
    DataTables\Editor\Upload,
    DataTables\Editor\Validate,
    DataTables\Editor\ValidateOptions;
use Illuminate\Http\Request;

class Productos extends jkventas_controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->model(array('Producto','Mes','Estado','Marca','Categoria'));        
    } 
    
    public function index() {
        $data['layout_body']    = 'Productos/index';
        $data['producto']       = DB::select('CALL Lista_Productos(?,?,?,?,?,?)',['2018', 0, 0,0,0,'']);  
//        $data['producto'] =null;
        $data['mes']            = Mes::all();
        $data['estado']         = Estado::all();
        $data['marca']          = Marca::all();
        $data['categoria']      = Categoria::all();

        $data['menu']  = $this->CargadoDelMenu();        
        $data['title'] = 'Productos';
        $this->load->view('main_template', $data);
    }    
    
    public function ObtenerListaProductos(){
        $anio       = $this->input->post('anio');
        $mes        = $this->input->post('mes');
        $estado     = $this->input->post('estado');
        $marca      = $this->input->post('marca');
        $categoria  = $this->input->post('categoria');
        $nombre     = $this->input->post('nombre');        
        $datos      = DB::select('CALL Lista_Productos(?,?,?,?,?,?)',[$anio,$mes,$estado,$marca,$categoria,$nombre]); 
       echo json_encode($datos);
    }
    
    function ObtenerProducto(){
       $producto_id= $this->input->post('producto_id');
       $producto= Productos::where('producto_id','=', $producto_id)->first();
//       echo $this->
               
    }
            
    function EliminarProducto(){
        $producto_id= $this->input->post('producto_id');
        $producto= Productos::where('producto_id','=',$producto_id)->first();
        $producto=delete();
    }
    
    


//    public function MantenimientoProducto(){
////        $todo    = $this->input->post($data);   
//         $todo    = $_POST['data'];
////        var_dump($todo);
////        print_r($producto_id);
//        $objeto= array();
//        $accion=null;
//        if(isset($todo)){
//        foreach ($todo as $key => $value) {
////            foreach ($value as $key => $value) {
////                print_r($key);
//        if ($key=='action'){
//            $accion=$value;
//        } else {
//            $objeto=$value;
//        }
//        }   
//                
////            } 
//        }      
//        $producto_id=null;
////        var_dump($objeto);
//        foreach ($objeto as $key =>$value){
////            foreach ($value as $key => $value) {
//                if($key=='producto_id'){
//                    $producto_id=$value;
//                }
////            }
//        }
//        
//        if($producto_id!=null && isset($producto_id)){
//          $producto= Producto::where('producto_id','=',$producto_id)->first();  
//        }
////        var_dump($producto);
////        $producto->delete();
////        $datos          = DB::select('CALL Lista_Productos(?,?,?,?,?,?)',['2018', 0, 0,0,0,'']); 
//    }
//    public function todo(){
//        Editor::inst(Producto::all())
//    ->fields(
//            Field::inst( 'producto_id' )
//            ->validator( Validate::notEmpty( ValidateOptions::inst()
//                ->message( 'A first name is required' ) 
//            ) ),
//            Field::inst( 'anio' )
//            ->validator( Validate::notEmpty( ValidateOptions::inst()
//                ->message( 'A first name is required' ) 
//            ) ),
//            Field::inst( 'marca_id' )
//            ->validator( Validate::notEmpty( ValidateOptions::inst()
//                ->message( 'A first name is required' ) 
//            ) ),
//            Field::inst( 'categoria_id' )
//            ->validator( Validate::notEmpty( ValidateOptions::inst()
//                ->message( 'A first name is required' ) 
//            ) ),
//            Field::inst( 'nombre' )
//            ->validator( Validate::notEmpty( ValidateOptions::inst()
//                ->message( 'A first name is required' ) 
//            ) ),
//            Field::inst( 'talla' )
//            ->validator( Validate::notEmpty( ValidateOptions::inst()
//                ->message( 'A first name is required' ) 
//            ) ),
//            Field::inst( 'color' )
//            ->validator( Validate::notEmpty( ValidateOptions::inst()
//                ->message( 'A first name is required' ) 
//            ) ),
//            Field::inst( 'precio_compra' )
//            ->validator( Validate::notEmpty( ValidateOptions::inst()
//                ->message( 'A first name is required' ) 
//            ) ),
//            Field::inst( 'precio_venta' )
//            ->validator( Validate::notEmpty( ValidateOptions::inst()
//                ->message( 'A first name is required' ) 
//            ) ),
//            Field::inst( 'fecha_compra' )
//            ->validator( Validate::notEmpty( ValidateOptions::inst()
//                ->message( 'A first name is required' ) 
//            ) ),
//        Field::inst( 'estado_id' )
//            ->validator( Validate::notEmpty( ValidateOptions::inst()
//                ->message( 'A first name is required' ) 
//            ) ),
//        Field::inst( 'descripcion' )
//            ->validator( Validate::notEmpty( ValidateOptions::inst()
//                ->message( 'A last name is required' )  
//            ) ),
//        Field::inst( 'observacion' )
//            ->validator( Validate::notEmpty( ValidateOptions::inst()
//                ->message( 'A last name is required' )  
//            ) )  
//        /*Field::inst( 'observaciones' ),
//        Field::inst( 'email' )
//            ->validator( Validate::email( ValidateOptions::inst()
//                ->message( 'Please enter an e-mail address' )   
//            ) ),
//        Field::inst( 'office' ),
//        Field::inst( 'extn' ),
//        Field::inst( 'age' )
//            ->validator( Validate::numeric() )
//            ->setFormatter( Format::ifEmpty(null) ),
//        Field::inst( 'salary' )
//            ->validator( Validate::numeric() )
//            ->setFormatter( Format::ifEmpty(null) ),
//        Field::inst( 'start_date' )
//            ->validator( Validate::dateFormat( 'Y-m-d' ) )
//            ->getFormatter( Format::dateSqlToFormat( 'Y-m-d' ) )
//            ->setFormatter( Format::dateFormatToSql('Y-m-d' ) )*/
//    )
//    ->process($_POST)
//    ->json();
//    }
}


