<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	
	function __construct() {
		parent:: __construct();
	}
	
	public function index() {
		$user_id = $this->session->userdata('user_id');
		if( $user_id ) {
			$user_data = $this->User_model->user_data( $user_id );
			$user_detail = array();
			foreach($user_data as $user_data_row) {
				$user_detail = array(
					'usuario_admin_id' 			=> $user_data_row->usuario_admin_id,
					'usuario_admin_nombre' 		=> $user_data_row->usuario_admin_nombre,
					'usuario_admin_apellido' 	=> $user_data_row->usuario_admin_apellido,
					'usuario_admin_email' 		=> $user_data_row->usuario_admin_email,
					'usuario_admin_nick' 		=> $user_data_row->usuario_admin_nick,
					'usuario_admin_token' 		=> $user_data_row->usuario_admin_token,
					'usuario_admin_rol' 		=> $user_data_row->usuario_admin_rol
				);
				$data_view['usuario_admin_id'] 			= $user_detail['usuario_admin_id'];
				$data_view['usuario_admin_nombre'] 		= $user_detail['usuario_admin_nombre'];
				$data_view['usuario_admin_apellido'] 	= $user_detail['usuario_admin_apellido'];
				$data_view['usuario_admin_email'] 		= $user_detail['usuario_admin_email'];
				$data_view['usuario_admin_nick'] 		= $user_detail['usuario_admin_nick'];
				$data_view['usuario_admin_token'] 		= $user_detail['usuario_admin_token'];
				$data_view['usuario_admin_rol'] 		= $user_detail['usuario_admin_rol'];
			}
			
			$data_view['controller_name_id'] = $this->router->fetch_class();
			
			$this->load->view('header');
			$this->load->view('navbar_top');
			$this->load->view('navbar_side',$data_view);
			$this->load->view('profile_veiw');
			$this->load->view('footer');
				
		} else {
			redirect( base_url().'login');
		}
		
	
	}
	
	
	
}




