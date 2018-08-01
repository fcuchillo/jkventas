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
                <table id="tblusuario" class="table table-condensed table-striped" data-toggle="table" >
                    <thead id="tblusuariocabecera">
                        <tr class="info">
                            <th align="center"><center><a href="javascript:void(0);" onclick="AgregarUsuario();"><span class="glyphicon glyphicon-plus"></span></a></center></th>
                            <th align="center">Usuario</th>
                            <th align="center">Clave</th>
                            <th align="center">Rol</th>
                            <th align="center">Estado</th>
                            <th align="center">Observacion</th>
                        </tr>            
                    </thead>
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
                <h4 class="modal-title" id="popuptitle">MANTENIMIENTO DE USUARIO</h4>
            </div>
            <div class="modal-body">
                <form id="frmUsuario" name="frmUsuario">
                    <input type="hidden" id="usuario_id" name="usuario_id" value="">
                    <input type="hidden" class="form-control" value="" name="accion" id="accion">
                    <div class="form-group">
                        <label class="col-sm-12 col-form-label col-form-label-sm">LLave del Usuario</label>
                        <input type="text" class="form-control" class="input-group input-group-sm" value="" name="txtusuario" id="txtusuario" disabled>
                    </div>
                        <div class="form-group">
                            <label class="col-sm-12 col-form-label col-form-label-sm">Nombre de Usuario</label>
                            <input type="text" class="form-control required" class="input-group input-group-sm" value="" name="usuario" id="usuario" required>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12 col-form-label col-form-label-sm">Clave</label>
                            <input type="password" class="form-control required" value="" name="clave" id="clave" required>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12 col-form-label col-form-label-sm">Estado</label>
                            <select class="form-control input-sm" name="estado" id="estado"></select>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12 col-form-label col-form-label-sm">Observacion</label>
                            <textarea id="observacion" name="observacion" class="form-control input-sm" rows="3" cols="5" maxlength="100"></textarea>
                        </div>
                    
               </form>
            </div>
            <div class="modal-footer"> 
                <button type="button" class="btn btn-primary btn-responsive " data-dismiss="modal" >Close</button>
                <button type="submit" class="btn btn-primary btn-responsive " id="btnGuardar">Guardar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="myRolModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title" id="popuptitle">Rol de Usuario</h4>
            </div>
            <div class="modal-content">
                <div class="modal-body">
                    <form class="form" name="formRol" method="POST">
                        <input type="hidden" value="" id="usuario_idd" name="usuario_idd">
                        <select class="form-control" name="rol_id" id="rol_id">
                        </select>
                   </form>
                </div>
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
    cargarTodoLosUsuarios();
    $('#btnMenueditar').click(function(){
//        $('#myModal').modal('show'); 
        alert('hiciste click');
    });
    $('#btnGuardar').click(function(){
        GuardarUsuario();
    });
    $('#btnGuardarRol').click(function(){
       GuardarRolSeleccionadoPorUsuario(); 
    });
  });
  
  function GuardarUsuario(){
       var form = $("#frmUsuario");
       var data = form.serialize();
//       console.log(data);
       //enviar datos en json
       //var formData = JSON.stringify($("#frmMenu").serializeArray());
        $.ajax({
          type:'post',
          data:data,
          url:'../Usuarios/EditarUsuario',
          success:function(response){
            $('#myModal').modal('hide'); 
            cargarTodoLosUsuarios();
          }
      })
  }
  function AgregarUsuario(){
      $.ajax({
          type:'post',
//          data:data,
          url:'../Usuarios/AgregarUsuario',
          success:function(response){
             var json = jQuery.parseJSON(response);
             AsiganciondeValores(json);
          }
      })
  }
  function AsiganciondeValores(json){
             $('#usuario_id').val(json.usuario_id);
             $('#txtusuario').val(json.usuario_id);
             $('#accion').val(json.accion);
             $('#usuario').val(json.usuario);
             $('#observacion').val(json.observacion);
             $('#estado option').remove();
             $('#estado').append($('<option>', {value:"1", text:'Activo'}));
             $('#estado').append($('<option>', {value:"0", text:'Inactivo'}));
             if(json.estado!=undefined){
                 if(json.estado==1)
                    $('#estado option[value="1"]').attr("selected", "selected");
                else
                    $('#estado option[value="0"]').attr("selected", "selected");
             }
             $('#myModal').modal('show'); 
  }
  function cargarTodoLosUsuarios(){
        myTable = $('#tblusuario').DataTable({
        initComplete: function () {
            jsRemoveWindowLoad();
        },
        ajax:{
            dataType: 'json',
            url:'../Usuarios/Listadodeusuarios',
            type:'post',
            dataSrc:""
        }, 
        columns:[ 
            { data: 'id', render: function(value, type, full, meta) {
                  return '<td><center>'+
                         '<a href="javascript:void(0);" id="btnEliminar" onclick="EliminarUsuario('+full.usuario_id+');" ><span class="glyphicon glyphicon-trash" ></span></a>'+
                         '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" id="btnMenueditar" onclick="EditarUsuario('+full.usuario_id+');" ><span class="glyphicon glyphicon-pencil"></span></a>'+
                         '</center></td>'
                        }  
             },
            { data:"usuario",           class:"textFont text-left",order:false/*,      width: "20" */    },
            { data:"clave",             class:"textFont text-left"/*,      width: "100"*/    },
            {data: 'id', render: function(value, type, full, meta) {
                  return '<td><center>'+
                         '<a href="javascript:void(0);" onclick="CargarRol('+full.usuario_id+');" ><span class="glyphicon glyphicon-menu-hamburger" ></span></a>'+
                         '</center></td>'
                    }
            },
            { data:"estado",            class:"textFont text-left"/*,      width: "100"*/    },
            { data:"observacion",       class:"textFont text-left"/*,      width: "80" */    }
        ],
        columnDefs: [
        { "orderable": false, "targets": 0 }
        ],
        autoWidth: true,
        bDestroy: true
  });   
  }
  function EditarUsuario(id){
      $.ajax({
          type:'post',
          data:{usuario_id:id},
          url:'../Usuarios/ObtenerUsuario',
          success:function(response){
              var json = jQuery.parseJSON(response);
              AsiganciondeValores(json);
          }
      })
  }
 function EliminarUsuario(id){
   if(confirm('Desea Eliminar?')){
     $.ajax({
          type:'post',
          data:{usuario_id:id},
          url:'../Usuarios/EliminarUsuario',
          success:function(response){
            cargarTodoLosUsuarios();
        }
      })   
  }
 }
 function CargarRol(usuario_id){
    $.ajax({
          type:'post',
          data:{usuario_id:usuario_id},
          url:'../Usuarios/CargadodeRol',
          success:function(response){
              console.log(response);
              var json2 = jQuery.parseJSON(response);
              var registrados = [];
              registrados=json2['rol'];
//              console.log(registrados.rol_id);
              $('#rol_id option').remove();
              $('#rol_id').append($('<option>').text('Ninguno').attr({value:-1}));
              $.each(json2['todo'], function(j, resultado) {
                  if(registrados.rol_id==resultado.rol_id){
                   $('#rol_id').append($('<option>').text(resultado.titulo).attr({value:resultado.rol_id,selected:'selected'}));
               }
               else{
                  $('#rol_id').append($('<option>').text(resultado.titulo).attr({value:resultado.rol_id}));
               }
             });
             $('#usuario_id').val(usuario_id);
             $('#myRolModal').modal('show');
        }
    })
}
function GuardarRolSeleccionadoPorUsuario(){
   var rol_id=$('#rol_id').val();
   var usuario_id= $('#usuario_idd').val();
    $.ajax({
          type:'post',
          url:'../Usuarios/AsignacionRoles',
          data:{rol_id:rol_id,usuario_id:usuario_id},
          success:function(response){
            $('#myRolModal').modal('hide'); 
            cargarTodoLosUsuarios();
          }
      })   
  }
</script>