<!--Region Body-->
<div class="content-wrapper">
    <!--Region Section Header-->
    <section class="content-header">
        <h1>Muestreo</h1>
        <ol class="breadcrumb">
            <li><a href="../CAdm_login/usuarioLogin"><i class="fa fa-dashboard"></i>Inicio</a></li>
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
                <table id="tblusuario" class="table table-condensed table-striped" data-toggle="table" >
                    <thead id="tblusuariocabecera">
                        <tr class="info">
                            <th align="center"><center><a href="javascript:void(0);" onclick="AgregarRol();"><span class="glyphicon glyphicon-plus"></span></a></center></th>
                            <th align="center">Nombre</th>
                            <th align="center">Descripcion</th>
                            <th align="center">Menus</th>
                            <th align="center">Estado</th>
                        </tr>            
                    </thead>
                </table>
            </div>
        </div>  
    </section>
</div>
<!--Region Modal-->
<div class="modal" id="myModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title" id="popuptitle">Verificar</h4>
            </div>
            <div class="modal-body">
                <form class="form" name="formMenu" method="POST">
                    <input type="hidden" value="" id="rol_id" name="rol_id">
                    <select class="form-control" name="disponibles[]" id="disponibles" multiple="multiple">
                    </select>
               </form>
            </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="btnGuardar" >Guardar</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
            </div>
        </div>
    </div>
<div class="modal" id="myModalRol" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title" id="popuptitle">Verificar</h4>
            </div>
            <div class="modal-body">
                <form id="frmRol" name="frmRol">
                    <input type="hidden" id="rol_idd" name="rol_idd" value="">
                    <input type="hidden" class="form-control" value="" name="accion" id="accion">
                    <div class="form-group">
                        <label class="col-sm-12 col-form-label col-form-label-sm">LLave del Rol</label>
                        <input type="text" class="form-control" class="input-group input-group-sm" value="" name="txtrol_id" id="txtrol_id" disabled>
                    </div>
                        <div class="form-group">
                            <label class="col-sm-12 col-form-label col-form-label-sm">Nombre del Rol</label>
                            <input type="text" class="form-control required" class="input-group input-group-sm" value="" name="titulo" id="titulo" required>
                        </div>
                       <div class="form-group">
                            <label class="col-sm-12 col-form-label col-form-label-sm">Descripción</label>
                            <textarea id="descripcion" name="descripcion" class="form-control input-sm" rows="3" cols="5" maxlength="100"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12 col-form-label col-form-label-sm">Estado</label>
                            <select class="form-control input-sm" name="estado" id="estado"></select>
                        </div>
                        
                    
               </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="btnGuardarRol" >Guardar</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--End Region Modal-->
