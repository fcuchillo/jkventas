<!--Region Body-->
<div class="content-wrapper">
    <!--Region Section Header-->
    <section class="content-header">
        <h1>Control de Transferencia</h1>
        <ol class="breadcrumb">
            <li><a href="<?=base_url()?>login/authentication"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Control de Transferencia</a></li>
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
                        <div class="col-md-1">
                            <label class="PyENDES-Label">Mes Inicial</label>
                            <?php
                            echo '<select class="form-control input-sm" id="mesIni" name="mesIni"><option value="0">Todos</option>';
                            foreach ($meses as $value) {?>
                               <?php echo '<option value="'.$value->MES.'" >'.$value->DESCRIPCION.'</option>';
                            }
                            echo '</select>';
                            ?>
                        </div>
                        <div class="col-md-1">
                            <label class="PyENDES-Label">Mes Final</label>
                            <select class="form-control input-sm" id="mesFin" name="mesFin">
                                <option value="0">Todos</option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <label class="PyENDES-Label">Periodo Inicial</label>
                            <select class="form-control input-sm" id="perIni" name="perIni">
                                <option value="0">Todos</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <label class="PyENDES-Label">Periodo Final</label>
                            <select class="form-control input-sm" id="perFin" name="perFin">
                                <option value="0">Todos</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>

                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="PyENDES-Label">Nivel</label>
                            <select class="form-control input-sm" id="nivel" name="nivel">
                                <option value="1">Conglomerado</option>
                                <option value="2">CCPP</option>
                                <option value="3">Manzana</option>
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

            <!-- Region div Content Report: Conglomerado-->
            <div class="box-body" id="divContenedorConglomerado" style="display: none" >
                <div class="row">
                    <div class="col-sm-12">
                        <center><label style="visibility: collapse">Espacio : </label></center>
                        <!--Region Table-->
                            
                                <table id="tblControlTransferenciaConglomerado" class="table table-sm table-condensed table-bordered" name="NombreReporte002">
                                    <thead id="headControlTransferenciaConglomerado">
                                        <tr class="info">
                                            <th><center>ID</center></th>
                                            <th><center>MES</center></th>
                                            <th><center>PERIODO</center></th>
                                            <th><center>AREA</center></th>
                                            <th><center>CONGLO.</center></th>
                                            <th><center>DNI</center></th>
                                            <th><center>REGISTRADOR</center></th>
                                            <th><center>DEPARTAMENTO</center></th>
                                            <th><center>PROVINCIA</center></th>
                                            <th><center>DISTRITO</center></th>
                                            <th><center>FCH. INICIO</center></th>
                                            <th><center>FCH. TERMINO</center></th>
                                            <th><center>ESTADO</center></th>
                                            <th><center>MODO ENVIO</center></th>
                                            <th><center>FECHA</center></th>
                                            <th><center>HORA</center></th>
                                            <th><center>TOT. TRANSF.</center></th>
                                            <th><center>ARCHIVO</center></th>
                                        </tr>            
                                    </thead>
                                </table>
                            
                        <!--End Region Table-->
                    </div>
                </div>
            </div>
            <!-- End Region div Content Report: Conglomerado-->

            <!-- Region div Content Report: CCPP-->
            <div class="box-body" id="divContenedorCCPP" style="display: none" >
                <div class="row">
                    <div class="col-sm-12">
                        <center><label style="visibility: collapse">Espacio : </label></center>
                        <!--Region Table-->

                                <table id="tblControlTransferenciaCCPP" class="table table-sm table-condensed table-bordered" name="NombreReporte002">
                                    <thead id="headControlTransferenciaCCPP">
                                        <tr class="info">
                                            <th><center>ID</center></th>
                                            <th><center>MES</center></th>
                                            <th><center>PERIODO</center></th>
                                            <th><center>AREA</center></th>
                                            <th><center>CONGLO.</center></th>
                                            <th><center>DNI</center></th>
                                            <th><center>REGISTRADOR</center></th>
                                            <th><center>DEPARTAMENTO</center></th>
                                            <th><center>PROVINCIA</center></th>
                                            <th><center>DISTRITO</center></th>
                                            <th><center>CCPP</center></th>
                                            <th><center>CENTRO POBLADO</center></th>
                                            <th><center>ESTADO</center></th>
                                            <th><center>ARCHIVO</center></th>
                                        </tr>            
                                    </thead>
                                </table>
                            
                        <!--End Region Table-->
                    </div>
                </div>
            </div>
            <!-- End Region div Content Report: CCPP-->

            <!-- Region div Content Report: Manzana-->
            <div class="box-body" id="divContenedorManzana" style="display: none" >
                <div class="row">
                    <div class="col-sm-12">
                        <center><label style="visibility: collapse">Espacio : </label></center>
                        <!--Region Table-->
                            
                                <table id="tblControlTransferenciaManzana" class="table table-sm table-condensed table-bordered" name="NombreReporte002">
                                    <thead id="headControlTransferenciaManzana">
                                        <tr class="info">
                                            <th><center>ID</center></th>
                                            <th><center>MES</center></th>
                                            <th><center>PERIODO</center></th>
                                            <th><center>AREA</center></th>
                                            <th><center>CONGLO.</center></th>
                                            <th><center>DNI</center></th>
                                            <th><center>REGISTRADOR</center></th>
                                            <th><center>DEPARTAMENTO</center></th>
                                            <th><center>PROVINCIA</center></th>
                                            <th><center>DISTRITO</center></th>
                                            <th><center>CCPP</center></th>
                                            <th><center>CENTRO POBLADO</center></th>
                                            <th><center>MANZANA</center></th>
                                            <th><center>ESTADO</center></th>
                                            <th><center>ARCHIVO</center></th>
                                        </tr>            
                                    </thead>
                                </table>
                            
                        <!--End Region Table-->
                    </div>
                </div>
            </div>
            <!-- End Region div Content Report: Manzana-->

        </div>
        <!--End Region Box Result-->

    </section>    
    <!--End Region Section Box-->

    <!--Region Modal File-->
    <div id="modalContentImagenArchivo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <img id="imgArchivo" class="img-responsive">
                </div>
            </div>
        </div>
    </div>
    <!--End Region Modal File-->
