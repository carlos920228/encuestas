<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
	SISTEMA DE EVALUACIÓN DEL DESEMPEÑO DOCENTE (SEDD)
 */

class evaluacion extends CI_Controller {

	public function __construct(){
		parent::__construct();

		setlocale(LC_ALL,"es_MX");
		date_default_timezone_set('America/Mexico_City');

		$this->load->helper(array('url', 'form'));
		$this->load->library(array('session', 'form_validation'));
  	}

	public function index(){
		$sesion=$this->session->userdata('sesion_ad');
		if ($sesion) {
			$this->load->view('header');
			$this->load->view('form');
			$this->load->view('footer');
		}else {
			redirect('evaluacion/loginsedd','refresh');
		}
		
	}

	public function loginsedd()
	{
		$this->load->view('header-sedd');
		$this->load->view('login');
		$this->load->view('footer');
	}

	//Funcion para recibir los datos del login
	public function login(){
		//cargamos el modelo
		$this->load->model('Sedd');
		//recibimos los datos
		$correo=$this->input->post('correo');
		$pass=sha1($this->input->post('contraseña'));
		//mandamos los datos al modelo para verificar que el usuario existe y el resultado lo almacenamos en una variable
		$sql=$this->Sedd->login($correo,$pass);
		//Si hay resultado el modelo devuelve un row con los datos del usuario
		//Si hay resultado cargamos la vista home
		if ($sql){
			//Asigamos el valor de sesion como verdadero
			$this->session->set_userdata('sesion_ad', TRUE);
			redirect('evaluacion','refresh');
		} else {
			//Sino mostramos un alert en el login
			$this->session->set_flashdata('error', 'Usuario o Contraseña incorrectos');
      		redirect('evaluacion','refresh');
		}
		
    }

	public function cambionivel($id){
		switch ($id) {
			//Banderilla
			case 1:
				echo '<label >Nivel</label>
				<select id="nivel" class="form-control" name="nivel">
				<option selected>Seleccionar</option>
				<option value="1">Licenciatura</option>
				<option value="2">Maestría</option>
				<option value="3">Doctorado</option>
				</select>';
			break;
			//Sin seleccionar Sede
			case 'Seleccione':
				echo '<label ">Nivel</label>
				<select id="nivel" class="form-control" name="nivel">
				<option selected>Seleccione una sede</option>
				</select>';
			break;
			//Sedes Cosamaloapan, Tuxpan, Poza Rica, Veracruz,
			default:
				echo '<label >Nivel</label>
				<select id="nivel" class="form-control" name="nivel">
				<option selected>Seleccionar</option>
				<option value="2">Maestría</option>
				</select>';
			break;
		}
	}

	public function cambiomodalidad($id){
		switch ($id) {
			//Banderilla
			case 1:
				echo '<label >Modalidad</label>
				<select id="modalidad" class="form-control" name="modalidad">
				<option selected>Seleccionar</option>
				<option value="1">Presencial</option>
				<option value="2">Mixto</option>
				<option value="3">Blended</option>
				</select>';
			break;
			//Sin seleccionar
			case 'Seleccione':
				echo '<label >Nivel</label>
				<select id="nivel" class="form-control" name="nivel">
				<option selected>Seleccione una sede</option>
				</select>';
			break;
			//Sedes Cosamaloapan, Tuxpan, Poza Rica, Veracruz,
			default:
				echo '<label >Modalidad</label>
				<select id="modalidad" class="form-control" name="modalidad">
				<option selected>Seleccionar</option>
				<option value="2">Presencial</option>
				</select>';
			break;
		}
	}

	public function cambiocarreras($datos){
		//si es banderilla
		if ($datos[0]==1) {
			echo '<label >Banderilla</label>';
		}elseif ($datos[0==2]) {//si es 
			echo '<label >Otro</label>';
		}
	}

}
