<?php

class MasterEncuestaDao {
    private $base='';
    public $jkventas_bd='';

    //public $helper='';
        function __construct() {
        $this->base = &get_instance();
        $this->base->load->library('session');

    }
  public function Activarjkventas_bd($bool){
		$this->jkventas_bd=$this->base->load->database('jkventas', $bool);
		return $this->jkventas_bd;
  }
}
