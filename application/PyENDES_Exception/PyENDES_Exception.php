<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PyENDES_Exception extends CI_Exceptions{
    
    /*Region Mesagge for exec Procedure*/
    const PyENDES_EXCEPTION_PROCEDURE_SUCESS = 'Exec procedure sucessfully';
    const PyENDES_EXCEPTION_PROCEDURE_ERROR = 'Exec procedure error';
    /*End Region*/
    
    /*Region Validation Model*/
    const PyENDES_EXCEPTION_REQUIRED = 'Is required';
    const PyENDES_EXCEPTION_NOT_EXIST = 'Not exist';
    const PyENDES_EXCEPTION_INVALID_VALUE = 'Invalid value';
    const PyENDES_EXCEPTION_ONLY_POSITIVE = 'Only number positive';
    const PyENDES_EXCEPTION_ONLY_NEGATIVE = 'Only number negativo';
    const PyENDES_EXCEPTION_MAXLENGTH = 'Exede max length';
    /*End Region*/

    function PyENDES_Exception() {
        parent::CI_Exceptions();
    }
    
    function show_error($heading, $message, $template = 'error_general', $status_code = 500) {
      if ($status_code == 500){
        $this->_report_error($message);
      }
      return parent::show_error($heading, $message, $template = 'error_general', $status_code = 500);
    }
    function log_exception($severity, $message, $filepath, $line) {
      parent::log_exception($severity, $message, $filepath, $line);
      if ($severity != E_WARNING && $severity != E_NOTICE && $severity != E_STRICT){
        $this->_report_error($message);
      }
    }
    function _get_debug_backtrace($br = "<BR>") {
        $trace = array_slice(debug_backtrace(), 3);
        $msg = '<code>';
        foreach($trace as $index => $info) {
          if (isset($info['file'])) {
            $msg .= $info['file'] . ':' . $info['line'] . " -> " . $info['function'] . '(' . $info['args'] . ')' . $br;
          }
        }
        $msg .= '</code>';
        return $msg;
    }
    function _report_error($subject){
      $CI =& get_instance();
      $CI->load->library('email');
      $body = '';
      $body .= 'Request: <br/><br/><code>';
      foreach ($_REQUEST as $k => $v) {
        $body .= $k . ' => ' . $v . '<br/>';
      }
      $body .= '</code>';
      $body .= '<br/><br/>Server: <br/><br/><code>';
      foreach ($_SERVER as $k => $v) {
        $body .= $k . ' => ' . $v . '<br/>';
      }
      $body .= '</code>';
      $body .= '<br/><br/>Stacktrace: <br/><br/>';
      $body .= $this->_get_debug_backtrace();
      $CI->email->from('errors@myapp.com', '[PyENDES Production] PyENDES Notifier');
      $CI->email->to('support@myapp.com');
      $CI->email->subject($subject);
      $CI->email->message($body);
      $CI->email->send();
    }
}