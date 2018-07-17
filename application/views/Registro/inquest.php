
<div class="content-wrapper">

    <section class="content-header">
        <h1>Encuesta</h1>
        <ol class="breadcrumb">
            <li><a href="../login/usuarioLogin"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Encuesta</a></li>
            <li class="active">Encuesta</li>
        </ol>
    </section>

    <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">se guardaran en : /mnt/winXmlRegistro/</h3>
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
/* global alertify */

$(document).ready(function () {
      
    $("#uploadFiles").fileinput({
        language:'es',
        //uploadUrl: "http://172.17.10.110/PyENDES_DESARROLLO/index.php/service/transferfile/uploadFileForAndroid",
        uploadUrl: "http://webinei.inei.gob.pe/desarrollo/PyENDES/service/TransferFile/uploadFileAndroidRegistry",
        //uploadUrl : "http://localhost:4000/PyENDES/service/TransferFile/uploadFileForAndroid",
        //uploadUrl: "uploadFilesInquest",
        uploadAsync: true,
        maxFileCount: 5,
        allowedFileExtensions : ['zip'],
    });
});
</script>
