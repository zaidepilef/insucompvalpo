<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Platos extends CI_Controller {

	function __construct() {
		parent:: __construct();
		$this->load->model('Platos_model');
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
			$data_view["platos_tipos"] = $this->Platos_model->get_tipos_platos();
			$this->load->view('platos_view', $data_view);
			//contenido end
			
			$this->load->view('footer');
		} else {
			redirect( base_url().'login');
		}
	}
	
	public function resultado_ajax(){
		$this->load->helper('url');
		$parametro = trim( $this->input->post( 'parametro' ) );
		$data_view['error'] = "";
		$data_view['platos'] = $this->Platos_model->get($parametro);
		$data_view["platos_tipos"] = $this->Platos_model->get_tipos_platos();
		$this->load->view('resultado_platos_view', $data_view );
	}
	
	 public function ingresa(){
		try{
			 $parameter_nombre 		= trim( $this->input->post( 'parameter_nombre' ) );
			 $parameter_tipo 		= trim( $this->input->post( 'parameter_tipo' ) );
			 $error 				= $this->Platos_model->insert( $parameter_nombre , $parameter_tipo);
			 if($error == 'err'){
				throw new Exception("Lo Sentimos, tenemos algunos inconvenientes, favor intente de nuevo más tarde.");
			 }
		 }
		 catch(Exception $ex){
			$data_view['error'] = $ex;
			$data_view['platos'] = $this->Platos_model->get(0);
			$data_view["platos_tipos"] = $this->Platos_model->get_tipos_platos();
			$this->load->view('resultado_platos_view', $data_view );
		 }
	 }
	
	 public function actualiza(){
		 $parametro_id 				= trim( $this->input->post( 'parametro_id' ) );
		 $parametro_nombre 			= trim( $this->input->post( 'parametro_nombre' ) );
		 $parametro_nombre_sec 		= trim( $this->input->post( 'parametro_nombre_sec' ) );
		 $parametro_tipo 			= trim( $this->input->post( 'parametro_tipo' ) );
		 $parametro_desc 			= trim( $this->input->post( 'parametro_desc' ) );
		 $parameter_update 			= $this->Platos_model->update( $parametro_id , $parametro_nombre, 
									   $parametro_nombre_sec, $parametro_tipo, $parametro_desc);
	 }
	
	 public function elimina(){
		try{
			 $parametro_id 	= trim( $this->input->post( 'parametro_id' ) );
			 $error1 		= $this->Platos_model->delete( $parametro_id );
			 if($error1 == "0"){
				$error2		= $this->Platos_model->deleteDeMenu( $parametro_id );
				if($error2 != "0"){
					throw new Exception("Lo Sentimos, tenemos algunos inconvenientes, favor intente de nuevo más tarde.");
				}
			 }
			 else if($error1 == "1"){
				throw new Exception($error1);
			 }
			 else{
				throw new Exception("Lo Sentimos, tenemos algunos inconvenientes, favor intente de nuevo más tarde.");
			 }
		 }
		 catch(Exception $ex){
			$data_view['error'] = $ex;
			$data_view['platos'] = $this->Platos_model->get(0);
			$data_view["platos_tipos"] = $this->Platos_model->get_tipos_platos();
			$this->load->view('resultado_platos_view', $data_view );
		 }
	 }
	 
	 public function activar(){
		$parametro_id 				= trim( $this->input->post( 'parametro_id' ) );
		$parameter_active 			= $this->Platos_model->activar( $parametro_id );
	}
	
	public function desactivar(){
		$parametro_id 				= trim( $this->input->post( 'parametro_id' ) );
		$parameter_active 			= $this->Platos_model->desactivar( $parametro_id );
	}
	
	public function modal_image(){
		$plan_id 	= trim( $this->input->post( 'plato_nombre' ) );		
	}
}