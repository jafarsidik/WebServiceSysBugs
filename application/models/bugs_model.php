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
class Bugs_Model extends CI_Model{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        
        $this->load->database();
    }
    
    public function loadAll(){
        
        $this->db->select('b.description as bugs, u.name as user, p.name as projeto, s.name as status');
        $this->db->from('bugs b');
        $this->db->join('accounts u','b.idOwner = u.id');
        $this->db->join('`products p','b.idProduct = p.id');
        $this->db->join('status s','b.idStatus = s.id');
        $query = $this->db->get();
        
        return $query->result();       
        
    }
    
    public  function store($dados = array()){
        $this->db->insert('bugs', $dados);
    }
}

?>
