
<!--Region Body-->
<div class="content-wrapper">
    <!--Region Section Header-->
    <section class="content-header">
        <!--<h1>Marcas</h1>-->
        <ol class="breadcrumb">
            <li><a href="<?=base_url()?>login/authentication"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Marcas</a></li>
            <li class="active">Marcas</li>
        </ol>
    </section>
    
    <!--End Region Section Header-->
    <!--Region Section Box-->
    <section class="content">

        <!--Region Box Filter-->
        <div class="box">
            <div class="box-header with-border">
                <!--<h3 class="box-title">Filtros</h3>-->
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
                                
                        
                        <div class="col-md-2">
                            <label>Tipo Ingreso</label>
                            <?php
                                echo '<select class="form-control input-sm" id="spntipoingreso" name="spntipoingreso"><option value="0">Todos</option>';
                                foreach ($tipoingreso as $value) {?>
                                    <?php echo '<option value="'.$value->tipoingreso_id.'" >'.$value->nombre.'</option>';
                                }
                                echo '</select>';
                            ?>                    
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
            <div class="box-body pre-scrollable" id="divContenedorIngresos" >                                        
                <table align="center" width="100%" cellpadding="0" cellspacing="0">						
                    <tr>
		 	<td align=center valign=top width="100%">
                            <table id="grid_tabla_ingresos"></table>
                            <div id="grid_tabla_ingresos_pager" ></div>
			</td>
                    </tr>
		</table>                         
            </div>                
        </div>
    </section>
</div>



<div id="myModal" class="modal" data-keyboard="false" tabindex="-1" data-backdrop="static" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title" id="popuptitle">Producto</h4>
            </div>
            <div class="modal-body">                  
                <form id="frmIngreso" name="frmIngreso" action="../Cgest_Ingresos/EditarIngreso" method="POST">
                    <input type="hidden" value="" name="accion" id="accion">
                    
                    <div class="row">                        
                        <div class="col-sm-3"><label >Ingresos id: </label></div>                        
                        <div class="col-sm-3"><input class="form-control" type="text" id="ingreso_id" name="ingreso_id" value="" readonly="" ></div>                                                
                    </div>  
                    <div class="row">                        
                        <div class="validarInfo">
                        <div class="col-sm-3"><label>Tipo Ingreso:</label></div>
                        <div class="col-sm-4"><select class="form-control" name="tipoingreso_id" id="tipoingreso_id"></select> <span class="help-block" id="error"></span></div>                        
                        </div>
                    </div>                       
                    <div class="row">
                        <div class="validarInfo">
                        <div class="col-sm-3"><label>Descripcion:</label></div>
                        <div class="col-sm-9"><input class="form-control" name="descripcion" id="descripcion"> <span class="help-block" id="error"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="validarInfo">
                        <div class="col-sm-3"><label>Monto:</label></div>
                        <div class="col-sm-2"><input class="form-control" name="monto" id="monto"> <span class="help-block" id="error"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="validarInfo">
                        <div class="col-sm-3"><label>Fecha</label></div>
                        <div class="col-sm-5"><input class="form-control" type="datetime" name="fecha" id="fecha" value=""> <span class="help-block" id="error"></span></div>
                        </div>
                    </div>             
                    <div class="row">
                        <div class="col-sm-3"><label>Observacion:</label></div>
                        <div class="col-sm-9"><input class="form-control" name="observacion" id="observacion"></div>
                    </div>
                                           
                </form>               
            </div>
                        
            <div class="modal-footer"> 
                <div class="modal-header">
                    <button type="submit" class="btn btn-primary" form="frmIngreso" >Guardar</button>                      
                </div> 
            </div>
        </div>
    </div>
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

