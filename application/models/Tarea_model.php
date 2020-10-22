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

    public function insertarTarea($datos) {
        $this->db ->insert('tareas', $datos);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

}
