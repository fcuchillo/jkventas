<!--Region Body-->
<div class="content-wrapper">
    <!--Region Section Header-->
    <section class="content-header">
        <h1>Productos</h1>
        <ol class="breadcrumb">
            <li><a href="<?=base_url()?>login/authentication"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Productos</a></li>
            <li class="active">Productos</li>
        </ol>
    </section>
    
    <!--End Region Section Header-->
    <!--Region Section Box-->
    <section class="content">

        <!--Region Box Filter-->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Filtro</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">                  
                        
                        <div class="col-md-1">
                            <label class="PyENDES-Label">Año</label>
                            <select class="form-control input-sm" id="anio" name="anio">
                                <option value="2018">2018</option>
                            </select>
                        </div>
                        
                        <div class="col-md-1" style="display: inline-block; width: 11% ">
                            <label class="PyENDES-Label">Mes</label>
                            <?php
                                echo '<select class="form-control input-sm" id="mes" name="mes"><option value="0">Todos</option>';
                                foreach ($mes as $value) {?>
                                    <?php echo '<option value="'.$value->mes_id.'" >'.$value->nombre.'</option>';
                                }
                                echo '</select>';
                            ?> 
                        </div>
                        
                        <div class="col-md-1" style="display: inline-block; width: 11% ">
                            <label class="PyENDES-Label">Estado</label>                            
                            <?php
                                echo '<select class="form-control input-sm" id="estado" name="estado"><option value="0">Todos</option>';
                                foreach ($estado as $value) {?>
                                    <?php echo '<option value="'.$value->estado_id.'" >'.$value->descripcion.'</option>';
                                }
                                echo '</select>';
                            ?>                                
                        </div>
                        
                        <div class="col-md-2" style="display: inline-block; width: 15% ">
                            <label class="PyENDES-Label">Marca</label>
                            <?php
                                echo '<select class="form-control input-sm" id="marca" name="marca"><option value="0">Todos</option>';
                                foreach ($marca as $value) {?>
                                    <?php echo '<option value="'.$value->marca_id.'" >'.$value->nombre.'</option>';
                                }
                                echo '</select>';
                            ?>                    
                        </div>
                        
                        <div class="col-md-2" style="display: inline-block; width: 15% ">
                            <label class="PyENDES-Label">Categoria</label>
                            <?php
                                echo '<select class="form-control input-sm" id="categoria" name="categoria"><option value="0">Todos</option>';
                                foreach ($categoria as $value) {?>
                                    <?php echo '<option value="'.$value->categoria_id.'" >'.$value->nombre.'</option>';
                                }
                                echo '</select>';
                            ?>  
                        </div>
                        
                        <div class="col-md-1" style="display: inline-block; width: 20% "> 
                            <label class="PyENDES-Label">Nombre</label>
                            <input type="text" class="form-control input-sm" id="nombre" name="nombre" placeholder="">
                        </div> 
                        
                        <div class="col-md-2">
                            <div style="display: inline-block; width: 39% ">
                                <label style="visibility: collapse">Buscar</label>
                                <button type="button" class="btn btn-block btn-primary btn-sm" id="btnBuscar">Buscar</button>
                            </div>
                            <div style="display: inline-block; width: 39%">
                                <label style="visibility: collapse">Limpiar</label>  
                                <button type="submit" class="btn btn-block btn-primary btn-sm" id="btnLimpiar">Limpiar</button>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!--End Region Box Filter-->

        <!--Region Box Result-->
        <div class="box">
            <div class="box-header with-border">
