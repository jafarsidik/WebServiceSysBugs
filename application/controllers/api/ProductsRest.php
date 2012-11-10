<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductsRest
 *
 * @author Simão Neto
 */
require APPPATH.'/libraries/REST_Controller.php';

class ProductsRest extends REST_Controller{
    //put your code here
    
     public function __construct() {
        parent::__construct();
        $this->load->model('products');
    }
    
    public function products_get(){
        $products = $this->products->loadAll();
        if ($products){
            $this->response($products, 200);
        } else {
            $this->response(array('error' => 'Products não existe!'), 404);
        }
    } 
    
    function index_post(){
        $data =  array(
            'name' => $this->input->post('name'),
        );        
        $myDados = $this->products->store($data);        
        $this->response($myDados, 200);
    }
}

?>
