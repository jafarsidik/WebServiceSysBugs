<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bugs_Model
 *
 * @author Simão Neto
 */
class Bugs extends CI_Model{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        
        $this->load->database();
    }
    
    public function loadAll(){
        $query = $this->db->get('bugs');
        return $query->result();
    }
    
    public  function store($dados = array()){
        $this->db->insert('bugs', $dados);
    }
}

?>
