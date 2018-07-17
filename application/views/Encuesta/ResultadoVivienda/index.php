<!--Region Body-->
<div class="content-wrapper">
    <!--Region Section Header-->
    <section class="content-header">
        <h1>Resultado por Vivienda</h1>
        <ol class="breadcrumb">
            <li><a href="<?=base_url()?>login/authentication"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Resultado por Vivienda</a></li>
            <li class="active">Resultado por Vivienda</li>
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
						<div class="col-md-8">
                    	</div>
                    	<div class="col-md-2">
                    		<label class="PyENDES-Label">Buscar por Conglomerado:</label>
							<input type="text" class="form-control input-sm" id="conglomeradoGeneral" name="conglomeradoGeneral" placeholder="Ingresar Conglomerado">
                    	</div>
                        <div class="col-md-2" style="visibility: collapse">
                            <label class="PyENDES-Label">Año</label>
                            <select class="form-control">
                            	<option value="0">espacio</option>
                            </select>

                        </div>
                        <!--<div class="col-md-2">
                            <label class="PyENDES-Label">Año</label>
                            <?php
                            echo '<select class="form-control input-sm" id="anio" name="anio">';
                            foreach ($anios as $value) {?>
                               <?php echo '<option value="'.$value->ANIO.'" >'.$value->ANIO.'</option>';
                            }
                            echo '</select>';
                            ?>
                        </div>-->
                        <div class="col-md-2">
                        	<label class="PyENDES-Label">Año</label>
                        	<select class="form-control input-sm" id="anio" name="anio">
                        		<option value="2018">2018</option>
                                <option value="2017">2017</option>
                        		<option value="2016">2016</option>
                        	</select>
                        </div>
                        <div class="col-md-2"> 
                            <label class="PyENDES-Label">Equipo</label>
                            <?php
                            echo '<select class="form-control input-sm" id="equipo" name="equipo">';
                            foreach ($equipos as $value) {?>
                                <?php echo '<option value="'.$value->EQUIPO.'" >'.$value->DESCRIPCION.'</option>';
                            }
                            echo '</select>';
                            ?>
                        </div>
                        <div class="col-md-2">
                            <label class="PyENDES-Label">Mes</label>
                            <?php
                            echo '<select class="form-control input-sm" id="mes" name="mes">';
                            foreach ($meses as $value) {?>
                               <?php echo '<option value="'.$value->MES.'" >'.$value->DESCRIPCION.'</option>';
                            }
                            echo '</select>';
                            ?>
                        </div>
                        <div class="col-md-2"> 
                            <label class="PyENDES-Label">Conglomerado</label>
                            <select class="form-control input-sm" id="conglomerado" name="equipo">
                            	<option value="" selected="selected">Seleccionar</option>
                            </select>
                        </div> 
                        <div class="col-md-2"> 
                            <label class="PyENDES-Label">Vivienda</label>
                            <select class="form-control input-sm" id="vivienda" name="vivienda">
                            	<option value="" selected="selected">Seleccionar</option>
                            </select>
                        </div> 
                        <div class="col-md-2">
                            <div style="display: inline-block; width: 49% ">
                                <label style="visibility: collapse">Buscar</label>
                                <button type="button" class="btn btn-block btn-primary btn-sm" id="btnBuscar">Buscar</button>
                            </div>
                            <div style="display: inline-block; width: 49%">
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
                <h3 class="box-title">Resultado</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">					    
						
						<div class="col-sm-1"><label class="PyENDES-Label">Departamento:</label></div>
						<div class="col-sm-2"><label class="PyENDES-Label-Desc" id="descDepartamento" style="visibility: collapse">Res. Departamento</label></div>
						<div class="col-sm-1"><label class="PyENDES-Label">Conglomerado:</label></div>
						<div class="col-sm-2"><label class="PyENDES-Label-Desc" id="descConglomerado" style="visibility: collapse">Res. Conglomerado</label></div>
						
						<div class="col-sm-6"><label class="PyENDES-Label-Desc" id="descDepartamento" style="visibility: collapse">Salto</label></div>

						<div class="col-sm-1"><label class="PyENDES-Label">Equipo :</label></div>
						<div class="col-sm-2"><label class="PyENDES-Label-Desc" id="descEquipo" style="visibility: collapse">Res. Equipo</label></div>
						<div class="col-sm-1"><label class="PyENDES-Label">Area :</label></div>
						<div class="col-sm-2"><label class="PyENDES-Label-Desc" id="descArea" style="visibility: collapse">Res. Area</label></div>
						
						<div class="col-sm-6"><label class="PyENDES-Label-Desc" id="descDepartamento" style="visibility: collapse">Salto</label></div>
						
						<div class="col-sm-1"><label class="PyENDES-Label">DNI :</label></div>
						<div class="col-sm-2"><label class="PyENDES-Label-Desc" id="descDNI" style="visibility: collapse">Res. DNI</label></div>
						<div class="col-sm-1"><label class="PyENDES-Label">Mes :</label></div>
						<div class="col-sm-2"><label class="PyENDES-Label-Desc" id="descMes" style="visibility: collapse">Res. Mes</label></div>

						<div class="col-sm-6"><label class="PyENDES-Label-Desc" id="descDepartamento" style="visibility: collapse">Salto</label></div>

						<div class="col-sm-1"><label class="PyENDES-Label">Supervisora :</label></div>
						<div class="col-sm-2"><label class="PyENDES-Label-Desc" id="descSupervisor" style="visibility: collapse">Res. Supervisor</label></div>
						<div class="col-sm-1"><label class="PyENDES-Label">Estado :</label></div>
						<div class="col-sm-2"><label class="PyENDES-Label-Desc" id="descEstado" style="visibility: collapse">Res. Estado</label></div>

                    </div>
                </div>
            </div>

        </div>
        <!--End Region Box Result-->

        <!--Region Box Result-->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">RESULTADO: Vivienda, Hogar y Cuestionario de Salud</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <!--Region Report-->
                            
                                <table id="tblResultadoViviendaNive1" class="table table-sm table-condensed table-bordered" name="NombreReporte003">
                                    <thead id="headResultadoViviendaNive1">
                                        <tr class="info">
                                            <th><center>VIVIENDA</center></th>
                                            <th><center>RES. VIVIENDA</center></th>
                                            <th><center>HOGAR</center></th>
                                            <th><center>RES. HOGAR</center></th>
                                            <th><center>INFORMANTE SALUD</center></th>
                                            <th><center>RES. CUESTIONARIO SALUD</center></th>
                                            <th><center>RES. INFORMANTE SALUD</center></th>
                                            <th><center>RES. ANTROPOMETRIA</center></th>
                                            <th><center>RES. PRESIÓN ARTERIAL</center></th>
                                        </tr>            
                                    </thead>
                                </table>
                            
                        <!--End Region Report-->
                    </div>
                </div>
            </div>

        </div>
        <!--End Region Box Result-->

                <!--Region Box Result-->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">RESULTADO SECCIÓN 4-5: Medición de Peso, Talla y Prueba de Hemoglobina</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <!--Region Report-->
                        		<table id="tblResultadoViviendaNive2" class="table table-sm table-condensed table-bordered" name="NombreReporte003">
                                    <thead id="headResultadoViviendaNive2">
                                        <tr class="info">
                                            <th><center>VIVIENDA</center></th>
                                            <th><center>HOGAR</center></th>
                                            <th><center>NOMBRES</center></th>
                                            <th><center>EDAD</center></th>
                                            <th><center>RES. MEDICIÓN</center></th>
                                            <th><center>PESO</center></th>
                                            <th><center>TALLA</center></th>
                                            <th><center>RES. PRUEBA</center></th>
                                            <th><center>HEMOGLOBINA</center></th>
                                        </tr>            
                                    </thead>
                                </table>                            
                        <!--End Region Report-->
                    </div>
                </div>
            </div>

        </div>
        <!--End Region Box Result-->

                <!--Region Box Result-->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">RESULTADO SECCIÓN 8: Salud bucal, Ocular y Mental en Niños y Niñas</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <!--Region Report-->
                            
                                <table id="tblResultadoViviendaNive3" class="table table-sm table-condensed table-bordered" name="NombreReporte003">
                                    <thead id="headResultadoViviendaNive3">
                                        <tr class="info">
                                            <th><center>VIVIENDA</center></th>
                                            <th><center>HOGAR</center></th>
                                            <th><center>NOMBRE</center></th>
                                            <th><center>EDAD</center></th>
                                            <th><center>RESULTADO</center></th>
                                        </tr>            
                                    </thead>
                                </table>
                            
                        <!--End Region Report-->
                    </div>
                </div>
            </div>

        </div>
        <!--End Region Box Result-->

		<!--Region Box Result-->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">RESULTADO DEL CUESTIONARIO INDIVIDUAL: Mujeres de 15 a 49 Años </h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <!--Region Report-->
                            
                                <table id="tblResultadoViviendaNive4" class="table table-sm table-condensed table-bordered" name="NombreReporte003">
                                    <thead id="headResultadoViviendaNive4">
                                        <tr class="info">
                                            <th><center>VIVIENDA</center></th>
                                            <th><center>HOGAR</center></th>
                                            <th><center>NOMBRE</center></th>
                                            <th><center>EDAD</center></th>
                                            <th><center>RESULTADO</center></th>
                                        </tr>            
                                    </thead>
                                </table>
                            
                        <!--End Region Report-->
                    </div>
                </div>
            </div>

        </div>
        <!--End Region Box Result-->
    </section>
