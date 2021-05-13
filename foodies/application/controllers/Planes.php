<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Planes extends CI_Controller {
	
	function __construct() {
		parent:: __construct();
		$this->load->model('Planes_model');
		$this->load->model('Servicios_model');
	}
	
	public function index() {
		
		$user_id 								= $this->session->userdata('user_id');
		$data_view['user_nombre'] 				= $this->session->userdata('user_nombre');
		$data_view['user_apellido'] 			= $this->session->userdata('user_apellido');
		$data_view['user_rol'] 					= $this->session->userdata('user_rol');
		$data_view['data_servicios_active'] 	= $this->Servicios_model->get_servicios_planes_active(); 
		
		if( $user_id ) {
			$data_view['controller_name_id'] = $this->router->fetch_class();
			$this->load->view('header');
			$this->load->view('navbar_top');
			$this->load->view('navbar_side', $data_view );
			//contenido start
			$this->load->view('planes_view',$data_view);
			//contenido end
			$this->load->view('footer');
		} else {
			redirect( base_url().'login');
		}
	}
	
	public function resultado_ajax(){
		$planes = $this->Planes_model->get_planes();
		$data_view['planes'] = $planes;
		$this->load->view('resultado_planes_view', $data_view );
	}
	
	public function ingresa(){
		$plan_nombre 					= trim( $this->input->post( 'plan_nombre' ) );
		$plan_servicio_id 				= trim( $this->input->post( 'plan_servicio_id' ) );
		$plan_descripcion 				= trim( $this->input->post( 'plan_descripcion' ) );
		$plan_cantidad_platos 			= trim( $this->input->post( 'plan_cantidad_platos' ) );
		
		$plan_rango1_cantidad_min 		= trim( $this->input->post( 'plan_rango1_cantidad_min' ) );
		$plan_rango1_cantidad_max 		= trim( $this->input->post( 'plan_rango1_cantidad_max' ) );
		$plan_rango1_precio_porcion 	= trim( $this->input->post( 'plan_rango1_precio_porcion' ) );
		$plan_rango1_precio_chef 		= trim( $this->input->post( 'plan_rango1_precio_chef' ) );
		
		$plan_rango2_cantidad_min 		= trim( $this->input->post( 'plan_rango2_cantidad_min' ) );
		$plan_rango2_cantidad_max 		= trim( $this->input->post( 'plan_rango2_cantidad_max' ) );
		$plan_rango2_precio_porcion 	= trim( $this->input->post( 'plan_rango2_precio_porcion' ) );
		$plan_rango2_precio_chef 		= trim( $this->input->post( 'plan_rango2_precio_chef' ) );
		
		$plan_servicio_base 			= trim( $this->input->post( 'plan_servicio_base' ) );
		$plan_precio_base 				= trim( $this->input->post( 'plan_precio_base' ) );
		$plan_estado					= trim( $this->input->post( 'plan_estado' ) );
		
		$plan_new 						= $this->Planes_model->insert( $plan_nombre, $plan_servicio_id, $plan_descripcion, $plan_cantidad_platos, $plan_rango1_cantidad_min, $plan_rango1_cantidad_max, $plan_rango1_precio_porcion, $plan_rango1_precio_chef, $plan_rango2_cantidad_min, $plan_rango2_cantidad_max, $plan_rango2_precio_porcion, $plan_rango2_precio_chef, $plan_servicio_base, $plan_precio_base, $plan_estado );
	}
	
	public function actualiza(){
		$plan_id 						= trim( $this->input->post( 'plan_id' ) );
		$plan_nombre 					= trim( $this->input->post( 'plan_nombre' ) );
		$plan_servicio_id 				= trim( $this->input->post( 'plan_servicio_id' ) );
		$plan_descripcion 				= trim( $this->input->post( 'plan_descripcion' ) );
		$plan_cantidad_platos 			= trim( $this->input->post( 'plan_cantidad_platos' ) );
		
		$plan_rango1_cantidad_min 		= trim( $this->input->post( 'plan_rango1_cantidad_min' ) );
		$plan_rango1_cantidad_max 		= trim( $this->input->post( 'plan_rango1_cantidad_max' ) );
		$plan_rango1_precio_porcion 	= trim( $this->input->post( 'plan_rango1_precio_porcion' ) );
		$plan_rango1_precio_chef 		= trim( $this->input->post( 'plan_rango1_precio_chef' ) );
		
		$plan_rango2_cantidad_min 		= trim( $this->input->post( 'plan_rango2_cantidad_min' ) );
		$plan_rango2_cantidad_max 		= trim( $this->input->post( 'plan_rango2_cantidad_max' ) );
		$plan_rango2_precio_porcion 	= trim( $this->input->post( 'plan_rango2_precio_porcion' ) );
		$plan_rango2_precio_chef 		= trim( $this->input->post( 'plan_rango2_precio_chef' ) );
		
		$plan_servicio_base 			= trim( $this->input->post( 'plan_servicio_base' ) );
		$plan_precio_base 				= trim( $this->input->post( 'plan_precio_base' ) );
		$plan_estado					= trim( $this->input->post( 'plan_estado' ) );
		
		$plan_update 					= $this->Planes_model->update( $plan_id, $plan_nombre, $plan_servicio_id, $plan_descripcion, $plan_cantidad_platos, $plan_rango1_cantidad_min, $plan_rango1_cantidad_max, $plan_rango1_precio_porcion, $plan_rango1_precio_chef, $plan_rango2_cantidad_min, $plan_rango2_cantidad_max, $plan_rango2_precio_porcion, $plan_rango2_precio_chef, $plan_servicio_base, $plan_precio_base, $plan_estado );
	}
	
	public function elimina(){
		$plan_id 			= trim( $this->input->post( 'parametro_id' ) );
		$plan_delete 		= $this->Planes_model->delete( $plan_id );
	}
	
	public function activar(){
		$plan_id 			= trim( $this->input->post( 'id' ) );
		$plan_delete 		= $this->Planes_model->activar( $plan_id );
	}
	
	public function desactivar(){
		$plan_id 			= trim( $this->input->post( 'id' ) );
		$plan_delete 		= $this->Planes_model->desactivar( $plan_id );
	}
	
	public function modal_image(){
		$plan_id 	= trim( $this->input->post( 'plan_nombre' ) );
	}
	
	
	public function modal_ingresar(){
		$data_view["flag"] = false;
		$data_view["data"] = "";
		$data_view['servicios'] 	= $this->Servicios_model->get_servicios_planes_active(); 
		$this->load->view('modal_planes_view', $data_view);
	}
	
	public function modal_editar(){
		$id = trim( $this->input->post( 'id' ) );
		$data_view["flag"] = true;
		$data_view["data"] = $this->Planes_model->get_by_id($id);
		$data_view['servicios'] 	= $this->Servicios_model->get_servicios_planes_active();
		$this->load->view('modal_planes_view', $data_view);
	}
}
