<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login_model
 *
 * @author DELL
 */
class Login_model extends CI_Model{
    //put your code here
    function __construct() {
        parent::__construct();
    }
    
    public function login($user, $pass) {

        $consulta = $this->db->where('usuario',$user)     
                             ->where('contrasenia',$pass)     
                             ->get('login');
        if($consulta->num_Rows()>0){
            return $consulta->row();
        }else{
            return false;
        }
    }


}
