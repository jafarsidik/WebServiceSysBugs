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
class Products extends CI_Model{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
     public function loadAll(){
        $query = $this->db->get('products');
//        var_dump($query);
//        print_r($query);
        return $query->result();        
            

    }
    
    public  function store($dados = array()){
        $this->db->insert('products', $dados);
    }
}

?>