</div>
<!-- End Region Body-->

<!--Region Scripts-->
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script>
    
var myTable;

var diaServer = new Date().getDate();
var mesServer = new Date().getMonth() + 1;
var anioServer = new Date().getFullYear();

var diaBaseDatos;
var mesBaseDatos;
var anioBaseDatos;

$(document).ready(function () {

    if(diaServer < 10) { diaServer = '0' + diaServer } 
    if(mesServer < 10) { mesServer = '0' + mesServer } 

    $('#divContenedorConglomerado').css("display", "");
    $('#divContenedorCCPP').css("display", "none");
    $('#divContenedorManzana').css("display", "none");

	$('#btnBuscar').on('click', function() {

        if($('#nivel').val() === "1") { 
            buscarControlTransferidosPorConglomerado(); 
            $('#divContenedorConglomerado').css("display", "");
            $('#divContenedorCCPP').css("display", "none");
            $('#divContenedorManzana').css("display", "none");
        }
        if($('#nivel').val() === "2") { 
            buscarControlTransferidosPorCCPP();
            $('#divContenedorConglomerado').css("display", "none");
            $('#divContenedorCCPP').css("display", "");
            $('#divContenedorManzana').css("display", "none");
        }
        if($('#nivel').val() === "3") { 
            buscarControlTransferidosPorManzana(); 
            $('#divContenedorConglomerado').css("display", "none");
            $('#divContenedorCCPP').css("display", "none");
            $('#divContenedorManzana').css("display", "");
        }
    });

    $('#btnLimpiar').on('click', function(){
        $('#anio').val(2017);
        $('#mesIni').val(0);
        $('#mesFin').empty();
        $('#mesFin').append('<option value="0" selected="selected">Todos</option>');
        $('#mesFin').val(0);
        $('#perIni').val(0);
        $('#perFin').val(0);
        $('#nivel').val(1);
        $('#estado').val(0);
        $('#conglomerado').val("");
    });
    
    $('#mesIni').change(function(evento) {
        cargarMesesFin();
    });

    $('.modal').on('show.bs.modal', centerModal);
    
    $(window).on("resize", function () {
        $('.modal:visible').each(centerModal);
    });
    $('#botonTraerImagen').on('click', function(){
        cargarMesesFin();
    });
});

