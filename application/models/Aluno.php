<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Aluno
 *
 * @author Simão Neto
 */
class Aluno extends CI_Model{
    //put your code here
    
    public function __construct() {
        parent::__construct();
       $this->load->database();
    }
    
    function loadAll(){
        $query = $this->db->get('accounts');
        return $query->result();
    }
}

?>
