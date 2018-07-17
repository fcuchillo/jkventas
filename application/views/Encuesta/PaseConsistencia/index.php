<!--Region Body-->
<div class="content-wrapper">
    <!--Region Section Header-->
    <section class="content-header">
        <h1>Pase a Consistencia</h1>
        <ol class="breadcrumb">
            <li><a href="<?=base_url()?>login/authentication"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Pase a Consistencia</a></li>
            <li class="active">Pase a Consistencia</li>
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
                            <?php
                            echo '<select class="form-control input-sm" id="anio" name="anio">';
                            foreach ($anios as $value) {?>
                               <?php echo '<option value="'.$value->ANIO.'" >'.$value->ANIO.'</option>';
                            }
                            echo '</select>';
                            ?>
                        </div>
                        <div class="col-md-2"> 
                            <label class="PyENDES-Label">Equipo</label>
                            <?php
                            echo '<select class="form-control input-sm" id="equipo" name="equipo"><option value="00">Todos</option>';
                            foreach ($equipos as $value) {?>
                                <?php echo '<option value="'.$value->EQUIPO.'" >'.$value->DESCRIPCION.'</option>';
                            }
                            echo '</select>';
                            ?>
                        </div>
                        <div class="col-md-1">
                            <label class="PyENDES-Label">Mes Inicial</label>
                            <?php
                            echo '<select class="form-control input-sm" id="mesIni" name="mesIni"><option value="00">Todos</option>';
                            foreach ($meses as $value) {?>
                               <?php echo '<option value="'.$value->MES.'" >'.$value->DESCRIPCION.'</option>';
                            }
                            echo '</select>';
                            ?>
                        </div>
                        <div class="col-md-1">
                            <label class="PyENDES-Label">Mes Final</label>
                            <select class="form-control input-sm" id="mesFin" name="mesFin">
                                <option value="00">Todos</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="PyENDES-Label">Nivel</label>
                            <select class="form-control input-sm" id="nivel" name="nivel">
                                <option value="1">Completos</option>
                                <option value="2">Incomplementos</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="PyENDES-Label">Estado De Pase</label>
                            <select class="form-control input-sm" id="estado" name="estado">
                                <option value="0">Todos</option>
                                <option value="1">Captura</option>
                                <option value="2">Consistencia</option>
                            </select>
                        </div>
                        <div class="col-md-1"> 
                            <label class="PyENDES-Label">Conglomerado</label>
                            <input type="text" class="form-control input-sm" id="conglomerado" name="conglomerado" placeholder="">
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
                             <div style="display: inline-block; width: 49%">
                                <label style="visibility: collapse">Procesar</label>  
                                <button type="submit" class="btn btn-block btn-primary btn-sm" id="btnProcesar">Procesar</button>
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
            
            <div class="box-body" id="divContenedorConglomerado" style="display: none" >
                <div class="row">
                    <div class="col-sm-12">
                        <center><label style="visibility: collapse">Espacio : </label></center>
                        <!--Region Report-->
                            
                                <table id="tblCoberturaConglomerado" class="table table-sm table-condensed table-bordered" name="NombreReporte004">
                                    <thead id="headCoberturaConglomerado">
                                        <tr class="info">
                                            <th><center>ORD.</center></th>
                                            <th><center>DEPARTAMENTO</center></th>
                                            <th><center>EQUIPO</center></th>
                                            <th><center>DNI</center></th>
                                            <th><center>SUPERVISORA</center></th>
                                            <th><center>MES</center></th>
                                            <th><center>AREA</center></th>
                                            <th><center>CONGLOMERADO</center></th>
                                            <th><center>ESTADO_TRANS</center></th>
                                            <th><center>R. VIVIENDA</center></th>
                                            <th><center>FECHA_TRAN</center></th>
                                            <th><center>HORA_TRANS</center></th>
                                            <th><center>ESTADO_PASE</center></th>
                                            <th><center>FECHA_PASE</center></th>
                                            <th><center>HORA_PASE</center></th>
                                            <th><center>ENVIAR</center></th>
                                        </tr>
                                    </thead>
                                </table>
                            
                        <!--End Region Report-->
                    </div>
                </div>
            </div>
                        <div class="box-body" id="divContenedorVivienda" style="display: none" >
                <div class="row">
                    <div class="col-sm-12">
                        <center><label style="visibility: collapse">Espacio : </label></center>
                        <!--Region Report-->
                            
                                <table id="tblCoberturaVivienda" class="table table-sm table-condensed table-bordered" name="NombreReporte004">
                                    <thead id="headCoberturaVivienda">
                                        <tr class="info">
                                            <th><center>ORD.</center></th>
                                            <th><center>DEPARTAMENTO</center></th>
                                            <th><center>EQUIPO</center></th>
                                            <th><center>DNI</center></th>
                                            <th><center>SUPERVISORA</center></th>
                                            <th><center>MES</center></th>
                                            <th><center>AREA</center></th>
                                            <th><center>CONGLOME</center></th>
                                            <th><center>VIVIENDA</center></th>
                                            <th><center>ESTADO_TRANS.</center></th>
                                            <th><center>R. VIVIENDA.</center></th>
                                            <th><center>FECHA_TRAN.</center></th>
                                            <th><center>HORA_TRANS.</center></th>
                                            <th><center>ESTADO_PASE.</center></th>
                                            <th><center>FECHA_PASE</center></th>
                                            <th><center>HORA_PASE</center></th>
                                            <th><center>ENVIAR</center></th>
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
<!--<script src="<?php echo base_url(); ?>assets/content/js/registro/controlTransferencia.js"></script>-->
<script>
    
