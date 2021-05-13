<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct() {
		parent:: __construct();
	}
	
	public function index() {
		$this->load->view('login_vista');
	}
	
	public function save(){
		$login_nick 			= trim( $this->input->post( 'login_nick' ) );
		$login_password 		= trim( $this->input->post( 'login_password' ) );
		
		$user_exist = $this->User_model->user_exist( $login_nick );
		
		if( $user_exist ) {
			
			$user_login = $this->User_model->user_login( $login_nick , $login_password );
			
			if( $user_login ) {
				$data_login = array();
				foreach($user_login as $usuario_row) {
					$data_login = array(
						'usuario_admin_id' 		=> $usuario_row->usuario_admin_id,
						'usuario_admin_nombre' 	=> $usuario_row->usuario_admin_nombre,
						'usuario_admin_apellido' 	=> $usuario_row->usuario_admin_apellido,
						'usuario_admin_rol' 	=> $usuario_row->usuario_admin_rol
					);
					$this->session->set_userdata('user_id', $data_login['usuario_admin_id']);
					$this->session->set_userdata('user_nombre', $data_login['usuario_admin_nombre']);
					$this->session->set_userdata('user_apellido', $data_login['usuario_admin_apellido']);
					$this->session->set_userdata('user_rol', $data_login['usuario_admin_rol']);
					redirect( base_url().'home');
				}
				
			} else {
				//echo "<br> Password Erroneo";
				$this->session->set_flashdata( 'notice' , 'Password is Wrong');
				redirect( base_url().'login');
			}
			
		} else {
			//echo "<br> Password Erroneo";
			$this->session->set_flashdata( 'notice' , 'Username does not Exist');
			redirect( base_url().'login');
		}
		
	}
	
}




