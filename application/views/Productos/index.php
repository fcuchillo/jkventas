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
                            <select class="form-control input-sm" id="spnanio" name="spnanio">
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                            </select>
                        </div>
                        
                        <div class="col-md-1" style="display: inline-block; width: 11% ">
                            <label class="PyENDES-Label">Mes</label>
                            <?php
                                echo '<select class="form-control input-sm" id="spnmes" name="spnmes"><option value="0">Todos</option>';
                                foreach ($mes as $value) {?>
                                    <?php echo '<option value="'.$value->mes_id.'" >'.$value->nombre.'</option>';
                                }
                                echo '</select>';
                            ?> 
                        </div>
                        
                        <div class="col-md-1" style="display: inline-block; width: 11% ">
                            <label class="PyENDES-Label">Estado</label>                            
                            <?php
                                echo '<select class="form-control input-sm" id="spnestado" name="spnestado"><option value="0">Todos</option>';
                                foreach ($estado as $value) {?>
                                    <?php echo '<option value="'.$value->estado_id.'" >'.$value->descripcion.'</option>';
                                }
                                echo '</select>';
                            ?>                                
                        </div>
                        
                        <div class="col-md-2" style="display: inline-block; width: 15% ">
                            <label class="PyENDES-Label">Marca</label>
                            <?php
                                echo '<select class="form-control input-sm" id="spnmarca" name="spnmarca"><option value="0">Todos</option>';
                                foreach ($marca as $value) {?>
                                    <?php echo '<option value="'.$value->marca_id.'" >'.$value->nombre.'</option>';
                                }
                                echo '</select>';
                            ?>                    
                        </div>
                        
                        <div class="col-md-2" style="display: inline-block; width: 15% ">
                            <label class="PyENDES-Label">Categoria</label>
                            <?php
                                echo '<select class="form-control input-sm" id="spncategoria" name="spncategoria"><option value="0">Todos</option>';
                                foreach ($categoria as $value) {?>
                                    <?php echo '<option value="'.$value->categoria_id.'" >'.$value->nombre.'</option>';
                                }
                                echo '</select>';
                            ?>  
                        </div>
                        
                        <div class="col-md-1" style="display: inline-block; width: 20% "> 
                            <label class="PyENDES-Label">Nombre</label>
                            <input type="text" class="form-control input-sm" id="txtnombre" name="txtnombre" placeholder="">
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
                                            <th align="center"><center><a href="javascript:void(0);" onclick="AgregarProducto();"><span class="glyphicon glyphicon-plus"></span></a></center></th>
                                            <th><center>PRODUCTO</center></th>                                            
                                            <th><center>ANIO</center></th>
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
                                </table>
                            
                        <!--End Region Report-->
                    </div>
                </div>
    </section>
</div>