</div>

<!--Region Scripts-->
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!--<script src="<?php //echo base_url(); ?>assets/content/js/registro/controlTransferencia.js"></script>-->
<script>
    
var myTable;

$(document).ready(function () {

	cargarConglomerado();

    $('#btnBuscar').on('click', function() {

    	var conglomerado = $('#conglomeradoGeneral').val() != '' ? $('#conglomeradoGeneral').val() : $('#conglomerado').val() ;
        buscarResultadoViviendaNivel0(conglomerado);
        buscarResultadoViviendaNivel1(conglomerado);
        buscarResultadoViviendaNivel2(conglomerado);
        buscarResultadoViviendaNivel3(conglomerado);
        buscarResultadoViviendaNivel4(conglomerado);
    });

    $('#btnLimpiar').on('click', function(){
		$("#anio").removeAttr("readonly");
		$("#mes").removeAttr("readonly");
		$("#equipo").removeAttr("readonly");
		$("#conglomerado").removeAttr("readonly");
		$("#vivienda").removeAttr("readonly");
		$("#conglomeradoGeneral").val('');
		cambiarFiltros(false);
    });

    $('#conglomeradoGeneral').on( 'keydown', function(event) {
        
        var conglomerado = $("#conglomeradoGeneral").val();
        
        if(event.which === 13 && conglomerado.length === 4){
            buscarResultadoViviendaNivel0(conglomerado);
            buscarResultadoViviendaNivel1(conglomerado);
            buscarResultadoViviendaNivel2(conglomerado);
            buscarResultadoViviendaNivel3(conglomerado);
            buscarResultadoViviendaNivel4(conglomerado);
        }
    });  

	$("#anio").change(function() {
  		cargarConglomerado();
	});

	$("#mes").change(function() {
  		cargarConglomerado();
	});

	$("#equipo").change(function() {
  		cargarConglomerado();
	});

	$("#conglomerado").change(function() {
  		cargarVivienda($(this).val());
	});

	$("#conglomeradoGeneral").focusout(function() { 
		if($(this).val().length > 0) {
			$('#mes').attr("readonly", "readonly");
			$('#equipo').attr("readonly", "readonly");
			$('#conglomerado').attr("readonly", "readonly");
			cambiarFiltros(true);
			cargarVivienda($(this).val());
		}
		if($(this).val().length < 4){
			$("#mes").removeAttr("readonly");
			$("#equipo").removeAttr("readonly");
			$('#conglomerado').removeAttr("readonly");
			cambiarFiltros(false);
		}
	});
});
	
