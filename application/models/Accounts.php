<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Accounts_Model
 *
 * @author Simão Neto
 */
class Accounts extends CI_Model{
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
}

?>
