<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Imagenes extends CI_Controller {

	function __construct() {
		parent:: __construct();
		$this->load->model('Imagenes_model');
		$this->load->helper('text');
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
			$this->load->view('imagenes_view', $data_view);
			//contenido end
			$this->load->view('footer');
		} else {
			redirect( base_url().'login');
		}
	}
	
	public function cargar_archivo(){
		$mi_archivo = 'mi_archivo';
		$config['upload_path'] = "uploads/";
		$config['file_name'] = "nombre_archivo";
		$config['allowed_types'] = "*";
		$config['max_size'] = "50000";
		$config['max_width'] = "2000";
		$config['max_height'] = "2000";
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload($mi_archivo)) {
			//*** ocurrio un error
			$data['uploadError'] = $this->upload->display_errors();
			echo $this->upload->display_errors();
			return;
		}
		$data['uploadSuccess'] = $this->upload->data();
	}
	
	public function cargar_imagen() {
		$imagen_tipo 		= trim($this->input->post('imagen_tipo'));
		$imagen_item_id 	= trim($this->input->post('imagen_item_id'));
		
		$config['upload_path'] = "./assets/images/uploads/";
		$config['allowed_types'] = "gif|jpg|jpeg|png";
		$config['file_name'] = convert_accented_characters($_FILES['userfile']['name']);
		$config['remove_spaces'] = true;
		$config['overwrite'] = false;
		$this->load->library( 'upload', $config );
		
		if(!$this->upload->do_upload()){
			echo"<br> display_errors : ".$this->upload->display_errors();
		} else {
			$upload_data 		= $this->upload->data();
			$nombre_imagen 		= $upload_data['file_name'];
			// insert to database imagenes
			$imagen_new = $this->Imagenes_model->insert( $imagen_tipo, $imagen_item_id, $nombre_imagen );
			//print_r( $this->upload->data());
		}
		
	}
	
	public function modal_imagen(){
		$imagen_tipo 			= trim( $this->input->post( 'imagen_tipo' ) );
		$imagen_item_id 		= trim( $this->input->post( 'imagen_item_id' ) );
		$get_imagenes_tipo_id 	= $this->Imagenes_model->get_imagenes_tipo_id( $imagen_tipo, $imagen_item_id );
		$data_view['imagenes_tipo'] 	= $get_imagenes_tipo_id;
		$data_view['imagen_tipo'] 		= $imagen_tipo;
		$data_view['imagen_item_id'] 	= $imagen_item_id;
		$this->load->view('modal_get_imagenes_tipo', $data_view );
	}
	
	public function elimina(){
		$imagen_id 			= trim( $this->input->post( 'imagen_id' ) );
		$imagen_delete 		= $this->Imagenes_model->delete( $imagen_id );
	}
	
}