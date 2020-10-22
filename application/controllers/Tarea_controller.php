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

    public function insertarTarea() {
        $validar = array(
            array(
                'field' => 'nombreTarea',
                'label' => 'NombreTarea',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'imagenTarea',
                'label' => 'ImagenTarea',
                'rules' => 'trim|required'
            ),
        );

        $this->form_validation->set_rules($validar);
        if ($this->form_validation->run() == FALSE) {
            $respuesta['error'] = true;
            $respuesta['msg'] = array(
                'nombreTarea' => form_error('nombreTarea'),
                'imagenTarea' => form_error('imagenTarea'),
            );
        } else {
            $datos = array(
                'task_nombre' => $this->input->post('nombreTarea'),
                'task_imagen' => $this->input->post('imagenTarea'),
                'task_contenido' => $this->input->post('contenidoTarea'),
                'task_estado' => $this->input->post('estadoTarea')
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