<!--                <h3 class="box-title">Lista de Productos</h3>-->
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
                
                <div class="col-md-2" style="display: inline-block; width: 7% " >                                            
                    <button type="button" class="btn btn-block btn-primary btn-sm" id="btnAgregar">Agregar</button>                    
                </div>                
            </div>
            
            <div class="box-body" id="divContenedorProducto">                
                <div class="row">
                    <div class="col-sm-12">
                        <center><label style="visibility: collapse">Espacio : </label></center>
                        <!--Region Report-->
                            
                                <table id="tblProducto" class="table table-sm table-condensed table-bordered" name="tblProducto">
                                    <thead id="headCoberturaConglomerado">
                                        <tr class="info">
                                            <!--<th><center>MODIFICAR</center></th>-->
                                            <!--<th><center>ELIMINAR</center></th>-->
                                            
                                            <th><center>PRODUCTO</center></th>                                            
                                            <th><center>MES</center></th>
                                            <th><center>MARCA</center></th>
                                            <th><center>CATEGORIA</center></th>
                                            <th><center>NOMBRE</center></th>
                                            <th><center>TALLA</center></th>
                                            <th><center>COLOR</center></th>                                            
                                            <th><center>PRECIO COMRPO</center></th>
                                            <th><center>PRECIO VENTA</center></th>                                            
                                            <th><center>FECHA COMPRA</center></th>
                                            <th><center>ESTADO</center></th>
                                            <th><center>DESCRIPCION</center></th>
                                            <th><center>OBSERVACION</center></th>
                                        </tr>            
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(isset($producto)){
                                        foreach ($producto as $value) {
                                            echo 
                                            '<tr>                                                       
                                                <td>'.$value->producto_id.'</td>
                                                <td>'.$value->mes.'</td>                                                
                                                <td>'.$value->marca.'</td>
                                                <td>'.$value->categoria.'</td>
                                                <td>'.$value->nombre.'</td>                                                
                                                <td>'.$value->talla.'</td>
                                                <td>'.$value->color.'</td>
                                                <td>'.$value->precio_compra.'</td>
                                                <td>'.$value->precio_venta.'</td>                                                
                                                <td>'.$value->fecha_compra.'</td>
                                                <td>'.$value->estado.'</td>
                                                <td>'.$value->descripcion.'</td>
                                                <td>'.$value->observacion.'</td>                                                    
                                            </tr>';
                                        }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            
                        <!--End Region Report-->
                    </div>
                </div>
                
                <form id="frmProducto" action="../Productos/EditarProducto">
                    <div class="col-sm-12">
                        <table id="tblmenu" class="table table-condensed table-striped" data-toggle="table" >'
                            <label class="PyENDES-Label">Producto_id</label>
                            <input type="text" class="form-control" <?php.$value->producto_id.?> name="producto_id" id="producto_id" readonly>
                            <input type="hidden" class="form-control" value="'.$accion.'" name="accion" id="accion">
                            <label class="PyENDES-Label">Mes</label>
                            <input type="text" class="form-control" value="'.$producto->mes.'" name="mes" id="mes">
                            <label class="PyENDES-Label">categoria</label>
                            <input type="text" class="form-control" value="'.$producto->categoria.'" name="categoria" id="categoria">
                            <label class="PyENDES-Label">nombre</label>
                            <input type="text" class="form-control" value="'.$producto->nombre.'" name="nombre" id="nombre">
                            <label class="PyENDES-Label">talla</label>
                            <input type="text" class="form-control" value="'.$producto->talla.'" name="talla" id="talla">
                            <label class="PyENDES-Label">color</label>
                            <input type="text" class="form-control" value="'.$producto->color.'" name="color" id="color">
                            <label class="PyENDES-Label">precio_compra</label>
                            <input type="text" class="form-control" value="'.$producto->precio_compra.'" name="precio_compra" id="precio_compra">
                            <label class="PyENDES-Label">precio_venta</label>
                            <input type="text" class="form-control" value="'.$producto->precio_venta.'" name="precio_venta" id="precio_venta">
                            <label class="PyENDES-Label">fecha_compra</label>
                            <input type="text" class="form-control" value="'.$producto->fecha_compra.'" name="fecha_compra" id="fecha_compra">
                            <label class="PyENDES-Label">estado</label>
                            <input type="text" class="form-control" value="'.$producto->estado.'" name="estado" id="estado">
                            <label class="PyENDES-Label">descripcion</label>
                            <input type="text" class="form-control" value="'.$producto->descripcion.'" name="descripcion" id="descripcion">
                            <label class="PyENDES-Label">observacion</label>
                            <input type="text" class="form-control" value="'.$producto->observacion.'" name="observacion" id="observacion">
                        </table>
                    </div>                        
                </form>   
                
            </div>

        </div>
        <!--End Region Box Result-->
    </section>
</div>



<!--Region Modal-->
<div class="modal" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title" id="popuptitle"></h4>
            </div>
            <div id="data-menu"></div>

            <div class="modal-content"> 
                <div class="modal-header">
                    <button type="button" class="btn btn-block btn-danger btn-sm" id="btnGuardar" name="btnGuardar">Aceptar</button>
                </div> 
            </div>
        </div>
    </div>
</div>

<!--End Region Modal-->
<div class="modal" id="myModalRoles" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title" id="popuptitle">Roles</h4>
            </div>
            <div class="modal-body">
                <form class="form" name="formMenu" method="POST">
                    <input type="hidden" value="" id="menu_id" name="menu_id">
                    <select class="form-control" name="disponibles[]" id="disponibles" multiple="multiple">
                    </select>
               </form>
            </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="btnGuardarRoles" >Guardar</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
            </div>
        </div>
    </div>


<!--Region Scripts-->
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>

<script>
    
var myTable;
var anio=null;
var mes=null;
var estado=null;
var marca=null;
var categoria=null
var nombre=null;
var editor;

    $(document).ready(function () {
//        ObtenerParametros();
        CargarTodoProducto();    
//        $('#btnBuscar').on('click', function() {
//            ObtenerParametros();
//            buscarCoberturasConglomerado();
//        });
//
//        $('#btnLimpiar').on('click', function(){        
//            $('#mes').append('<option value="0" selected="selected">Todos</option>');
//            $('#estado').val(0);
//            $('#marca').val(0);
//            $('#categoria').val(0);
//            $("#nombre").val("");            
//        });
     });
 
    function ObtenerParametros(){
        anio=$('#anio').val();
        mes=$('#mes').val();
        estado= $('#estado').val();
        marca= $('#marca').val();
        categoria=$('#categoria').val();
        nombre=$("#nombre").val();   
    }


    function CargarTodoProducto(){        
        myTable =$("#tblProducto").DataTable({
        initComplete: function () {
            jsRemoveWindowLoad();
        },          
        ajax:{            
          dataType:'json',        
          url:'../Productos/ObtenerListaProductos',
          type:'post',
          datSrc:""         
        },      
        colums:[
//            {data: 'id', render: function(value, type, full, meta) {
//                  return '<td><center>'+
//                         '<a href="javascript:void(0);" id="btnEliminar" onclick="Eliminar('+full.producto_id+');" ><span class="glyphicon glyphicon-trash" ></span></a>'+
//                         '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" id="btnMenueditar" onclick="Editar('+full.producto_id+');" ><span class="glyphicon glyphicon-pencil"></span></a>'+
//                         '</center></td>'
//                        }  },
            {data:"producto_id",    class:"textFont text-left"},
            {data:"mes",            class:"textFont text-left"},
            {data:"marca",          class:"textFont text-left"},
            {data:"categoria",      class:"textFont text-left"},
            {data:"nombre",         class:"textFont text-left"},
            {data:"talla",          class:"textFont text.left"},
            {data:"color",          class:"textFont text-left"},
            {data:"precio_compra",  class:"textFont text-left"},
            {data:"precio_venta",   class:"textFont text-left"},
            {data:"fecha_compra",   class:"textFont text-left"},
            {data:"estado",         class:"textFont text-left"},
            {data:"descripcion",    class:"textFont text-left"},
            {data:"observacion",    class:"textFont text-left"}
        ],
        columnDefs: [
            { "orderable": false, "targets": 0 }
        ],
        autoWidth: true,
        bDestroy: true
  });
  }
  
  function EliminarProducto(id){
    if(confirm("Desea Eliminar? ")){
        $.ajax({
           type:'post',
           data:{producto_id:id},
           url:'../Productos/EliminarProducto',
           success:function(response){
               CargarTodoProducto();
           }
        })       
    }
  }
  
  function EditarProducto(id){
      $.ajax({
          type:'post',
          data:{producto_id:id},
          url:'../Productos/OptenerProducto',
          success:function(response){
              
          }
      })
  }

    
//
//    editor = new $.fn.dataTable.Editor( {
//    ajax: "../Productos/todo",
//    table: "#tblProducto",
//    idSrc: "producto_id",
//    fields: [ 
//        {name: "producto_id"}, 
//        {name: "anio"}, 
//        {name: "mes_id"}, 
//        {name: "marca_id"}, 
//        {name: "categoria_id"}, 
//        {name: "nombre"}, 
//        {name: "talla"}, 
//        {name: "color"},
//        {name: "precio_compra"}, 
//        {name: "precio_venta"}, 
//        {name: "fecha_compra"}, 
//        {name: "estado_id"}, 
//        {name: "descripcion"}, 
//        {name: "observacion"}
//        ]
//    } ); 
//
//    $('#tblProducto').on( 'click', 'tbody td:not(:first-child)', function (e) {
////        console.log(this);
//        editor.inline( this );
//    } );
// 
//   $('#tblProducto').DataTable({
////        initComplete: function () {
////            jsRemoveWindowLoad();
////        },
//        dom: "Bfrtip",
//        order: [[ 1, 'asc' ]],
//        scrollY: 450,
//        scrollX: true,
//        idSrc:  'producto_id',
//        ajax: "../Productos/todo",
////            url: "../Productos/todo",
////            dataSrc: "",
////            type:"POST"
////            data: { 
////                anio        : anio, 
////                mes         : mes, 
////                estado      : estado, 
////                marca       : marca,                 
////                categoria   : categoria,                 
////                nombre      : nombre
////            },
////        },
//        columns:[ 
//            {
//                data: null,
//                defaultContent: '',
//                className: 'select-checkbox',
//                orderable: false
//            },
//            { data:"producto_id",           class:"textFont text-left"/*,      width: "100"*/    },
//            { data:"anio",                   class:"textFont text-left"/*,      width: "20" */    },            
//            { data:"mes_id",                   class:"textFont text-left"/*,      width: "20" */    },            
//            { data:"marca_id",                 class:"textFont text-left"/*,      width: "100"*/    },
//            { data:"categoria_id",             class:"textFont text-left"/*,      width: "80" */    },
//            { data:"nombre",                class:"textFont text-left"/*,      width: "200"*/    },
//            { data:"talla",                 class:"textFont text-left"/*,      width: "40" */    },
//            { data:"color",                 class:"textFont text-left"/*,      width: "40" */    },            
//            { data:"precio_compra",         class:"textFont text-left"/*,      width: "40" */    },            
//            { data:"precio_venta",          class:"textFont text-left"/*,      width: "40" */    },
//            { data:"fecha_compra",          class:"textFont text-left"/*,      width: "60" */    },
//            { data:"estado_id",                class:"textFont text-left"/*,      width: "40" */    },            
//            { data:"descripcion",           class:"textFont text-left"/*,      width: "100"*/    },
//            { data:"observacion",           class:"textFont text-left"/*,      width: "40" */    }
//        ],
//        select: {
//            style:    'os',
//            selector: 'td:first-child'
//        },
//        buttons: [
//            { extend: "create", editor: editor },
//            { extend: "edit",   editor: editor },
//            { extend: "remove", editor: editor }
//        ],
//        
//        bDestroy: true
//  });
//});
//


//function buscarCoberturasConglomerado(){
//    editor = new $.fn.dataTable.Editor( {
//    ajax: "../Productos/todo",
//    table: "#tblProducto",
//    idSrc: "producto_id",
//    fields: [ 
//       /* {name: "producto_id"}, 
//        {name: "mes"}, 
//        {name: "marca"}, 
//        {name: "categoria"}, */
//        {name: "nombre"}, 
//       // {name: "talla"}, 
//        {name: "color"}
//        /*{name: "precio_compra"}, 
//        {name: "precio_venta"}, 
//        {name: "fecha_compra"}, 
//        {name: "estado"}, 
//        {name: "descripcion"}, 
//        {name: "observacion"}*/
//        ]
//    } ); 
//
//    $('#tblProducto').on( 'click', 'tbody td:not(:first-child)', function (e) {
////        console.log(this);
//        editor.inline( this );
//    } );
// 
//    myTable = $('#tblProducto').DataTable({
//        initComplete: function () {
//            jsRemoveWindowLoad();
//        },
//        dom: "Bfrtip",
//        order: [[ 1, 'asc' ]],
//        scrollY: 450,
//        scrollX: true,
//        idSrc:  'producto_id',
//        ajax: {
//            url: "../Productos/todo",
//            dataSrc: "",
//            type:"POST"
////            data: { 
////                anio        : anio, 
////                mes         : mes, 
////                estado      : estado, 
////                marca       : marca,                 
////                categoria   : categoria,                 
////                nombre      : nombre
////            },
//        },
//        columns:[ 
//            {
//                data: null,
//                defaultContent: '',
//                className: 'select-checkbox',
//                orderable: false
//            },
////            /*{ data:"producto_id",           class:"textFont text-left"/*,      width: "100"*/    },
////            { data:"mes",                   class:"textFont text-left"/*,      width: "20" */    },            
////            { data:"marca",                 class:"textFont text-left"/*,      width: "100"*/    },
////            { data:"categoria",             class:"textFont text-left"/*,      width: "80" */    },
//            { data:"nombre",                class:"textFont text-left"/*,      width: "200"*/    },
////            { data:"talla",                 class:"textFont text-left"/*,      width: "40" */    },
//            { data:"color",                 class:"textFont text-left"/*,      width: "40" */    }            
////            { data:"precio_compra",         class:"textFont text-left"/*,      width: "40" */    },            
////            { data:"precio_venta",          class:"textFont text-left"/*,      width: "40" */    },
////            { data:"fecha_compra",          class:"textFont text-left"/*,      width: "60" */    },
////            { data:"estado",                class:"textFont text-left"/*,      width: "40" */    },            
////            { data:"descripcion",           class:"textFont text-left"/*,      width: "100"*/    },
////            { data:"observacion",           class:"textFont text-left"/*,      width: "40" */    }
//        ],
//        select: {
//            style:    'os',
//            selector: 'td:first-child'
//        },
//        buttons: [
//            { extend: "create", editor: editor },
//            { extend: "edit",   editor: editor },
//            { extend: "remove", editor: editor }
//        ],
//        
//        bDestroy: true
//  }); 
//  }
  


</script>
<!--End Region Scripts-->