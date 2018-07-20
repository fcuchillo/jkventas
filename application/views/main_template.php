<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$this->load->view('layout/header',$title);
$this->load->view('layout/menu');
$this->load->view($layout_body);
$this->load->view('layout/footer');