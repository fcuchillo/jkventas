<?php

class MasterRegistroDAO {
    private $base='';
        function __construct() {
        $this->base = &get_instance();
        //var_dump("AQUI REGISTRO");
		$this->db_encuesta=$this->base->load->database('encuesta', false);
		//$this->db_encuesta->close();
		$this->db_registro = $this->base->load->database('registro', true);
    }
}
