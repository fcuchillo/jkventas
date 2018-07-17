<!--Region Body-->
<div class="content-wrapper">
    <!--Region Section Header-->
    <section class="content-header">
        <h1>GeoReferenciación</h1>
        <ol class="breadcrumb">
            <li><a href="<?=base_url()?>login/authentication"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">GeoReferenciación</a></li>
            <li class="active">GeoReferenciación</li>
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
                                <option value="0">Todos</option>
                                <option value="1">Conglomerado</option>
                                <option value="2">CCPP</option>
                                <option value="3">Manzana</option>
                            </select>
                        </div>
                         <div class="col-md-1">
                            <label class="PyENDES-Label">Omision</label>
                            <select class="form-control input-sm" id="omision" name="omision">
                                <option value="0">Todos</option>
                                <option value="1">Si</option>
                                <option value="2">No</option>
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
        <div class="box">

            <div class="box-header with-border">
                <h3 class="box-title">Resultado</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            
            <div class="box-body" id="divContenedorTodos" style="display: none" >
                <div class="row">
                    <div class="col-sm-12">
                        <center><label style="visibility: collapse">Espacio : </label></center>
                        <!--Region Report-->

                                <table id="tblGeoReferenciacionTodos" class="table table-sm table-condensed table-bordered" name="NombreReporte004">
                                    <thead id="headGeoReferenciacionTodos">
                                        <tr class="info">
                                            <th><center>ID</center></th>
                                            <th><center>UBIGUEO</center></th>
                                            <th><center>DEPARTAMENTO</center></th>
                                            <th><center>PROVINCIA</center></th>
                                            <th><center>DISTRITO</center></th>
                                            <th><center>REGISTRADOR</center></th>
                                            <th><center>CCCPP</center></th>
                                            <th><center>NOMBRECP</center></th>
                                            <th><center>AREA</center></th>
                                            <th><center>CONGLO</center></th>
                                            <th><center>MZ. FINAL</center></th>
                                            <th><center>FRENTE</center></th>
                                            <th><center>EDIFICIO</center></th>
                                            <th><center>P29</center></th>
                                            <th><center>P30</center></th>
                                            <th><center>P31</center></th>
                                            <th><center>LATITUD</center></th>
                                            <th><center>LONGITUD</center></th>
                                            <th><center>ALTITUD</center></th>
                                            <th><center>GPS</center></th>
                                        </tr>            
                                    </thead>
                                </table>

                        <!--End Region Report-->
                    </div>
                </div>
            </div>

            <div class="box-body" id="divContenedorConglomerado" style="display: none" >
                <div class="row">
                    <div class="col-sm-12">
                        <center><label style="visibility: collapse">Espacio : </label></center>
                        <!--Region Report-->

                                <table id="tblGeoReferenciacionConglomerado" class="table table-sm table-condensed table-bordered" name="NombreReporte004">
                                    <thead id="headGeoReferenciacionConglomerado">
                                        <tr class="info">
                                            <th><center>ID</center></th>
                                            <th><center>UBIGUEO</center></th>
                                            <th><center>DEPARTAMENTO</center></th>
                                            <th><center>PROVINCIA</center></th>
                                            <th><center>DISTRITO</center></th>
                                            <th><center>REGISTRADOR</center></th>
                                            <th><center>AREA</center></th>
                                            <th><center>CONGLO</center></th>
                                            <th><center>GPS</center></th>
                                        </tr>            
                                    </thead>
                                </table>

                        <!--End Region Report-->
                    </div>
                </div>
            </div>

            <div class="box-body" id="divContenedorCCPP" style="display: none" >
                <div class="row">
                    <div class="col-sm-12">
                        <center><label style="visibility: collapse">Espacio : </label></center>
                        <!--Region Report-->

                                <table id="tblGeoReferenciacionCCPP" class="table table-sm table-condensed table-bordered" name="NombreReporte004">
                                    <thead id="headGeoReferenciacionCCPP">
                                        <tr class="info">
                                            <th><center>ID</center></th>
                                            <th><center>UBIGUEO</center></th>
                                            <th><center>DEPARTAMENTO</center></th>
                                            <th><center>PROVINCIA</center></th>
                                            <th><center>DISTRITO</center></th>
                                            <th><center>REGISTRADOR</center></th>
                                            <th><center>CCCPP</center></th>
                                            <th><center>NOMBRECP</center></th>
                                            <th><center>AREA</center></th>
                                            <th><center>CONGLO</center></th>
                                            <th><center>GPS</center></th>
                                        </tr>            
                                    </thead>
                                </table>

                        <!--End Region Report-->
                    </div>
                </div>
            </div>

            <div class="box-body" id="divContenedorManzana" style="display: none" >
                <div class="row">
                    <div class="col-sm-12">
                        <center><label style="visibility: collapse">Espacio : </label></center>
                        <!--Region Report-->

                                <table id="tblGeoReferenciacionManzana" class="table table-sm table-condensed table-bordered" name="NombreReporte004">
                                    <thead id="headGeoReferenciacionManzana">
                                        <tr class="info">
                                            <th><center>ID</center></th>
                                            <th><center>UBIGUEO</center></th>
                                            <th><center>DEPARTAMENTO</center></th>
                                            <th><center>PROVINCIA</center></th>
                                            <th><center>DISTRITO</center></th>
                                            <th><center>REGISTRADOR</center></th>
                                            <th><center>CCCPP</center></th>
                                            <th><center>NOMBRECP</center></th>
                                            <th><center>AREA</center></th>
                                            <th><center>CONGLO</center></th>
                                            <th><center>MZ. FINAL</center></th>
                                            <th><center>GPS</center></th>
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

    <div id="divContentGPS" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="width: 600px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Puntos GPS</h4>
                </div>
                <div class="modal-body">
                    <div id="map_canvasTodos" class="" style="display: none"></div>
                    <div id="map_canvasConglomerado" class="" style="display: none"></div>
                    <div id="map_canvasCCPP" class="" style="display: none"></div>
                    <div id="map_canvasManzanas" class="" style="display: none"></div>
                </div>
            </div>
        </div>
    </div>

