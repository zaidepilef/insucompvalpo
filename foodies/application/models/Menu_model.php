<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	
	public function get( $id) {
		if( $id == null ){
			$sql = "
				SELECT * 
				FROM 
					menu_semanal 
				ORDER BY IdMenu ASC";
		}
		else if( $id > 0 ){
			$sql = "
				SELECT * 
				FROM 
					menu_semanal 
				WHERE
					IdMenu = ".$id." 
				ORDER BY IdMenu ASC";
		} 
		else if( $id == 0 ) {
			$sql = "
				SELECT * 
				FROM 
					menu_semanal 
				ORDER BY IdMenu ASC";
		}
		$query = $this->db->query( $sql );
		if($query->num_rows() > 0 ) {
			return $query->result();
		} else {
			return FALSE;
		}
	}
	
	public function get_servicios(){
		$sql = "
				SELECT * 
				FROM 
					servicios  
				ORDER BY IdServicio DESC";
				$query = $this->db->query( $sql );
		if($query->num_rows() > 0 ) {
			return $query->result();
		}else {
			return FALSE;
		}
	}
	
	public function get_platos(){
		$sql = "
				SELECT * 
				FROM 
					platos  
				ORDER BY IdPlato DESC";
				$query = $this->db->query( $sql );
		if($query->num_rows() > 0 ) {
			return $query->result();
		}else {
			return FALSE;
		}
	}
	
	public function get_menus( $id ){
		$sql = "
				SELECT * 
				FROM 
					menu_platos  
				WHERE IdMenu = $id";
				$query = $this->db->query( $sql );
		if($query->num_rows() > 0 ) {
			return $query->result();
		}else {
			return FALSE;
		}
	}
	
	public function ingresar( $servicio, $nombre, $descripcion ){
		
		$sql = "UPDATE menu_semanal SET Indicador_Publicacion = 'N', Estado = 'N'";
		$query = $this->db->query( $sql );
		
		$data = array(
			'IdServicio' => $servicio,
			'Nombre'	 => $nombre,
			'Descripcion'=> $descripcion,
			'Indicador_Publicacion' => 'S',
			'Publicacion_fecha' => date('Y-m-d', time()),
			'Estado' => 'S'
		);
		
		$this->db->insert('menu_semanal', $data);
	}
	
	public function ingresarPlato( $id_menu, $id_plato){
		
		$sql = "SELECT * FROM menu_platos WHERE IdMenu = $id_menu AND IdPlato = $id_plato";
		$query = $this->db->query( $sql );
		if($query->num_rows() > 0){
			return "Plato ya existe en menu";
		}
		else{
			$data = array(
				'IdMenu' => $id_menu,
				'IdPlato'	 => $id_plato,
				'Fecha_Creacion' => date('Y-m-d', time())
			);
			
			$this->db->insert('menu_platos', $data);
		}
	}
	
	public function update( $id , $servicio, $nombre , $descripcion ) {
		$data = array( 
			'IdServicio' => $servicio,
			'Nombre' => $nombre,
			'Descripcion' => $descripcion
		);
		$this->db->set( $data ); 
		$this->db->where( 'IdMenu' , $id ); 
		$this->db->update( 'menu_semanal', $data );
	}
	
	public function delete( $id ) {
		$this->db->where( 'IdMenu' , $id );
		return $this->db->delete( 'menu_semanal' );
	}
	
	public function deletePlato( $id ) {
		$this->db->where( 'IdMenuPlato' , $id );
		return $this->db->delete( 'menu_platos' );
	}
	
	public function activar( $id ) {
		$data = array( 
			'Estado' => 'S'
		);
		$this->db->set( $data ); 
		$this->db->where( 'IdMenu' , $id ); 
		$this->db->update( 'menu_semanal', $data );
	}
	
	public function desactivar( $id ) {
		$data = array( 
			'Estado' => 'N'
		);
		$this->db->set( $data ); 
		$this->db->where( 'IdMenu' , $id ); 
		$this->db->update( 'menu_semanal', $data );
	}
	
	
}