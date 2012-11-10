<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StatusRest
 *
 * @author Simão Neto
 */
require APPPATH.'/libraries/REST_Controller.php';

class EstatusRest extends REST_Controller{
    
     public function __construct() {
        parent::__construct();
        $this->load->model('estatus');
    }
    
    public function status_get(){
        $status = $this->estatus->loadAll();
        
        if ($status){
            $this->response($status, 200);
        } else {
            $this->response(array('error' => 'Status não existe!'), 404);
        }
    } 
    
    function index_post(){
        $data =  array(
            'name' => $this->input->post('name'),
        );        
        $myDados = $this->estatus->store($data);        
        $this->response($myDados, 200);
    }
}

?>
