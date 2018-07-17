<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class TransferFile extends REST_Controller {

    function __construct()  {
        parent::__construct();
        $this->db_inquest_tablet = $this->load->database('encuesta', true);
        $this->db_registro_produccion = $this->load->database('registroProduccion', true);
    }

    public function uploadFileWebInquest_post(){
        
        /*# PARAMETROS DE TRANSFERENCIA DEL AÑO 2017 VERSION WEB 02/02/2018 (FCP)#*/
        /*
        $UploadDirectory = "/mnt/winXmlEncuesta2017/";
        $DecompressDirectory = "/mnt/winXmlEncuesta2017/";
        $PathExec = "//srv-fileserver/InfoEndesXml/Encuesta/Encuesta2017/";
        */
        
        /*# PARAMETROS DE TRANSFERENCIA DEL AÑO 2018 VERSION WEB 02/02/2018 (FCP)#*/
        $UploadDirectory = "/mnt/winXmlEncuesta2018/";
        $DecompressDirectory = "/mnt/winXmlEncuesta2018/";
        $PathExec = "//srv-fileserver/InfoEndesXml/Encuesta/Encuesta2018/";
        

        foreach ($_FILES['uploadFiles']['name'] as $f => $name) {
            if(isset($_FILES["uploadFiles"]) && $_FILES["uploadFiles"]["error"][$f]== UPLOAD_ERR_OK) {
                $File_Name = basename($_FILES['uploadFiles']['name'][$f]);
                $File_Ext = substr($File_Name, strrpos($File_Name, '.'));
                if($File_Ext == '.zip'){
                    if(move_uploaded_file($_FILES['uploadFiles']['tmp_name'][$f], $UploadDirectory.$File_Name)) {
                        $zip = new ZipArchive;
                        if ($zip->open(realpath($UploadDirectory.$File_Name)) === TRUE) {
                            $zip->extractTo($DecompressDirectory);
                            $zip->close();
                            unlink($UploadDirectory.$File_Name);    
                            $parameter = array(
                                'RUTA' => $PathExec.str_replace(".zip", ".xml", $File_Name),
                                'NOMBREXML' => str_replace(".zip", ".xml", $File_Name),
                                'INDEXXML' => $this->countIndexXml($DecompressDirectory.str_replace(".zip", ".xml", $File_Name)),
                                'USUARIOEVALUADOR' => $_POST['userEvaluator'],
                                'MODOENVIO' => 'WEB'
                            );

                            if($this->execUploadInquestXml($parameter)){
                                echo json_encode(array('Subido correctamente'));
                            }
                            else{
                                $this->response(NULL, REST_Controller::HTTP_NOT_FOUND);
                            }
                        } else {
                            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
                        }                        
                    } else {
                            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
                    }
                }
            }
        }
    }

    public function uploadFileForAndroid3_post(){
        //$UploadDirectory = "/mnt/winXmlEndes2016/";
        //$DecompressDirectory = "/mnt/winXmlEndes2016/";
        //$PathExec = "//srv-fileserver/InfoEndesXml/Encuesta/Piloto/";

        /*# PARAMETROS DE TRANSFERENCIA DEL AÑO 2017 VERSION MOBIL 02/02/2018 (FCP)#*/
        /*$UploadDirectory = "/mnt/winXmlEncuesta2017/";
        $DecompressDirectory = "/mnt/winXmlEncuesta2017/";
        $PathExec = "//srv-fileserver/InfoEndesXml/Encuesta/Encuesta2017/";
        */

        /*# PARAMETROS DE TRANSFERENCIA DEL AÑO 2018 VERSION MOBIL 02/02/2018 (FCP)#*/
        $UploadDirectory = "/mnt/winXmlEncuesta2018/";
        $DecompressDirectory = "/mnt/winXmlEncuesta2018/";
        $PathExec = "//srv-fileserver/InfoEndesXml/Encuesta/Encuesta2018/";
        

        if(isset($_FILES["uploadFiles"]) && $_FILES["uploadFiles"]["error"]== UPLOAD_ERR_OK) {
            $File_Name = basename($_FILES['uploadFiles']['name']);
            $File_Ext = substr($File_Name, strrpos($File_Name, '.'));
            if($File_Ext == '.zip'){
                if(move_uploaded_file($_FILES['uploadFiles']['tmp_name'], $UploadDirectory.$File_Name)) {
                    $zip = new ZipArchive;
                    if ($zip->open(realpath($UploadDirectory.$File_Name)) === TRUE) {
                        $zip->extractTo($DecompressDirectory);
                        $zip->close();

                        unlink($UploadDirectory.$File_Name);
                        
                        $parameter = array(
                            'RUTA' => $PathExec.str_replace(".zip", ".xml", $File_Name),
                            'NOMBREXML' => str_replace(".zip", ".xml", $File_Name),
                            'INDEXXML' => $this->countIndexXml($DecompressDirectory.str_replace(".zip", ".xml", $File_Name)),
                            'USUARIOEVALUADOR' => $_POST['userEvaluator'],
                            'MODOENVIO' => 'MOBIL'
                        );

                        if($this->execUploadInquestXml($parameter)){

                            echo "sucess";
                        }
                        else{
                            echo "error";
                        }
                        //echo "archivos subidos correctamente";
                        //$this->set_response(['status' => OK, 'message' => 'El archivo se subio correctamente'], REST_Controller::HTTP_OK);
                    } else {
                        echo "directorio no se encuentra";
                        //$this->set_response(['status' => ERROR,'message' => 'No Existe el Directorio y/o el archivo'], REST_Controller::HTTP_BAD_REQUEST);

                    }                        
                } else {
                        echo "no se pudo subir el archivo";
                        //$this->set_response(['status' => ERROR,'message' => 'No se pudo subir el Archivo : '.$File_Name], REST_Controller::HTTP_BAD_REQUEST);
                }
            }
        }
    }


    public function uploadFileAndroidRegistry_post(){

        $uploadDirectoryRegistry = '/mnt/Endes2018Xml/';

        $uploadDirectoryRegistryMappingIMG = '/mnt/EndesXml2018Cartografia/';        
        //$uploadDirectoryRegistryEstableShipmentIMG = '/mnt/EndesXmlEstablec/';
        $uploadDirectoryRegistryLegajosIMG = '/mnt/EndesXml2018Legajos/';

        $descompressDirectoryRegistryMappingIMG = '/mnt/EndesXml2018Cartografia/';
        //$descompressDirectoryRegistryEstableShipmentIMG = '/mnt/EndesXmlEstablec/';        
        $descompressDirectoryRegistryLegajosIMG = '/mnt/EndesXml2018Legajos/';

        $descompressDirectoryRegistry = '/mnt/Endes2018Xml/';
        
        $PathExec = "//srv-fileserver/InfoEndesXml/Registro/Registro2018/Xml/";

        $zip = new ZipArchive;

            if(isset($_FILES["uploadFiles"]) && $_FILES["uploadFiles"]["error"]== UPLOAD_ERR_OK) {
                $File_Name = basename($_FILES['uploadFiles']['name']);
                $File_Ext = substr($File_Name, strrpos($File_Name, '.'));
                if($File_Ext == '.zip'){

                     /*Region Legajo*/
                        //SE MODIFICO PARA EL AÑO 2018
                        //if(substr($File_Name, 0, 4) == '2016' || substr($File_Name, 0, 4) == '2017'){
                        //
                        if(substr($File_Name, 0, 4) == '2018'){
                            if(move_uploaded_file($_FILES['uploadFiles']['tmp_name'], $uploadDirectoryRegistryLegajosIMG.$File_Name)){
                                if ($zip->open(realpath($uploadDirectoryRegistryLegajosIMG.$File_Name)) === TRUE) {
                                    $zip->extractTo($descompressDirectoryRegistryLegajosIMG);
                                    $zip->close();
                                    unlink($uploadDirectoryRegistryLegajosIMG.$File_Name);            
                                    $this->response(NULL, REST_Controller::HTTP_OK);
                                }else{
                                    $this->response(NULL, REST_Controller::HTTP_NOT_FOUND);
                                }
                            }else{
                                $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
                            }
                        }

                    /*Region IMG*/
                    if($File_Name[11] != '0'){
                        /*Region Cartografia*/
                        if(substr($File_Name, 0, 3) == 'C01'){
                            if(move_uploaded_file($_FILES['uploadFiles']['tmp_name'], $uploadDirectoryRegistryMappingIMG.$File_Name)){
                                if ($zip->open(realpath($uploadDirectoryRegistryMappingIMG.$File_Name)) === TRUE) {
                                    $zip->extractTo($descompressDirectoryRegistryMappingIMG);
                                    $zip->close();
                                    unlink($uploadDirectoryRegistryMappingIMG.$File_Name);
                                    $this->response(NULL, REST_Controller::HTTP_OK);
                                }else{
                                    $this->response(NULL, REST_Controller::HTTP_NOT_FOUND);
                                }
                            }else{
                                $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
                            }
                        }
                        /*Region Establecimiento*/
                       // SE QUITO LA PARTE DE ESTABLECIMIENTO DEBIDO A QUE YA NO SE ENVIARAN IMAGENES DE ESTABLECIMIENTOS
                       /* if(substr($File_Name, 0, 3) == 'V01' || substr($File_Name, 0, 3) == 'V02'){
                            if(move_uploaded_file($_FILES['uploadFiles']['tmp_name'], $uploadDirectoryRegistryEstableShipmentIMG.$File_Name)){
                                if ($zip->open(realpath($uploadDirectoryRegistryEstableShipmentIMG.$File_Name)) === TRUE) {
                                    $zip->extractTo($descompressDirectoryRegistryEstableShipmentIMG);
                                    $zip->close();
                                    unlink($uploadDirectoryRegistryEstableShipmentIMG.$File_Name);
                                    $this->response(NULL, REST_Controller::HTTP_OK);
                                }else{
                                    $this->response(NULL, REST_Controller::HTTP_NOT_FOUND);
                                }
                            }else{
                                $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
                            }
                        }*/
                    }

                    /*Region XML*/
                    if($File_Name[11] == '0' && strlen($File_Name) == 16){
                        if(move_uploaded_file($_FILES['uploadFiles']['tmp_name'],$uploadDirectoryRegistry.$File_Name)) {
                            if ($zip->open(realpath($uploadDirectoryRegistry.$File_Name)) === TRUE) {
                                $zip->extractTo($descompressDirectoryRegistry);
                                $zip->close();
                                unlink($uploadDirectoryRegistry.$File_Name);
                                $parameter = array(
                                    'RUTA' => $PathExec.str_replace(".zip", ".xml", $File_Name),
                                    'NOMBREXML' => str_replace(".zip", ".xml", $File_Name),
                                    'INDEXXML' => 0,
                                    'USUARIOEVALUADOR' => $_POST['userEvaluator'],
                                    'MODOENVIO' => $_POST['appVersion']
                                );
                                if($this->execUploadRegistryXml($parameter)){
                                    $this->response(NULL, REST_Controller::HTTP_OK);
                                }
                                else{
                                    $this->response(NULL, REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                                }
                            } else {
                                $this->response(NULL, REST_Controller::HTTP_NOT_FOUND);
                            }
                        }else{
                            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
                        }
                    }
                }
            }

    }

    public function uploadFileRegistryWeb_post(){

        $out = array('error'=>null);

        $uploadDirectoryRegistry = '/mnt/Endes2018Xml/';

        $uploadDirectoryRegistryMappingIMG = '/mnt/EndesXml2018Cartografia/';        
        //$uploadDirectoryRegistryEstableShipmentIMG = '/mnt/EndesXmlEstablec/';
        $uploadDirectoryRegistryLegajosIMG = '/mnt/EndesXml2018Legajos/';

        $descompressDirectoryRegistryMappingIMG = '/mnt/EndesXml2018Cartografia/';
        //$descompressDirectoryRegistryEstableShipmentIMG = '/mnt/EndesXmlEstablec/';        
        $descompressDirectoryRegistryLegajosIMG = '/mnt/EndesXml2018Legajos/';

        $descompressDirectoryRegistry = '/mnt/Endes2018Xml/';

       
        $PathExec = "//srv-fileserver/InfoEndesXml/Registro/Registro2018/Xml/";

        $zip = new ZipArchive;

        foreach ($_FILES['uploadFiles']['name'] as $f => $name) {
            if(isset($_FILES["uploadFiles"]) && $_FILES["uploadFiles"]["error"][$f]== UPLOAD_ERR_OK) {
                $File_Name = basename($_FILES['uploadFiles']['name'][$f]);
                $File_Ext = substr($File_Name, strrpos($File_Name, '.'));
                if($File_Ext == '.zip'){

                    /*Region Legajo*/
                        //SE MODIFICO PARA EL AÑO 2018
                        //if(substr($File_Name, 0, 4) == '2016' || substr($File_Name, 0, 4) == '2017'){
                        //
                        if(substr($File_Name, 0, 4) == '2018'){
                            if(move_uploaded_file($_FILES['uploadFiles']['tmp_name'][$f], $uploadDirectoryRegistryLegajosIMG.$File_Name)){
                                if ($zip->open(realpath($uploadDirectoryRegistryLegajosIMG.$File_Name)) === TRUE) {
                                    $zip->extractTo($descompressDirectoryRegistryLegajosIMG);
                                    $zip->close();
                                    unlink($uploadDirectoryRegistryLegajosIMG.$File_Name);            
                                    echo json_encode(array('Subido correctamente'));
                                }else{
                                    $this->response(NULL, REST_Controller::HTTP_NOT_FOUND);
                                }
                            }else{
                                $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
                            }
                        }
                        

                    /*Region IMG*/
                    if($File_Name[11] != '0'){
                        /*Region Cartografia*/
                        if(substr($File_Name, 0, 3) == 'C01'){
                            if(move_uploaded_file($_FILES['uploadFiles']['tmp_name'][$f], $uploadDirectoryRegistryMappingIMG.$File_Name)){
                                if ($zip->open(realpath($uploadDirectoryRegistryMappingIMG.$File_Name)) === TRUE) {
                                    $zip->extractTo($descompressDirectoryRegistryMappingIMG);
                                    $zip->close();
                                    unlink($uploadDirectoryRegistryMappingIMG.$File_Name);
                                    echo json_encode(array('Subido correctamente'));
                                }else{
                                    $this->response(NULL, REST_Controller::HTTP_NOT_FOUND);
                                }
                            }else{
                                $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
                            }
                        }
                        /*Region Establecimiento*/
                        // SE QUITO LA PARTE DE ESTABLECIMIENTO DEBIDO A QUE YA NO SE ENVIARAN IMAGENES DE ESTABLECIMIENTOS
                        /*if(substr($File_Name, 0, 3) == 'V01' || substr($File_Name, 0, 3) == 'V02'){
                            if(move_uploaded_file($_FILES['uploadFiles']['tmp_name'][$f], $uploadDirectoryRegistryEstableShipmentIMG.$File_Name)){
                                if ($zip->open(realpath($uploadDirectoryRegistryEstableShipmentIMG.$File_Name)) === TRUE) {
                                    $zip->extractTo($descompressDirectoryRegistryEstableShipmentIMG);
                                    $zip->close();
                                    unlink($uploadDirectoryRegistryEstableShipmentIMG.$File_Name);
                                    echo json_encode(array('Subido correctamente'));
                                }else{
                                    $this->response(NULL, REST_Controller::HTTP_NOT_FOUND);
                                }
                            }else{
                                $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
                            }
                        }*/

                    }

                    /*Region XML*/
                    if($File_Name[11] == '0' && strlen($File_Name) == 16){
                        if(move_uploaded_file($_FILES['uploadFiles']['tmp_name'][$f], $uploadDirectoryRegistry.$File_Name)) {
                            if ($zip->open(realpath($uploadDirectoryRegistry.$File_Name)) === TRUE) {
                                $zip->extractTo($descompressDirectoryRegistry);
                                $zip->close();
                                unlink($uploadDirectoryRegistry.$File_Name);
                                $parameter = array(
                                    'RUTA' => $PathExec.str_replace(".zip", ".xml", $File_Name),
                                    'NOMBREXML' => str_replace(".zip", ".xml", $File_Name),
                                    'INDEXXML' => 100,
                                    'USUARIOEVALUADOR' => $_POST['userEvaluator'],
                                    'MODOENVIO' => 'WEB'
                                );

                                if($this->execUploadRegistryXml($parameter)){
                                    echo json_encode(array('Subido correctamente'));
                                }
                                else{
                                    $this->response(NULL, REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                                }
                            } else {
                                $this->response(NULL, REST_Controller::HTTP_NOT_FOUND);
                            }
                        }else{
                            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
                        }
                    }
                }
            }
        }
    }

    private function execUploadRegistryXml($parameter){
        $this->db_registro_produccion->query("EXEC [USP_TRANSFERIR_DATA_WEB_DIVIES_NEW] N'".$parameter['RUTA']."', N'".$parameter['NOMBREXML']."', N'".$parameter['INDEXXML']."', N'".$parameter['USUARIOEVALUADOR']."', N'".$parameter['MODOENVIO']."'"); 
        return true;
    }
    private function countIndexRegistryXml(){
            return 10;
    }
    private function execUploadInquestXml($parameter){
        $this->db_inquest_tablet->query("EXEC [PBLUE_ENCUESTA_REPORTE01] N'".$parameter['RUTA']."', N'".$parameter['NOMBREXML']."', N'".$parameter['INDEXXML']."', N'".$parameter['USUARIOEVALUADOR']."', N'".$parameter['MODOENVIO']."'");
        return true;
    }
    private function countIndexXml($path){
        $xml = simplexml_load_file($path);        
        return $xml->Caratula['cantidad'];
    }
   
}
