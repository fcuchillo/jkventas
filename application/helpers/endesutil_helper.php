<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//include_once 'application/PyENDES_Export/PyENDES_Exp_Type.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of endesutil
 *
 * @author locador235dnce
 */
 function data_output ($data){
    $fields= array();
   	      	foreach($data as $key => $value) {
	            $row= array();
			     foreach ($value as $keyvalue => $valuedata) {
				            if($valuedata!=null && is_string($valuedata)){
				               $row[$keyvalue] = utf8_encode($valuedata);
				               }
				            else {
				                $row[$keyvalue] = $valuedata;
				              }
			              
			      }
	      		$fields[]=$row;
	    	} 
        return $fields;
    }


if (!function_exists('descargarZipEncuesta')) {
    
    function descargarZipEncuesta($nombreZip = '') {

    	$rutaEncuesta = '/mnt/winXmlEncuesta2016/';
		$archivoxml = str_replace("zip", "xml", $nombreZip);

		//if (file_exists($rutaEncuesta.$archivoxml)) {

			$zip = new ZipArchive(); 
		    $zip->open($nombreZip, ZipArchive::CREATE);
		    $zip->addFile($rutaEncuesta.$archivoxml, $archivoxml);
		    $zip->close();
		        
		    header("Content-type: application/octet-stream");
		    header("Content-disposition: attachment; filename=".$nombreZip);
		    readfile($nombreZip);

		    unlink($nombreZip);  
		//}

    }   
}
