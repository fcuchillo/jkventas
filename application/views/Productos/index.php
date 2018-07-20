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
                            <select class="form-control input-sm" id="anio" name="anio">
                                <option value="2018">2018</option>
                            </select>
                        </div>
                        
                        <div class="col-md-1" style="display: inline-block; width: 11% ">
                            <label class="PyENDES-Label">Mes</label>
                            <?php
                                echo '<select class="form-control input-sm" id="mes" name="mes"><option value="0">Todos</option>';
                                foreach ($mes as $value) {?>
                                    <?php echo '<option value="'.$value->mes_id.'" >'.$value->nombre.'</option>';
                                }
                                echo '</select>';
                            ?> 
                        </div>
                        
                        <div class="col-md-1" style="display: inline-block; width: 11% ">
                            <label class="PyENDES-Label">Estado</label>                            
                            <?php
                                echo '<select class="form-control input-sm" id="estado" name="estado"><option value="0">Todos</option>';
                                foreach ($estado as $value) {?>
                                    <?php echo '<option value="'.$value->estado_id.'" >'.$value->descripcion.'</option>';
                                }
                                echo '</select>';
                            ?>                                
                        </div>
                        
                        <div class="col-md-2" style="display: inline-block; width: 15% ">
                            <label class="PyENDES-Label">Marca</label>
                            <?php
                                echo '<select class="form-control input-sm" id="marca" name="marca"><option value="0">Todos</option>';
                                foreach ($marca as $value) {?>
                                    <?php echo '<option value="'.$value->marca_id.'" >'.$value->nombre.'</option>';
                                }
                                echo '</select>';
                            ?>                    
                        </div>
                        
                        <div class="col-md-2" style="display: inline-block; width: 15% ">
                            <label class="PyENDES-Label">Categoria</label>
                            <?php
                                echo '<select class="form-control input-sm" id="categoria" name="categoria"><option value="0">Todos</option>';
                                foreach ($categoria as $value) {?>
                                    <?php echo '<option value="'.$value->categoria_id.'" >'.$value->nombre.'</option>';
                                }
                                echo '</select>';
                            ?>  
                        </div>
                        
                        <div class="col-md-1" style="display: inline-block; width: 20% "> 
                            <label class="PyENDES-Label">Nombre</label>
                            <input type="text" class="form-control input-sm" id="nombre" name="nombre" placeholder="">
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

        <!--Region Box Result-->
        <div class="box">
            <div class="box-header with-border">
<!--                <h3 class="box-title">Lista de Productos</h3>-->
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
                
                <div class="col-md-2" style="display: inline-block; width: 7% " >                                            
                    <button type="button" class="btn btn-block btn-primary btn-sm" id="btnAgregar">Agregar</button>                    
                </div>                
            </div>
            
            <div class="box-body" id="divContenedorProducto" style="display: none" >
                <div class="row">
                    <div class="col-sm-12">
                        <center><label style="visibility: collapse">Espacio : </label></center>
                        <!--Region Report-->
                            
                                <table id="tblProducto" class="table table-sm table-condensed table-bordered" name="NombreReporte004">
                                    <thead id="headCoberturaConglomerado">
                                        <tr class="info">
                                            <th><center>MODIFICAR</center></th>
                                            <th><center>ELIMINAR</center></th>
                                            <th><center>MES</center></th>            
                                            <th><center>PRODUCTO</center></th>
                                            <th><center>MARCA</center></th>
                                            <th><center>CATEGORIA</center></th>
                                            <th><center>NOMBRE</center></th>
                                            <th><center>DESCRIPCION</center></th>
                                            <th><center>FECHA COMPRA</center></th>
                                            <th><center>PRECIO COMRPO</center></th>
                                            <th><center>PRECIO VENTA</center></th>
                                            <th><center>TALLA</center></th>
                                            <th><center>COLOR</center></th>
                                            <th><center>Estado</center></th>
                                            <th><center>OBSERVACION</center></th>
                                        </tr>            
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($producto as $value) {
                                            echo 
                                            '<tr>
                                                <td></td>
                                                <td></td>
                                                <td>'.$value->mes.'</td>
                                                <td>'.$value->producto_id.'</td>
                                                <td>'.$value->marca.'</td>
                                                <td>'.$value->categoria.'</td>
                                                <td>'.$value->nombre.'</td>                                                
                                                <td>'.$value->descripcion.'</td>
                                                <td>'.$value->fecha_compra.'</td>
                                                <td>'.$value->precio_compra.'</td>
                                                <td>'.$value->precio_venta.'</td>
                                                <td>'.$value->talla.'</td>
                                                <td>'.$value->color.'</td>
                                                <td>'.$value->estado.'</td>
                                                <td>'.$value->observacion.'</td>                                                    
                                            </tr>';
                                        }
                                        ?>
                                    </tbody>
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

    $('#divContenedorProducto').css("display", "");
    $('#divContenedorVivienda').css("display", "none");
    $('#divContenedorHogar').css("display", "none");

    $('#btnBuscar').on('click', function() {
        if($('#nivel').val() === "1") { 
            buscarCoberturasConglomerado(); 
            $('#divContenedorProducto').css("display", "");
            $('#divContenedorVivienda').css("display", "none");
            $('#divContenedorHogar').css("display", "none");
        }
        if($('#nivel').val() === "2") { 
            buscarCoberturasVivienda();
            $('#divContenedorProducto').css("display", "none");
            $('#divContenedorVivienda').css("display", "");
            $('#divContenedorHogar').css("display", "none");
        }
        if($('#nivel').val() === "3") { 
            buscarCoberturasHogar();
            $('#divContenedorProducto').css("display", "none");
            $('#divContenedorVivienda').css("display", "none");
            $('#divContenedorHogar').css("display", "");
        }
    });

    $('#mesIni').change(function(evento) {
        cargarMesesFin();
    });

    $('#nivel').change(function(evento) {
        cargarEstado();
    })

    $('#btnLimpiar').on('click', function(){        
        $('#mes').append('<option value="0" selected="selected">Todos</option>');
        $('#marca').val(0);
        $('#categoria').val(0);
        $("#nombre").val("");            
    });
});