function buscarResultadoViviendaNivel0(conglomerado){
   $.ajax({
		type : 'POST',
        url: "../ResultadoVivienda/obtenerReporte003",
        data: {
			anio            : $("#anio").val(),
            mes             : $("#mes").val(),
            equipo          : $("#equipo").val(),
            nivel 	        : 0,
            conglomerado    : conglomerado,
            vivienda        : $("#vivienda").val(),
            vivienda        : $("#vivienda").val(),
            DNI             : $("#clave") .val()
        },
        success : function(result) {
            var json = jQuery.parseJSON(result);

            $('#descDepartamento').text(json[0].DEPARTAMENTO);
            $('#descConglomerado').text(json[0].CONGLOMERADO);
            $('#descEquipo').text(json[0].EQUIPO);
            $('#descArea').text(json[0].AREA);
            $('#descDNI').text(json[0].DNI);
            $('#descMes').text(json[0].MES);
            $('#descSupervisor').text(json[0].SUPERVISORA);
            $('#descEstado').text(json[0].ESTADO);

			$('#descDepartamento').css("visibility", "");
            $('#descConglomerado').css("visibility", "");
            $('#descEquipo').css("visibility", "");
            $('#descArea').css("visibility", "");
            $('#descDNI').css("visibility", "");
            $('#descMes').css("visibility", "");
            $('#descSupervisor').css("visibility", "");
            $('#descEstado').css("visibility", "");


        },
        error : function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + ' ' + thrownError);
        }
   });
}

