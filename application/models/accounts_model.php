<?php

/**
 * Description of Accounts_Model
 *
 * @author Simão Neto
 */
class Accounts_Model extends CI_Model{
    //put your code here
    
    public function __construct() {
        parent::__construct();        
        $this->load->database();
    }
    
    public function loadAll(){
        $query = $this->db->get('accounts');
        return $query->result();
    }
    
    public function addAccount($data = array()){
        $this->db->insert('accounts' , $data);
    }
    
    
    function login($name, $password)
	 {
	   $this -> db -> select('id, name, password');
	   $this -> db -> from('accounts');
	   $this -> db -> where('name = ' . "'" . $name . "'");
           $this -> db -> where('password = ' . "'" . MD5($password) . "'");
	   $this -> db -> limit(1);
	 
	   $query = $this -> db -> get();
	 
	   if($query -> num_rows() == 1)
	   {
	     return $query->result();
	   }
	   else
	   {
	     return false;
	   }
	 }
    
    
    
    # VALIDA USUÁRIO
//    function validate($data = array()) {
//        $this->db->where('name', $this->input->post('name')); 
//        $this->db->where('password', md5($this->input->post('password')));
//        $this->db->where('status', 1); // Verifica o status do usuário
//
//        $query = $this->db->get('accounts', $data); 
//
//        if ($query->num_rows == 1) { 
//            
////            var_dump($query);
//            
//            return $query->result(); // RETORNA VERDADEIRO
//        }
//    }
//
//    # VERIFICA SE O USUÁRIO ESTÁ LOGADO
//    function logged() {
//        $logged = $this->session->userdata('logged');
//
//        if (!isset($logged) || $logged != true) {
//            echo 'Voce nao tem permissao para entrar nessa pagina. <a href="http://www.oficinadanet.com.br/login">Efetuar Login</a>';
//            die();
//        }
//    }
}

?>
