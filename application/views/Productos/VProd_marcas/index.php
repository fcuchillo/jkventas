
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
                            <label>Marca</label>
                            <?php
                                echo '<select class="form-control input-sm" id="spnmarca" name="spnmarca"><option value="0">Todos</option>';
                                foreach ($marca as $value) {?>
                                    <?php echo '<option value="'.$value->marca_id.'" >'.$value->nombre.'</option>';
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
            <div class="box-body pre-scrollable" id="divContenedorMarcas" >                                        
                <table align="center" width="100%" cellpadding="0" cellspacing="0">						
                    <tr>
		 	<td align=center valign=top width="100%">
                            <table id="grid_tabla_marcas"></table>
                            <div id="grid_tabla_marcas_pager" ></div>
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
                <form id="frmMarca" name="frmMarca" action="../CProd_marcas/EditarMarca" method="POST">
                    <input type="hidden" value="" name="accion" id="accion">
                    
                    <div class="row">                        
                        <div class="col-sm-3"><label >Marca id: </label></div>                        
                        <div class="col-sm-3"><input class="form-control" type="text" id="marca_id" name="marca_id" value="" readonly="" ></div>                                                
                    </div>                 
               
                    <div class="row">
                        <div class="validarInfo">
                        <div class="col-sm-3"><label>Nombre:</label></div>
                        <div class="col-sm-4"><input class="form-control" name="nombre" id="nombre"> <span class="help-block" id="error"></span></div>
                        </div>
                    </div>    
                    
                    <div class="row">
                        <div class="validarInfo">
                        <div class="col-sm-3"><label>Direccion:</label></div>
                        <div class="col-sm-4"><input class="form-control" name="direccion" id="direccion"> <span class="help-block" id="error"></span></div>
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
                    <button type="submit" class="btn btn-primary" form="frmMarca" >Guardar</button>                      
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

var grid_tabla_marcas=jQuery("#grid_tabla_marcas");
var myTable;
var marca=null;
var editor;

    $(document).ready(function () {                       
        ObtenerParametros();  
        RecargarParameter_tabla_marcas();
        
        $('#btnBuscar').on('click', function() {
            ObtenerParametros();
            RecargarParameter_tabla_marcas();
        });
        
        $('#btnLimpiar').on('click', function(){ 
            $('#spnmarca').val(0);        
        });          
        ValidarInformacion();            
    });
        
    function ObtenerParametros(){
        $('#grid_tabla_marcas').jqGrid('GridUnload');
	grid_tabla_marcas=jQuery("#grid_tabla_marcas");   
        marca       = $('#spnmarca').val();
        getAll_grid_tabla_marcas(marca);
    }    
        
    function RecargarParameter_tabla_marcas(){
	DDRecargar_tabla_marcas(marca);
    }
    
    function DDRecargar_tabla_marcas(marca){
	grid_tabla_marcas.jqGrid("setGridParam",{
            page:1,	
            url:'../CProd_marcas/ListaMarcas?marca='+marca,
            datatype : "json"
	}).trigger("reloadGrid");
	
	return [ true, '' ]; 
    }    
        
    function getAll_grid_tabla_marcas(marca){
	var leditar          = { name : 'editar'	 ,index : 'index',  width : 20,    align : "center",    fixed : true,  sortable : false, formatter:EditarMarcaXid};
        var leliminar        = { name : 'eliminar'	 ,index : 'index',  width : 20,    align : "center",    fixed : true,  sortable : false, formatter:EliminarMarcaXid};
        var lmarca_id        = { name : 'marca_id'	 ,index : 'index',  width : 50,    align : "center",    fixed : true,  sortable : false };	
	var lnombre          = { name : 'nombre'         ,index : 'index',  width : 160,   align : "left",      fixed : true,  sortable : false };
	var ldireccion       = { name : 'direccion'      ,index : 'index',  width : 180,   align : "left",      fixed : true,  sortable : false };
        var lobservacion     = { name : 'observacion'	 ,index : 'index',  width : 220,   align : "left",      fixed : true,  sortable : false };
        
        colNames = ['','','Id','Nombre','Direccion','Observacion'];
	colModel = [leditar,leliminar,lmarca_id,lnombre,ldireccion,lobservacion];	    

	grid_tabla_marcas.jqGrid({
		url:'../CProd_marcas/ListaMarcas?marca='+marca,
		datatype : "json",
		mtype : 'post',
		colNames : colNames,
		colModel : colModel,
		height : 'auto',
		width : 710,
		pager : $('#grid_tabla_marcas_pager'),
		rowNum : 10,
		loadonce : true,
		scrollrows : true,
		rownumbers : true,
                caption: "Listado de Marcas",
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
        
        grid_tabla_marcas.navGrid('#grid_tabla_marcas_pager',{edit:false,add:false,del:false,search:false,refresh:false},{},{},{});
	
 	grid_tabla_marcas.navButtonAdd('#grid_tabla_marcas_pager',{ 	
            caption:"", 
            buttonicon:"ui-icon-plus", 
            onClickButton: AgregarMarca,
            position: "last", 
            title:"Agregar Recuperación", 
            cursor: "pointer"
        });
    }
    
    
    function AgregarMarca(){  
        console.log('test');
        $.ajax({
            type:'post',
            url:'../CProd_marcas/AgregarMarca',
            success:function(response){
               var json = jQuery.parseJSON(response);
               $('#frmMarca')[0].reset();
               $('#accion').val('add');
               AsignacionValoresMarcaNuevo(json);
            }
        })
    }
    
    function EliminarMarcaXid(cellvalue, options, rowObject){	
	return '<a href="javascript:void(0);" id="btnEliminar" onclick="EliminarMarca('+rowObject[0]+');" ><span class="glyphicon glyphicon-trash" ></span></a>';
    }
    
    function EditarMarcaXid(cellvalue, options, rowObject){	                
	return '<a href="javascript:void(0);" id="btnEditar" onclick="EditarMarca('+rowObject[0]+');" ><span class="glyphicon glyphicon-pencil" ></span></a>';
    }

    function EliminarMarca(id){
        if(confirm("Desea Eliminar? ")){
            $.ajax({
               type:'post',
               data:{marca_id:id},
               url:'../CProd_marcas/EliminarMarca',
               success:function(response){
                   console.log(response);
                   ObtenerParametros();
                   RecargarParameter_tabla_marcas();
               }
            })       
        }       
    }
  
    function EditarMarca(id){      
        $.ajax({
            type:'post',
            data:{marca_id:id},
            url:'../CProd_marcas/ObtenerMarca',
            success:function(response){
                console.log(response);
                var json = jQuery.parseJSON(response);
                AsignacionValoresMarcaEditar(json);
            }
        })      
    }
        
    function AsignacionValoresMarcaNuevo(json){
        $('#accion').val('add');               
        $('#myModal').modal('show');       
    }
 
    function AsignacionValoresMarcaEditar(json){
        var marcas= json['marca'];
        $('#accion').val('edit');        
        $('#marca_id').val(marcas.marca_id);
        $('#nombre').val(marcas.nombre);              
        $('#direccion').val(marcas.direccion);              
        $('#observacion').val(marcas.observacion); 
        $('#myModal').modal('show');       
    }
        
    function ValidarInformacion(){
        var nameregex = /^[a-zA-Z ]+$/;       
        $.validator.addMethod("validname", function( value, element ) {
            return this.optional( element ) || nameregex.test( value );
        }); 
   
        $("#frmMarca").validate({     
            rules:{   
                nombre      : {required: true},
                direccion   : {required: true},
            },             

            messages:{               
                nombre      : {required: "Ingrese Nombre"},
                direccion   : {required: "Ingrese Direccion"},
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