</div>

<!--Region Scripts-->
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!--<script src="<?php echo base_url(); ?>assets/content/js/registro/controlTransferencia.js"></script>-->
<script>
    
var myTable;

$(document).ready(function () {

    $('#divContenedorTodos').css("display", "");
    $('#divContenedorConglomerado').css("display", "none");
    $('#divContenedorCCPP').css("display", "none");
    $('#divContenedorManzana').css("display", "none");

	$('#btnBuscar').on('click', function(){
        if($('#nivel').val() === "0") { 
            buscarGeoReferenciacionTodos(); 
            $('#divContenedorTodos').css("display", "");
            $('#divContenedorConglomerado').css("display", "none");
            $('#divContenedorCCPP').css("display", "none");
            $('#divContenedorManzana').css("display", "none");
        }
        if($('#nivel').val() === "1") { 
            buscarGeoReferenciacionConglomerado();
            $('#divContenedorTodos').css("display", "none");
            $('#divContenedorConglomerado').css("display", "");
            $('#divContenedorCCPP').css("display", "none");
            $('#divContenedorManzana').css("display", "none");
        }
        if($('#nivel').val() === "2") { 
            buscarGeoReferenciacionCCPP(); 
            $('#divContenedorTodos').css("display", "none");
            $('#divContenedorConglomerado').css("display", "none");
            $('#divContenedorCCPP').css("display", "");
            $('#divContenedorManzana').css("display", "none");
        }
        if($('#nivel').val() === "3") { 
            buscarGeoReferenciacionManzana(); 
            $('#divContenedorTodos').css("display", "none");
            $('#divContenedorConglomerado').css("display", "none");
            $('#divContenedorCCPP').css("display", "none");
            $('#divContenedorManzana').css("display", "");
        }
    });

    $('#mesIni').change(function(evento) {
        cargarMesesFin();
    });

    $('#nivel').change(function(evento) {
        if($('#nivel').val() !== "0") {
            $("#omision").val(0);
            $("#omision").prop('disabled', 'disabled');
        }
        else {
            $("#omision").removeAttr("disabled");
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
        $('#nivel').val(0);
        $("#omision").val(0);
        $("#omision").removeAttr("disabled");
        $('#conglomerado').val("");
    });

});

function buscarGeoReferenciacionTodos(){
    jsShowWindowLoad();
    myTable = $('#tblGeoReferenciacionTodos').DataTable({
        initComplete: function () {
            jsRemoveWindowLoad();
        },
        scrollY: 450,
        scrollX: true,
        ajax: {
            url: "../GeoReferenciacion/obtenerReporte004",
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
                omision         : $("#omision").val(), 
                conglomerado    : $("#conglomerado").val(),
                DNI             : $("#clave") .val()
            },
        },
        columns:[ 
            { data:"ID",                    class:"textFont text-center"        },
            { data:"UBIGEO",                class:"textFont text-center"        },
            { data:"DEPARTAMENTO",          class:"textFont text-left"          },
            { data:"PROVINCIA",             class:"textFont text-left"          },
            { data:"DISTRITO",              class:"textFont text-left"          },
            { data:"REGISTRADOR",           class:"textFont text-left"          },
            { data:"CCCPP",                 class:"textFont text-center"        },
            { data:"NOMBRECP",              class:"textFont text-left"          },
            { data:"AREA",                  class:"textFont text-left"          },
            { data:"CONGLOMERADO",          class:"textFont text-center"        },
            { data:"MANZANA_FINAL",         class:"textFont text-center"        },
            { data:"FRENTE",                class:"textFont text-center"        },
            { data:"EDIFICIO",              class:"textFont text-center"        },
            { data:"P29",                   class:"textFont text-center"        },
            { data:"P30",                   class:"textFont text-center"        },
            { data:"P31",                   class:"textFont text-center"        },
            { data:"LATITUD",               class:"textFont text-left"          },
            { data:"LONGITUD",              class:"textFont text-left"          },
            { data:"ALTITUD",               class:"textFont text-left"          },
            { data:null,                    class:"textFont text-center"        }
        ],
        columnDefs: [
            {
                targets: 19,
                searchable:false,
                orderable:false,
                render: function (data, type, full, meta){
                    return '<a href="#"><span class="fa fa-map-marker" onclick="abrirModalGPS(this);"></span></a>';
                }
            }
        ],
        bDestroy: true
	});
}

