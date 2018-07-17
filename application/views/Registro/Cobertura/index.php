<!--Region Body-->
<div class="content-wrapper">
    <!--Region Section Header-->
    <section class="content-header">
        <h1>Cobertura</h1>
        <ol class="breadcrumb">
            <li><a href="<?=base_url()?>login/authentication"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Cobertura</a></li>
            <li class="active">Cobertura</li>
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
                            <label class="PyENDES-Label">Departamento</label>
                            <?php
                            echo '<select class="form-control input-sm" id="departamento" name="departamento"><option value="00">Todos</option>';
                            foreach ($dptos as $value) {?>
                                <?php echo '<option value="'.$value->ID.'" >'.$value->DESCRIPCION.'</option>';
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
                            <label class="PyENDES-Label">Mes Fin.</label>
                            <select class="form-control input-sm" id="mesFin" name="mesFin">
                                <option value="0">Todos</option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <label class="PyENDES-Label">Periodo Ini.</label>
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
                            <label class="PyENDES-Label">Periodo Fin.</label>
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
                                <option value="11">11</option>
                                <option value="12">12</option>

                            </select>
                        </div>
                        <div class="col-md-1">
                            <label class="PyENDES-Label">Nivel</label>
                            <select class="form-control input-sm" id="nivel" name="nivel">
                                <option value="1">Conglomerado</option>
                                <option value="2">Registrador</option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <label class="PyENDES-Label">Estado</label>
                            <select class="form-control input-sm" id="estado" name="estado">
                                <option value="0">Todos</option>
                                <option value="1">Ejecutado</option>
                                <option value="2">Por Ejecutar</option>
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
            
            <div class="box-body" id="divContenedorNivel1" style="display: none" >
                <div class="row">
                    <div class="col-sm-12">
                        <center><label style="visibility: collapse">Espacio : </label></center>
                        <!--Region Report-->
                            
                                <table id="tblCoberturaNivel1" class="table table-sm table-condensed table-bordered" name="NombreReporte003">
                                    <thead id="headCoberturaNivel1">
                                        <tr class="info">
                                            <th><center>ORD.</center></th>
                                            <th><center>PER.</center></th>
                                            <th><center>MES</center></th>
                                            <th><center>DNI</center></th>
                                            <th><center>REGISTRADOR</center></th>
                                            <th><center>DEPARTAMENTO</center></th>
                                            <th><center>PROVINCIA</center></th>
                                            <th><center>DISTRITO</center></th>
                                            <th><center>AREA</center></th>
                                            <th><center>CONGLO</center></th>
                                            <th><center>TOT. REG.</center></th>
                                            <th><center>VIV. PART.</center></th>
                                            <th><center>VIV. OCUP.</center></th>
                                            <th><center>VIV. DESO.</center></th>
                                            <th><center>VIV. TRANS.</center></th>
                                            <th><center>VIV. OTRO.</center></th>
                                            <th><center>VIV. PRE.</center></th>
                                            <th><center>VIV. AUS.</center></th>
                                            <th><center>VIV. CON INF.</center></th>
                                            <th><center>VIV. SIN INF.</center></th>
                                            <th><center>VIV. ALQ.</center></th>
                                            <th><center>VIV. CONS.</center></th>
                                            <th><center>VIV. ABAN.</center></th>
                                        </tr>            
                                    </thead>
                                </table>
                            
                        <!--End Region Report-->
                    </div>
                </div>
            </div>

            <div class="box-body" id="divContenedorNivel2" style="display: none" >
                <div class="row">
                    <div class="col-sm-12">
                        <center><label style="visibility: collapse">Espacio : </label></center>
                        <!--Region Report-->

                                <table id="tblCoberturaNivel2" class="table table-sm table-condensed table-bordered" name="NombreReporte003">
                                    <thead id="headCoberturaNivel2">
                                        <tr class="info">
                                            <th><center>ORD.</center></th>
                                            <th><center>DNI</center></th>
                                            <th><center>REGISTRADOR</center></th>
                                            <th><center>ODEI</center></th>
                                            <th><center>PROGRAMADO</center></th>
                                            <th><center>EJECUTADOS</center></th>
                                            <th><center>POR EJECUTAR</center></th>
                                            <th><center>TOT. REG.</center></th>
                                            <th><center>VIV. PART.</center></th>
                                            <th><center>VIV. OCUP.</center></th>
                                            <th><center>VIV. DESO.</center></th>
                                            <th><center>VIV. TRANS.</center></th>
                                            <th><center>VIV. OTRO.</center></th>
                                            <th><center>VIV. PRE.</center></th>
                                            <th><center>VIV. AUS.</center></th>
                                            <th><center>VIV. CON INF.</center></th>
                                            <th><center>VIV. SIN INF.</center></th>
                                            <th><center>VIV. ALQ.</center></th>
                                            <th><center>VIV. CONS.</center></th>
                                            <th><center>VIV. ABAN.</center></th>
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

    $('#divContenedorNivel1').css("display", "");
    $('#divContenedorNivel2').css("display", "none");
    $("#estado").prop('disabled', 'disabled');

    $('#btnBuscar').on('click', function() {
        if($('#nivel').val() === "1") { 
            buscarCoberturasNivel1(); 
            $('#divContenedorNivel1').css("display", "");
            $('#divContenedorNivel2').css("display", "none");
        }
        if($('#nivel').val() === "2") { 
            buscarCoberturasNivel2();
            $('#divContenedorNivel1').css("display", "none");
            $('#divContenedorNivel2').css("display", "");
        }
    });

    $('#mesIni').change(function(evento) {
        cargarMesesFin();
    });

    $('#nivel').change(function(evento) {
        if($('#nivel').val() === "2") {
            $("#estado").removeAttr("disabled");
        }
        else {
            $("#estado").val(0);
            $("#estado").prop('disabled', 'disabled');
        }
    })

    $('#btnLimpiar').on('click', function(){
        $('#anio').val(2017);
        $('#departamento').val("00");
        $('#mesIni').val(0);
        $('#mesFin').empty();
        $('#mesFin').append('<option value="0" selected="selected">Todos</option>');
        $('#mesFin').val(0);
        $('#perIni').val(0);
        $('#perFin').val(0);
        $('#nivel').val(1);
        $("#estado").val(0);
        $("#estado").prop('disabled', 'disabled');
        $('#conglomerado').val("");
    });
});