function buscarCoberturasConglomerado(){
    jsShowWindowLoad();
    myTable = $('#tblProducto').DataTable({
        initComplete: function () {
            jsRemoveWindowLoad();
        },
        scrollY: 450,
        scrollX: true,
        ajax: {
            url: "../Cobertura/obtenerReporte004",
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
                DNI             : $("#clave") .val()
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
            { data:"ESTADO",                class:"textFont text-left"/*,      width: "40" */    },
            { data:"CAB1",                  class:"textFont text-left"/*,      width: "40" */    },
            { data:"CAB2",                  class:"textFont text-left"/*,      width: "40" */    }
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
            url: "../Cobertura/obtenerReporte004",
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
                DNI             : $("#clave") .val()
            },
        },
        columns:[ 
            { data:"ORDEN",                 class:"textFont text-left"/*,      width: "20"  */   },
            { data:"DEPARTAMENTO",          class:"textFont text-left"/*,      width: "100" */   },
            { data:"EQUIPO",                class:"textFont text-left"/*,      width: "35"  */   },
            { data:"DNI",                   class:"textFont text-left"/*,      width: "80"  */   },
            { data:"SUPERVISORA",           class:"textFont text-left"/*,      width: "200" */   },
            { data:"MES",                   class:"textFont text-left"/*,      width: "100" */   },
            { data:"AREA",                  class:"textFont text-left"/*,      width: "60"  */   },
            { data:"CONGLOMERADO",          class:"textFont text-left"/*,      width: "40"  */   },
            { data:"CAB1",                  class:"textFont text-left"/*,      width: "40"  */   },
            { data:"CAB2",                  class:"textFont text-left"/*,      width: "40"  */   },
            { data:"CAB3",                  class:"textFont text-left"/*,      width: "40"  */   },
            { data:"CAB4",                  class:"textFont text-left"/*,      width: "40"  */   },
            { data:"CAB5",                  class:"textFont text-left"/*,      width: "40"  */   },
            { data:"CAB6",                  class:"textFont text-left"/*,      width: "40"  */   }
        ],
        bDestroy: true
    });
}

function buscarCoberturasHogar(){
    jsShowWindowLoad();
    myTable = $('#tblCoberturaHogar').DataTable({
        initComplete: function () {
            jsRemoveWindowLoad();
        },
        scrollY: 450,
        scrollX: true,
        ajax: {
            url: "../Cobertura/obtenerReporte004",
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
                DNI             : $("#clave") .val()
            },
        },
        columns:[ 
            { data:"ORDEN",                 class:"textFont text-left"/*,      width: "20"  */   },
            { data:"DEPARTAMENTO",          class:"textFont text-left"/*,      width: "100" */   },
            { data:"EQUIPO",                class:"textFont text-left"/*,      width: "35"  */   },
            { data:"DNI",                   class:"textFont text-left"/*,      width: "80"  */   },
            { data:"SUPERVISORA",           class:"textFont text-left"/*,      width: "200" */   },
            { data:"MES",                   class:"textFont text-left"/*,      width: "100" */   },
            { data:"AREA",                  class:"textFont text-left"/*,      width: "60"  */   },
            { data:"CONGLOMERADO",          class:"textFont text-left"/*,      width: "40"  */   },
            { data:"CAB1",                  class:"textFont text-left"/*,      width: "40"  */   },
            { data:"CAB2",                  class:"textFont text-left"/*,      width: "40"  */   },
            { data:"CAB3",                  class:"textFont text-left"/*,      width: "40"  */   },
            { data:"CAB4",                  class:"textFont text-left"/*,      width: "40"  */   },
            { data:"CAB5",                  class:"textFont text-left"/*,      width: "40"  */   },
            { data:"CAB6",                  class:"textFont text-left"/*,      width: "40"  */   },
            { data:"CAB7",                  class:"textFont text-left"/*,      width: "40"  */   }
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