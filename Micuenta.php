<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Micuenta extends CI_Controller {
	
	function __construct() {
		parent:: __construct();
	}
	
	public function index() {
		$usuario_id = $this->session->userdata('usuario_id');
		if( $usuario_id ){
			//muestra inicio My Account
			$usuario_datos = $this->Usuario_model->usuario_datos( $usuario_id );
			if( $usuario_datos ) {
				$usuario_detalle = array();
				foreach($usuario_datos as $usuario_datos_row) {
					$usuario_detalle = array(
						'usuario_id' 			=> $usuario_datos_row->usuario_id,
						'usuario_nombre' 		=> $usuario_datos_row->usuario_nombre,
						'usuario_apellido' 		=> $usuario_datos_row->usuario_apellido,
						'usuario_email' 		=> $usuario_datos_row->usuario_email,
						'usuario_nick' 			=> $usuario_datos_row->usuario_nick,
						'usuario_estado' 			=> $usuario_datos_row->usuario_estado,
					);
					$data_vista['usuario_id'] 			= $usuario_detalle['usuario_id'];
					$data_vista['usuario_nombre'] 		= $usuario_detalle['usuario_nombre'];
					$data_vista['usuario_apellido'] 	= $usuario_detalle['usuario_apellido'];
					$data_vista['usuario_email'] 		= $usuario_detalle['usuario_email'];
					$data_vista['usuario_nick'] 		= $usuario_detalle['usuario_nick'];
					$data_vista['usuario_estado'] 		= $usuario_detalle['usuario_estado'];
				}
				
				$data_vista['titulo_pagina'] = $usuario_detalle['usuario_nombre']." ".$usuario_detalle['usuario_apellido']." | The Coolinist";
				$this->load->view( 'coolinist/head' , $data_vista );
				$this->load->view( 'coolinist/content_begin_limpio' );
				$this->load->view( 'coolinist/navigator' );
				//contenido vista begin
				$this->load->view( 'coolinist/micuenta/sidebar' , $data_vista );
				$this->load->view( 'coolinist/micuenta/inicio_vista' , $data_vista );
				//contenido vista end
			
				$this->load->view( 'coolinist/content_end' );
				$this->load->view( 'coolinist/footer_limpio' );
				$this->load->view( 'coolinist/footer_script' );
			}
			
		} else {
			//envia a login
			redirect( base_url().'login');
			
		}
	}
	
}
