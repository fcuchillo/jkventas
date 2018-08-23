
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
                <h3 class="box-title">Filtros</h3>
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
                            <label>Año</label>
                            <select class="form-control input-sm" id="spnanio" name="spnanio">
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                            </select>
                        </div>
                        
                        <div class="col-md-2">
                            <label>Mes</label>
                            <?php
                                echo '<select class="form-control input-sm" id="spnmes" name="spnmes"><option value="0">Todos</option>';
                                foreach ($mes as $value) {?>
                                    <?php echo '<option value="'.$value->mes_id.'" >'.$value->nombre.'</option>';
                                }
                                echo '</select>';
                            ?> 
                        </div>
                        
                        <div class="col-md-2">
                            <label>Usuario</label>                            
                            <?php
                                echo '<select class="form-control input-sm" id="spnusuario" name="spnusuario"><option value="0">Todos</option>';
                                foreach ($usuario as $value) {?>
                                    <?php echo '<option value="'.$value->usuario_id.'" >'.$value->usuario.'</option>';
                                }
                                echo '</select>';
                            ?>                                
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

        <!--Region Box Result class="col-md-12"--> 
        <div class="box">            
            <div class="box-body pre-scrollable" id="divContenedorreporte_ventas" >                                        
                <table align="left" width="100%" cellpadding="0" cellspacing="0">						
                    <tr>
		 	<td align=left valign=top width="100%">
                            <table id="grid_reporte_ventas"></table>
                            <div id="grid_reporte_ventas_pager" ></div>
			</td>
                    </tr>
		</table>                         
            </div>                
        </div>
    </section>
</div>


<!--Region Scripts-->
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
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

var grid_reporte_ventas=jQuery("#grid_reporte_ventas");
var myTable;
var anio=null;
var mes=null;
var usuario=null;
var editor;

    $(document).ready(function () {                       
        ObtenerParametros();  
        RecargarParameter_reporte_ventas();
        
        $('#btnBuscar').on('click', function() {
            ObtenerParametros();
            RecargarParameter_reporte_ventas();
        });
        
        $('#btnLimpiar').on('click', function(){        
            $('#spnanio').append('<option value="2018" selected="selected">2018</option>');
            $('#spnmes').val(0);
            $('#spnusuario').val(0);                 
        });                  
    });
        
    function ObtenerParametros(){
        $('#grid_reporte_ventas').jqGrid('GridUnload');
	grid_reporte_ventas=jQuery("#grid_reporte_ventas");        
        anio        = $('#spnanio').val();
        mes         = $('#spnmes').val();
        usuario     = $('#spnusuario').val();        
        getAll_grid_reporte_ventas(anio, mes, usuario);
    }    
        
    function RecargarParameter_reporte_ventas(){
	DDRecargar_reporte_ventas(anio, mes, usuario);
    }
    
    function DDRecargar_reporte_ventas(anio, mes, usuario) {
	grid_reporte_ventas.jqGrid("setGridParam",{
            page:1,	
            url:'../CProd_reporteVentas/ListaReporteVentas?anio='+anio+'&mes='+mes+'&usuario='+usuario,
            datatype : "json"
	}).trigger("reloadGrid");
	
	return [ true, '' ]; 
    }    
        
    function getAll_grid_reporte_ventas(anio, mes,usuario){	
        var lventa_id   = { name : 'venta_id'	 ,index : 'index',  width : 35,    align : "center",    fixed : true,  sortable : false };		
	var lusuario    = { name : 'usuario'     ,index : 'index',  width : 60,    align : "left",      fixed : true,  sortable : false };
        var lcliente    = { name : 'cliente'     ,index : 'index',  width : 60,    align : "left",      fixed : true,  sortable : false };
	var lfecha      = { name : 'fecha'	 ,index : 'index',  width : 100,   align : "center",      fixed : true,  sortable : false };	
        var lcantidad   = { name : 'cantidad'	 ,index : 'index',  width : 60,    align : "center",      fixed : true,  sortable : false };	
        var ltotal      = { name : 'total'	 ,index : 'index',  width : 50,    align : "center",      fixed : true,  sortable : false };	
	
        colNames = ['Id','Usuario','Cliente','Fecha','Cantidad','Total'];
	colModel = [lventa_id,lusuario,lcliente,lfecha,lcantidad,ltotal];	    

	grid_reporte_ventas.jqGrid({
		url:'../CProd_reporteVentas/ListaReporteVentas?anio='+anio+'&mes='+mes+'&usuario='+usuario,
		datatype : "json",
		mtype : 'post',
		colNames : colNames,
		colModel : colModel,
		height : 'auto',
		width : 450,
		pager : $('#grid_reporte_ventas_pager'),
		rowNum : 10,
		loadonce : true,
		scrollrows : true,
		rownumbers : true,
                caption: "Reporte de ventas",
		loadComplete : function(data) { 
		},
		sortname : 'id',
		sortable : false,
		sortorder : "asc",
		viewrecords : true,
                subGrid: true,
                subGridRowExpanded: showChildGrids,
		loadError : function(xhr, st, err) {
			alert(err);
		}		
	});
        
        grid_reporte_ventas.navGrid('#grid_reporte_ventas_pager',{edit:false,add:false,del:false,search:false,refresh:false},{},{},{});
	
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
            var childGridURL = "../CProd_reporteVentas/ObtenerTodoLosProductosporVenta?jqGridID=JQGrid2"
            childGridURL = childGridURL + "&parentRowID=" + encodeURIComponent(parentRowKey)

            // add a table and pager HTML elements to the parent grid row - we will render the child grid here
            $('#' + parentRowID).append('<table id=' + childGridID + '></table><div id=' + childGridPagerID + '></div>');

            $("#" + childGridID).jqGrid({
                url: childGridURL,
                mtype: "GET",
                datatype: "json",
                page: 1,
                colNames: ['ID', 'producto', 'Codigo', 'Producto','Precio'],
                colModel: [
                    { name: 'id', key: true, width: 30 ,hidden:true},
                    { name: 'producto', width: 40 ,hidden:true},
                    { name: 'codigo', width: 34 },
                    { name: 'nombre', width: 60 },
                    { name: 'precio', width: 22 ,align : "center"}
                ],
                width: 345,
                height: '100%',
                pager: "#" + childGridPagerID
            })
    }
    
  
    

</script>
<!--End Region Scripts-->