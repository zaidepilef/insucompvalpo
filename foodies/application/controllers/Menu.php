<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
	
	function __construct() {
		parent:: __construct();
		$this->load->model('Menu_model');
		
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
			//contenido start
			$this->load->view('menu_view',$data_view);
			//contenido end
			$this->load->view('footer');
		} else {
			redirect( base_url().'login');
		}
	}
	
	public function resultado_ajax(){
		$get_menu = $this->Menu_model->get_menu( );
		$data_view['get_menu'] = $get_menu;
		$this->load->view('resultado_ajax_view', $data_view );
	}
	
	public function ingresa_parameter(){
		$parametro_clase_id 		= trim( $this->input->post( 'select_parametro' ) );
		$parameter_name 			= trim( $this->input->post( 'parameter_name' ) );
		$parameter_new 				= $this->Parameters_model->parameter_new( $parametro_clase_id , $parameter_name );
	}
	
	public function actualiza_parameter(){
		$parametro_id 				= trim( $this->input->post( 'parametro_id' ) );
		$parametro_nombre 			= trim( $this->input->post( 'parametro_nombre' ) );
		$parametro_descripcion 		= trim( $this->input->post( 'parametro_descripcion' ) );
		$parameter_update 			= $this->Parameters_model->parameter_update( $parametro_id , $parametro_nombre ,$parametro_descripcion );
	}
	
	public function active_parameter(){
		$parametro_id 				= trim( $this->input->post( 'parametro_id' ) );
		$parameter_active 			= $this->Parameters_model->parameter_active( $parametro_id );
	}
	
	public function desactive_parameter(){
		$parametro_id 				= trim( $this->input->post( 'parametro_id' ) );
		$parameter_active 			= $this->Parameters_model->parameter_desactive( $parametro_id );
	}
	
	public function elimina_parameter(){
		$parametro_id 				= trim( $this->input->post( 'parametro_id' ) );
		$parameter_delete 			= $this->Parameters_model->parameter_delete( $parametro_id );
	}
	
	
	
	/////olidate
	public function index_1() {
		$user_id 						= $this->session->userdata('user_id');
		$data_view['user_nombre'] 		= $this->session->userdata('user_nombre');
		$data_view['user_apellido'] 	= $this->session->userdata('user_apellido');
		$data_view['user_rol'] 			= $this->session->userdata('user_rol');
		
		if( $user_id ) {
			$data_view['controller_name_id'] = $this->router->fetch_class();
			$this->load->view('header');
			$this->load->view('navbar_top');
			$this->load->view('navbar_side', $data_view );
			
			//contenido start
			$crud = new grocery_CRUD();
			$crud->set_theme('datatables');
			$crud->set_table('cl_parametro');
			$crud->set_subject('Parametro');
			$crud->required_fields('parametro_id');
			$crud->columns( 'parametro_id' , 'parametro_padre_id' , 'parametro_nombre' , 'parametro_valor' );
			$output = $crud->render();
			$this->load->view('parameters_view',$output);
			//contenido end
			
			$this->load->view('footer');
		} else {
			redirect( base_url().'login');
		}
	}
	
}