var myTable;

$(document).ready(function () {

    $('#divContenedorConglomerado').css("display", "");
    $('#divContenedorVivienda').css("display", "none");
       $('#btnBuscar').on('click', function() {
        if($('#nivel').val() === "1") { 
            buscarCoberturasConglomerado(); 
            $('#divContenedorConglomerado').css("display", "");
            $('#divContenedorVivienda').css("display", "none");
        }
        if($('#nivel').val() === "2") { 
            buscarCoberturasVivienda();
            $('#divContenedorConglomerado').css("display", "none");
            $('#divContenedorVivienda').css("display", "");

        }
 });
 $('#btnProcesar').on('click', function() {
    ObetenerTodoLosMarcados();
 });


    $('#mesIni').change(function(evento) {
        cargarMesesFin();
    });

    /*$('#nivel').change(function(evento) {
        cargarEstado();
    })*/

    $('#btnLimpiar').on('click', function(){
        $('#anio').val(2016);
        $('#departamento').val("00");
        $('#mesIni').val(0);
        $('#mesFin').empty();
        $('#mesFin').append('<option value="0" selected="selected">Todos</option>');
        $('#mesFin').val(0);
        $('#nivel').val(1);
        $("#estado").val(0);
        $("#estado").prop('disabled', 'disabled');
        $('#conglomerado').val("");
    });
});
function ObetenerTodoLosMarcados(){
    var conglomerados=''; 
    if($("#nivel").val()==1){
        var rows = document.getElementsByName('completados_value[]');
        var selectedRows = [];
        for (var i = 0, l = rows.length; i < l; i++) {
            if (rows[i].checked) {
                conglomerados+=rows[i].value;
                if(i<l)
                   conglomerados+=','; 
            }
        }
    }
    else{
        var rows = document.getElementsByName('incompletos_value[]');
        var selectedRows = [];
        for (var i = 0, l = rows.length; i < l; i++) {
            if (rows[i].checked) {
                conglomerados+=rows[i].value;
                if(i<l)
                   conglomerados+=','; 
            }
        }
    }
    conglomerados=conglomerados.substring(0,conglomerados.length-1);
    var r = confirm("¿Esta Seguro de Realizar el Pase a Consistencia?");
        if (r == true) {
                $.ajax({
                type : 'post',
                url: "../PaseConsistencia/EjecutarPase",
                data: { nivel:$("#nivel").val(), informacion:conglomerados},
                success : function(result) {
                 alert("SE PROCESÓ CON ÉXITO");
                },
                error : function(xhr, ajaxOptions, thrownError) {
                  alert(xhr.status + ' ' + thrownError);
                }
        });
     }
}
function buscarCoberturasConglomerado(){
    jsShowWindowLoad();
    myTable = $('#tblCoberturaConglomerado').DataTable({
        initComplete: function () {
            jsRemoveWindowLoad();
        },
        scrollY: 450,
        scrollX: true,
        ajax: {
            url: "../PaseConsistencia/obtenerconglomerado",
            dataSrc: "",
            type:"POST",
            data: { 
                anio            : $("#anio").val(), 
                mesIni          : $("#mesIni").val(), 
                mesFin          : $("#mesFin").val(), 
                equipo          : $("#equipo").val(), 
                nivel           : $("#nivel").val(), 
                estado          : $("#estado").val(), 
                conglomerado    : $("#conglomerado").val(),
                dni             : $("#clave") .val()
            },
        },
        columns:[ 
            { data:"ORDEN",                 class:"textFont text-left"/*,      width: "20" */    },
            { data:"DEPARTAMENTO",          class:"textFont text-left"/*,      width: "100"*/    },
            { data:"EQUIPO",                class:"textFont text-left"/*,      width: "100"*/    },
            { data:"DNI",                   class:"textFont text-left"/*,      width: "80" */    },
            { data:"SUPERVISORA",           class:"textFont text-left"/*,      width: "200"*/    },
            { data:"MES",                   class:"textFont text-left"/*,      width: "100"*/    },
            { data:"AREA",                  class:"textFont text-left"/*,      width: "60" */    },
            { data:"CONGLOMERADO",          class:"textFont text-left"/*,      width: "40" */    },
            { data:"ESTADO_TRANS",          class:"textFont text-left"/*,      width: "40" */    },
            { data:"R_VIVIENDA",            class:"textFont text-left"/*,      width: "40" */    },
            { data:"FECHA_TRAN",            class:"textFont text-left"/*,      width: "40" */    },
            { data:"HORA_TRANS",            class:"textFont text-left"/*,      width: "40" */    },
            { data:"ESTADO_PASE",           class:"textFont text-left"/*,      width: "40" */    },
            { data:"FECHA_PASE",            class:"textFont text-left"/*,      width: "40" */    },
            { data:"HORA_PASE",             class:"textFont text-left"/*,      width: "40" */    },
            {targets: 15,
            data: "ID",
            orderable:true,
            render: function (data, type, full, meta){ 
                   return '<input type="checkbox" name="completados_value[]" value="'+data+'">';
                },
            }
        ],
        bDestroy: true
    });
}

