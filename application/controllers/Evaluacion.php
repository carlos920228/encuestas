<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
	SISTEMA DE EVALUACIÓN DEL DESEMPEÑO DOCENTE (SEDD) chidori
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
	
	public function registrar_enc(){
		$this->load->model('Sedd');
		//recibimos y almacenamos
		$this->Sedd->nombre=$this->input->post('nombre');
		$this->Sedd->nivel=$this->input->post('nivel');
		$this->Sedd->modalidad=$this->input->post('modalidad');
		$this->Sedd->carrera=$this->input->post('carrera');
		$this->Sedd->grupo=$this->input->post('grupo');
		$this->Sedd->materia=$this->input->post('materia');
		//
		$this->Sedd->registrar_enc();

		//Guardamos imagen en el servidor
        if ($_FILES['file']['size'] == 0 && $_FILES['file']['error'] == 0){ 

        }else{

            $mi_imagen = 'mi_imagen';
            $valor = $this->input->post("file");

            $config = array(//obtenemos el id del modelo
            'file_name' => $id.".csv",
            'upload_path' => "./encuestas/",
            'allowed_types' => "csv",
            'overwrite' => TRUE,
            'max_size' => "4096000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            //'max_height' => "768",
            //'max_width' => "1024"
            );
            
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload()) {
                echo "<script>alert('¡Archivo guardado!');</script>"; 
                redirect('evaluacion','refresh');
            }
        }

		//redirect('evaluacion','refresh');
	}

	public function cambiocarreras($id){
		switch ($id) {
			//Licenciatura
			case 1:
				echo '<label for="inputState">Carrera</label>
				<select id="carrera" class="form-control" name="carrera">
				<option selected>Seleccione</option>
				<option value="Lic. en Administración de empresas">Lic. en Administración de empresas</option>
				<option value="Lic. en Arquitectura y Urbanismo">Lic. en Arquitectura y Urbanismo</option>
				<option value="Lic. en Comunicación y Medios Digitales">Lic. en Comunicación y Medios Digitales</option>
				<option value="Lic. en Contaduría y Finanzas">Lic. en Contaduría y Finanzas</option>
				<option value="Lic. en Derecho">Lic. en Derecho</option>
				<option value="Lic. en Educación Física, Recreación y Deporte">Lic. en Educación Física, Recreación y Deporte</option>
				<option value="Lic. en Ingeniería Industrial">Lic. en Ingeniería Industrial</option>
				<option value="Lic. en Pedagogía">Lic. en Pedagogía</option>
				<option value="Lic. en Psicología Apliacada">Lic. en Psicología Apliacada</option>
				<option value="Lic. en Sistemas y Tecnologías de información">Lic. en Sistemas y Tecnologías de información</option>
				</select>';
			break;
			//Maestría
			case 2:
				echo '<label for="inputState">Carrera</label>
				<select id="carrera" class="form-control" name="carrera">
				<option selected>Seleccione</option>
				<option value="Maestría en Administración de los servicios de la salud">Maestría en Administración de los servicios de la salud</option>
				<option value="Maestría en Administración de Negocios">Maestría en Administración de Negocios</option>
				<option value="Maestría en Administración Pública>Maestría en Administración Pública</option>
				<option value="Maestría en Derecho Constitucional y Administrativo">Maestría en Derecho Constitucional y Administrativo</option>
				<option value="Maestría en Educación">Maestría en Educación</option>
				<option value="Maestría en Educación para la salud">Maestría en Educación para la salud</option>
				<option value="Maestría en Gestión Educativa">Maestría en Gestión Educativa</option>
				<option value="Maestría en Ingeniería y Desarrollo de Software">Maestría en Ingeniería y Desarrollo de Software</option>
				</select>';
			break;
			//Doctorado
			case 3:
				echo '<label for="inputState">Carrera</label>
				<select id="carrera" class="form-control" name="carrera">
				<option selected>Seleccione</option>
				<option value="Doctorado en Ciencias Administrativas">Doctorado en Ciencias Administrativas</option>
				<option value="Doctorado en Ciencias Administrativas con Línea en Administración Pública y Gobierno">Doctorado en Ciencias Administrativas con Línea en Administración Pública y Gobierno</option>
				<option value="Doctorado en Ciencias Administrativas con Línea en Economía y Empresa">Doctorado en Ciencias Administrativas con Línea en Economía y Empresa</option>
				<option value="Doctorado en Ciencias Administrativas con Línea en Educación">Doctorado en Ciencias Administrativas con Línea en Educación</option>
				<option value="Doctorado en Ciencias Administrativas con Línea en Gestión de Sistemas de Salud">Doctorado en Ciencias Administrativas con Línea en Gestión de Sistemas de Salud</option>
				</select>';
			break;
			case 'Seleccione':
				echo '<label for="inputState">Carrera</label>
				<select id="carrera" class="form-control" name="carrera">
				<option selected>Seleccione un nivel</option>
				</select>';
			break;
			//Doctorado
			default:
				echo '<label for="inputState">Carrera</label>
				<select id="carrera" class="form-control" name="carrera">
				<option selected>Seleccionar</option>
				<option value="2">Seleccione un nivel</option>
				</select>';
			break;
		}
	}

}