<div class="modal" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title" id="popuptitle">MANTENIMIENTO DE PRODUCTO</h4>
            </div>
            <div class="modal-body">  
                <form id="frmProducto" name="frmProducto">
                    <div class="modal-body">   
                        
                            <label class="col-sm-12 col-form-label col-form-label-sm">Producto_id</label>
                            <input type="text" id="producto_id" name="producto_id" value="" readonly>
                            <input type="hidden" class="form-control" value="" name="accion" id="accion">
                                               
                            <label class="col-sm-12 col-form-label col-form-label-sm">anio</label>                            
                            <input type="text" class="form-control" value="" name="anio" id="anio">                        
                            
                            <label class="col-sm-12 col-form-label col-form-label-sm">Mes</label>
                            <select class="form-control input-sm" name="mes_id" id="mes_id"></select>
                            <label class="col-sm-12 col-form-label col-form-label-sm">Marca</label>
                            <select class="form-control input-sm" name="marca_id" id="marca_id"></select>
                            <label class="col-sm-12 col-form-label col-form-label-sm">categoria</label>
                            <select class="form-control input-sm" name="categoria_id" id="categoria_id"></select>
                            <label class="col-sm-12 col-form-label col-form-label-sm">Nombre</label>
                            <input type="text" class="form-control" value="" name="nombre" id="nombre">
                            <label class="PyENDES-Label">Talla</label>
                            <input type="text" class="form-control" value="" name="talla" id="talla">
                            <label class="PyENDES-Label">Color</label>
                            <input type="text" class="form-control" value="" name="color" id="color">
                            <label class="PyENDES-Label">Precio compra</label>
                            <input type="text" class="form-control" value="" name="precio_compra" id="precio_compra">
                            <label class="PyENDES-Label">Precio Venta</label>
                            <input type="text" class="form-control" value="" name="precio_venta" id="precio_venta">
                            <label class="PyENDES-Label">Fecha Compra</label>
                            <input type="date" class="form-control" value="" name="fecha_compra" id="fecha_compra">
                            
                            <label class="col-sm-12 col-form-label col-form-label-sm">Estado</label>
                            <select class="form-control input-sm" name="estado_id" id="estado_id"></select>
                                                        
                            <label class="PyENDES-Label">descripcion</label>
                            <input type="text" class="form-control" value="" name="descripcion" id="descripcion">
                            <label class="PyENDES-Label">observacion</label>
                            <input type="text" class="form-control" value="" name="observacion" id="observacion">  
                       
                    </div>                        
                </form>   
            </div>
            <div class="modal-footer"> 
                <div class="modal-header">
                    <button type="submit" class="btn btn-primary" id="btnGuardar" >Guardar</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div> 
            </div>
        </div>
    </div>
</div>


<!--Region Modal-->
<!--<div class="modal" id="myModal" role="dialog">
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
</div>-->

