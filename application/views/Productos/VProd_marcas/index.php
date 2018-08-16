
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
            <div class="box-body pre-scrollable" id="divContenedorProducto" >                                        
                <table align="center" width="100%" cellpadding="0" cellspacing="0">						
                    <tr>
		 	<td align=center valign=top width="100%">
                            <table id="grid_tablero_anemia_altitud"></table>
                            <div id="grid_tablero_anemia_altitud_pager" ></div>
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
                <form id="frmProducto" name="frmProducto" action="../CProd_productos/EditarProducto" method="POST">
                    <input type="hidden" value="" name="accion" id="accion">
                    
                    <div class="row">
                        <div class="validarInfo">
                        <div class="col-sm-2"><label >Marca_id: </label></div>                        
                        <div class="col-sm-3"><input class="form-control" type="text" id="marca_id" name="marca_id" value="" > <span class="help-block" id="error"></span> </div>
                        <div class="col-sm-1"></div>
                        </div>
                    </div>                 
               
                    <div class="row">
                        <div class="validarInfo">
                        <div class="col-sm-2"><label>Nombre:</label></div>
                        <div class="col-sm-4"><input class="form-control" name="nombre" id="marca_id"> <span class="help-block" id="error"></span></div>
                        </div>
                    </div>    
                    
                    <div class="row">
                        <div class="validarInfo">
                        <div class="col-sm-2"><label>Direccion:</label></div>
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
                    <button type="submit" class="btn btn-primary" form="frmProducto" >Guardar</button>                      
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

