<?php

class sedd extends CI_Model {

    public function __construct() {
    	parent::__construct();
    	$this->load->database();
    }
    
    //Funcion que recibe datos y si hay coincidencia devulve una fila (USUARIOS)
	public function login($correo,$pass){
        //realizamos una consulta
        $sql=$this->db->query("SELECT correo, contraseña FROM usuarios WHERE correo='$correo' AND contraseña='$pass'");
        return $sql->row();
    }

}