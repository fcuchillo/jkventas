<!--Region Css-->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/content/css/sampling.css">  
<!--End Region Css-->
  
<!--Region Body-->
<div class="content-wrapper">
    <!--Region Section Header-->
    <section class="content-header">
        <h1>Venta</h1>
        <ol class="breadcrumb">
            <li><a href="../adm_login/usuarioLogin"><i class="fa fa-dashboard"></i>Inicio</a></li>
            <li><a href="#">Venta</a></li>
            <li class="active">Venta</li>
        </ol>
    </section>
    <!--End Region Section Header-->
    <!--Region Section Box-->
    <section class="content">
        <!--Region Box Result-->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title" id="inquesttitles"></h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">                
                        
                <div class="row">
                    <div class="col-md-1"><label>Codigo:</label></div>
                    <div class="col-md-2"><input type="text" class="form-control " id="codigo_id" name="codigo_id" placeholder="Ingrese Código" autocomplete="off"></div>                                                        
                    <div class="col-md-4"><span id="errorproducto"></span></div>
                </div>
                
                <form id="formguardadetalleventa" name="formguardadetalleventa" action="" method="post">
                    <input type="hidden" id="producto_id" name="producto_id">                                     
                    
                        <div class="row"> 
                            <div class="col-md-1"><label>Precio:</label></div>                            
                            <div class="col-md-2"><input type="text" class="form-control " id="precio" name="precio" placeholder="Ingrese precio" required="" autocomplete="off"></div>
                                                        
                            <label style="visibility: hidden"></label>
                            <div class="col-md-2">
                                <span class="input-group-btn"><button type="submit" class="btn btn-primary btn-block btn-flat" id="btnGuardarVentas">Agregar</button></span>                           
                            </div>                            
                        </div>
                    
                        <div class="row">                             
                            <div class="col-md-1"><label>Producto:</label></div>                            
                            <div class="col-md-11"><label id="nombre_producto" name="nombre_producto"></label> :-: <label id="estado_producto" name="estado_producto"></label></div>                            
                        </div>                    
                </form>   
                    
                    
                <div class="row">
                    <div class="box-body pre-scrollable" id="divContenedorVentas" >                                        
                        <table align="center" width="100%" cellpadding="0" cellspacing="0">						
                            <tr>
                                <td align=left valign=top width="100%">
                                    <table id="grid_tabla_jkventas"></table>
                                    <div id="grid_tabla_jkventas_pager" ></div>
                                </td>
                            </tr>
                        </table>                         
                    </div>    
                </div>
                    
                    
                <input type="hidden" class="form-control" id="cliente_id" name="cliente_id">                    
                <div class="row">
                    <div class="col-md-1"><label>Dni:</label></div>
                    <div class="col-md-2"><input type="text" class="form-control " id="cliente" name="cliente" placeholder="Ingrese Cliente"></div>
                    <div class="col-md-3"><span id="errorcliente"></span></div>
                </div>
                <div class="row">
                    <div class="col-md-1"><label>Cliente:</label></div>
                    <div class="col-md-2"><input type="text" class="form-control " id="nombrecliente" name="nombrecliente" placeholder="Nombre Cliente" readonly=""></div>
                        
                    <label style="visibility: hidden"></label>
                    <div class="col-md-2"><span><button type="button" class="btn btn-primary btn-block btn-flat" id="btnConfirmarcompra">Generar Compra</button></span></div>                         
                </div>                                                            
                        
            </div>
        </div>    
    </section>
</div>

<!--End Region Modal-->
<div class="modal" id="myModalVenta" data-keyboard="false" tabindex="-1" data-backdrop="static"  role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title" id="popuptitle">Venta</h4>
            </div>
            <div class="modal-body">
                <form class="form" name="formVenta" id="formVenta" method="POST">
                    <input type="hidden" id="temporal_id" name="temporal_id" value="">  
                    <div class="row">                        
                        <div class="col-sm-2"><label>Producto:</label></div>
                        <div class="col-sm-3"><input type="text" class="form-control" id="nombre" name="nombre" readonly=""></div>

                        <div class="col-sm-1"><label>Precio:</label></div>
                        <div class="col-sm-2"><input type="text" class="form-control " id="preciomodal" name="preciomodal"></div>
                    </div>                      
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="btnGuardarCambios" form="formVenta">Guardar</button>                
            </div>
        </div>
    </div>
</div>


