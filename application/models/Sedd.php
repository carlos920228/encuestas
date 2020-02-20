<?php

class Sedd extends CI_Model {

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

    public function registrar_enc(){
        //asignamos a acada campó
        $this->db->set('nombreDoc',$this->nombre);
        $this->db->set('nivel',$this->nivel);
        $this->db->set('modalidad',$this->modalidad);
        $this->db->set('carrera',$this->carrera);
        $this->db->set('grupo',$this->grupo);
        $this->db->set('materia',$this->materia);

        $this->db->insert('encuestas');
    }

}