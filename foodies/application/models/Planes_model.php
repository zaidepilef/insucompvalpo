<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Planes_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	
	function get_planes() {
		$this->db->from('planes');
		$query = $this->db->get();
		if($query->num_rows() > 0 ) {
			return $query->result();
		} else {
			return FALSE;
		}
	}
	
	public function get_by_id( $id ) {
		if( $id == null ){
			$sql = "
				SELECT * FROM planes";
		}
		else if( $id > 0 ){
			$sql = "
				SELECT * FROM planes WHERE IdPlan = ".$id."";
		} 
		else if( $id == 0 ) {
			$sql = "SELECT * FROM planes";
		}
		$query = $this->db->query( $sql );
		if($query->num_rows() > 0 ) {
			return $query->result();
		} else {
			return FALSE;
		}
	}
	
	public function insert( 
		$plan_nombre, 
		$plan_servicio_id, 
		$plan_descripcion, 
		$plan_cantidad_platos, 
		
		$plan_rango1_cantidad_min, 
		$plan_rango1_cantidad_max, 
		$plan_rango1_precio_porcion, 
		$plan_rango1_precio_chef, 
		
		$plan_rango2_cantidad_min, 
		$plan_rango2_cantidad_max, 
		$plan_rango2_precio_porcion, 
		$plan_rango2_precio_chef, 
		
		$plan_servicio_base, 
		$plan_precio_base, 
		$plan_estado 
		) {
		$data = array(
			'IdServicio' 			=> $plan_servicio_id,
			'Nombre' 				=> $plan_nombre,
			'Descripcion' 			=> $plan_descripcion,
			'Cantidad_Platos' 		=> $plan_cantidad_platos, 
			
			'Rango1_CantidadMin' 	=> $plan_rango1_cantidad_min,
			'Rango1_CantidadMax' 	=> $plan_rango1_cantidad_max,
			'Rango1_PrecioPorcion' 	=> $plan_rango1_precio_porcion,
			'Rango1_Precio_Chef' 	=> $plan_rango1_precio_chef,
			
			'Rango2_CantidadMin' 	=> $plan_rango2_cantidad_min,
			'Rango2_CantidadMax' 	=> $plan_rango2_cantidad_max,
			'Rango2_PrecioPorcion' 	=> $plan_rango2_precio_porcion,
			'Rango2_Precio_Chef' 	=> $plan_rango2_precio_chef,
			
			'Nombre_ServicioBase' 	=> $plan_servicio_base,
			'Precio_ServicioBase' 	=> $plan_precio_base,
			'Estado' => $plan_estado
		);
		return $this->db->insert( 'planes' , $data);
	}
	
	public function update( $plan_id, $plan_nombre, $plan_servicio_id, $plan_descripcion, $plan_cantidad_platos, $plan_rango1_cantidad_min, $plan_rango1_cantidad_max, $plan_rango1_precio_porcion, $plan_rango1_precio_chef, $plan_rango2_cantidad_min, $plan_rango2_cantidad_max, $plan_rango2_precio_porcion, $plan_rango2_precio_chef, $plan_servicio_base, $plan_precio_base, $plan_estado ) {
		
		$data = array( 
			'IdServicio' 				=> $plan_servicio_id,
			'Nombre' 					=> $plan_nombre,
			'Descripcion' 				=> $plan_descripcion,
			'Cantidad_Platos' 			=> $plan_cantidad_platos,
			'Rango1_CantidadMin' 		=> $plan_rango1_cantidad_min,
			'Rango1_CantidadMax' 		=> $plan_rango1_cantidad_max,
			'Rango1_PrecioPorcion' 		=> $plan_rango1_precio_porcion,
			'Rango1_Servicio_Chef' 		=> $plan_rango1_precio_chef,
			
			'Rango2_CantidadMin' 		=> $plan_rango2_cantidad_min,
			'Rango2_CantidadMax' 		=> $plan_rango2_cantidad_max,
			'Rango2_PrecioPorcion' 		=> $plan_rango2_precio_porcion,
			'Rango2_Servicio_Chef' 		=> $plan_rango2_precio_chef,
			
			'Nombre_ServicioBase' 		=> $plan_servicio_base,
			'Precio_ServicioBase' 		=> $plan_precio_base,
			'Estado' => $plan_estado
		);
		$this->db->set( $data ); 
		$this->db->where( 'IdPlan' , $plan_id ); 
		$this->db->update( 'planes', $data );
		
	}
	
	public function delete( $id ) {
		$this->db->where( 'IdPlan' , $id );
		return $this->db->delete( 'planes' );
	}
	
	public function activar( $id ) {
		$data = array( 
			'Estado' => 'S' 
		);
		$this->db->set( $data ); 
		$this->db->where( 'IdPlan' , $id ); 
		$this->db->update( 'planes', $data );
		
	}
	
	public function desactivar( $id ) {
		$data = array( 
			'Estado' => 'N' 
		);
		$this->db->set( $data ); 
		$this->db->where( 'IdPlan' , $id ); 
		$this->db->update( 'planes', $data );
	}
}