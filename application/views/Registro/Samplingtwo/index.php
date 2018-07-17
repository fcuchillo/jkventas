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
                <table id="surveyResult" class="table table-condensed table-striped" data-toggle="table" >
                    <thead id="surveyResultHead">
                        <tr class="info">
                            <th align="center">Año</th>
                            <th align="center">Vivienda</th>
                            <th align="center">Mz</th>
                            <th align="center">Codccpp</th>
                            <th align="center">Hogar</th>
                            <th align="center">Jefe Hogar Registro (2015)</th>
                            <th align="center">Jefe Hogar Encuesta</th>
                            <th align="center">Direcc. Vivienda</th>
                            <th align="center">Parentesco</th>
                            <th align="center">Sexo</th>
                            <th align="center">Revisado</th>
                        </tr>            
                    </thead>
                </table>
            </div>
        </div>
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title" id="cpv301title"></h3>  
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
            </div>
            <div class="box-body">
                <table id="cpv301Result" class="table table-condensed table-striped" data-toggle="table" >
                    <thead id="cpv301ResultHead">
                        <tr class="info">
                            <th align="center">Registro</th>
                            <th align="center">Jefe Hogar Registro (2017)</th>
                            <th align="center">Trabajado Año Anterior</th>
                            <th align="center">Dirección</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>        
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title" id="resulttitles"></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
            </div>
            <div class="box-body">
                <table id="registryResult" class="table table-condensed table-striped" data-toggle="table" >
                    <thead id="registryResultHead">
                        <tr class="info">
                            <th><center>Manzana</center></th>
                            <th><center>CCPP</center></th>
                            <th><center>Vivienda (2018)</center></th>
                            <th><center>Jefe Hogar Registro (2018)</center></th>
                            <th><center>Tipo Via</center></th>
                            <th><center>P20_O</center></th>
                            <th><center>Via</center></th>
                            <th><center>Puerta</center></th>
                            <th><center>L. Puerta</center></th>
                            <th><center>Block</center></th>
                            <th><center>MZ</center></th>
                            <th><center>Lote</center></th>
                            <th><center>Interior</center></th>
                            <th><center>Trabajado Año Anterior</center></th>
                            <th><center>Id. Consis</center></th>
                        </tr>            
                    </thead>
                    <tfoot>
                        <tr>
                            <th><center>Manzana</center></th>
                            <th><center>CCPP</center></th>
                            <th><center>Vivienda (2018)</center></th>
                            <th><center>Jefe Hogar Registro (2018)</center></th>
                            <th><center>Tipo Via</center></th>
                            <th><center>P20_O</center></th>
                            <th><center>Via</center></th>
                            <th><center>Puerta</center></th>
                            <th><center>L. Puerta</center></th>
                            <th><center>Block</center></th>
                            <th><center>MZ</center></th>
                            <th><center>Lote</center></th>
                            <th><center>Interior</center></th>
                           <th><center>Trabajado Año Anterior</center></th>
                           <th><center>Id. Consis</center></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <!--End Region Box Result-->
    </section>
    <!--End Region Section Box-->
</div>
<!--End Region Body-->

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

<!--Region Scripts-->
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/content/js/registro/samplingtwo.js"></script>
<!--End Region Scripts-->