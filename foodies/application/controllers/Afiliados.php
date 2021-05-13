<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Afiliados extends CI_Controller {

	function __construct() {
		parent:: __construct();
		$this->load->model('Afiliados_model');
	}
	
	public function index() {
		$user_id 						= $this->session->userdata('user_id');
		$data_view['user_nombre'] 		= $this->session->userdata('user_nombre');
		$data_view['user_apellido'] 	= $this->session->userdata('user_apellido');
		$data_view['user_rol'] 			= $this->session->userdata('user_rol');
		
		if( $user_id ) {
			$data_view['controller_name_id'] = $this->router->fetch_class();
			$this->load->view('header');
			$this->load->view('navbar_top');
			$this->load->view('navbar_side', $data_view );
			$this->load->helper('url');
			
			//contenido start
			$this->load->view('afiliados_view');
			//contenido end
			
			$this->load->view('footer');
		} else {
			redirect( base_url().'login');
		}
	}
	
	public function resultado_ajax(){
		$this->load->helper('url');
		$parametro = trim( $this->input->post( 'parametro' ) );
		$afiliados = $this->Afiliados_model->get_afiliados($parametro);
		$data_view['afiliados'] = $afiliados;
		$this->load->view('resultado_afiliados_view', $data_view );
	}
	
	
	public function ingresa(){
		$nombres 			= trim( $this->input->post( 'parameter_nombres' ) );
		$apellidos				= trim( $this->input->post( 'parameter_apellidos' ) );
		$password 		= trim( $this->input->post( 'parameter_password' ) );
		$password 		= md5( $password );
		$email 			= trim( $this->input->post( 'parameter_email' ) );
		$parameter_new 				= $this->Afiliados_model->insert( $nombres , $apellidos, $password, $email );
	}
	
	public function actualiza(){
		$parametro_id					= trim( $this->input->post( 'parametro_id' ) );
		$parametro_nombres 				= trim( $this->input->post( 'parametro_nombres' ) );
		$parametro_apellidos 			= trim( $this->input->post( 'parametro_apellidos' ) );
		$parametro_fecha_nac 			= trim( $this->input->post( 'parametro_fecha_nac' ) );
		$parametro_genero 		= trim( $this->input->post( 'parametro_genero' ) );
		$parametro_nick 			= trim( $this->input->post( 'parametro_nick' ) );
		$parametro_email 				= trim( $this->input->post( 'parametro_email' ) );
		$parameter_update 			= $this->Afiliados_model->update( $parametro_id , $parametro_nombres, 
									  $parametro_apellidos, $parametro_fecha_nac, $parametro_genero, $parametro_nick, $parametro_email);
	}
	
	public function elimina(){
		$parametro_id 				= trim( $this->input->post( 'parametro_id' ) );
		$parameter_delete 			= $this->Afiliados_model->delete( $parametro_id );
	}
}