var gidreporte_tablero_anemia_altitud=jQuery("#grid_tablero_anemia_altitud");
var myTable;
var marca=null;
var editor;

    $(document).ready(function () {                       
        ObtenerParametros();  
        DDRecargarParameter_mues();
        
        $('#btnBuscar').on('click', function() {
            ObtenerParametros();
            DDRecargarParameter_mues();
        });
        
        $('#btnLimpiar').on('click', function(){        
            $('#spnanio').append('<option value="2018" selected="selected">2018</option>');
            $('#spnmes').val(0);
            $('#spnestado').val(0);
            $('#spnmarca').val(0);
            $('#spncategoria').val(0);
            $("#txtcodigo").val("");            
        });          
        ValidarInformacion();            
    });
        
    function ObtenerParametros(){
        $('#grid_tablero_anemia_altitud').jqGrid('GridUnload');
	gidreporte_tablero_anemia_altitud=jQuery("#grid_tablero_anemia_altitud");   
        marca       = $('#spnmarca').val();
        getAll_tablero_anemia_altitud(marca);
    }    
        
    function DDRecargarParameter_mues(){
	DDRecargar_tablero_anemia_altitud(marca);
    }
    
    function DDRecargar_tablero_anemia_altitud(marca) {
	gidreporte_tablero_anemia_altitud.jqGrid("setGridParam",{
            page:1,	
            url:'../CProd_productos/ListaMarcas?marca='+marca,
            datatype : "json"
	}).trigger("reloadGrid");
	
	return [ true, '' ]; 
    }    
        
    function getAll_tablero_anemia_altitud(anio, mes, estado, marca, categoria, codigo){
	var leditar          = { name : 'editar'	 ,index : 'index',  width : 20,    align : "center",    fixed : true,  sortable : false, formatter:EditarProductoXid};
        var leliminar        = { name : 'eliminar'	 ,index : 'index',  width : 20,    align : "center",    fixed : true,  sortable : false, formatter:EliminarProductoXid};
        var lmarca_id        = { name : 'marca_id'	 ,index : 'index',  width : 30,    align : "center",    fixed : true,  sortable : false };	
	var lnombre          = { name : 'nombre'         ,index : 'index',  width : 130,   align : "left",      fixed : true,  sortable : false };
	var ldireccion       = { name : 'direccion'      ,index : 'index',  width : 130,   align : "left",      fixed : true,  sortable : false };
        var lobservacion     = { name : 'observacion'	 ,index : 'index',  width : 140,   align : "left",      fixed : true,  sortable : false };
        
        colNames = ['','','Id','Nombre','Direccion''Observacion'];
	colModel = [leditar,leliminar,lmarca_id,lnombre,ldireccion,lobservacion];	    

	gidreporte_tablero_anemia_altitud.jqGrid({
		url:'../CProd_productos/ListaMarcas?marca='+marca,
		datatype : "json",
		mtype : 'post',
		colNames : colNames,
		colModel : colModel,
		height : 'auto',
		width : 1150,
		pager : $('#grid_tablero_anemia_altitud_pager'),
		rowNum : 10,
		loadonce : true,
		scrollrows : true,
		rownumbers : true,
                caption: "Listado de Productos",
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
        
        gidreporte_tablero_anemia_altitud.navGrid('#grid_tablero_anemia_altitud_pager',{edit:false,add:false,del:false,search:false,refresh:false},{},{},{});
	
 	gidreporte_tablero_anemia_altitud.navButtonAdd('#grid_tablero_anemia_altitud_pager',{ 	
            caption:"", 
            buttonicon:"ui-icon-plus", 
            onClickButton: AgregarProducto,
            position: "last", 
            title:"Agregar Recuperación", 
            cursor: "pointer"
        });
    }
    
    
    function AgregarProducto(){  
        console.log('test');
        $.ajax({
            type:'post',
            url:'../CProd_marca/AgregarProducto',
            success:function(response){
               var json = jQuery.parseJSON(response);
               $('#frmProducto')[0].reset();
               $('#accion').val('add');
               AsignacionValoresProductonNuevo(json);
            }
        })
    }
    
    function EliminarProductoXid(cellvalue, options, rowObject){	
	return '<a href="javascript:void(0);" id="btnEliminar" onclick="EliminarProducto('+rowObject[0]+');" ><span class="glyphicon glyphicon-trash" ></span></a>';
    }
    
    function EditarProductoXid(cellvalue, options, rowObject){	                
	return '<a href="javascript:void(0);" id="btnEditar" onclick="EditarProducto('+rowObject[0]+');" ><span class="glyphicon glyphicon-pencil" ></span></a>';
    }

    function EliminarProducto(id){
        if(confirm("Desea Eliminar? ")){
            $.ajax({
               type:'post',
               data:{producto_id:id},
               url:'../CProd_marca/EliminarMarca',
               success:function(response){
                   console.log(response);
                   ObtenerParametros();
                    DDRecargarParameter_mues();
               }
            })       
        }       
    }
  
    function EditarProducto(id){      
        $.ajax({
            type:'post',
            data:{producto_id:id},
            url:'../CProd_marca/ObtenerMarca',
            success:function(response){
                console.log(response);
                var json = jQuery.parseJSON(response);
                AsignacionValoresProducto(json);
            }
        })      
    }
    
    function ValidarInformacion(){
        var nameregex = /^[a-zA-Z ]+$/;       
        $.validator.addMethod("validname", function( value, element ) {
            return this.optional( element ) || nameregex.test( value );
        }); 
   
        $("#frmProducto").validate({     
            rules:{                
                codigo_id       : {required: true},
                marca_id        : {required: true},
                categoria_id    : {required: true},
                nombre          : {required: true, validname: true},
                talla           : {required: true, maxlength: 3},
                color           : {required: true, validname: true},
                precio_compra   : {required: true, maxlength: 3,  },
                precio_venta    : {required: true, maxlength: 3},
                fecha_compra    : {required: true},
                estado          : {required: true}
            },             

            messages:{
                codigo_id       : {required: "Ingrese Codigo"},
                marca_id        : {required: "Seleccione Marca"},
                categoria_id    : {required: "Seleccione Categoria"},
                nombre          : {required: "Ingrese Nombre Producto", validname: "Nombre de Producto debe contener solo alfabetos y espacio"},
                talla           : {required: "Ingrese Talla", maxlength: "Validar Talla"},
                color           : {required: "Ingrese Color",validname: "Color de Producto debe contener solo alfabetos y espacio"},
                precio_compra   : {required: "Ingrese Precio Compra", maxlength: "Precio maximo 200"},
                precio_venta    : {required: "Ingrese Precio Venta", maxlength: "Precio maximo 200"},
                fecha_compra    : {required: "Ingrese Fecha Compra"},
                estado          : {required: "Seleccione Estado"}
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
    
    function AsignacionValoresProductonNuevo(json){
        $('#accion').val('add');
        $('#anio').val($('#spnanio').val());        
        $('#mes_id option').remove();    
        $.each(json['mes'], function(j, resultado) {
               $('#mes_id').append($('<option>').text(resultado.nombre).attr('value', resultado.mes_id));
        });
        $('#marca_id option').remove();    
        $('#marca_id').append($('<option>').text('Seleccione').attr('value', ''));    
        $.each(json['marca'], function(j, resultado) {            
            $('#marca_id').append($('<option>').text(resultado.nombre).attr('value', resultado.marca_id));
        });

        $('#categoria_id option').remove();    
        $('#categoria_id').append($('<option>').text('Seleccione').attr('value', ''));    
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
        $('#accion').val('edit');
        
        $('#producto_id').val(productos.producto_id);
        $('#codigo_id').val(productos.codigo_id);
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
        
        $('#observacion').val(productos.observacion); 

        $('#myModal').modal('show');       
    }

</script>
<!--End Region Scripts-->