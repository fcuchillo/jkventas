
<div class="content-wrapper">

    <section class="content-header">
        <h1>Registro</h1>
        <ol class="breadcrumb">
            <li><a href="<?=base_url()?>login/authentication"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Registro</a></li>
            <li class="active">Registro</li>
        </ol>
    </section>

    <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Seleccionar Archivos</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>            
                <div class="box-body">
                    <div class="row">             
                        <div class="col-md-12">
                            <input type="file" name="uploadFiles[]" id="uploadFiles" required="required" multiple class="file-loading">                       
                        </div>
                    </div>
                </div>
            </div>
                     
    </section>  
        
</div>

<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script>
$(document).ready(function () {
      
    $("#uploadFiles").fileinput({
        language:'es',
        uploadUrl: "http://webinei.inei.gob.pe/desarrollo/PyENDES/service/TransferFile/uploadFileRegistryWeb",
        //uploadUrl: "http://webinei.inei.gob.pe/PyENDES/service/TransferFile/uploadFileRegistryWeb",
        uploadAsync: true,
        maxFileCount: 100,
        allowedFileExtensions : ['zip'],
        uploadExtraData: { userEvaluator : $('#clave').val() }
    });
});
</script>
