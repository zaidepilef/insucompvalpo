<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Eventos extends CI_Controller {

	function __construct() {
		parent:: __construct();
		$this->load->model('Eventos_model');
		$this->load->model('Parameters_model');
		$this->load->model('Menu_model');
		$this->load->model('Admin_model');
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
			$this->load->view('eventos_view');
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
		$data_view['eventos'] = $this->Eventos_model->get($parametro);
		$data_view["estados"] = $this->Parameters_model->get_parameter_dependiente(9);
		$data_view["tiposmenu"] = $this->Parameters_model->get_parameter_dependiente(10);
		
		$this->load->view('resultado_eventos_view', $data_view );
	}
	
	public function ingresa(){
		$nombre 			= trim( $this->input->post( 'nombre' ) );
		$descripcion		= trim( $this->input->post( 'descripcion' ) );
		$fecha				= trim( $this->input->post( 'fecha' ) );
		$region 			= trim( $this->input->post( 'region' ) );
		$comuna 			= trim( $this->input->post( 'comuna' ) );
		$direccion			= trim( $this->input->post( 'direccion' ) );
		$menu				= trim( $this->input->post( 'menu' ) );
		$menu_tipo			= trim( $this->input->post( 'menu_tipo' ) );
		$menu_tiempo		= trim( $this->input->post( 'menu_tiempo' ) );
		$cant_chef			= trim( $this->input->post( 'cant_chef' ) );
		$chef				= trim( $this->input->post( 'chef' ) );
		$maridaje			= trim( $this->input->post( 'maridaje' ) );
		$fecha_cierre		= trim( $this->input->post( 'fecha_cierre' ) );
		$min				= trim( $this->input->post( 'min' ) );
		$max				= trim( $this->input->post( 'max' ) );
		$precio				= trim( $this->input->post( 'precio' ) );
		$descuento			= trim( $this->input->post( 'descuento' ) );
		$fecha_descuento	= trim( $this->input->post( 'fecha_descuento' ) );
		$publicacion		= trim( $this->input->post( 'publicacion' ) );
		$comentario			= trim( $this->input->post( 'comentario' ) );
		
		$new				= $this->Eventos_model->insert( $nombre, $descripcion, $fecha, $region,
															$comuna, $direccion, $menu, $menu_tipo,
															$menu_tiempo, $cant_chef, $chef, $maridaje,
															$fecha_cierre, $min, $max, $precio, $descuento, 
															$fecha_descuento, $publicacion, $comentario );
	}
	
	public function actualiza(){
		$id					= trim( $this->input->post( 'id' ));
		$nombre 			= trim( $this->input->post( 'nombre' ) );
		$descripcion		= trim( $this->input->post( 'descripcion' ) );
		$fecha				= $this->input->post( 'fecha' );
		$region 			= trim( $this->input->post( 'region' ) );
		$comuna 			= trim( $this->input->post( 'comuna' ) );
		$direccion			= trim( $this->input->post( 'direccion' ) );
		$menu				= trim( $this->input->post( 'menu' ) );
		$menu_tipo			= trim( $this->input->post( 'menu_tipo' ) );
		$menu_tiempo		= trim( $this->input->post( 'menu_tiempo' ) );
		$cant_chef			= trim( $this->input->post( 'cant_chef' ) );
		$chef				= trim( $this->input->post( 'chef' ) );
		$maridaje			= trim( $this->input->post( 'maridaje' ) );
		$fecha_cierre		= trim( $this->input->post( 'fecha_cierre' ) );
		$min				= trim( $this->input->post( 'min' ) );
		$max				= trim( $this->input->post( 'max' ) );
		$precio				= trim( $this->input->post( 'precio' ) );
		$descuento			= trim( $this->input->post( 'descuento' ) );
		$fecha_descuento	= trim( $this->input->post( 'fecha_descuento' ) );
		$publicacion		= trim( $this->input->post( 'publicacion' ) );
		$comentario			= trim( $this->input->post( 'comentario' ) );
		$estado				= trim( $this->input->post( 'estado' ) );
		
		return $update 			= $this->Eventos_model->update( $id, $nombre, $descripcion, $fecha, $region,
															$comuna, $direccion, $menu, $menu_tipo,
															$menu_tiempo, $cant_chef, $chef, $maridaje,
															$fecha_cierre, $min, $max, $precio, $descuento, 
															$fecha_descuento, $publicacion, $comentario,
															$estado);
	}
	
	public function modal_ingresar(){
		$data_view["flag"] = false;
		$data_view["regiones"] = $this->Parameters_model->get_parameter_dependiente(4);
		$data_view["comunas"] = $this->Parameters_model->get_parameter_dependiente(8);
		$data_view["estados"] = $this->Parameters_model->get_parameter_dependiente(9);
		$data_view["tiposmenu"] = $this->Parameters_model->get_parameter_dependiente(10);
		$data_view["menus"] = $this->Menu_model->get(0);
		$data_view["chefs"] = $this->Admin_model->get_rol_especifico(24);
		$data_view["data"] = "";
		$this->load->view('modal_eventos_form', $data_view);
	}
	
	public function modal_editar(){
		$id = trim( $this->input->post( 'id' ) );
		$data_view["flag"] = true;
		$data_view["regiones"] = $this->Parameters_model->get_parameter_dependiente(4);
		$data_view["comunas"] = $this->Parameters_model->get_parameter_dependiente(8);
		$data_view["estados"] = $this->Parameters_model->get_parameter_dependiente(9);
		$data_view["tiposmenu"] = $this->Parameters_model->get_parameter_dependiente(10);
		$data_view["menus"] = $this->Menu_model->get(0);
		$data_view["chefs"] = $this->Admin_model->get_rol_especifico(24);
		$data_view["data"] = $this->Eventos_model->get($id);
		$this->load->view('modal_eventos_form', $data_view);
	}
	
	public function elimina(){
		$parametro_id 				= trim( $this->input->post( 'parametro_id' ) );
		$parameter_delete 			= $this->Eventos_model->delete( $parametro_id );
	}
}