function buscarCoberturasNivel1(){
    jsShowWindowLoad();
    myTable = $('#tblCoberturaNivel1').DataTable({
        initComplete: function () {
            jsRemoveWindowLoad();
        },
        scrollY: 450,
        scrollX: true,
        ajax: {
            url: "../Cobertura/obtenerReporte003",
            dataSrc: "",
            type:"POST",
            data: { 
                anio            : $("#anio").val(), 
                dpto            : $("#departamento").val(), 
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
            { data:"ORDEN",                 class:"textFont text-left",      width: "20"     },
            { data:"PERIODO",               class:"textFont text-left",      width: "20"     },
            { data:"MES",                   class:"textFont text-left",      width: "35"     },
            { data:"DNI",                   class:"textFont text-left",      width: "80"     },
            { data:"REGISTRADOR",           class:"textFont text-left",      width: "200"    },
            { data:"DEPARTAMENTO",          class:"textFont text-left",      width: "150"    },
            { data:"PROVINCIA",             class:"textFont text-left",      width: "150"    },
            { data:"DISTRITO",              class:"textFont text-left",      width: "150"    },
            { data:"AREA",                  class:"textFont text-left",      width: "60"     },
            { data:"CONGLOME",              class:"textFont text-left",      width: "40"     },
            { data:"TOTAL_REGISTRO",        class:"textFont text-left",      width: "40"     },
            { data:"VIV_PARTICULAR",        class:"textFont text-left",      width: "40"     },
            { data:"VIV_OCUPADAS",          class:"textFont text-left",      width: "40"     },
            { data:"VIV_DESOCUPADAS",       class:"textFont text-left",      width: "40"     },
            { data:"VIV_TRANSITORIAS",      class:"textFont text-left",      width: "40"     },
            { data:"VIV_OTRO",              class:"textFont text-left",      width: "40"     },
            { data:"VIV_PRESENTES",         class:"textFont text-left",      width: "40"     },
            { data:"VIV_AUSENTES",          class:"textFont text-left",      width: "40"     },
            { data:"VIV_CONINFORMACION",    class:"textFont text-left",      width: "40"     },
            { data:"VIV_SININFORMACION",    class:"textFont text-left",      width: "40"     },
            { data:"VIV_ALQUILER",          class:"textFont text-left",      width: "40"     },
            { data:"VIV_CONSTRUCCION",      class:"textFont text-left",      width: "40"     },
            { data:"VIV_ABANDONADA",        class:"textFont text-left",      width: "40"     }
        ],
        bDestroy: true
    });
}

function buscarCoberturasNivel2(){
    jsShowWindowLoad();
    myTable = $('#tblCoberturaNivel2').DataTable({
        initComplete: function () {
            jsRemoveWindowLoad();
        },
        scrollY: 450,
        scrollX: true,
        ajax: {
            url: "../Cobertura/obtenerReporte003",
            dataSrc: "",
            type:"POST",
            data: { 
                anio            : $("#anio").val(), 
                dpto            : $("#departamento").val(), 
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
            { data:"ORDEN",                 class:"textFont text-left",      width: "20"     },
            { data:"DNI",                   class:"textFont text-left",      width: "35"     },
            { data:"REGISTRADOR",           class:"textFont text-left",      width: "200"    },
            { data:"DEPARTAMENTO",          class:"textFont text-left",      width: "150"    },
            { data:"DISTRITO",              class:"textFont text-left",      width: "45"    },
            { data:"AREA",                  class:"textFont text-left",      width: "45"     },
            { data:"CONGLOME",              class:"textFont text-left",      width: "30"     },
            { data:"TOTAL_REGISTRO",        class:"textFont text-left",      width: "40"     },
            { data:"VIV_PARTICULAR",        class:"textFont text-left",      width: "40"     },
            { data:"VIV_OCUPADAS",          class:"textFont text-left",      width: "40"     },
            { data:"VIV_DESOCUPADAS",       class:"textFont text-left",      width: "40"     },
            { data:"VIV_TRANSITORIAS",      class:"textFont text-left",      width: "40"     },
            { data:"VIV_OTRO",              class:"textFont text-left",      width: "40"     },
            { data:"VIV_PRESENTES",         class:"textFont text-left",      width: "40"     },
            { data:"VIV_AUSENTES",          class:"textFont text-left",      width: "40"     },
            { data:"VIV_CONINFORMACION",    class:"textFont text-left",      width: "40"     },
            { data:"VIV_SININFORMACION",    class:"textFont text-left",      width: "40"     },
            { data:"VIV_ALQUILER",          class:"textFont text-left",      width: "40"     },
            { data:"VIV_CONSTRUCCION",      class:"textFont text-left",      width: "40"     },
            { data:"VIV_ABANDONADA",        class:"textFont text-left",      width: "40"     }
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

</script>
<!--End Region Scripts-->