<script>
jQuery.browser = {};
(function () {
jQuery.browser.msie = false;
jQuery.browser.version = 0;
if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
jQuery.browser.msie = true;
jQuery.browser.version = RegExp.$1;
}
})();

var grid_tabla_jkventas=jQuery("#grid_tabla_jkventas");

    $(document).ready(function () {
        ObtenerTablajkventas();
        RecargarTabla_jkventas();

        $('#codigo_id').keypress(function (e) {
            var key = e.which;
            if(key === 13){
                ObtenerProductoByCodigo($('#codigo_id').val());
            }
        });

        $('#cliente').keypress(function (e) {
            var key = e.which;
            if(key === 13 && $('#cliente').val().length==8){
                ObtenerClientebyDni($('#cliente').val());
            }
        });

        $('#formguardadetalleventa').submit(function(event){
            event.preventDefault();
            if($("#producto_id").val().length!==0){
                btnGuardarVentas();
            }
            LimpiarCampos();
        });

        $('#btnVentaBuscar').click(function(){
           RecargarTabla_jkventas(); 
        });

        $('#btnConfirmarcompra').click(function(){
            var cliente=$('#cliente_id').val();
            if(cliente===null || cliente.trim().length===0){
                $('#errorcliente').text('Debe Ingresar Cliente');
            }
            else{
                $('#errorcliente').text('');
                if(confirm("Desea Confimar la compra? ")){    
                    ConfirmacionDeLaCompra(cliente);
                }
                else{
                    console.log('cancel');
                }
            }
        });

        $('#formVenta').submit(function(event){
            event.preventDefault();
            EditarVentaDetalle();
        });
    });
  
    function ObtenerProductoByCodigo(codigo_id){
        $.post( "../CProd_ventas/ObtenerProductoByCodigo",{codigo_id:codigo_id}, function( data ) {
            LimpiarCampos();
            var producto = jQuery.parseJSON(data);
            if(producto!==null){
                $('#error').text('');
                $('#producto_idd').val(producto.producto_id);
                $('#producto_id').val(producto.producto_id);
                $('#nombre_producto').text(producto.nombre);
                if(producto.estado_id==2){
                    $("#btnGuardarVentas").prop("disabled",true);
                    $('#estado_producto').text('Agotado');
                }
                else{
                    $("#btnGuardarVentas").prop("disabled",false);
                    $('#estado_producto').text('Disponible');
                }
                $('#precio').val(producto.precio_venta);
                $('#precio').focus();
                console.log(producto.estado_id);
            }
            
            else{
                $('#codigo_id').focus();
                $('#errorproducto').text('Codigo no encontrado');
            }
        });
    }
    
    function LimpiarCampos(){
        $('#producto_idd').val('');
        $('#producto_id').val('');
        $('#nombre_producto').text('');
        $('#estado_producto').text('');
        $('#precio').val(''); 
    }
    
    function RecargarTabla_jkventas() {
	grid_tabla_jkventas.jqGrid("setGridParam",{
            page:1,	
            url:'../CProd_ventas/ObtenerTodoLosProductosaVender',
            datatype : "json"
	}).trigger("reloadGrid");	
	return [ true, '' ]; 
    }    
        
    function ObtenerTablajkventas(){
	var leditar          = { name : 'editar'	,index : 'index',  width : 20,    align : "center",    fixed : true,  sortable : false, formatter:EditarVentaXid};
        var leliminar        = { name : 'eliminar'	,index : 'index',  width : 20,    align : "center",    fixed : true,  sortable : false, formatter:EliminarVentaXid};
        var ltmp_id          = { name : 'id'            ,index : 'index',  width : 40,    align : "center",    fixed : true,  sortable : false };
	var ltmpproducto_id  = { name : 'producto_id'   ,index : 'index',  width : 40,    align : "center",    fixed : true,  sortable : false, hidden:true };
	var lcodigo_id       = { name : 'codigo_id'     ,index : 'index',  width : 50,    align : "center",    fixed : true,  sortable : false };
        var lnombreproducto  = { name : 'nombre'        ,index : 'index',  width : 130,   align : "left",      fixed : true,  sortable : false };
	var lprecio          = { name : 'precio'        ,index : 'index',  width : 50,    align : "left",      fixed : true,  sortable : false /*,formatter:'currency',formatoptions: {prefix:'s/.', suffix:'', thousandsSeparator:','}*/ };
        
        colNames = ['','','Id','Producto_id','Codigo','Producto','Precio'];
	colModel = [leditar,leliminar,ltmp_id,ltmpproducto_id,lcodigo_id,lnombreproducto,lprecio];	    
	
        grid_tabla_jkventas.jqGrid({
            url:'../CProd_ventas/ObtenerTodoLosProductosaVender',
            datatype : "json",
            mtype : 'post',
            colNames : colNames,
            colModel : colModel,
            height : 'auto',
            width : 370,
            pager : $('#grid_tabla_jkventas_pager'),
            rowNum : 10,
            loadonce : true,
            scrollrows : true,
            rownumbers : true,
            caption: "Listado de Productos a Vender",
            loadComplete : function(data) { 
            },
            gridComplete:function(data){
                var $grid = $('#grid_tabla_jkventas');
                var colSum = $grid.jqGrid('getCol', 'precio', true, 'sum');
                console.log(colSum);
                $grid.jqGrid('footerData', 'set', {'precio':colSum });  
            },
            sortname : 'id',
            sortable : false,
            sortorder : "asc",
            viewrecords : true,
            footerrow : true,
            userDataOnFooter : true,
            loadError : function(xhr, st, err) {
		alert(err);
            }		
	});
        grid_tabla_jkventas.navGrid('#grid_tabla_jkventas_pager',{edit:false,add:false,del:false,search:false,refresh:false},{},{},{});
        var sum = grid_tabla_jkventas.jqGrid('getCol', 'precio', false, 'sum');
        grid_tabla_jkventas.jqGrid('footerData','set', {ID: 'Total:', amount: sum});
    }
    
    function btnGuardarVentas(){
        $.post( "../CProd_ventas/GuardaDetalleVenta",$("#formguardadetalleventa").serialize(), function( data ) {
            RecargarTabla_jkventas();
        });
    }
    
    function EliminarVentaXid(cellvalue, options, rowObject){	
        return '<a href="javascript:void(0);" id="btnEliminar" onclick="EliminarVenta('+rowObject[0]+');" ><span class="glyphicon glyphicon-trash" ></span></a>';
    }

    function EditarVentaXid(cellvalue, options, rowObject){	                
        return '<a href="javascript:void(0);" id="btnEditar" onclick="EditarVenta('+rowObject[0]+');" ><span class="glyphicon glyphicon-pencil" ></span></a>';
    }
    
    function EliminarVenta(id){
        if(confirm("Desea Eliminar? ")){
            $.post( "../CProd_ventas/EliminarVentaDetalle",{venta_id:id}, function( data ) {
                RecargarTabla_jkventas();
            });     
        }       
    }
  
    function EditarVenta(id){      
        $.post( "../CProd_ventas/EditarVentaTemporal",{temporal_id:id}, function( data ) {
            var temporal = jQuery.parseJSON(data);  
            console.log(temporal);
            $('#temporal_id').val(temporal.temporal_id);
            $('#nombre').val(temporal.nombre);
            $('#preciomodal').val(temporal.precio);
            $('#myModalVenta').modal('show'); 
        });
    }
    
    function ObtenerClientebyDni(dni){
        $.post( "../CProd_ventas/ObtenerClientebyDni",{dni:dni}, function( data ) {
            var cliente = jQuery.parseJSON(data);
            if(cliente!==null){
                $('#errorcliente').text('');
                LimpiarCliente();
                $('#cliente_id').val(cliente.cliente_id);
                $('#nombrecliente').val(cliente.nombre);
            }
            else{
                $('#errorcliente').text('Cliente no encontrado');
            }
        }); 
    }
  
    function LimpiarCliente(){
        $('#cliente_id').val('');
        $('#nombrecliente').val(''); 
    }
  
    function ConfirmacionDeLaCompra(cliente_id){
        $.post( "../CProd_ventas/GuardarCompraGeneral",{cliente_id:cliente_id}, function( data ) {
            var response = jQuery.parseJSON(data);
            RecargarTabla_jkventas();
            console.log(response);
            if(response.status==='success'){
                console.log('venta realizada con exito');
            }
            else{
                console.log('paso algo malo');
            }
        }); 
    }
  
    function EditarVentaDetalle(){
        $.post("../CProd_ventas/EditarVentaDetalle",$("#formVenta").serialize(),function(data){
            var response = jQuery.parseJSON(data);  
            $('#myModalVenta').modal('hide');
            RecargarTabla_jkventas();
        });
    }
</script>