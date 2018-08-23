
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
                            <label>Año:</label>
                            <select class="form-control input-sm" id="spnanio" name="spnanio">
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                            </select>
                        </div>
                        
                        <div class="col-md-1">
                            <label>Tipo:</label>
                            <select class="form-control input-sm" id="spntipo" name="spntipo">
                                <option value=1>Mes</option>
                                <option value=2>Marca</option>
                                <option value=3>Categoria</option>
                            </select>
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
                            <table id="grid_reporteFinanzas"></table>
                            <div id="grid_reporteFinanzas_pager" ></div>
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

var grid_reporteFinanzas=jQuery("#grid_reporteFinanzas");
var myTable;
var anio=null;
var tipo=null;


    $(document).ready(function () {                       
        ObtenerParametros();  
        RecargarParameter_reporteFinanzas();
        
        $('#btnBuscar').on('click', function() {
            ObtenerParametros();
            RecargarParameter_reporteFinanzas();
        });
        
        $('#btnLimpiar').on('click', function(){        
            $('#spnanio').append('<option value="2018" selected="selected">2018</option>');
            $('#spntipo').append('<option value=1 selected="selected">Mes</option>');                            
        });                  
    });
        
    function ObtenerParametros(){
        $('#grid_reporteFinanzas').jqGrid('GridUnload');
	grid_reporteFinanzas=jQuery("#grid_reporteFinanzas");        
        anio    = $('#spnanio').val();
        tipo    = $('#spntipo').val();        
        getAll_grid_reporteFinanzas(anio, tipo);
    }    
        
    function RecargarParameter_reporteFinanzas(){
	DDRecargar_reporteFinanzas(anio, tipo);
    }
    
    function DDRecargar_reporteFinanzas(anio, tipo) {
	grid_reporteFinanzas.jqGrid("setGridParam",{
            page:1,	
            url:'../CGest_reporteFinanzas/ListaReporteFinanzas?anio='+anio+'&tipo='+tipo,
            datatype : "json"
	}).trigger("reloadGrid");
	
	return [ true, '' ]; 
    }    
        
    function getAll_grid_reporteFinanzas(anio, tipo){	
        var ltipoDescripcion        = { name : 'tipoDescripcion'     ,index : 'index',  width : 80,    align : "left",        fixed : true,  sortable : false };		
	var ltotalProductosC        = { name : 'totalProductosC'     ,index : 'index',  width : 60,    align : "center",      fixed : true,  sortable : false };
        var lTotalMontoC            = { name : 'totalMontoC'         ,index : 'index',  width : 60,    align : "center",      fixed : true,  sortable : false };
	var ltotalProductosV        = { name : 'totalProductosV'     ,index : 'index',  width : 70,    align : "center",      fixed : true,  sortable : false };	
        var ltotalMontoV            = { name : 'totalMontoV'         ,index : 'index',  width : 60,    align : "center",      fixed : true,  sortable : false };	
        var ltotalMontoI            = { name : 'totalMontoI'         ,index : 'index',  width : 60,    align : "center",      fixed : true,  sortable : false };	
        var ltotalMontoG            = { name : 'totalMontoG'         ,index : 'index',  width : 60,    align : "center",      fixed : true,  sortable : false };	
        var lVentasMenosGastos      = { name : 'ventasMenosGastos'   ,index : 'index',  width : 80,    align : "center",      fixed : true,  sortable : false };	
        var lIngresosMenosGastos    = { name : 'ingresosMenosGastos' ,index : 'index',  width : 85,    align : "center",      fixed : true,  sortable : false };	
	
        colNames = ['Tipo','Stock','Total','P. Vendidos','Total V.','Total I.','Total G.','Ventas-Gastos','Ingresos-Gastos'];
	colModel = [ltipoDescripcion,ltotalProductosC,lTotalMontoC,ltotalProductosV,ltotalMontoV,ltotalMontoI,ltotalMontoG,lVentasMenosGastos,lIngresosMenosGastos];	    

	grid_reporteFinanzas.jqGrid({
		url:'../CGest_reporteFinanzas/ListaReporteFinanzas?anio='+anio+'&tipo='+tipo,
		datatype : "json",
		mtype : 'post',
		colNames : colNames,
		colModel : colModel,
		height : 'auto',
		width : 690,
		pager : $('#grid_reporteFinanzas_pager'),
		rowNum : 10,
		loadonce : true,
		scrollrows : true,
		rownumbers : true,
                caption: "Reporte de Finanzas",
		loadComplete : function(data) { 
		},
		sortname : 'id',
		sortable : false,
		sortorder : "asc",
		viewrecords : true,
		loadError : function(xhr, st, err) {
			alert(err);
		}		
	});
        
        grid_reporteFinanzas.navGrid('#grid_reporteFinanzas_pager',{edit:false,add:false,del:false,search:false,refresh:false},{},{},{});
	      
    }
    
  
    

</script>
<!--End Region Scripts-->