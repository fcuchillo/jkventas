<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class LocationGPSRegistro extends REST_Controller {                                                                                

    function __construct()  {
        parent::__construct();
        $this->db_encuesta_captura = $this->load->database('encuesta', true);
    }   

    public function UserLocationGPSRegistro_post(){

        $id_tablet=$this->input->post('tabletId');
              
      // echo json_encode($id_tablet);
       if($id_tablet!=null){
            $get_data_bd=$this->getExistsUserIntoDataBase($id_tablet);
            if($get_data_bd!=null){
                $data = array(
                    'USUARIO_ID'    => $get_data_bd[0]->USUARIO_ID,
                    'CARGO_ID'      => $get_data_bd[0]->CARGO_ID,
                    'EQUIPO_ID'     => $get_data_bd[0]->EQUIPO_ID,
                    'CCDD'          => $get_data_bd[0]->ODEI,
                    'TABLET_ID'     => $id_tablet,
                    'ESTADO_ID'     => $this->input->post('status'),
                    'CONGLOMERADO'  => $this->input->post('conglomerado'),
                    'CODCCPP'       => $this->input->post('codccpp'),
                    'MANZANA_ID'    => $this->input->post('manzana_id'),
                    'FRENTE'         => $this->input->post('frente'),
                    'FECHA_TABLET'  => $this->input->post('dateCreate'),
                    'FECHA_SERVIDOR'=> $this->getDatetimeNow(),
                    'LATITUD'       => $this->input->post('latitude') == '' ? NULL : $this->input->post('latitude'),
                    'LONGITUD'      => $this->input->post('longitude') == '' ? NULL : $this->input->post('longitude'),
                    'ALTITUD'       => $this->input->post('altitude') == '' ? NULL : $this->input->post('altitude'),
                    'BATERIA'       => $this->input->post('bateria'),
                    'TEM_BATERIA'   => $this->input->post('temp_bateria'),
                    'CONEXION'      => $this->input->post('conexion'),
                    'APK_VERSION'   => $this->input->post('apk_version'),
                    'MODEL'         => $this->input->post('model'),
                    'SERIE'         => $this->input->post('serie'),
                    'ANIO'          => $this->getYear(),
                );

                $this->db_encuesta_captura->insert('T_REG_CAPT_GEOLOCALIZACION', $data);

                $this->response(NULL, REST_Controller::HTTP_OK);
            }
            else{
                    $this->response(NULL,REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                }
        }       
        else{
                $this->response(NULL,REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }   
    }

    public function getDatetimeNow() {
        $tz_object = new DateTimeZone('Peru/East');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        return $datetime->format('Y\-m\-d\ H:i:s');
    }
    public function getYear() {
            $tz_object = new DateTimeZone('Peru/East');
            $datetime = new DateTime();
            $datetime->setTimezone($tz_object);
            return $datetime->format('Y');
    }
   public function getExistsUserIntoDataBase($tabletId){
      $user_id=$this->db_encuesta_captura->select('ID')
                                  ->from('T_ENDES_USUARIO')
                                  ->where('TABLET_ID',$tabletId)
                                  ->get()->result();

        if($user_id[0]->ID!=null){
            $data = $this->db_encuesta_captura->select('*')
                                              ->from('T_ENDES_USUARIO_EQUIPO')
                                              ->where('USUARIO_ID',$user_id[0]->ID)
                                              ->where('ANIO',$this->getYear())
                                              ->get()->result();
            return $data;
        }
        else{
            return null;
        }
    }
}
