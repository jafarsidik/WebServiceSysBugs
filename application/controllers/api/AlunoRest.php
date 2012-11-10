<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AlunoRest
 *
 * @author Simão Neto
 */
require APPPATH.'/libraries/REST_Controller.php';
class AlunoRest extends REST_Controller{
    //put your code here
    
    public function __construct() {
        parent::__construct();
         $this->load->model('aluno');
    }
    
     function alunos_get()
    {
        $alunos = $this->aluno->loadAll();
        
        if($alunos)
        {
            $this->response($alunos, 200); // 200 being the HTTP response code
        }
        else
        {
            $this->response(array('error' => 'Couldn\'t find any users!'), 404);
        }
    }
}

?>
