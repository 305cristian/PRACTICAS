<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usu_model
 *
 * @author DELL
 */
class Usu_model extends CI_Model {

    function __construct() {
        parent::__construct();

        $this->load->helper('url');
    }

    public function agregarUsuario($datos, $id) {
        if ($id) {
            $this->db->where('id', $id)
                    ->update('login', $datos);
            if ($this->db->affected_rows() > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            $this->db->insert('login', $datos);
            if ($this->db->affected_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function obtenerUsuarios() {
        $consulta = $this->db->select('*')
                ->from('login')
                ->get();

        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        } else {
            return false;
        }
    }

    public function obtenerUsuario($id) {
        $consulta = $this->db->select('*')
                ->from('login')
                ->where('id', $id)
                ->get();

        if ($consulta->num_rows() > 0) {
            return $consulta->row();
        } else {
            return false;
        }
    }
    
    public function eliminarUsuario($id) {
        $this->db->where('id',$id)
               -> delete('login');
        
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }

}
