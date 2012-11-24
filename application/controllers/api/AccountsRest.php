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
    
    public function __construct() {
        parent::__construct();
        $this->load->model('accounts_model');
        session_start(); 
    }
    
    public function accounts_get(){
        $accounts = $this->accounts_model->loadAll();
        
        if ($accounts){
            $this->response($accounts, 200);
        } else {
            $this->response(array('error' => 'account não existe!'), 404);
        }
    } 
    
    function index_post(){
        $data =  array(
            'name' => $this->input->post('name'),
            'password' => md5($this->input->post('password'))
        );        
        $myDados = $this->accounts_model->addAccount($data);        
        $this->response($myDados, 200);
    }
    
    
//     function login_post(){
//        $data =  array(
//            'name' => $this->input->post('name'),
//            'password' => md5($this->input->post('password')),
//            'logged' => true
//        );        
//        
////        if ($query) { // VERIFICA LOGIN E SENHA
////                $data = array(
////                    'username' => $this->input->post('username'),
////                    'logged' => true
////                );
////                $this->session->set_userdata($data);
////            } else {
////                redirect($this->index());
////            }
////        
////        $this->session->set_userdata($data);
//        $login = $this->accounts_model->validate($data);
//        
//        
//        
//        $this->response($login, 200);
//    }
    
    
    function result_post($password)
	 {
	   //Field validation succeeded.  Validate against database
	   $name = $this->input->post('name');
	 
	   //query the database
	   $result = $this->accounts_model->login($name, $password);
	 
	   if($result)
	   {
               $this->response($result, 200);
	     $sess_array = array();
	     foreach($result as $row)
	     {
	       $sess_array = array(
	         'id' => $row->id,
	         'name' => $row->name
	       );
	       $this->session->set_userdata('logged_in', $sess_array);
	     }
	     return TRUE;
	   }
	   else
   {
//	     $this->form_validation->set_message('check_database', 'Invalid username or password');
	     echo 'senha errada';
             return false;
	   }
	 }
         
//         function logout_post()
//	 {
//	   $logout = $this->session->unset_userdata('logged_in');
//           
//           $this->response($logout, 200);
//	   session_destroy();
//           echo 'session destruida';
//	 }
	 
         
         
//         if($this->session->userdata('logged_in'))
//	   {
//	     $session_data = $this->session->userdata('logged_in');
//	     $data['username'] = $session_data['username'];
//	     $this->load->view('home_view', $data);
//	   }
//	   else
//	   {
//	     //If no session, redirect to login page
//	     redirect('login', 'refresh');
//	   }
}

?>
