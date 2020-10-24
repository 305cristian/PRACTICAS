<?php

class Tarea_controller extends CI_Controller {

    function __construct() {
        parent:: __construct();
        $this->load->model('Tarea_model');
        $this->load->helper('url');
    }

    public function tareas() {

        $this->load->view('evaluacion/head');
        $this->load->view('evaluacion/header');
        $this->load->view('tareas/tareas');
        $this->load->view('evaluacion/footer');
    }

    public function obtenerTareas() {
        $resultado['tareas'] = $this->Tarea_model->obtenerTareas();
        echo json_encode($resultado);
    }

    public function insertarTarea() {
        $validar = array(
            array(
                'field' => 'nombre',
                'label' => 'Nombre',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'imagen',
                'label' => 'Imagen',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'estado',
                'label' => 'Estado',
                'rules' => 'trim|required'
            ),
        );

        $this->form_validation->set_rules($validar);
        if ($this->form_validation->run() == FALSE) {
            $respuesta['error'] = true;
            $respuesta['msg'] = array(
                'nombre' => form_error('nombre'),
                'imagen' => form_error('imagen'),
                'estado' => form_error('estado'),
            );
        } else {
            $datos = array(
                'task_nombre' => $this->input->post('nombre'),
                'task_imagen' => $this->input->post('imagen'),
                'task_contenido' => $this->input->post('contenido'),
                'task_estado' => $this->input->post('estado')
            );
            $resultado = $this->Tarea_model->insertarTarea($datos);
            if ($resultado) {
                $respuesta['error'] = false;
                $respuesta['msg'] = 'Insertado exitosamente';
            }
        }
        echo json_encode($respuesta);
    }

}
