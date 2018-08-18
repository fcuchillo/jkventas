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
                    <div class="col-md-3"> 
                        <label class="PyENDES-Label">Dni Cliente</label>
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control " id="cliente" name="cliente" placeholder="Ingrese Cliente">
                            <span id="errorcliente"></span>
                        </div>
                    </div>
                     <div class="col-md-3"> 
                        <label class="PyENDES-Label">Nombre Cliente</label>
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control " id="nombrecliente" name="nombrecliente" placeholder="Nombre Cliente" readonly="">
                            <input type="hidden" class="form-control " id="cliente_id" name="cliente_id">
                        </div>
                    </div>
                    <div class="col-md-6"></div>
                </div>
                <div class="row">
                  <div class="col-md-2"> 
                        <label class="PyENDES-Label">Codigo Producto</label>
                        <div class="input-group  input-group-sm">
                            <input type="text" class="form-control " id="codigo_id" name="codigo_id" placeholder="Ingrese Código">
                            <span id="errorproducto"></span>
                        </div>
                </div>
                    <div class="col-md-2"> 
                        <label class="PyENDES-Label" style="visibility: hidden"></label>
                        <div class="input-group input-group-sm" style="visibility: hidden">
                            <span class="input-group-btn"><button type="button" class="btn btn-primary btn-block btn-flat" id="btnVentaBuscar">Buscar</button></span>                           
                        </div>
                    </div>
                    <div class="col-md-8">
                    </div>
                </div>
                <form id="formguardadetalleventa" name="formguardadetalleventa" action="" method="post">
               <div class="row">

                <div class="col-md-2"> 
                        <label class="PyENDES-Label">Codigo Producto</label>
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control " id="producto_idd" name="producto_idd" readonly="" required="">
                            <input type="hidden" id="producto_id" name="producto_id">                            
                        </div>
                </div>
                <div class="col-md-4"> 
                        <label class="PyENDES-Label">Nombre Producto</label>
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control " id="nombre_producto" name="nombre_producto" readonly="" required="">
                        </div>
                </div>
                     <div class="col-md-1"> 
                        <label class="PyENDES-Label">Precio</label>
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control " id="precio" name="precio" placeholder="Ingrese precio" required="">
                       </div>
                    </div>
                    <div class="col-md-2"> 
                        <label class="PyENDES-Label" style="visibility: hidden"></label>
                        <div class="input-group input-group-sm">
                            <span class="input-group-btn"><button type="submit" class="btn btn-primary btn-block btn-flat" id="btnGuardarVentas">Agregar</button></span>                           
                        </div>
                    </div>
                   <div class="col-md-2">
                       <label class="PyENDES-Label" style="visibility: hidden"></label>
                       <div class="input-group input-group-sm col-md-2" >
                            <span class="input-group-btn"><button type="button" class="btn btn-primary btn-block btn-flat" id="btnConfirmarcompra">Confirmar Compra</button></span>                           
                        </div> 
                   </div>
                   <div class="col-md-2"></div>
                </div>
                </form>
                <div class="row">
               <div class="box-body pre-scrollable" id="divContenedorVentas" >                                        
                <table align="center" width="100%" cellpadding="0" cellspacing="0">						
                    <tr>
		 	<td align=center valign=top width="100%">
                            <table id="grid_tabla_jkventas_generales"></table>
                            <div id="grid_tabla_jkventas_generales_pager" ></div>
			</td>
                    </tr>
		</table>                         
               </div>    
               </div>
            </div>
        </div>  
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
var grid_tabla_jkventas_generales=jQuery("#grid_tabla_jkventas_generales");

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
        btnGuardarVentas();
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
  });
  function ObtenerProductoByCodigo(codigo_id){
      $.post( "../CProd_ventas/ObtenerProductoByCodigo",{codigo_id:codigo_id}, function( data ) {
        LimpiarCampos();
        var producto = jQuery.parseJSON(data);
        if(producto!==null){
            $('#error').text('');
            $('#producto_idd').val(producto.producto_id);
            $('#producto_id').val(producto.producto_id);
            $('#nombre_producto').val(producto.nombre);
            $('#precio').val(producto.precio_venta);
            $('#precio').focus();
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
     $('#nombre_producto').val('');
     $('#precio').val(''); 
  }
      function RecargarTabla_jkventas() {
	grid_tabla_jkventas_generales.jqGrid("setGridParam",{
            page:1,	
            url:'../CProd_ventas/ObtenerTodasLasVentasBySession',
            datatype : "json"
	}).trigger("reloadGrid");
	
	return [ true, '' ]; 
    }    
        
    function ObtenerTablajkventas(){
//	var leditar          = { name : 'editar'	 ,index : 'index',  width : 20,    align : "center",    fixed : true,  sortable : false, formatter:EditarVentaXid};
//        var leliminar        = { name : 'eliminar'	 ,index : 'index',  width : 20,    align : "center",    fixed : true,  sortable : false, formatter:EliminarVentaXid};
//        var ltmp_id          = { name : 'tamporal_id'	 ,index : 'index',  width : 40,    align : "center",    fixed : true,  sortable : false };
        var ltmp_id          = { name : 'venta_id'	 ,index : 'index',  width : 40,    align : "center",    fixed : true,  sortable : false };
	var lnombre          = { name : 'nombre'    ,index : 'index',  width : 40,    align : "center",    fixed : true,  sortable : false};
	var lfecha           = { name : 'fecha'      ,index : 'index',  width : 90,    align : "center",    fixed : true,  sortable : false };
        var lcantidad        = { name : 'cantidad'         ,index : 'index',  width : 350,    align : "left",      fixed : true,  sortable : false };
	var ltotal           = { name : 'total'       ,index : 'index',  width : 50,    align : "left",      fixed : true,  sortable : false /*,formatter:'currency',formatoptions: {prefix:'s/.', suffix:'', thousandsSeparator:','}*/ };
        colNames = ['Id','Cliente','Fecha','Cantidad','Total'];
	colModel = [ltmp_id,lnombre,lfecha,lcantidad,ltotal];	    
	grid_tabla_jkventas_generales.jqGrid({
		url:'../CProd_ventas/ObtenerTodasLasVentasBySession',
		datatype : "json",
		mtype : 'post',
		colNames : colNames,
		colModel : colModel,
		height : 'auto',
		width : 750,
		pager : $('#grid_tabla_jkventas_generales_pager'),
		rowNum : 10,
		loadonce : true,
		scrollrows : true,
		rownumbers : true,
                caption: "Listado de Productos a Vender",
		loadComplete : function(data) { 
		},
                gridComplete:function(data){
                   var $grid = $('#grid_tabla_jkventas_generales');
                   var colSum = $grid.jqGrid('getCol', 'total', true, 'sum');
                   var colcantidad = $grid.jqGrid('getCol', 'cantidad', true, 'sum');
                   $grid.jqGrid('footerData', 'set', {'cantidad':colcantidad });
                   $grid.jqGrid('footerData', 'set', {'total':colSum });  
                },
		sortname : 'id',
		sortable : false,
		sortorder : "asc",
		viewrecords : true,
                footerrow : true,
                userDataOnFooter : true,
                subGrid: true, // set the subGrid property to true to show expand buttons for each row
                subGridRowExpanded: showChildGrids, // javascript function that will take care of showing the child grid
		loadError : function(xhr, st, err) {
			alert(err);
		}		
	});
        grid_tabla_jkventas_generales.navGrid('#grid_tabla_jkventas_generales_pager',{edit:false,add:false,del:false,search:false,refresh:false},{},{},{});
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
  function showChildGrids(parentRowID, parentRowKey){
      showFirstChildGrid(parentRowID, parentRowKey);
   }
   function showFirstChildGrid(parentRowID, parentRowKey){
            var childGridID = parentRowID + "_table";
            var childGridPagerID = parentRowID + "_pager";
             console.log(childGridID);
             console.log(childGridPagerID);
            // send the parent row primary key to the server so that we know which grid to show
            var childGridURL = "../CProd_ventas/ObtenerTodoLosProductosporVenta?jqGridID=JQGrid2"
            childGridURL = childGridURL + "&parentRowID=" + encodeURIComponent(parentRowKey)

            // add a table and pager HTML elements to the parent grid row - we will render the child grid here
            $('#' + parentRowID).append('<table id=' + childGridID + '></table><div id=' + childGridPagerID + '></div>');

            $("#" + childGridID).jqGrid({
                url: childGridURL,
                mtype: "GET",
                datatype: "json",
                page: 1,
                colNames: ['ID', 'producto', 'Codigo', 'Nombre','Precio'],
                colModel: [
                    { name: 'id', key: true, width: 75 },
                    { name: 'producto', width: 100 ,hidden:true},
                    { name: 'codigo', width: 100 },
                    { name: 'nombre', width: 100 },
                    { name: 'precio', width: 100 }
                ],
                width: 500,
                height: '100%',
                pager: "#" + childGridPagerID
            })
    }
    function EditarVenta(id){      
     $.post( "../CProd_ventas/EditarVenta",{venta_id:id}, function( data ) {
         RecargarTabla_jkventas();
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
            console.log(response);
            if(response.status==='success'){
                console.log('venta realizada con exito');
            }
            else{
                console.log('paso algo malo');
                }
      }); 
  }
</script>