function buscarControlTransferidosPorConglomerado(){
    jsShowWindowLoad();
    myTable = $('#tblControlTransferenciaConglomerado').DataTable({
        initComplete: function () {
            jsRemoveWindowLoad();
        },
        fnRowCallback: function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
            var fechaBx = convertirStringEnDate(aData.MANZANA,"dd/MM/yyyy","/");
            var fechaSv = convertirStringEnDate(diaServer.toString() + "/" + mesServer.toString() + "/" + anioServer.toString(),"dd/MM/yyyy","/");

            var dias = Math.round((fechaBx.getTime() - fechaSv.getTime())/(1000 * 60 * 60 * 24));

            if(dias >= 0 && dias <= 2) { $('td', nRow).css('background-color', 'rgba(251, 255, 0, 0.35)'); }
            if(dias >= 3) { $('td', nRow).css('background-color', 'rgba(255,   0, 0, 0.70)'); }
        },
        responsive: true,
        scrollY: 450,
        scrollX: true,
        serverSide: true,
        ajax: {
            url: "../ControlTransferencia/obtenerReporte002",
            dataSrc: "data",
            type:"POST",
            data: { 
                anio            : $("#anio").val(), 
                mesIni          : $("#mesIni").val(), 
                mesFin          : $("#mesFin").val(), 
                perIni          : $("#perIni").val(), 
                perFin          : $("#perFin").val(), 
                nivel           : $("#nivel").val(), 
                estado          : $("#estado").val(), 
                conglomerado    : $("#conglomerado").val(),
                DNI             : $("#clave") .val()
            },
        },
        columns:[ 
            { data:"ID",                class:"textFont text-center"    },
            { data:"MES",               class:"textFont text-left"      },
            { data:"PERIODO",           class:"textFont text-center"    },
            { data:"AREA",              class:"textFont text-center"    },
            { data:"CONGLOMERADO",      class:"textFont text-left"      },
            { data:"DNI",               class:"textFont text-left"      },
            { data:"REGISTRADOR",       class:"textFont text-left"      },
            { data:"DEPARTAMENTO",      class:"textFont text-left"      },
            { data:"PROVINCIA",         class:"textFont text-left"      },
            { data:"DISTRITO",          class:"textFont text-left"      },
            { data:"CENTRO_POBLADO",    class:"textFont text-left"      },
            { data:"MANZANA",           class:"textFont text-left"      },
            { data:"ESTADO",            class:"textFont text-center"    },
            { data:"MODO_ENVIO",        class:"textFont text-center"    },
            { data:"FECHA",             class:"textFont text-center"    },
            { data:"HORA",              class:"textFont text-center"    },
            { data:"TOTAL_TRANSFER",    class:"textFont text-center"    },
            { data:"NOM_ARCHIVO",       class:"textFont text-left"      }
        ],
        columnDefs: [{
            targets:17,
            orderable:true,
            render: function (data, type, full, meta){ 
                return '<label class="PyENDES-Label" style="color:#3c8dbc; cursor: pointer" onclick="abrirImagen(this);" ">'+ $('<div/>').text(data).html().trim() +'</label>';
            }
        }],
        bDestroy: true
	});
}

function buscarControlTransferidosPorCCPP(){
    jsShowWindowLoad();
    myTable = $('#tblControlTransferenciaCCPP').DataTable({
        initComplete: function () {
            jsRemoveWindowLoad();
        },
        responsive: true,
        scrollY: 450,
        scrollX: true,
        serverSide: true,
        ajax: {
            url: "../ControlTransferencia/obtenerReporte002",
            dataSrc: "data",
            type:"POST",
            data: { 
                anio            : $("#anio").val(), 
                mesIni          : $("#mesIni").val(), 
                mesFin          : $("#mesFin").val(), 
                perIni          : $("#perIni").val(), 
                perFin          : $("#perFin").val(), 
                nivel           : $("#nivel").val(), 
                estado          : $("#estado").val(), 
                conglomerado    : $("#conglomerado").val(),
                DNI             : $("#clave") .val()
            },
        },
        columns:[ 
            { data:"ID",                class:"textFont text-center"    },
            { data:"MES",               class:"textFont text-left"      },
            { data:"PERIODO",           class:"textFont text-center"    },
            { data:"AREA",              class:"textFont text-center"    },
            { data:"CONGLOMERADO",      class:"textFont text-left"      },
            { data:"DNI",               class:"textFont text-left"      },
            { data:"REGISTRADOR",       class:"textFont text-left"      },
            { data:"DEPARTAMENTO",      class:"textFont text-left"      },
            { data:"PROVINCIA",         class:"textFont text-left"      },
            { data:"DISTRITO",          class:"textFont text-left"      },
            { data:"COD_CP",            class:"textFont text-left"      },
            { data:"CENTRO_POBLADO",    class:"textFont text-left"      },
            { data:"ESTADO",            class:"textFont text-center"    },
            { data:"NOM_ARCHIVO",       class:"textFont text-left"      }
        ],
        columnDefs: [{
            targets:13,
            orderable:true,
            render: function (data, type, full, meta){ 
                return '<label class="PyENDES-Label" style="color:#3c8dbc; cursor: pointer" onclick="abrirImagen(this);" ">'+ $('<div/>').text(data).html().trim() +'</label>';
            }
        }],
        bDestroy: true
    });
}