function buscarGeoReferenciacionConglomerado(){
    jsShowWindowLoad();
    myTable = $('#tblGeoReferenciacionConglomerado').DataTable({
        initComplete: function () {
            jsRemoveWindowLoad();
        },
        scrollY: 450,
        scrollX: true,
        ajax: {
            url: "../GeoReferenciacion/obtenerReporte004",
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
                omision         : $("#omision").val(), 
                conglomerado    : $("#conglomerado").val(),
                DNI             : $("#clave") .val()
            },
        },
        columns:[ 
            { data:"ID",                    class:"textFont text-center"        },
            { data:"UBIGEO",                class:"textFont text-center"        },
            { data:"DEPARTAMENTO",          class:"textFont text-left"          },
            { data:"PROVINCIA",             class:"textFont text-left"          },
            { data:"DISTRITO",              class:"textFont text-left"          },
            { data:"REGISTRADOR",           class:"textFont text-left"          },
            { data:"AREA",                  class:"textFont text-left"          },
            { data:"CONGLOMERADO",          class:"textFont text-center"        },
            { data:null,                    class:"textFont text-center"        }
        ],
        columnDefs: [
            {
                targets: 8,
                searchable:false,
                orderable:false,
                render: function (data, type, full, meta){
                    return '<a href="#"><span class="fa fa-map-marker" onclick="abrirModalGPS(this);" ></span></a>';
                }
            }
        ],
        bDestroy: true
    });
}

function buscarGeoReferenciacionCCPP(){
    jsShowWindowLoad();
    myTable = $('#tblGeoReferenciacionCCPP').DataTable({
        initComplete: function () {
            jsRemoveWindowLoad();
        },
        scrollY: 450,
        scrollX: true,
        ajax: {
            url: "../GeoReferenciacion/obtenerReporte004",
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
                omision         : $("#omision").val(), 
                conglomerado    : $("#conglomerado").val(),
                DNI             : $("#clave") .val()
            },
        },
        columns:[ 
            { data:"ID",                    class:"textFont text-center"        },
            { data:"UBIGEO",                class:"textFont text-center"        },
            { data:"DEPARTAMENTO",          class:"textFont text-left"          },
            { data:"PROVINCIA",             class:"textFont text-left"          },
            { data:"DISTRITO",              class:"textFont text-left"          },
            { data:"REGISTRADOR",           class:"textFont text-left"          },
            { data:"CCCPP",                 class:"textFont text-center"        },
            { data:"NOMBRECP",              class:"textFont text-left"          },
            { data:"AREA",                  class:"textFont text-left"          },
            { data:"CONGLOMERADO",          class:"textFont text-center"        },
            { data:null,                    class:"textFont text-center"        }
        ],
        columnDefs: [
            {
                targets: 10,
                searchable:false,
                orderable:false,
                render: function (data, type, full, meta){
                    return '<a href="#"><span class="fa fa-map-marker" onclick="abrirModalGPS(this);"></span></a>';
                }
            }
        ],
        bDestroy: true
    });
}

