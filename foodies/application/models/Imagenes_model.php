<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Imagenes_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	
	function get_imagenes_tipo_id( $imagen_tipo, $imagen_item_id ) {
		$this->db->from('imagenes');
		$this->db->where( 'imagen_tipo' , $imagen_tipo );
		$this->db->where( 'imagen_item_id' , $imagen_item_id );
		$this->db->order_by( 'imagen_id' , 'desc' );
		$query = $this->db->get();
		if($query->num_rows() > 0 ) {
			return $query->result();
		} else {
			return FALSE;
		}
	}
	
	public function insert( $imagen_tipo , $imagen_item_id , $imagen_nombre ){
		$data = array(
			'imagen_tipo' 		=> $imagen_tipo,
			'imagen_item_id' 	=> $imagen_item_id,
			'imagen_nombre' 	=> $imagen_nombre
		);
		return $this->db->insert( 'imagenes' , $data);
	}
	
	public function delete( $id ) {
		$this->db->where( 'imagen_id' , $id );
		return $this->db->delete( 'imagenes' );
	}
	
	public function activar( $id ) {
		$data = array( 
			'estado' => 'S' 
		);
		$this->db->set( $data ); 
		$this->db->where( 'imagen_id' , $id ); 
		$this->db->update( 'imagenes', $data );
		
	}
	
	public function desactivar( $id ) {
		$data = array( 
			'estado' => 'N' 
		);
		$this->db->set( $data ); 
		$this->db->where( 'imagen_id' , $id ); 
		$this->db->update( 'imagenes', $data );
	}
}