function buscarResultadoViviendaNivel1(conglomerado){
    jsShowWindowLoad();
    myTable = $('#tblResultadoViviendaNive1').DataTable({
        initComplete: function () {
            jsRemoveWindowLoad();
        },
        scrollY: 300,
        scrollX: true,
        ajax: {
            url: "../ResultadoVivienda/obtenerReporte003",
            dataSrc: "",
            type:"POST",
            data: { 
                anio            : $("#anio").val(), 
                mes             : $("#mes").val(), 
                equipo          : $("#equipo").val(), 
                nivel 	        : 1, 
                conglomerado    : conglomerado,
                vivienda        : $("#vivienda").val(),
                vivienda        : $("#vivienda").val(),
                DNI             : $("#clave") .val()
            },
        },
        columns:[ 
            { data:"VIVIENDA",              class:"textFont text-center"/*,      width: "40" */    },
            { data:"RESULTADO_VIVIENDA",    class:"textFont text-left",        width: "110"     },
            { data:"HOGAR_ID",              class:"textFont text-left",        width: "40"     },
            { data:"RESULTADO_HOGAR",       class:"textFont text-left",        width: "100"     },
            { data:"INFORMANTE_SALUD",      class:"textFont text-left",        width: "150"     },
            { data:"RESULTADO_SCUEST",      class:"textFont text-left",        width: "170"       },
            { data:"RESULTADO_SINFO",       class:"textFont text-left",        width: "150"     },
            { data:"RESULTADO_SANTRO",      class:"textFont text-left",        width: "170"     },
            { data:"RESULTADO_SPRESI",      class:"textFont text-left",        width: "150"     }
        ],
        bDestroy: true
    });
}

function buscarResultadoViviendaNivel2(conglomerado){
    jsShowWindowLoad();
    myTable = $('#tblResultadoViviendaNive2').DataTable({
        initComplete: function () {
            jsRemoveWindowLoad();
        },
        scrollY: 300,
        scrollX: true,
        ajax: {
            url: "../ResultadoVivienda/obtenerReporte003",
            dataSrc: "",
            type:"POST",
            data: { 
                anio            : $("#anio").val(), 
                mes             : $("#mes").val(), 
                equipo          : $("#equipo").val(), 
                nivel           : 2, 
                conglomerado    : conglomerado,
                vivienda        : $("#vivienda").val(),
                DNI             : $("#clave") .val()
            },
        },
        columns:[ 
            { data:"VIVIENDA",              class:"textFont text-center"/*,      width: "40" */    },
            { data:"HOGAR_ID",              class:"textFont text-left"/*,      width: "40" */    },
            { data:"PERSONA_S4",            class:"textFont text-left"/*,      width: "40" */    },
            { data:"EDAD",                  class:"textFont text-left"/*,      width: "40" */    },
            { data:"SECCION4_RESULTADO",    class:"textFont text-left"/*,      width: "40" */    },
            { data:"SECCION4_PESO",      	class:"textFont text-left"/*,      width: "40" */    },
            { data:"SECCION4_TALLA",      	class:"textFont text-left"/*,      width: "40" */    },
            { data:"SECCION5_RESULTADO",    class:"textFont text-left"/*,      width: "40" */    },
            { data:"SECCION_EMOGLO",      	class:"textFont text-left"/*,      width: "40" */    },
        ],
        bDestroy: true
    });
}

function buscarResultadoViviendaNivel3(conglomerado){
    jsShowWindowLoad();
    myTable = $('#tblResultadoViviendaNive3').DataTable({
        initComplete: function () {
            jsRemoveWindowLoad();
        },
        scrollY: 300,
        scrollX: true,
        ajax: {
            url: "../ResultadoVivienda/obtenerReporte003",
            dataSrc: "",
            type:"POST",
            data: { 
                anio            : $("#anio").val(), 
                mes             : $("#mes").val(), 
                equipo          : $("#equipo").val(), 
                nivel           : 3, 
                conglomerado    : conglomerado,
                vivienda        : $("#vivienda").val(),
                DNI             : $("#clave") .val()
            },
        },
        columns:[ 
            { data:"VIVIENDA",      class:"textFont text-left"/*,      width: "40" */    },
            { data:"HOGAR_ID",      class:"textFont text-left"/*,      width: "40" */    },
            { data:"NOMBRE",        class:"textFont text-left"/*,      width: "40" */    },
            { data:"EDAD",          class:"textFont text-left"/*,      width: "40" */    },
            { data:"RESULTADO",     class:"textFont text-left"/*,      width: "40" */    },
        ],
        bDestroy: true
    });
}