<!--End Region Modal-->
<!--<div class="modal" id="myModalRoles" role="dialog">
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
    </div>-->


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
        ObtenerParametros();
        CargarTodoProducto();    
        $('#btnBuscar').on('click', function() {
            ObtenerParametros();
            CargarTodoProducto();
        });

        $('#btnLimpiar').on('click', function(){        
            $('#mes').append('<option value="0" selected="selected">Todos</option>');
            $('#estado').val(0);
            $('#marca').val(0);
            $('#categoria').val(0);
            $("#nombre").val("");            
        });
        
        $('#btnEditar').on('click', function(){
           alert('clicjdjfhf') ;
        });
        
        $('#btnGuardar').click(function(){
            GuardarProducto();
        });
        
     });
     
    function ObtenerParametros(){
        anio=$('#spnanio').val();
        mes=$('#spnmes').val();
        estado= $('#spnestado').val();
        marca= $('#spnmarca').val();
        categoria=$('#spncategoria').val();
        nombre=$("#txtnombre").val();   
    }    
    
    function GuardarProducto(){
        var form = $("#frmProducto");
        var data = form.serialize();
        $.ajax({
            type:'post',
            data:data,
            url:'../Productos/EditarProducto',
            success:function(response){
                $('#myModal').modal('hide'); 
                CargarTodoProducto();
            }
        })
    }
    
    function AgregarProducto(){  
        console.log('test');
        $.ajax({
            type:'post',
            url:'../Productos/AgregarProducto',
            success:function(response){
               var json = jQuery.parseJSON(response);
               $('#frmProducto')[0].reset();
               $('#accion').val('add');
               AsignacionValoresProductonNuevo(json);
            }
        })

    }
    
    function EliminarProducto(id){
        if(confirm("Desea Eliminar? ")){
            $.ajax({
               type:'post',
               data:{producto_id:id},
               url:'../Productos/EliminarProducto',
               success:function(response){
                   console.log(response);
                   CargarTodoProducto();
               }
            })       
        }       
    }
  
    function EditarProducto(id){      
        $.ajax({
            type:'post',
            data:{producto_id:id},
            url:'../Productos/ObtenerProducto',
            success:function(response){
                console.log(response);
                var json = jQuery.parseJSON(response);
                AsignacionValoresProducto(json);
            }
        })      
    }

    function CargarTodoProducto(){        
        myTable =$("#tblProducto").DataTable({
        initComplete: function () {
            jsRemoveWindowLoad();
        },          
        ajax:{
            dataType: 'json',
            url:'../Productos/ObtenerListaProductos',
            type:'post',
            dataSrc:"",
            data: { 
                anio        : anio, 
                mes         : mes, 
                estado      : estado, 
                marca       : marca,                 
                categoria   : categoria,                 
                nombre      : nombre
            }
        },     
        columns:[
            {data: 'id', render: function(value, type, full, meta) {
                  return '<td><center>'+
                         '<a href="javascript:void(0);" id="btnEliminar" onclick="EliminarProducto('+full.producto_id+');" ><span class="glyphicon glyphicon-trash" ></span></a>'+
                         '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" id="btnEditar" onclick="EditarProducto('+full.producto_id+');" ><span class="glyphicon glyphicon-pencil"></span></a>'+
                         '</center></td>'
                        }  },
            {data:"producto_id",    class:"textFont text-left"},
            {data:"anio",           class:"textFont text_left"},
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
function AsignacionValoresProductonNuevo(json){
        $('#accion').val('add');
        $('#anio').val($('#spnanio').val());             
        $('#mes_id option').remove();    
        $.each(json['mes'], function(j, resultado) {
               $('#mes_id').append($('<option>').text(resultado.nombre).attr('value', resultado.mes_id));
        });
        $('#marca_id option').remove();    
        $.each(json['marca'], function(j, resultado) {
                $('#marca_id').append($('<option>').text(resultado.nombre).attr('value', resultado.marca_id));
        });

        $('#categoria_id option').remove();    
        $.each(json['categoria'], function(j, resultado) {
                $('#categoria_id').append($('<option>').text(resultado.nombre).attr('value', resultado.categoria_id));
          });
       $('#estado_id option').remove();    
        $.each(json['estado'], function(j, resultado) {
         $('#estado_id').append($('<option>').text(resultado.nombre).attr('value', resultado.estado_id));
        });
        $('#myModal').modal('show');       
    }
 
    function AsignacionValoresProducto(json){
        var productos= json['producto'];
        $('#accion').val(productos.accion);
        
        $('#producto_id').val(productos.producto_id);
        $('#anio').val(productos.anio);                

        $('#mes_id option').remove();    
        $.each(json['mes'], function(j, resultado) {
            if(productos.mes_id===resultado.mes_id){
                $('#mes_id').append($('<option>').text(resultado.nombre).attr({value:resultado.mes_id,selected:'selected'}));
            }
            else{
               $('#mes_id').append($('<option>').text(resultado.nombre).attr('value', resultado.mes_id));
            }
        });

        $('#marca_id option').remove();    
        $.each(json['marca'], function(j, resultado) {
            if(productos.marca_id===resultado.marca_id){
                $('#marca_id').append($('<option>').text(resultado.nombre).attr({value:resultado.marca_id,selected:'selected'}));
            }
            else{
                $('#marca_id').append($('<option>').text(resultado.nombre).attr('value', resultado.marca_id));
            }
        });

        $('#categoria_id option').remove();    
        $.each(json['categoria'], function(j, resultado) {
            if(productos.categoria_id===resultado.categoria_id){
                $('#categoria_id').append($('<option>').text(resultado.nombre).attr({value:resultado.categoria_id,selected:'selected'}));
            }
            else{
                $('#categoria_id').append($('<option>').text(resultado.nombre).attr('value', resultado.categoria_id));
            }
          });

        $('#nombre').val(productos.nombre);      
        $('#talla').val(productos.talla);      
        $('#color').val(productos.color);      
        $('#precio_compra').val(productos.precio_compra);      
        $('#precio_venta').val(productos.precio_venta);      
        $('#fecha_compra').val(productos.fecha_compra);       

        $('#estado_id option').remove();    
        $.each(json['estado'], function(j, resultado) {
            if(productos.marca_id===resultado.marca_id){
                $('#estado_id').append($('<option>').text(resultado.nombre).attr({value:resultado.estado_id,selected:'selected'}));
            }
            else{
                $('#estado_id').append($('<option>').text(resultado.nombre).attr('value', resultado.estado_id));
            }
        });

        $('#descripcion').val(productos.descripcion); 
        $('#observacion').val(productos.observacion); 

        $('#myModal').modal('show');       
    }

</script>
<!--End Region Scripts-->