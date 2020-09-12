<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login_controller
 *
 * @author DELL
 */
class Login_controller extends CI_Controller {

    //put your code here
    function __construct() {
        parent:: __construct();
        $this->load->model('login_model');
        $this->load->helper('url');
    }

    public function index() {

        if ($this->session->userdata('is_logged')) {
//            $estado = $this->session->userdata('estado');
            redirect(base_url('opciones_controller'));
        }

        $this->load->view('evaluacion/head');
        $this->load->view('evaluacion/login');
        $this->load->view('evaluacion/footer');
    }

    //       

    public function login() {

        $user = $this->input->post('user');
        $pass = $this->input->post('pass');
        $resultado = $this->login_model->login($user, $pass);
        if ($resultado) {

            $datosUser = array('id' => $resultado->id,
                'is_logged' => true,
                'nombre' => $resultado->nombre,
                'apellido' => $resultado->apellido,
                'rol' => $resultado->rol,
                'user' => $resultado->usuario,
                'taller1' => $resultado->taller1,
                'taller2' => $resultado->taller2,
                'taller3' => $resultado->taller2,
                'taller4' => $resultado->taller2,
                'taller5' => $resultado->taller2,
                'taller6' => $resultado->taller2,
                'taller7' => $resultado->taller2,
                'taller8' => $resultado->taller2,
                'taller9' => $resultado->taller2,
            );

            $this->session->set_userdata($datosUser);
//            $this->session->set_flashdata('msg','Usuario: '.$datosUser['user']);
            echo json_encode($resultado);
        } else {
            echo json_encode($resultado);
        }
    }

    public function logout() {
        $dato = array('id', 'usuario', 'estado', 'estadoLogin');
        $this->session->unset_userdata($dato);
        $this->session->sess_destroy();
        redirect(base_url());
    }

}