function buscarControlTransferidosPorManzana(){
    jsShowWindowLoad();
    myTable = $('#tblControlTransferenciaManzana').DataTable({
        initComplete: function () {
            jsRemoveWindowLoad();
        },
        responsive: true,
        scrollY: 450,
        scrollX: true,
        serverSide: true,
        ajax: {
            url: "../ControlTransferencia/obtenerReporte002",
            dataSrc: "data",
            type:"POST",
            data: { 
                anio            : $("#anio").val(), 
                mesIni          : $("#mesIni").val(), 
                mesFin          : $("#mesFin").val(), 
                perIni          : $("#perIni").val(), 
                perFin          : $("#perFin").val(), 
                nivel           : $("#nivel").val(), 
                estado          : $("#estado").val(), 
                conglomerado    : $("#conglomerado").val(),
                DNI             : $("#clave") .val()
            },
        },
        columns:[ 
            { data:"ID",                class:"textFont text-center"    },
            { data:"MES",               class:"textFont text-left"      },
            { data:"PERIODO",           class:"textFont text-center"    },
            { data:"AREA",              class:"textFont text-center"    },
            { data:"CONGLOMERADO",      class:"textFont text-left"      },
            { data:"DNI",               class:"textFont text-left"      },
            { data:"REGISTRADOR",       class:"textFont text-left"      },
            { data:"DEPARTAMENTO",      class:"textFont text-left"      },
            { data:"PROVINCIA",         class:"textFont text-left"      },
            { data:"DISTRITO",          class:"textFont text-left"      },
            { data:"COD_CP",            class:"textFont text-left"      },
            { data:"CENTRO_POBLADO",    class:"textFont text-left"      },
            { data:"MANZANA",           class:"textFont text-left"      },
            { data:"ESTADO",            class:"textFont text-center"    },
            { data:"NOM_ARCHIVO",       class:"textFont text-left"      }
        ],
        columnDefs: [{
            targets:14,
            orderable:true,
            render: function (data, type, full, meta){ 
                return '<label class="PyENDES-Label" style="color:#3c8dbc; cursor: pointer" onclick="abrirImagen(this);" ">'+ $('<div/>').text(data).html().trim() +'</label>';
            }
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

function centerModal() {
    $(this).css('display', 'block');
    var $dialog = $(this).find(".modal-dialog");
    var offset = ($(window).height() - $dialog.height()) / 2;
    $dialog.css("margin-top", offset);
}

function abrirImagen(s, e){
    var rowData = myTable.row($(s).parents('tr')).data();
    var src = "../ControlTransferencia/descargarArchivo/" + rowData.NOM_ARCHIVO;
    $("#imgArchivo").attr("src", src);
    $('#modalContentImagenArchivo').modal({ show: 'true' });
}

function convertirStringEnDate(fecha, formato, delimitador) {
    var formatItems     = formato.toLowerCase().split(delimitador);
    var dateItems       = fecha.split(delimitador);
    var monthIndex      = formatItems.indexOf("mm");
    var dayIndex        = formatItems.indexOf("dd");
    var yearIndex       = formatItems.indexOf("yyyy");
    var month           = parseInt(dateItems[monthIndex]);
    month-= 1;
    var fechaFormateada = new Date(dateItems[yearIndex],month,dateItems[dayIndex]);
    return fechaFormateada;
}

</script>
<!--End Region Scripts-->