function buscarCoberturasVivienda(){
    jsShowWindowLoad();
    myTable = $('#tblCoberturaVivienda').DataTable({
        initComplete: function () {
            jsRemoveWindowLoad();
        },
        scrollY: 450,
        scrollX: true,
        ajax: {
            url: "../PaseConsistencia/obtenerconglomerado",
            dataSrc: "",
            type:"POST",
            data: { 
                anio            : $("#anio").val(), 
                mesIni          : $("#mesIni").val(), 
                mesFin          : $("#mesFin").val(), 
                equipo          : $("#equipo").val(), 
                nivel           : $("#nivel").val(), 
                estado          : $("#estado").val(), 
                conglomerado    : $("#conglomerado").val(),
                dni             : $("#clave") .val(),
            },
        },
         columns:[ 
            { data:"ORDEN",                 class:"textFont text-left"/*,      width: "20" */    },
            { data:"DEPARTAMENTO",          class:"textFont text-left"/*,      width: "100"*/    },
            { data:"EQUIPO",                class:"textFont text-left"/*,      width: "100"*/    },
            { data:"DNI",                   class:"textFont text-left"/*,      width: "80" */    },
            { data:"SUPERVISORA",           class:"textFont text-left"/*,      width: "200"*/    },
            { data:"MES",                   class:"textFont text-left"/*,      width: "100"*/    },
            { data:"AREA",                  class:"textFont text-left"/*,      width: "60" */    },
            { data:"CONGLOMERADO",          class:"textFont text-left"/*,      width: "40" */    },
            { data:"VIVIENDA",              class:"textFont text-left"/*,      width: "40" */    },
            { data:"ESTADO_TRANS",          class:"textFont text-left"/*,      width: "40" */    },
            { data:"R_VIVIENDA",            class:"textFont text-left"/*,      width: "40" */    },
            { data:"FECHA_TRAN",            class:"textFont text-left"/*,      width: "40" */    },
            { data:"HORA_TRANS",            class:"textFont text-left"/*,      width: "40" */    },
            { data:"ESTADO_PASE",           class:"textFont text-left"/*,      width: "40" */    },
            { data:"FECHA_PASE",            class:"textFont text-left"/*,      width: "40" */    },
            { data:"HORA_PASE",             class:"textFont text-left"/*,      width: "40" */    },
            {targets: 16,
            data: "ID",
            orderable:true,
            render: function (data, type, full, meta){ 
                   return '<input type="checkbox" name="incompletos_value[]" value="'+data+'">';
                },
            }
        ],
        bDestroy: true
    });
}

function cargarMesesFin() {
    var mes = $('#mesIni').val();
    $.ajax({
        type : 'GET',
        dataType : 'JSON',
        url : '../ControlTransferencia/obtenerMeses',
        success : function(result) {
            $('#mesFin').empty();
            $('#mesFin').append('<option value="0" selected="selected">Todos</option>');
            $.each(result, function(j, item) {
                if (item.MES >= mes && mes != 0)
                    $('#mesFin').append($('<option>').text(item.DESCRIPCION).attr('value', item.MES));
            });
        },
        error : function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + ' ' + thrownError);
        }
    });
}

function cargarEstado(){
    var nivel = $('#nivel').val();

    if(nivel !== "3") {
        if(nivel === "1") {
            $('#estado').empty();
            $('#estado').append('<option value="0" selected="selected">Todos</option>');
            $('#estado').append('<option value="1" >Transferidos</option>');
            $('#estado').append('<option value="2" >No Transferidos</option>');
        }
        if(nivel === "2") {
            $('#estado').empty();
            $('#estado').append('<option value="0" selected="selected">Todos</option>');
            $('#estado').append('<option value="1" >Con GPS</option>');
            $('#estado').append('<option value="2" ">Sin GPS</option>');
        }
    }
    else {
        $('#estado').empty();
        $('#estado').append('<option value="0" selected="selected">Todos</option>');
        $("#estado").prop('disabled', 'disabled');
    }
}
</script>
<!--End Region Scripts-->