var grid_tabla_ingresos=jQuery("#grid_tabla_ingresos");
var myTable;
var tipoingreso=null;
var mes=null;
var editor;

    $(document).ready(function () {                       
        ObtenerParametros();  
        RecargarParameter_tabla_ingresos();
        
        $('#btnBuscar').on('click', function() {
            ObtenerParametros();
            RecargarParameter_tabla_ingresos();
        });
        
        $('#btnLimpiar').on('click', function(){ 
            $('#spntipoingreso').val(0);        
            $('#spnmes').val(0);        
        });          
        ValidarInformacion();            
    });
        
    function ObtenerParametros(){
        $('#grid_tabla_ingresos').jqGrid('GridUnload');
	grid_tabla_ingresos=jQuery("#grid_tabla_ingresos");   
        tipoingreso   = $('#spntipoingreso').val();
        mes         = $('#spnmes').val();
        getAll_grid_tabla_ingresos(tipoingreso, mes);
    }    
        
    function RecargarParameter_tabla_ingresos(){
	DDRecargar_tabla_ingresos(tipoingreso, mes);
    }
    
    function DDRecargar_tabla_ingresos(tipoingreso, mes){
	grid_tabla_ingresos.jqGrid("setGridParam",{
            page:1,	
            url:'../CGest_ingresos/ListaIngresos?tipoingreso='+tipoingreso+'&mes='+mes,
            datatype : "json"
	}).trigger("reloadGrid");
	
	return [ true, '' ]; 
    }    
        
    function getAll_grid_tabla_ingresos(tipoingreso, mes){
	var leditar         = { name : 'editar'         ,index : 'index',  width : 20,    align : "center",    fixed : true,  sortable : false, formatter:EditarIngresoXid};
        var leliminar       = { name : 'eliminar'	,index : 'index',  width : 20,    align : "center",    fixed : true,  sortable : false, formatter:EliminarIngresoXid};
        var lingreso_id     = { name : 'ingreso_id'	,index : 'index',  width : 50,    align : "center",    fixed : true,  sortable : false };	
	var lnombre         = { name : 'nombre'         ,index : 'index',  width : 80,   align : "left",      fixed : true,  sortable : false };
	var ldescripcion    = { name : 'descripcion'    ,index : 'index',  width : 200,   align : "left",      fixed : true,  sortable : false };
        var lmonto          = { name : 'monto'          ,index : 'index',  width : 50,   align : "left",      fixed : true,  sortable : false };
        var lfecha          = { name : 'fecha'          ,index : 'index',  width : 120,   align : "left",      fixed : true,  sortable : false };
        var lobservacion    = { name : 'observacion'	,index : 'index',  width : 190,   align : "left",      fixed : true,  sortable : false };
        
        colNames = ['','','Id','Nombre','descripcion','Monto','Fecha','Observacion'];
	colModel = [leditar,leliminar,lingreso_id,lnombre,ldescripcion,lmonto,lfecha,lobservacion];	    

	grid_tabla_ingresos.jqGrid({
		url:'../CGest_ingresos/ListaIngresos?tipoingreso='+tipoingreso+'&mes='+mes,
		datatype : "json",
		mtype : 'post',
		colNames : colNames,
		colModel : colModel,
		height : 'auto',
		width : 800,
		pager : $('#grid_tabla_ingresos_pager'),
		rowNum : 10,
		loadonce : true,
		scrollrows : true,
		rownumbers : true,
                caption: "Listado de Ingresos",
		loadComplete : function(data) { 
		},
                gridComplete:function(data){
                   var $grid = $('#grid_tabla_ingresos');
                   var colSum = $grid.jqGrid('getCol', 'monto', true, 'sum');
                   console.log(colSum);
                   $grid.jqGrid('footerData', 'set', {'monto':colSum });  
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
        
        grid_tabla_ingresos.navGrid('#grid_tabla_ingresos_pager',{edit:false,add:false,del:false,search:false,refresh:false},{},{},{});
	
 	grid_tabla_ingresos.navButtonAdd('#grid_tabla_ingresos_pager',{ 	
            caption:"", 
            buttonicon:"ui-icon-plus", 
            onClickButton: AgregarIngreso,
            position: "last", 
            title:"Agregar Recuperación", 
            cursor: "pointer"
        });
        
        var sum = grid_tabla_ingresos.jqGrid('getCol', 'monto', false, 'sum');
        grid_tabla_ingresos.jqGrid('footerData','set', {ID: 'Total:', amount: sum});
    }
    
    
    function AgregarIngreso(){  
        console.log('test');
        $.ajax({
            type:'post',
            url:'../CGest_ingresos/AgregarIngreso',
            success:function(response){
               var json = jQuery.parseJSON(response);
               $('#frmIngreso')[0].reset();
               $('#accion').val('add');
               AsignacionValoresIngresoNuevo(json);
            }
        })
    }
    
    function EliminarIngresoXid(cellvalue, options, rowObject){	
	return '<a href="javascript:void(0);" id="btnEliminar" onclick="EliminarIngreso('+rowObject[0]+');" ><span class="glyphicon glyphicon-trash" ></span></a>';
    }
    
    function EditarIngresoXid(cellvalue, options, rowObject){	                
	return '<a href="javascript:void(0);" id="btnEditar" onclick="EditarIngreso('+rowObject[0]+');" ><span class="glyphicon glyphicon-pencil" ></span></a>';
    }

    function EliminarIngreso(id){
        if(confirm("Desea Eliminar? ")){
            $.ajax({
               type:'post',
               data:{ingreso_id:id},
               url:'../CGest_ingresos/EliminarIngreso',
               success:function(response){
                   console.log(response);
                   ObtenerParametros();
                   RecargarParameter_tabla_ingresos();
               }
            })       
        }       
    }
  
    function EditarIngreso(id){      
        $.ajax({
            type:'post',
            data:{ingreso_id:id},
            url:'../CGest_ingresos/ObtenerIngreso',
            success:function(response){
                console.log(response);
                var json = jQuery.parseJSON(response);
                AsignacionValoresIngresoEditar(json);
            }
        })      
    }
        
    function AsignacionValoresIngresoNuevo(json){
        $('#accion').val('add');    
        $('#tipoingreso_id option').remove();    
        $('#tipoingreso_id').append($('<option>').text('Seleccione').attr('value', ''));    
        $.each(json['tipoingreso'], function(j, resultado) {            
            $('#tipoingreso_id').append($('<option>').text(resultado.nombre).attr('value', resultado.tipoingreso_id));
        });
        $('#myModal').modal('show');       
    }
 
    function AsignacionValoresIngresoEditar(json){
        var ingresos= json['ingreso'];
        $('#accion').val('edit');        
        $('#ingreso_id').val(ingresos.ingreso_id);
        
        $('#tipoingreso_id option').remove();    
        $.each(json['tipoingreso'], function(j, resultado) {
            if(ingresos.tipoingreso_id===resultado.tipoingreso_id){
                $('#tipoingreso_id').append($('<option>').text(resultado.nombre).attr({value:resultado.tipoingreso_id,selected:'selected'}));
            }
            else{
                $('#tipoingreso_id').append($('<option>').text(resultado.nombre).attr('value', resultado.tipoingreso_id));
            }
        });
                 
        $('#descripcion').val(ingresos.descripcion);              
        $('#monto').val(ingresos.monto);              
        $('#fecha').val(ingresos.fecha);              
        $('#observacion').val(ingresos.observacion); 
        $('#myModal').modal('show');       
    }
        
    function ValidarInformacion(){
        var nameregex = /^[a-zA-Z ]+$/;       
        $.validator.addMethod("validname", function( value, element ) {
            return this.optional( element ) || nameregex.test( value );
        }); 
   
        $("#frmIngreso").validate({     
            rules:{   
                tipoingreso_id: {required: true},
                descripcion : {required: true},
                monto       : {required: true},
                fecha       : {required: true}
            },             

            messages:{               
                tipoingreso_id: {required: "Ingrese Nombre"},
                descripcion : {required: "Ingrese Descripcion"},
                monto       : {required: "Ingrese Monto"},
                fecha       : {required: "Ingrese Fecha"}
            },

            errorPlacement : function(error, element) {
                $(element).closest('.validarInfo').find('.help-block').html(error.html());
            },
            highlight : function(element) {
                $(element).closest('.validarInfo').removeClass('has-success').addClass('has-error');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).closest('.validarInfo').removeClass('has-error').addClass('has-success');
                $(element).closest('.validarInfo').find('.help-block').html('');
            },

            submitHandler: function(form) {
                form.submit();                
            }
        });   
    }

</script>
<!--End Region Scripts-->