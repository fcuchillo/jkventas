<!--Region Body-->
<div class="content-wrapper">
    <!--Region Section Header-->
    <section class="content-header">
        <h1>Control de Transferencia</h1>
        <ol class="breadcrumb">
            <li><a href="<?=base_url()?>login/authentication"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Control de Transferencia</a></li>s
            <li class="active">Control de Transferencia</li>
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
                        <div class="col-md-2">
                            <label class="PyENDES-Label">Mes Inicial</label>
                            <?php
                            echo '<select class="form-control input-sm" id="mesIni" name="mesIni"><option value="0">Todos</option>';
                            foreach ($meses as $value) {?>
                               <?php echo '<option value="'.$value->MES.'" >'.$value->DESCRIPCION.'</option>';
                            }
                            echo '</select>';
                            ?>
                        </div>
                        <div class="col-md-2">
                            <label class="PyENDES-Label">Mes Final</label>
                            <select class="form-control input-sm" id="mesFin" name="mesFin">
                                <option value="0">Todos</option>
                            </select>
                        </div>
                        <div class="col-md-2"> 
                            <label class="PyENDES-Label">Estado</label>
                            <select class="form-control input-sm" id="estado" name="estado">
                                <option value="0">Todos</option>
                                <option value="1">Transferido</option>
                                <option value="2">No Transferido</option>
                            </select>
                        </div>
                        <div class="col-md-1"> 
                            <label class="PyENDES-Label">Conglomerado</label>
                            <input type="text" class="form-control input-sm" id="conglomerado" name="conglomerado" placeholder="" min="0">
                        </div>                        
                        <div class="col-md-2">
                            <div style="display: inline-block; width: 49% ">
                                <label style="visibility: collapse">Buscar</label>
                                <button type="button" class="btn btn-block btn-primary btn-sm" id="btnBuscar">Buscar</button>
                            </div>
                            <div style="display: inline-block; width: 49%">
                                <label style="visibility: collapse">Buscar</label>  
                                <button type="submit" class="btn btn-block btn-primary btn-sm" id="btnLimpiar">Limpiar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Region Box Filter-->

        <!--Region Box Result-->
        <div class="box" >
            
            <div class="box-header with-border">
                <h3 class="box-title">Resultado</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>

            <div class="box-body" id="divContenedorNivel1" >
                <div class="row">
                    <div class="col-sm-12">
                        <center><label style="visibility: collapse">Espacio : </label></center>
                        <!--Region Report-->
                            
                                <table id="tblControlTransferenciaNivel1" class="table table-sm table-condensed table-bordered" name="NombreReporte002">
                                    <thead id="headControlTransferenciaNivel1">
                                        <tr class="info">
                                            <th><center>ORD.</center></th>
                                            <th><center>DEPARTAMENTO</center></th>
                                            <th><center>EQUIPO</center></th>
                                            <th><center>MES</center></th>
                                            <th><center>AREA</center></th>
                                            <th><center>CONGLO.</center></th>
                                            <th><center>DNI</center></th>
                                            <th><center>SUPERVISORA</center></th>
                                            <th><center>ESTADO</center></th>
                                            <th><center>MODO ENVIO</center></th>
                                            <th><center>FECHA</center></th>
                                            <th><center>HORA</center></th>
                                            <th><center>TOT. ENV.</center></th>
                                            <th><center>ARCHIVO</center></th>
                                            <th><center>HISTORIAL</center></th>
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

    <!-- Region PopUp History -->
    <div class="modal" id="modalHistorial">
        <div class="modal-dialog modal-lg">
            <div class="modal-content"   style="width: 100%;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                    <h4 class="modal-title" id="tituloHistorial"></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                         <div class="col-sm-12">
                            <center><label style="visibility: collapse">Espacio : </label></center>
                            <!--Region Report-->
                                
                                    <table id="tblControlTransferenciaHistorial" class="table table-sm table-condensed table-bordered" name="Historial">
                                        <thead id="headControlTransferenciaHistorial">
                                            <tr class="info">
                                                <th><center>ORD.</center></th>
                                                <th><center>DEPARTAMENTO</center></th>
                                                <th><center>EQUIPO</center></th>
                                                <th><center>MES</center></th>
                                                <th><center>AREA</center></th>
                                                <th><center>CONGLO.</center></th>
                                                <th><center>DNI</center></th>
                                                <th><center>SUPERVISORA</center></th>
                                                <th><center>ESTADO</center></th>
                                                <th><center>ID ENVIO</center></th>
                                                <th><center>MODO ENVIO</center></th>
                                                <th><center>FECHA</center></th>
                                                <th><center>HORA</center></th>
                                                <th><center>TOT. ENV.</center></th>
                                                <th><center>ARCHIVO</center></th>
                                            </tr>            
                                        </thead>
                                    </table>
                                
                            <!--End Region Report-->
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Region PopUp History -->
</div>

<!--Region Scripts-->
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!--<script src="<?php echo base_url(); ?>assets/content/js/registro/controlTransferencia.js"></script>-->
<script>
    
var myTableNivel1;
var myTableNivel2;

$(document).ready(function () {

    $('#btnBuscar').on('click', function() {
        buscarControlTransferidosPorNivel1(); 
    });

    $('#btnLimpiar').on('click', function(){
        $('#anio').val(2017);
        $('#mesIni').val(0);
        $('#mesFin').empty();
        $('#mesFin').append('<option value="0" selected="selected">Todos</option>');
        $('#mesFin').val(0);
        $('#nivel').val(1);
        $('#estado').val(0);
        $('#conglomerado').val("");
    });
    
    $('#mesIni').change(function(evento) {
        cargarMesesFin();
    });


    $('#botonTraerImagen').on('click', function(){
        cargarMesesFin();
    });
});

