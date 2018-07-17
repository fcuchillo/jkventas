<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

interface PyENDES_EncuestaCore{
	public function ObtenerMenuparaUsuario($usuario);
	public function ObtenerTodosModulos($usuario);
    public function obtenerPeriodosDBEncuesta();
    public function obtenerAniosDBEncuesta();
    public function obtenerMesesDBEncuesta();
    public function obtenerDptosDBEncuesta();
    public function obtenerEquipoDBEncuesta();
}