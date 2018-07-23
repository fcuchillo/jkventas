<!--Region Css-->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/content/css/sampling.css">  
<!--End Region Css-->
  
<!--Region Body-->
<div class="content-wrapper">
    <!--Region Section Header-->
    <section class="content-header">
        <h1>Muestreo</h1>
        <ol class="breadcrumb">
            <li><a href="../login/usuarioLogin"><i class="fa fa-dashboard"></i>Inicio</a></li>
            <li><a href="#">Muestreo</a></li>
            <li class="active">Muestreo</li>
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
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-3"> 
                        <label class="PyENDES-Label">Nro. Conglomerado</label>
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control " id="conglomerado" name="conglomerado" placeholder="Ingresar Nro. Conglomerado">
                            <small id='validationConglomerado' class="help-block validation" data-bv-validator="notEmpty" data-bv-for="conglomerado" data-bv-result="INVALID" style="display: none">Nro. Conglomerado es requerido</small>
                            <span class="input-group-btn"><button type="button" class="btn btn-primary btn-block btn-flat" id="btnRegistrySearch">Buscar</button>
                        </div>
                    </div>
                    <div class="col-md-7"></div>
                    <div class="col-md-2">
                        <label class="PyENDES-Label">Procesar </label>
                        <button type="button" class="btn btn-block btn-danger btn-sm" id="btnRegistryProcess" disabled>Procesar</button>
                    </div>
                </div>
            </div>
        </div>
        <!--End Region Box Filter-->
        <!--Region Box Result-->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title" id="inquesttitles"></h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <table id="tblmenu" class="table table-condensed table-striped" data-toggle="table" >
                    <thead id="tblmenucabecera">
                        <tr class="info">
                            <th align="center">Menú</th>
                            <th align="center">Ruta</th>
                            <th align="center">Descripción</th>
                            <th align="center">Orden</th>
                            <th align="center">Padre</th>
                            <th align="center">Estado</th>
                        </tr>            
                    </thead>
                    <tbody>
                        <?php
                        if(isset($menus)){
                            foreach ($menus as $atributo){
                                echo '<tr>'
                                        .'<td>'.$atributo->menu.'</td>'
                                        .'<td>'.$atributo->ruta.'</td>'
                                        .'<td>'.$atributo->descripcion.'</td>'
                                        .'<td>'.$atributo->orden.'</td>'
                                        .'<td>'.$atributo->padre.'</td>'
                                        .'<td>'.$atributo->estado.'</td>'.
                                     '</tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>  
    </section>
</div>
<!--Region Modal-->
<div class="modal" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title" id="popuptitle"></h4>
            </div>
            <div class="modal-body">
                <table id="inquestResultHouseholds" class="table table-condensed table-striped" data-toggle="table" >
                    <thead id="inquestResultHeadtwo">
                        <tr class="info">
                            <th ><center>Hogar</center></th>
                            <th ><center>Nombre de Jefe Encuesta</center></th>
                            <th ><center>Dirección Viv.</center></th>
                            <th ><center>Edad</center></th>
                            <th ><center>Parentesco</center></th>
                            <th ><center>Sexo</center></th>
                        </tr>            
                    </thead>
                </table> 
            </div>
        </div>
    </div>
</div>
<!--End Region Modal-->

<script>
    
var myTable;
var editor;
$(document).ready(function () {
    editor = new $.fn.dataTable.Editor( {
    ajax: "../Menus/ObtenerListadodeMenu",
    table: "#tblmenu",
    idSrc: "menu_id",
    fields: [ {
                label: "Menu:",
                name: "menu"
            }, {
                label: "Ruta:",
                name: "ruta"
            }, {
                label: "Descripcion:",
                name: "descripcion"
            }, {
                label: "Orden:",
                name: "Orden"
            }, {
                label: "Padre:",
                name: "padre"
            }, {
                label: "Estado",
                name: "estado",
                type: "select"
            }
        ]
    } );
 
    // Activate an inline edit on click of a table cell
    $('#tblmenu').on( 'click', 'tbody td:not(:first-child)', function (e) {
        editor.inline( this );
    } );
 
    myTable = $('#tblmenu').DataTable({
        initComplete: function () {
            jsRemoveWindowLoad();
        },
        order: [[ 1, 'asc' ]],
        scrollY: 450,
        scrollX: true,
        idSrc:  'menu_id',
        ajax: {
            url: "../Menus/ObtenerListadodeMenu",
            dataSrc: "",
            type:"POST"
        },
        columns:[ 
            
            { data:"menu",           class:"textFont text-left"/*,      width: "20" */    },
            { data:"ruta",           class:"textFont text-left"/*,      width: "100"*/    },
            { data:"descripcion",    class:"textFont text-left"/*,      width: "100"*/    },
            { data:"orden",          class:"textFont text-left"/*,      width: "80" */    },
            { data:"padre",          class:"textFont text-left"/*,      width: "200"*/    },
            { data:"estado",         class:"textFont text-left"/*,      width: "40" */    }
        ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        bDestroy: true
  }); 
   });
  


</script>