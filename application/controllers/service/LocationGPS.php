<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class LocationGPS extends REST_Controller {

    function __construct()  {
        parent::__construct();
        $this->db_registro_desarrollo = $this->load->database('registro', true);
    }   

    public function UserLocationGPS_post(){

        /*$newId = NULL;        

        while(TRUE) {

            $newId = $this->getGuid($_POST['dateCreate']);

            $contador = $this->db_registro_desarrollo->select('varUserLocationGPSId')
                ->from('ENDES_UserLocationGPS')
                ->where('varUserLocationGPSId', $newId)
                ->get()->num_rows();

            if($contador == 0) {
                break;
            }
        }*/



        $data = array(
            'varUserLocationGPSId'  => $_POST['tabletId'].$_POST['dateCreate'], // generar su propia key.
            'varTabletId'           => $_POST['tabletId'],
            'varModel'              => $_POST['model'],
            'varSerie'              => $_POST['serie'],
            'varLatitude'           => $_POST['latitude'] == '' ? NULL : $_POST['latitude'],
            'varLongitude'          => $_POST['longitude'] == '' ? NULL : $_POST['longitude'],
            'varAltitude'           => $_POST['altitude'] == '' ? NULL : $_POST['altitude'],
            'varDateTablet'         => $_POST['dateCreate'],
            'varDateServer'         => $this->getDatetimeNow(),
            'intStatus'             => $_POST['status'],
            'varUserCreate'         => 'ServiceWeb',
            'varUserUpdate'         => NULL,
            'varDateCreate'         => $_POST['dateCreate'],
            'varDateUpdate'         => NULL,
            'varDeviceCreate'       => 'Model:'.$_POST['model'].' Serie:'.$_POST['serie'],
            'varDeviceUpdate'       => NULL,
            'bitRecordActive'       => 1
        );
        $this->db_registro_desarrollo->insert('ENDES_UserLocationGPS', $data);

        $this->response(NULL, REST_Controller::HTTP_OK);
    }

    public function getDatetimeNow() {
        $tz_object = new DateTimeZone('Peru/East');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        return $datetime->format('Y\-m\-d\ h:i:s');
    }

    /*public function getGuid($name, $namespace = null)  {       
        if(is_null($namespace))
            $namespace = $this->v4();
        
        if(empty($name))
            return FALSE;
        
        if( ! $this->is_valid($namespace)) 
            return FALSE;
        $nhex = str_replace(array('-','{','}'), '', $namespace);
        $nstr = '';
        for($i = 0; $i < strlen($nhex); $i+=2) {
            $nstr .= chr(hexdec($nhex[$i].$nhex[$i+1]));
        }
        $hash = md5($nstr . $name);
        return sprintf('%08s-%04s-%04x-%04x-%12s',
            substr($hash, 0, 8),
            substr($hash, 8, 4),
            (hexdec(substr($hash, 12, 4)) & 0x0fff) | 0x3000,
            (hexdec(substr($hash, 16, 4)) & 0x3fff) | 0x8000,
            substr($hash, 20, 12)
        );
    }

    public function v4($trim = false)  {
        
        $format = ($trim == false) ? '%04x%04x-%04x-%04x-%04x-%04x%04x%04x' : '%04x%04x%04x%04x%04x%04x%04x%04x';
        
        return sprintf($format,
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }

    public function v5($name, $namespace = null) {
        if(is_null($namespace))
            $namespace = $this->v4();
        
        if(empty($name))
            return FALSE;
        
        if( ! $this->is_valid($namespace)) 
            return FALSE;

        $nhex = str_replace(array('-','{','}'), '', $namespace);
        $nstr = '';

        for($i = 0; $i < strlen($nhex); $i+=2) {
            $nstr .= chr(hexdec($nhex[$i].$nhex[$i+1]));
        }
        $hash = sha1($nstr . $name);
        return sprintf('%08s-%04s-%04x-%04x-%12s',
            substr($hash, 0, 8),
            substr($hash, 8, 4),
            (hexdec(substr($hash, 12, 4)) & 0x0fff) | 0x5000,
            (hexdec(substr($hash, 16, 4)) & 0x3fff) | 0x8000,
            substr($hash, 20, 12)
        );
    }
    public function is_valid($uuid) {
        return preg_match('/^\{?[0-9a-f]{8}\-?[0-9a-f]{4}\-?[0-9a-f]{4}\-?[0-9a-f]{4}\-?[0-9a-f]{12}\}?$/i', $uuid) === 1;
    }*/
}
