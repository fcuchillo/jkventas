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
                <h4 class="modal-title" id="popuptitle"></h4>
            </div>
            <div id="data-usuario"></div>
<!--            <div class="modal-body">
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
            </div>-->
            <div class="modal-content"> 
                <div class="modal-header">
                    <button type="button" class="btn btn-block btn-danger btn-sm" id="btnGuardar" name="btnGuardar">Aceptar</button>
                </div> 
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
    
  });
  
  function GuardarUsuario(){
       var form = $("#frmMenu");
       var data = form.serialize();
       //enviar datos en json
       //var formData = JSON.stringify($("#frmMenu").serializeArray());
        $.ajax({
          type:'post',
          data:data,
          url:'../Usuarios/EditarUsuario',
//        dataType: 'json',
//        contentType: 'application/json',
          success:function(response){
//            console.log(response);
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
            $('#myModal').modal('show'); 
            $('#data-usuario').html(response);
          }
      })
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
                        }  },
            { data:"usuario",           class:"textFont text-left",order:false/*,      width: "20" */    },
            { data:"clave",             class:"textFont text-left"/*,      width: "100"*/    },
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
            $('#myModal').modal('show'); 
            $('#data-usuario').html(response);
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
</script>