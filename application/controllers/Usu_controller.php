<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usu_controller
 *
 * @author DELL
 */
class Usu_controller extends CI_Controller {

    //put your code here
    function __construct() {
        parent::__construct();

        $this->load->helper('url');
        $this->load->model('Usu_model');
    }

    public function index() {
        $this->load->view('evaluacion/head');
        $this->load->view('evaluacion/header');
        $this->load->view('usuarios/usuarios');
        $this->load->view('evaluacion/footer');
    }

    public function agregarUsuario() {
        $id = $this->input->post('txtId');
        if ($id) {
            $datos = array(
                'nombre' => $this->input->post('txtNombre'), //este es el name del imput
                'apellido' => $this->input->post('txtApellido'),
                'usuario' => $this->input->post('txtUser'),
                'contrasenia' => $this->input->post('txtPass'),
                'rol' => $this->input->post('comboRol')
               
            );

            $resultado = $this->Usu_model->agregarUsuario($datos, $id);
            $msg['success'] = false;
            $msg['type'] = 'update';

            if ($resultado) {
                $msg['success'] = true;
            }
            echo json_encode($msg);
        } else {
            $datos = array(
                'nombre' => $this->input->post('txtNombre'), //este es el name del imput
                'apellido' => $this->input->post('txtApellido'),
                'usuario' => $this->input->post('txtUser'),
                'contrasenia' => $this->input->post('txtPass'),
                'rol' => $this->input->post('comboRol'),
                'taller1' => '0',
                'taller2' => '0',
                'taller3' => '0',
                'taller4' => '0',
                'taller5' => '0',
                'taller6' => '0',
                'taller7' => '0',
                'taller8' => '0',
                'taller9' => '0'
            );

            $resultado = $this->Usu_model->agregarUsuario($datos, $id);
            $msg['success'] = false;
            $msg['type'] = 'add';

            if ($resultado) {
                $msg['success'] = true;
            }
            echo json_encode($msg);
        }
    }

    public function obtenerUsuarios() {

        $resultado = $this->Usu_model->obtenerUsuarios();
        echo json_encode($resultado);
    }

    public function obtenerUsuario() {
        $id = $this->input->post('id');
        $resultado = $this->Usu_model->obtenerUsuario($id);
        echo json_encode($resultado);
    }

    public function eliminarUsuario() {
         $id = $this->input->post('id');
        $resultado = $this->Usu_model->eliminarUsuario($id);
        $msg['success'] = false;
        $msg['success'] = 'delete';
        if ($resultado) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

}