function buscarGeoReferenciacionManzana(){
    jsShowWindowLoad();
    myTable = $('#tblGeoReferenciacionManzana').DataTable({
        initComplete: function () {
            jsRemoveWindowLoad();
        },
        scrollY: 450,
        scrollX: true,
        ajax: {
            url: "../GeoReferenciacion/obtenerReporte004",
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
                omision         : $("#omision").val(), 
                conglomerado    : $("#conglomerado").val(),
                DNI             : $("#clave") .val()
            },
        },
        columns:[ 
            { data:"ID",                    class:"textFont text-center"        },
            { data:"UBIGEO",                class:"textFont text-center"        },
            { data:"DEPARTAMENTO",          class:"textFont text-left"          },
            { data:"PROVINCIA",             class:"textFont text-left"          },
            { data:"DISTRITO",              class:"textFont text-left"          },
            { data:"REGISTRADOR",           class:"textFont text-left"          },
            { data:"CCCPP",                 class:"textFont text-center"        },
            { data:"NOMBRECP",              class:"textFont text-left"          },
            { data:"AREA",                  class:"textFont text-left"          },
            { data:"CONGLOMERADO",          class:"textFont text-center"        },
            { data:"MANZANA_FINAL",         class:"textFont text-center"        },
            { data:null,                    class:"textFont text-center"        }
        ],
        columnDefs: [
            {
                targets: 11,
                searchable:false,
                orderable:false,
                render: function (data, type, full, meta){
                    return '<a href="#"><span class="fa fa-map-marker" onclick="abrirModalGPS(this);"></span></a>';
                }
            }
        ],
    });
}

