<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	function __construct() {
		parent:: __construct();
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
			$this->load->view('navbar_side',$data_view);
			$this->load->view('home_vista');
			$this->load->view('footer');
		} else {
			redirect( base_url().'login');
		}
	
	}
	
	
	
}