function buscarResultadoViviendaNivel4(conglomerado){
    jsShowWindowLoad();
    myTable = $('#tblResultadoViviendaNive4').DataTable({
        initComplete: function () {
            jsRemoveWindowLoad();
        },
        scrollY: 300,
        scrollX: true,
        ajax: {
            url: "../ResultadoVivienda/obtenerReporte003",
            dataSrc: "",
            type:"POST",
            data: { 
                anio            : $("#anio").val(), 
                mes             : $("#mes").val(), 
                equipo          : $("#equipo").val(), 
                nivel           : 4, 
                conglomerado    : conglomerado,
                vivienda        : $("#vivienda").val(),
                DNI             : $("#clave") .val()
            },
        },
        columns:[ 
            { data:"VIVIENDA",      class:"textFont text-left"/*,      width: "40" */    },
            { data:"HOGAR_ID",      class:"textFont text-left"/*,      width: "40" */    },
            { data:"NOMBRE",   		class:"textFont text-left"/*,      width: "40" */    },
            { data:"EDAD",          class:"textFont text-left"/*,      width: "40" */    },
            { data:"RESULTADO",     class:"textFont text-left"/*,      width: "40" */    },
        ],
        bDestroy: true
    });
}

function cambiarFiltros(valor){
	if(valor) {
		$('#mes').empty();
		$('#mes').append('<option value="0" selected="selected">Todos</option>');
		$('#equipo').empty();
		$('#equipo').append('<option value="0" selected="selected">Todos</option>');
		$('#conglomerado').empty();
		$('#conglomerado').append('<option value="0" selected="selected">Seleccionar</option>');
	}
	else {
		//cargarAnio();
		$('#vivienda').empty();
		$('#vivienda').append('<option value="0" selected="selected">Seleccionar</option>');
		cargarMes();
		cargarEquipo();
		cargarConglomerado();
	}
}

function cargarAnio(){
	$.ajax({
        type : 'GET',
        dataType : 'JSON',
        url : '../ResultadoVivienda/cargarAnio',
            success : function(result) {
            $('#anio').empty();
            $.each(result, function(j, item) {
				$('#anio').append($('<option>').text(item.ANIO).attr('value', item.ANIO));
            });
        },
        error : function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + ' ' + thrownError);
        }
    });	
}

function cargarMes(){
	$.ajax({
        type : 'GET',
        dataType : 'JSON',
        url : '../ResultadoVivienda/cargarMes',
            success : function(result) {
            $('#mes').empty();
            $.each(result, function(j, item) {
				$('#mes').append($('<option>').text(item.DESCRIPCION).attr('value', item.MES));
            });
        },
        error : function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + ' ' + thrownError);
        }
    });
}

function cargarEquipo(){
    $.ajax({
        type : 'GET',
        dataType : 'JSON',
        url : '../ResultadoVivienda/cargarEquipo',
        success : function(result) {
            $('#equipo').empty();
            $.each(result, function(j, item) {
				$('#equipo').append($('<option>').text(item.DESCRIPCION).attr('value', item.EQUIPO));
            });
        },
        error : function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + ' ' + thrownError);
        }
    });
}

function cargarConglomerado(){
    $.ajax({
        type : 'POST',
        dataType : 'JSON',
        url : '../ResultadoVivienda/cargarConglomerado',
        data: { 
        	anio: 		$('#anio').val(), 
        	equipo: 	$("#equipo").val(), 
        	mes: 		$("#mes").val() 
        },
        success : function(result) {
        	console.log(result);
            $('#conglomerado').empty();
            $('#conglomerado').append('<option value="" selected="selected">Seleccionar</option>');
            $.each(result, function(j, item) {
				$('#conglomerado').append($('<option>').text(item.CONGLOMERADO).attr('value', item.CONGLOMERADO));
            });
            $("#vivienda").removeAttr("readonly");
        },
        error : function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + ' ' + thrownError);
        }
    });
}

function cargarVivienda(conglomerado){
	    $.ajax({
        type : 'POST',
        dataType : 'JSON',
        url : '../ResultadoVivienda/cargarVivienda',
        data: { 
        	conglomerado: 	conglomerado, anio:$('#anio').val() 
        },
        success : function(result) {
            $('#vivienda').empty();
			$('#vivienda').append('<option value="" selected="selected">Seleccionar</option>');
            $.each(result, function(j, item) {
				$('#vivienda').append($('<option>').text(item.VIVIENDA).attr('value', item.VIVIENDA));
            });
        },
        error : function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + ' ' + thrownError);
        }
    });
}
</script>
<!--End Region Scripts-->