<script>
var myTable;
$(document).ready(function () {
//     $('.myModal').modal('open');
    cargarTodoLosRoles();
    $('#btnGuardar').click(function(){
        GuardarMenuporRol();
    });
    $('#btnGuardarRol').click(function(){
       MantenimientoRol();
    });
  });
  function MantenimientoRol(){
       var form = $("#frmRol");
       var data = form.serialize();
       console.log(data);
       $.ajax({
          type:'post',
          url:'../CAdm_usuarios/MantenimientoRol',
          data:data,
          success:function(response){
            $('#myModalRol').modal('hide'); 
            cargarTodoLosRoles();
          }
      })
  }
  
  function GuardarMenuporRol(){
//       var form = $("#formMenu");
//       var data = form.serialize();
   var asignados=$('#disponibles').val();
   var rol_id= $('#rol_id').val();
       //enviar datos en json
       //var formData = JSON.stringify($("#frmMenu").serializeArray());
    $.ajax({
          type:'post',
          url:'../CAdm_usuarios/AsignaciondeMenu',
          data:{asignados:asignados,rol_id:rol_id},
          success:function(response){
            $('#myModal').modal('hide'); 
            cargarTodoLosUsuarios();
          }
      })
  }
  function AgregarRol(){
      $('#frmRol')[0].reset();
      $('#accion').val('add');
      $('#estado option').remove();
      $('#estado').append($('<option>', {value:"1", text:'Activo'}));
      $('#estado').append($('<option>', {value:"0", text:'Inactivo'}));
      $('#myModalRol').modal('show');
  }
  function cargarTodoLosRoles(){
        myTable = $('#tblusuario').DataTable({
        initComplete: function () {
            jsRemoveWindowLoad();
        },
        ajax:{
            dataType: 'json',
            url:'../CAdm_usuarios/ListadodeRoles',
            type:'post',
            dataSrc:""
        }, 
        columns:[ 
            { data: 'id', render: function(value, type, full, meta) {
                  return '<td><center>'+
                         '<a href="javascript:void(0);" id="btnEliminar" onclick="EliminarRol('+full.rol_id+');" ><span class="glyphicon glyphicon-trash" ></span></a>'+
                         '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" id="btnMenueditar" onclick="EditarRol('+full.rol_id+');" ><span class="glyphicon glyphicon-pencil"></span></a>'+
                         '</center></td>'
                        }},
            { data:"titulo",        class:"textFont text-left"/*,      width: "20" */    },
            { data:"descripcion",       class:"textFont text-left"/*,      width: "100"*/    },        
            {data: 'id', render: function(value, type, full, meta) {
                  return '<td><center>'+
                         '<a href="javascript:void(0);" id="btnEliminar" onclick="CargarMenus('+full.rol_id+');" ><span class="glyphicon glyphicon-menu-hamburger" ></span></a>'+
                         '</center></td>'
                        }},
            { data:"estado",            class:"textFont text-left"/*,      width: "100"*/    }
        ],
        autoWidth: true,
        bDestroy: true
  });   
  }
  function EditarRol(id){
      $.ajax({
          type:'post',
          data:{rol_id:id},
          url:'../CAdm_usuarios/ObtenerRolEditar',
          success:function(response){
            var json = jQuery.parseJSON(response);
            AsignarValoresRol(json);
          }
      })
  }
  function AsignarValoresRol(json){
             $('#rol_idd').val(json.rol_id);
             $('#txtrol_id').val(json.rol_id);
             $('#accion').val(json.accion);
             $('#titulo').val(json.titulo);
             $('#descripcion').val(json.descripcion);
             $('#estado option').remove();
             $('#estado').append($('<option>', {value:"1", text:'Activo'}));
             $('#estado').append($('<option>', {value:"0", text:'Inactivo'}));
             if(json.estado!=undefined){
                 if(json.estado==1)
                    $('#estado option[value="1"]').attr("selected", "selected");
                else
                    $('#estado option[value="0"]').attr("selected", "selected");
             }
      $('#myModalRol').modal('show'); 
  }
 function EliminarRol(id){
   if(confirm('Desea Eliminar?')){
     $.ajax({
          type:'post',
          data:{rol_id:id},
          url:'../CAdm_usuarios/EliminarRol',
          success:function(response){
            cargarTodoLosUsuarios();
        }
      })   
  }
 }
 function CargarMenus(id){
 $.ajax({
          type:'post',
          data:{rol_id:id},
          url:'../CAdm_usuarios/ObtenerMenusporRol',
          success:function(response){
              console.log(response);
              var json2 = jQuery.parseJSON(response);
              var registrados = [];
              registrados=json2['registrados'];
            $('#disponibles').multiSelect('deselect_all');
            $.each(json2['todo'], function(j, resultado) {
               if(registrados.length>=0 && registrados.indexOf(resultado.menu_id) != -1){
                   $('#disponibles').append($('<option>').text(resultado.titulo).attr({value:resultado.menu_id,selected:'selected'}));
               }
               else{
                   $('#disponibles').append($('<option>').text(resultado.titulo).attr('value', resultado.menu_id));
               }
             });
            $('#disponibles').multiSelect({
                selectableHeader: "<div class='custom-header'><center><strong>MENU NO ASIGNADO</strong></center></div>",
                selectionHeader:  "<div class='custom-header'><center><strong>MENU ASIGNADO</strong></center></div>"
            });
            $('#rol_id').val(id);
            $('#myModal').modal('show'); 
        }
      })   
  }
</script>