function buscarControlTransferidosPorNivel1(){
    jsShowWindowLoad();
    myTableNivel1 = $('#tblControlTransferenciaNivel1').DataTable({
        initComplete: function () {
            jsRemoveWindowLoad();
        },
        scrollY: 450,
        scrollX: true,
        ajax: {
            url: "../ControlTransferencia/obtenerReporte002",
            dataSrc: "",
            type:"POST",
            data: { 
                anio            : $("#anio").val(), 
                equipo          : $("#equipo").val(), 
                mesIni          : $("#mesIni").val(), 
                mesFin          : $("#mesFin").val(), 
                nivel           : 1, 
                estado          : $("#estado").val(), 
                conglomerado    : $("#conglomerado").val(),
                DNI             : $("#clave") .val()
            },
        },
        columns:[ 
            { data:"ORDEN",                 class:"textFont text-center"    },
            { data:"DEPARTAMENTO",          class:"textFont text-left"      },
            { data:"EQUIPO",                class:"textFont text-center"    },
            { data:"MES",                   class:"textFont text-left"      },
            { data:"AREA",                  class:"textFont text-left"      },
            { data:"CONGLOMERADO",          class:"textFont text-center"    },
            { data:"DNI",                   class:"textFont text-left"      },
            { data:"SUPERVISORA",           class:"textFont text-left"      },
            { data:"ESTADO",                class:"textFont text-left"      },
            { data:"MODO_ENVIO",            class:"textFont text-left"      },
            { data:"FECHA",                 class:"textFont text-left"      },
            { data:"HORA",                  class:"textFont text-left"      },
            { data:"TOTAL_ENVIOS",          class:"textFont text-center"    },
            { data:"ARCHIVO",               class:"textFont text-left"      },
            { 
                data: null, 
                class:"textFont text-center" ,
                orderable:true,
                render: function(){
                    return '<span class="glyphicon glyphicon-eye-open" onclick="abrirHistorial(this);"></span>';
                }
            }
        ],
        columnDefs: [{
            targets:13,
            orderable:true,
            render: function (data, type, full, meta){ 
                return '<label class="PyENDES-Label" style="color:#3c8dbc; cursor: pointer" onclick="descargarArchivoNivel1(this);" ">'+ $('<div/>').text(data).html().trim() +'</label>';
            },
        }], 
        bDestroy: true
    });
}

function buscarControlTransferidosPorNivel2(conglomerado){
    console.log(conglomerado);
    jsShowWindowLoad();
    myTableNivel2 = $('#tblControlTransferenciaHistorial').DataTable({
        initComplete: function () {
            jsRemoveWindowLoad();
        },
        scrollY: 450,
        scrollX: true,
        ajax: {
            url: "../ControlTransferencia/obtenerReporte002",
            dataSrc: "",
            type:"POST",
            data: { 
                anio            : $("#anio").val(), 
                equipo          : $("#equipo").val(), 
                mesIni          : $("#mesIni").val(), 
                mesFin          : $("#mesFin").val(), 
                nivel           : 2, 
                estado          : $("#estado").val(), 
                conglomerado    : conglomerado,
                DNI             : $("#clave") .val()
            },
        },
        columns:[ 
            { data:"ORDEN",                 class:"textFont text-center",       width:"10"      },
            { data:"DEPARTAMENTO",          class:"textFont text-left",         width:"60"      },
            { data:"EQUIPO",                class:"textFont text-center",       width:"60"      },
            { data:"MES",                   class:"textFont text-left",         width:"60"      },
            { data:"AREA",                  class:"textFont text-left",         width:"60"      },
            { data:"CONGLOMERADO",          class:"textFont text-center",       width:"60"      },
            { data:"DNI",                   class:"textFont text-left",         width:"60"      },
            { data:"SUPERVISORA",           class:"textFont text-left",         width:"200"     },
            { data:"ESTADO",                class:"textFont text-left",         width:"60"      },
            { data:"ID_ENVIO",              class:"textFont text-center",       width:"10"      },
            { data:"MODO_ENVIO",            class:"textFont text-left",         width:"60"      },
            { data:"FECHA",                 class:"textFont text-left",         width:"60"      },
            { data:"HORA",                  class:"textFont text-left",         width:"60"      },
            { data:"TOTAL_ENVIOS",          class:"textFont text-center",       width:"20"      },
            { data:"ARCHIVO",               class:"textFont text-left",         width:"60"      }
        ],
        columnDefs: [{
            targets:14,
            orderable:true,
            render: function (data, type, full, meta){ 
                return '<label class="PyENDES-Label" style="color:#3c8dbc; cursor: pointer" onclick="descargarArchivoNivel2(this);" ">'+ $('<div/>').text(data).html().trim() +'</label>';
            },
        }], 
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

function abrirHistorial(s, e) {
    var rowData = myTableNivel1.row($(s).parents('tr')).data();
    $('#tituloHistorial').text('Historial Transferencia Conglomerado N°:  ' + rowData.CONGLOMERADO);
    $('#modalHistorial').modal({ show: 'true' });
    buscarControlTransferidosPorNivel2(rowData.CONGLOMERADO);
}

function descargarArchivoNivel1(s, e) {
    var rowData = myTableNivel1.row($(s).parents('tr')).data();
    var url = "../ControlTransferencia/descargarArchivoServer/" + rowData.ARCHIVO;
    window.location.href = url;
}

function descargarArchivoNivel2(s, e) {
    var rowData = myTableNivel2.row($(s).parents('tr')).data();
    var url = "../ControlTransferencia/descargarArchivoBD/" + rowData.ID_ENVIO;
    window.location.href = url;
}
</script>
<!--End Region Scripts-->