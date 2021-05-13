<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
		parent:: __construct();
		$this->load->model('Admin_model');
		$this->load->library('grocery_CRUD');
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
			$data_view["admin_tipos"] = $this->Admin_model->get_roles();
			$this->load->view('admin_view', $data_view);
			//contenido end
			
			$this->load->view('footer');
		} else {
			redirect( base_url().'login');
		}
	}
	
	public function resultado_ajax(){
		$this->load->helper('url');
		$parametro = trim( $this->input->post( 'parametro' ) );
		$data_view["admin_tipos"] = $this->Admin_model->get_roles();
		$admin = $this->Admin_model->get($parametro);
		$data_view['admin'] = $admin;
		$this->load->view('resultado_admin_view', $data_view );
	}
	
	public function ingresa(){
		$parameter_nick				= trim( $this->input->post( 'parameter_nick' ) );
		$parameter_nombre 			= trim( $this->input->post( 'parameter_nombre' ) );
		$parameter_password 		= trim( $this->input->post( 'parameter_password' ) );
		$parameter_password 		= md5( $parameter_password );
		$parameter_email 			= trim( $this->input->post( 'parameter_email' ) );
		$parameter_tipo				= trim( $this->input->post( 'parameter_tipo' ));
		$parameter_new 				= $this->Admin_model->insert( $parameter_nick, $parameter_nombre, $parameter_password, $parameter_email, $parameter_tipo );
	}
	
	public function actualiza(){
		$parametro_id 				= trim( $this->input->post( 'parameter_id' ) );
		$parametro_nick 			= trim( $this->input->post( 'parameter_nick' ) );
		$parametro_nombre 			= trim( $this->input->post( 'parameter_nombre' ) );
		$parametro_apellido 		= trim( $this->input->post( 'parameter_apellido' ) );
		$parametro_email 			= trim( $this->input->post( 'parameter_email' ) );
		$parametro_rol 				= trim( $this->input->post( 'parameter_rol' ) );
		$parameter_update 			= $this->Admin_model->update( $parametro_id , $parametro_nick, 
									  $parametro_nombre, $parametro_apellido, $parametro_email, $parametro_rol);
	}
	
	public function elimina(){
		$parametro_id 				= trim( $this->input->post( 'parametro_id' ) );
		$parameter_delete 			= $this->Admin_model->delete( $parametro_id );
	}
}