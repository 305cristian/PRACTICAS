<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of evaluacion
 *
 * @author DELL
 */
class Eval_controller extends CI_Controller {

    //put your code here
    function __construct() {
        parent:: __construct();
        $this->load->model('eval_Model');
        $this->load->helper('url');
    }

     public function opciones() {

        $this->load->view('evaluacion/head');
        $this->load->view('evaluacion/header');
        $this->load->view('evaluacion/opciones');
        $this->load->view('evaluacion/footer');
    }
    
    public function evaluacion() {

        $this->load->view('evaluacion/head');
        $this->load->view('evaluacion/evaluacion');
        $this->load->view('evaluacion/footer');
    }
    
    
    public function cambiarEstado() {
        $idUser= $this->input->post('id');
        $taller= $this->input->post('taller');
       
        
          $resultado= $this->eval_Model -> cambiarEstado($idUser,$taller);
          $msg['success']=false;
          $msg['type']='';
          if($resultado){
              $msg['success']=true;
              $msg['type']='add';
              $this->session->set_userdata($taller,'1');//Actualizo la variable taller de acuerdo al usuario logeado
          }
          echo json_encode($msg);
    }
    
    public function obtenerResultados() {
        $resultado= $this->eval_Model->obtenerResultados();
       echo json_encode($resultado);
    }

}

?>