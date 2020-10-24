<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tarea_model
 *
 * @author ADMINISTRADOR IT CLP
 */
class Tarea_model extends CI_Model {

    function __construct() {
        parent:: __construct();
    }

    function obtenerTareas() {
        $consulta = $this->db->select('*')
                ->from('tareas')
                ->get();
        if ($consulta->num_rows() > 0) {         
            return $consulta->result();
        } else {         
            return false;
            
        }
    }

    public function insertarTarea($datos) {
        $this->db->insert('tareas', $datos);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

}