function cargarMesesFin() {
    var mes = $('#mesIni').val();
    $.ajax({
        type : 'GET',
        dataType : 'JSON',
        url : '../GeoReferenciacion/obtenerMeses',
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

function initializeTodos(alt, lon) {

    $('#map_canvasTodos').css("display", "");
    $('#map_canvasConglomerado').css("display", "none");
    $('#map_canvasCCPP').css("display", "none");
    $('#map_canvasManzanas').css("display", "none");

    var mapCanvas = document.getElementById('map_canvasTodos');
    var myLatLng = new google.maps.LatLng(alt, lon);
    var mapOptions = {
        center: myLatLng,
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        zoomControl: true,
        zoomControlOptions: { style: google.maps.ZoomControlStyle.LARGE }
    }
    try {
        var map = new google.maps.Map(mapCanvas, mapOptions);
        new google.maps.Marker({ position: myLatLng, map: map, title:"Ubicaión" });
    
    } catch (err) {
        // Error Handling
    }
}

function initializeConglomerado(result) {

    $('#map_canvasTodos').css("display", "none");
    $('#map_canvasConglomerado').css("display", "");
    $('#map_canvasCCPP').css("display", "none");
    $('#map_canvasManzanas').css("display", "none");

    var map;
    var centro2016 = null;
    var iconBase2016 = 'http://www.boltondrinkanddrugs.org/media/1006/spotlight-poi-blue.png';

    $.each(result, function(j, item) {
        
        if(item.LAT2016 !== null && item.LON2016 !== null) {
            if(centro2016 === null) {
                centro2016 = new google.maps.LatLng(item.LAT2016, item.LON2016);
                map = new google.maps.Map(document.getElementById('map_canvasConglomerado'), {
                    zoom: 10,
                    center: centro2016,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });
            }
            new google.maps.Marker({
                position: new google.maps.LatLng(item.LAT2016, item.LON2016),
                map: map,
                title:"Ubicaión 2016",
                icon: iconBase2016
            });
        }

        if(item.LAT2017 !== null && item.LON2017 !== null) {
            new google.maps.Marker({
                position: new google.maps.LatLng(item.LAT2017, item.LON2017),
                map: map,
                title:"Ubicaión 2017",
            });
        }

    });    
}

function initializeCCPP(result) {

    $('#map_canvasTodos').css("display", "none");
    $('#map_canvasConglomerado').css("display", "none");
    $('#map_canvasCCPP').css("display", "");
    $('#map_canvasManzanas').css("display", "none");

    var map;
    var centro2016 = null;
    var iconBase2016 = 'http://www.boltondrinkanddrugs.org/media/1006/spotlight-poi-blue.png';

    $.each(result, function(j, item) {
        
        if(item.LAT2016 !== null && item.LON2016 !== null) {
            if(centro2016 === null) {
                centro2016 = new google.maps.LatLng(item.LAT2016, item.LON2016);
                map = new google.maps.Map(document.getElementById('map_canvasCCPP'), {
                    zoom: 10,
                    center: centro2016,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });
            }
            new google.maps.Marker({
                position: new google.maps.LatLng(item.LAT2016, item.LON2016),
                map: map,
                title:"Ubicaión 2016",
                icon: iconBase2016
            });
        }

        if(item.LAT2017 !== null && item.LON2017 !== null) {
            new google.maps.Marker({
                position: new google.maps.LatLng(item.LAT2017, item.LON2017),
                map: map,
                title:"Ubicaión 2017",
            });
        }

    });    
}

function initializeManzana(result) {
    console.log('entre');
    $('#map_canvasTodos').css("display", "none");
    $('#map_canvasConglomerado').css("display", "none");
    $('#map_canvasCCPP').css("display", "none");
    $('#map_canvasManzanas').css("display", "");

    var map;
    var centro2016 = null;
    var iconBase2016 = 'http://www.boltondrinkanddrugs.org/media/1006/spotlight-poi-blue.png';

    $.each(result, function(j, item) {
        
        if(item.LAT2016 !== null && item.LON2016 !== null) {
            if(centro2016 === null) {
                centro2016 = new google.maps.LatLng(item.LAT2016, item.LON2016);
                map = new google.maps.Map(document.getElementById('map_canvasManzanas'), {
                    zoom: 10,
                    center: centro2016,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });
            }
            new google.maps.Marker({
                position: new google.maps.LatLng(item.LAT2016, item.LON2016),
                map: map,
                title:"Ubicaión 2016",
                icon: iconBase2016
            });
        }

        if(item.LAT2017 !== null && item.LON2017 !== null) {
            new google.maps.Marker({
                position: new google.maps.LatLng(item.LAT2017, item.LON2017),
                map: map,
                title:"Ubicaión 2017",
            });
        }

    });    
}

function abrirModalGPS(s, e){
    
    var rowData = myTable.row($(s).parents('tr')).data();
    
    $('#divContentGPS').modal({ show: 'true' });
    
    if($('#nivel').val() === '0') {        
             
        $('#divContentGPS').on('shown.bs.modal', function() {
            initializeTodos(rowData.LATITUD,rowData.LONGITUD);
        });
    }

    else { 
        $.ajax({
            type : 'POST',
            dataType : 'JSON',
            url : '../GeoReferenciacion/obtenerReporte004_PuntosGPS',
            data: { 
                nivel           : $('#nivel').val(),
                anio            : $('#anio').val(),
                conglomerado    : rowData.CONGLOMERADO,
                ccpp            : rowData.CCCPP,
                manzana         : rowData.MANZANA_FINAL,
                nivel           : $('#nivel').val(),
                mesIni          : $("#mesIni").val(), 
                mesFin          : $("#mesFin").val(), 
                perIni          : $("#perIni").val(), 
                perFin          : $("#perFin").val()
            },
            success : function(result) {
                $('#divContentGPS').on('shown.bs.modal', function() {
                    if($('#nivel').val() === '1') { initializeConglomerado(result); }                    
                    if($('#nivel').val() === '2') { initializeCCPP(result); }                    
                    if($('#nivel').val() === '3') { initializeManzana(result); }
                });
            },
            error : function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + ' ' + thrownError);
            }
        });
    }

}
</script>
<!--End Region Scripts-->