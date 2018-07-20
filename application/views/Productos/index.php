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
            
            <div class="box-body" id="divContenedorProducto">
                <div class="row">
                    <div class="col-sm-12">
                        <center><label style="visibility: collapse">Espacio : </label></center>
                        <!--Region Report-->
                            
                                <table id="tblProducto" class="table table-sm table-condensed table-bordered" name="tblProducto">
                                    <thead id="headCoberturaConglomerado">
                                        <tr class="info">
<!--                                            <th><center>MODIFICAR</center></th>
                                            <th><center>ELIMINAR</center></th>-->
                                            <th><center>MES</center></th>            
                                            <th><center>PRODUCTO</center></th>
                                            <th><center>MARCA</center></th>
                                            <th><center>CATEGORIA</center></th>
                                            <th><center>NOMBRE</center></th>
                                            <th><center>TALLA</center></th>
                                            <th><center>COLOR</center></th>                                            
                                            <th><center>PRECIO COMRPO</center></th>
                                            <th><center>PRECIO VENTA</center></th>                                            
                                            <th><center>FECHA COMPRA</center></th>
                                            <th><center>ESTADO</center></th>
                                            <th><center>DESCRIPCION</center></th>
                                            <th><center>OBSERVACION</center></th>
                                        </tr>            
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($producto as $value) {
                                            echo 
                                            '<tr>                                          
                                                <td>'.$value->mes.'</td>
                                                <td>'.$value->producto_id.'</td>
                                                <td>'.$value->marca.'</td>
                                                <td>'.$value->categoria.'</td>
                                                <td>'.$value->nombre.'</td>                                                
                                                <td>'.$value->talla.'</td>
                                                <td>'.$value->color.'</td>
                                                <td>'.$value->precio_compra.'</td>
                                                <td>'.$value->precio_venta.'</td>                                                
                                                <td>'.$value->fecha_compra.'</td>
                                                <td>'.$value->estado.'</td>
                                                <td>'.$value->descripcion.'</td>
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
var anio=null;
var mes=null;
var estado=null;
var marca=null;
var categoria=null
var nombre=null;

$(document).ready(function () {

  
    $('#btnBuscar').on('click', function() {
     ObtenerParametros();
    buscarCoberturasConglomerado();
    });
//    $('#mesIni').change(function(evento) {
//        cargarMesesFin();
//    });
//
//    $('#nivel').change(function(evento) {
//        cargarEstado();
//    })

    $('#btnLimpiar').on('click', function(){        
        $('#mes').append('<option value="0" selected="selected">Todos</option>');
        $('#estado').val(0);
        $('#marca').val(0);
        $('#categoria').val(0);
        $("#nombre").val("");            
    });
});

function ObtenerParametros(){
    anio=$('#anio').val();
    mes=$('#mes').val();
    estado= $('#estado').val();
    marca= $('#marca').val();
    categoria=$('#categoria').val();
    nombre=$("#nombre").val();   
}
function buscarCoberturasConglomerado(){
        
//    $.ajax({
//        type : 'post',
//        url : 'Productos/ObtenerProductos',
//        data:{nombre:nombre},
//        beforeSend: function(){
//        },
//        success : function(result) {
//            $('#modal-new').modal('hide');
//            getAllParameter_manzana();
//            cargar_tabla_manzana();
//            cargar_tabla_manzana_detalle();
//        },
//        error: function(result, status) {
//            alert('Error ' + status + ' al cargar la información,<br>Intente nuevamente.')
//        }
//    });  

    jsShowWindowLoad();
    myTable = $('#tblProducto').DataTable({
        initComplete: function () {
            jsRemoveWindowLoad();
        },
        scrollY: 450,
        scrollX: true,
        ajax: {
            url: "../Productos/ObtenerProductos",
            dataSrc: "",
            type:"POST",
            data: { 
                anio        : anio, 
                mes         : mes, 
                estado      : estado, 
                marca       : marca,                 
                categoria   : categoria,                 
                nombre      : nombre
            },
        },
        columns:[ 
            
            { data:"mes",                   class:"textFont text-left"/*,      width: "20" */    },
            { data:"producto_id",           class:"textFont text-left"/*,      width: "100"*/    },
            { data:"marca",                 class:"textFont text-left"/*,      width: "100"*/    },
            { data:"categoria",             class:"textFont text-left"/*,      width: "80" */    },
            { data:"nombre",                class:"textFont text-left"/*,      width: "200"*/    },
            { data:"talla",                 class:"textFont text-left"/*,      width: "40" */    },
            { data:"color",                 class:"textFont text-left"/*,      width: "40" */    },            
            { data:"precio_compra",         class:"textFont text-left"/*,      width: "40" */    },            
            { data:"precio_venta",          class:"textFont text-left"/*,      width: "40" */    },
            { data:"fecha_compra",          class:"textFont text-left"/*,      width: "60" */    },
            { data:"estado",                class:"textFont text-left"/*,      width: "40" */    },            
            { data:"descripcion",           class:"textFont text-left"/*,      width: "100"*/    },
            { data:"observacion",           class:"textFont text-left"/*,      width: "40" */    }
        ],
        bDestroy: true
    });
}

</script>
<!--End Region Scripts-->