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
                            <th align="center"><center><a href="javascript:void(0);" onclick="AgregarMenu();"><span class="glyphicon glyphicon-plus"></span></a></center></th>
                            <!--<th align="center"></th>-->
                            <th align="center">Menú</th>
                            <th align="center">Ruta</th>
                            <th align="center">Descripción</th>
                            <th align="center">Orden</th>
                            <th align="center">Padre</th>
                            <th align="center">Roles Asignados</th>
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
<div class="modal" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title" id="popuptitle"></h4>
            </div>
            <div id="data-menu"></div>

            <div class="modal-content"> 
                <div class="modal-header">
                    <button type="button" class="btn btn-block btn-danger btn-sm" id="btnGuardar" name="btnGuardar">Aceptar</button>
                </div> 
            </div>
        </div>
    </div>
</div>
<!--End Region Modal-->
<div class="modal" id="myModalRoles" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title" id="popuptitle">Roles</h4>
            </div>
            <div class="modal-body">
                <form class="form" name="formMenu" method="POST">
                    <input type="hidden" value="" id="menu_id" name="menu_id">
                    <select class="form-control" name="disponibles[]" id="disponibles" multiple="multiple">
                    </select>
               </form>
            </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="btnGuardarRoles" >Guardar</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
            </div>
        </div>
    </div>
<script>
var myTable;
$(document).ready(function () {
    cargarTodoMenu();
    $('#btnMenueditar').click(function(){
//        $('#myModal').modal('show'); 
        alert('hiciste click');
    });
    $('#btnGuardar').click(function(){
        EditarMenu();
    });
    $('#btnGuardarRoles').click(function(){
        GuardarRolporMenu();
    });
  });
  
  function EditarMenu(){
       var form = $("#frmMenu");
       var data = form.serialize();
       //enviar datos en json
       //var formData = JSON.stringify($("#frmMenu").serializeArray());
        $.ajax({
          type:'post',
          data:data,
          url:'../Menus/EditarMenu',
//        dataType: 'json',
//        contentType: 'application/json',
          success:function(response){
//            console.log(response);
            $('#myModal').modal('hide'); 
            cargarTodoMenu();
          }
      })
  }
  function AgregarMenu(){
      $.ajax({
          type:'post',
//          data:data,
          url:'../Menus/AgregarMenu',
          success:function(response){
            $('#myModal').modal('show'); 
            $('#data-menu').html(response);
          }
      })
  }
  function cargarTodoMenu(){
        myTable = $('#tblmenu').DataTable({
        initComplete: function () {
            jsRemoveWindowLoad();
        },
        ajax:{
            dataType: 'json',
            url:'../Menus/ObtenerListadodeMenu',
            type:'post',
            dataSrc:""
        }, 
        columns:[ 
            { data: 'id', render: function(value, type, full, meta) {
                  return '<td><center>'+
                         '<a href="javascript:void(0);" id="btnEliminar" onclick="Eliminar('+full.menu_id+');" ><span class="glyphicon glyphicon-trash" ></span></a>'+
                         '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" id="btnMenueditar" onclick="Editar('+full.menu_id+');" ><span class="glyphicon glyphicon-pencil"></span></a>'+
                         '</center></td>'
                        }  },
            { data:"menu",           class:"textFont text-left",order:false/*,      width: "20" */    },
            { data:"ruta",           class:"textFont text-left"/*,      width: "100"*/    },
            { data:"descripcion",    class:"textFont text-left"/*,      width: "100"*/    },
            { data:"orden",          class:"textFont text-left"/*,      width: "80" */    },
            { data:"padre",          class:"textFont text-left"/*,      width: "200"*/    },
            {data: 'id', render: function(value, type, full, meta) {
                  return '<td><center>'+
                         '<a href="javascript:void(0);" onclick="CargarRoles('+full.menu_id+');" ><span class="glyphicon glyphicon-menu-hamburger" ></span></a>'+
                         '</center></td>'
                    }
            },
            { data:"estado",         class:"textFont text-left"/*,      width: "40" */    }
        ],
        columnDefs: [
        { "orderable": false, "targets": 0 }
        ],
        autoWidth: true,
        bDestroy: true
  });   
  }
  function Editar(id){
      $.ajax({
          type:'post',
          data:{menu_id:id},
          url:'../Menus/ObtenerMenu',
          success:function(response){
            console.log(response);
            $('#myModal').modal('show'); 
            $('#data-menu').html(response);
          }
      })
  }
 function Eliminar(id){
   if(confirm('Desea Eliminar?')){
     $.ajax({
          type:'post',
          data:{menu_id:id},
          url:'../Menus/EliminarMenu',
          success:function(response){
            cargarTodoMenu();
        }
      })   
  }
 }
   function CargarRoles(menu_id){
    $.ajax({
          type:'post',
          data:{menu_id:menu_id},
          url:'../Menus/ObtenerRolporMenu',
          success:function(response){
              console.log(response);
              var json2 = jQuery.parseJSON(response);
              var registrados = [];
              registrados=json2['registrados'];
           $('#disponibles option').remove();
//           $('#disponibles').multiSelect('refresh');
            $.each(json2['todo'], function(j, resultado) {
               if(registrados.length>=0 && registrados.indexOf(resultado.rol_id) != -1){
                   $('#disponibles').append($('<option>').text(resultado.titulo).attr({value:resultado.rol_id,selected:'selected'}));
               }
               else{
                   $('#disponibles').append($('<option>').text(resultado.titulo).attr('value', resultado.rol_id));
               }
             });
            $('#disponibles').multiSelect({
                selectableHeader: "<div class='custom-header'><center><strong>ROL NO ASIGNADO</strong></center></div>",
                selectionHeader:  "<div class='custom-header'><center><strong>ROL ASIGNADO</strong></center></div>",    
                refresh:false
            });
            $('#menu_id').val(menu_id);
            $('#myModalRoles').modal('show'); 
        }
      })
 }
   function GuardarRolporMenu(){
   var asignados=$('#disponibles').val();
   var menu_id= $('#menu_id').val();
       //enviar datos en json
       //var formData = JSON.stringify($("#frmMenu").serializeArray());
    $.ajax({
          type:'post',
          url:'../Menus/AsignaciondeRol',
          data:{asignados:asignados,menu_id:menu_id},
          success:function(response){
            $('#myModalRoles').modal('hide'); 
            cargarTodoMenu();
          }
      })
  }
</script>