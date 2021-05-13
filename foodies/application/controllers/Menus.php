<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Menus extends CI_Controller {

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
			$this->load->helper('url');
			
			//contenido start
			$data_view["servicios_tipos"] = $this->Menu_model->get_servicios();
			$this->load->view('menus_view', $data_view);
			//contenido end
			
			$this->load->view('footer');
		} else {
			redirect( base_url().'login');
		}
	}
	
	public function resultado_ajax(){
		$this->load->helper('url');
		$parametro = trim( $this->input->post( 'parametro' ) );
		$data_view['menus'] = $this->Menu_model->get($parametro);
		$data_view["servicios_tipo"] = $this->Menu_model->get_servicios();
		$this->load->view('resultado_menus_view', $data_view );
	}
	
	 public function ingresa(){
		 $parameter_servicio	= trim( $this->input->post( 'parameter_servicio' ) );
		 $parameter_nombre 		= trim( $this->input->post( 'parameter_nombre' ) );
		 $parameter_descripcion = trim( $this->input->post( 'parameter_descripcion' ) );
		 $parameter_new 		= $this->Menu_model->ingresar( $parameter_servicio, $parameter_nombre , $parameter_descripcion);
	 }
	
	 public function actualiza(){
		 $parametro_id 				= trim( $this->input->post( 'parametro_id' ) );
		 $parametro_servicio 		= trim( $this->input->post( 'parametro_servicio' ) );
		 $parametro_nombre 			= trim( $this->input->post( 'parametro_nombre' ) );
		 $parametro_descripcion		= trim( $this->input->post( 'parametro_descripcion' ) );
		 $parameter_update 			= $this->Menu_model->update( $parametro_id , $parametro_servicio, $parametro_nombre, $parametro_descripcion);
	 }
	
	 public function elimina(){
	 $parametro_id 				= trim( $this->input->post( 'parametro_id' ) );
	 $parameter_delete 			= $this->Menu_model->delete( $parametro_id );
	 }
	 
	 public function activar(){
		$parametro_id 				= trim( $this->input->post( 'parametro_id' ) );
		$parameter_active 			= $this->Menu_model->activar( $parametro_id );
	}
	
	public function desactivar(){
		$parametro_id 				= trim( $this->input->post( 'parametro_id' ) );
		$parameter_active 			= $this->Menu_model->desactivar( $parametro_id );
	}
	
	public function get_platos_modal(){
		$id = trim( $this->input->post( 'id' ) );
		$data_view["menus_platos"] = $this->Menu_model->get_menus($id);
		$data_view["platos"] = $this->Menu_model->get_platos();
		$this->load->view('modal_menu_platos_view', $data_view);
	}
	public function get_menus_modal(){
		$id = trim( $this->input->post( 'id' ) );
		$data_view["menus_platos"] = $this->Menu_model->get_menus($id);
		$data_view["platos"] = $this->Menu_model->get_platos();
		$this->load->view('modal_menu_view', $data_view);
	}
	
	public function set_platos_menu(){
		$id_menu			= trim( $this->input->post( 'id_menu' ) );
		$id_plato 			= trim( $this->input->post( 'id_plato' ) );
		$parameter_new 	= $this->Menu_model->ingresarPlato( $id_menu, $id_plato);
	}
	
	public function delete_platos_menu(){
		$id_menu_plato	= trim( $this->input->post( 'id_menu_plato' ) );
		$parameter_new 	= $this->Menu_model->deletePlato( $id_menu_plato);
		
	}
}