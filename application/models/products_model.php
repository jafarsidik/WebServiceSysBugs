<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Products_Model
 *
 * @author Simão Neto
 */
class Products_Model extends CI_Model{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
     public function loadAll(){
        $query = $this->db->get('products');
        return $query->result();        
    }
    
    public  function store($dados = array()){
        $this->db->insert('products', $dados);
    }
}

?>
