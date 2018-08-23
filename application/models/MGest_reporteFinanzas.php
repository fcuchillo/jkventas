<?php
require_once 'application/core/Entities.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class MGest_reporteFinanzas extends CI_Model {
  public $id;
  public $anio;
  public $tipo;
  public $tipoDescripcion;  
  public $totalProductosC;
  public $totalMontoC;
  public $totalProductosV;
  public $totalMontoV;
  public $totalMontoI;
  public $totalMontoG;
  public $ventasMenosGastos;
  public $ingresosMenosGastos;
          
          
  
    function __construct() {
        parent::__construct();
        
    }
    
    function getAnio() {
        return $this->anio;
    }

    function setAnio($anio) {
        $this->anio = $anio;
    }

        
    function getId() {
        return $this->id;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getTipoDescripcion() {
        return $this->tipoDescripcion;
    }

    function getTotalProductosC() {
        return $this->totalProductosC;
    }

    function getTotalMontoC() {
        return $this->totalMontoC;
    }

    function getTotalProductosV() {
        return $this->totalProductosV;
    }

    function getTotalMontoV() {
        return $this->totalMontoV;
    }

    function getTotalMontoI() {
        return $this->totalMontoI;
    }

    function getTotalMontoG() {
        return $this->totalMontoG;
    }

    function getVentasMenosGastos() {
        return $this->ventasMenosGastos;
    }

    function getIngresosMenosGastos() {
        return $this->ingresosMenosGastos;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setTipoDescripcion($tipoDescripcion) {
        $this->tipoDescripcion = $tipoDescripcion;
    }

    function setTotalProductosC($totalProductosC) {
        $this->totalProductosC = $totalProductosC;
    }

    function setTotalMontoC($totalMontoC) {
        $this->totalMontoC = $totalMontoC;
    }

    function setTotalProductosV($totalProductosV) {
        $this->totalProductosV = $totalProductosV;
    }

    function setTotalMontoV($totalMontoV) {
        $this->totalMontoV = $totalMontoV;
    }

    function setTotalMontoI($totalMontoI) {
        $this->totalMontoI = $totalMontoI;
    }

    function setTotalMontoG($totalMontoG) {
        $this->totalMontoG = $totalMontoG;
    }

    function setVentasMenosGastos($ventasMenosGastos) {
        $this->ventasMenosGastos = $ventasMenosGastos;
    }

    function setIngresosMenosGastos($ingresosMenosGastos) {
        $this->ingresosMenosGastos = $ingresosMenosGastos;
    }

    
        
    
    public function ObtenerSPReporteFinanzas($parametros) {        
        return $this->db->query('CALL sp_prod_RerpoFinanzas(?,?)',[$parametros['anio'],$parametros['tipo']]);
    }  
    
    
    
     
}

