
<!--Region Body-->
<div class="content-wrapper">
    <!--Region Section Header-->
    <section class="content-header">
<!--        <h1>Marcas</h1>
        <ol class="breadcrumb">
            <li><a href="<?=base_url()?>login/authentication"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Marcas</a></li>
            <li class="active">Marcas</li>
        </ol>-->
    </section>
    
    <!--End Region Section Header-->
    <!--Region Section Box-->
    <section class="content">

        <!--Region Box Filter-->
        <div class="box">
            <div class="box-header with-border">
                <!--<h3 class="box-title"></h3>-->
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
<!--                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>-->
                </div>
            </div>
            
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">  
                                
                        
                        <div class="col-md-2">
                            <label>Tipo Gasto</label>
                            <?php
                                echo '<select class="form-control input-sm" id="spntipogasto" name="spntipogasto"><option value="0">Todos</option>';
                                foreach ($tipogasto as $value) {?>
                                    <?php echo '<option value="'.$value->tipogasto_id.'" >'.$value->nombre.'</option>';
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
            <div class="box-body pre-scrollable" id="divContenedorGastos" >                                        
                <table align="center" width="100%" cellpadding="0" cellspacing="0">						
                    <tr>
		 	<td align=left valign=top width="100%">
                            <table id="grid_tabla_gastos"></table>
                            <div id="grid_tabla_gastos_pager" ></div>
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
                <form id="frmGasto" name="frmGasto" method="POST">
                    <input type="hidden" value="" name="accion" id="accion">
                    
                    <div class="row">                        
                        <div class="col-sm-3"><label >Gastos id: </label></div>                        
                        <div class="col-sm-3"><input class="form-control" type="text" id="gasto_id" name="gasto_id" value="" readonly="" ></div>                                                
                    </div>  
                    <div class="row">                        
                        <div class="validarInfo">
                        <div class="col-sm-3"><label>Tipo Gasto:</label></div>
                        <div class="col-sm-4"><select class="form-control" name="tipogasto_id" id="tipogasto_id"></select> <span class="help-block" id="error"></span></div>                        
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
                                           
                </form>               
            </div>
                        
            <div class="modal-footer"> 
                <!--<div class="modal-header">-->
                    <button type="submit" class="btn btn-primary" id="btnGuardarCambios" form="frmGasto" >Guardar</button>                      
                <!--</div>--> 
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

var grid_tabla_gastos=jQuery("#grid_tabla_gastos");
var myTable;
var tipogasto=null;
var mes=null;
var editor;

    $(document).ready(function () {
        
        ObtenerParametros();  
        RecargarParameter_tabla_gastos();
        
        $('#btnBuscar').on('click', function() {
            ObtenerParametros();
            RecargarParameter_tabla_gastos();
        });
        
        $('#btnLimpiar').on('click', function(){ 
            $('#spngasto').val(0);        
        }); 
        
        $('#frmGasto').submit(function(event){
            event.preventDefault();
            btnGuardar();
            ValidarInformacion(); 
        });                   
    });
    
    function btnGuardar(){
        $.post( "../Cgest_Gastos/EditarGasto",$("#frmGasto").serialize(), function( data ) {
            var response = jQuery.parseJSON(data);  
            $('#myModal').modal('hide');            
            ObtenerParametros();
            RecargarParameter_tabla_gastos();
        });
    }  
        
    function ObtenerParametros(){
        $('#grid_tabla_gastos').jqGrid('GridUnload');
	grid_tabla_gastos=jQuery("#grid_tabla_gastos");   
        tipogasto   = $('#spntipogasto').val();
        mes         = $('#spnmes').val();
        getAll_grid_tabla_gastos(tipogasto, mes);
    }    
        
    function RecargarParameter_tabla_gastos(){
	DDRecargar_tabla_gastos(tipogasto, mes);
    }
    
    function DDRecargar_tabla_gastos(tipogasto, mes){
	grid_tabla_gastos.jqGrid("setGridParam",{
            page:1,	
            url:'../CGest_gastos/ListaGastos?tipogasto='+tipogasto+'&mes='+mes,
            datatype : "json"
	}).trigger("reloadGrid");
	
	return [ true, '' ]; 
    }    
        
    function getAll_grid_tabla_gastos(tipogasto, mes){
	var leditar         = { name : 'editar'         ,index : 'index',  width : 20,    align : "center",    fixed : true,  sortable : false, formatter:EditarGastoXid};
        var leliminar       = { name : 'eliminar'	,index : 'index',  width : 20,    align : "center",    fixed : true,  sortable : false, formatter:EliminarGastoXid};
        var lgasto_id       = { name : 'gasto_id'	,index : 'index',  width : 20,    align : "center",    fixed : true,  sortable : false };	
	var lnombre         = { name : 'nombre'         ,index : 'index',  width : 60,   align : "left",      fixed : true,  sortable : false };
	var ldescripcion    = { name : 'descripcion'    ,index : 'index',  width : 130,   align : "left",      fixed : true,  sortable : false };
        var lmonto          = { name : 'monto'          ,index : 'index',  width : 40,   align : "right",      fixed : true,  sortable : false };
        var lfecha          = { name : 'fecha'          ,index : 'index',  width : 100,   align : "center",      fixed : true,  sortable : false };        
        
        colNames = ['','','Id','Gastos','Descripcion','Monto','Fecha'];
	colModel = [leditar,leliminar,lgasto_id,lnombre,ldescripcion,lmonto,lfecha];	    

	grid_tabla_gastos.jqGrid({
		url:'../CGest_gastos/ListaGastos?tipogasto='+tipogasto+'&mes='+mes,
		datatype : "json",
		mtype : 'post',
		colNames : colNames,
		colModel : colModel,
		height : 'auto',
		width : 455,
		pager : $('#grid_tabla_gastos_pager'),
		rowNum : 5,
		loadonce : true,
		scrollrows : true,
		rownumbers : true,
                caption: "Listado de Gastos",
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
        
        grid_tabla_gastos.navGrid('#grid_tabla_gastos_pager',{edit:false,add:false,del:false,search:false,refresh:false},{},{},{});
	
 	grid_tabla_gastos.navButtonAdd('#grid_tabla_gastos_pager',{ 	
            caption:"", 
            buttonicon:"ui-icon-plus", 
            onClickButton: AgregarGasto,
            position: "last", 
            title:"Agregar Recuperación", 
            cursor: "pointer"
        });
    }
    
    
    function AgregarGasto(){  
        console.log('test');
        $.ajax({
            type:'post',
            url:'../CGest_gastos/AgregarGasto',
            success:function(response){
               var json = jQuery.parseJSON(response);
               $('#frmGasto')[0].reset();
               $('#accion').val('add');
               AsignacionValoresGastoNuevo(json);
            }
        })
    }
    
    function EliminarGastoXid(cellvalue, options, rowObject){	
        var valor=(rowObject[0]==undefined?rowObject.gasto_id:rowObject[0]);
        if(valor>0){
            return '<a href="javascript:void(0);" id="btnEliminar" onclick="EliminarGasto('+valor+');" ><span class="glyphicon glyphicon-trash" ></span></a>';
        }
        else{
            return '';
        }
	
    }
    
    function EditarGastoXid(cellvalue, options, rowObject){	              
        var valor=(rowObject[0]==undefined?rowObject.gasto_id:rowObject[0]);
        if(valor>0){
            return '<a href="javascript:void(0);" id="btnEditar" onclick="EditarGasto('+valor+');" ><span class="glyphicon glyphicon-pencil" ></span></a>';
        }
        else{
            return ''
        }
	
    }

    function EliminarGasto(id){
        if(confirm("Desea Eliminar? ")){
            $.ajax({
               type:'post',
               data:{gasto_id:id},
               url:'../CGest_gastos/EliminarGasto',
               success:function(response){
                   console.log(response);
                   ObtenerParametros();
                   RecargarParameter_tabla_gastos();
               }
            })       
        }       
    }
  
    function EditarGasto(id){      
        $.ajax({
            type:'post',
            data:{gasto_id:id},
            url:'../CGest_gastos/ObtenerGasto',
            success:function(response){
                console.log(response);
                var json = jQuery.parseJSON(response);
                AsignacionValoresGastoEditar(json);
            }
        })      
    }
        
    function AsignacionValoresGastoNuevo(json){
        $('#accion').val('add');    
        $('#tipogasto_id option').remove();    
        $('#tipogasto_id').append($('<option>').text('Seleccione').attr('value', ''));    
        $.each(json['tipogasto'], function(j, resultado) {            
            $('#tipogasto_id').append($('<option>').text(resultado.nombre).attr('value', resultado.tipogasto_id));
        });
        $('#myModal').modal('show');       
    }
 
    function AsignacionValoresGastoEditar(json){
        var gastos= json['gasto'];
        $('#accion').val('edit');        
        $('#gasto_id').val(gastos.gasto_id);
        
        $('#tipogasto_id option').remove();    
        $.each(json['tipogasto'], function(j, resultado) {
            if(gastos.tipogasto_id===resultado.tipogasto_id){
                $('#tipogasto_id').append($('<option>').text(resultado.nombre).attr({value:resultado.tipogasto_id,selected:'selected'}));
            }
            else{
                $('#tipogasto_id').append($('<option>').text(resultado.nombre).attr('value', resultado.tipogasto_id));
            }
        });
                 
        $('#descripcion').val(gastos.descripcion);              
        $('#monto').val(gastos.monto);              
        $('#fecha').val(gastos.fecha);                      
        $('#myModal').modal('show');       
    }
        
    function ValidarInformacion(){
        var nameregex = /^[a-zA-Z ]+$/;       
        $.validator.addMethod("validname", function( value, element ) {
            return this.optional( element ) || nameregex.test( value );
        }); 
   
        $("#frmGasto").validate({     
            rules:{   
                tipogasto_id: {required: true},
                descripcion : {required: true},
                monto       : {required: true},
                fecha       : {required: true}
            },             

            messages:{               
                tipogasto_id: {required: "Ingrese Nombre"},
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