<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AccountsRest
 *
 * @author Simão Neto
 */
require APPPATH.'/libraries/REST_Controller.php';
class AccountsRest extends REST_Controller{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->model('accounts');
    }
    
    public function accounts_get(){
        $accounts = $this->accounts->loadAll();
        
        if ($accounts){
            $this->response($accounts, 200);
        } else {
            $this->response(array('error' => 'account não existe!'), 404);
        }
    } 
    
    function index_post(){
        $data =  array(
            'name' => $this->input->post('name'),
            'password' => $this->input->post('password')
        );        
        $myDados = $this->accounts->addAccount($data);        
        $this->response($myDados, 200);
    }
    
}

?>
