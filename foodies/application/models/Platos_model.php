<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class platos_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	
	public function get( $id ) {
		if( $id == null ){
			$sql = "
				SELECT * 
				FROM 
					platos 
				ORDER BY IdPlato DESC";
		}
		else if( $id > 0 ){
			$sql = "
				SELECT * 
				FROM 
					platos 
				WHERE
					IdPlato = ".$id." 
				ORDER BY IdPlato DESC";
		} 
		else if( $id == 0 ) {
			$sql = "
				SELECT * 
				FROM 
					platos 
				ORDER BY IdPlato DESC";
		}
		$query = $this->db->query( $sql );
		if($query->num_rows() > 0 ) {
			return $query->result();
		} else {
			return FALSE;
		}
	}
	
	public function get_tipos_platos(){
	
		$sql = "
				SELECT * 
				FROM 
					cl_parametro 
				WHERE parametro_clase = 6
				AND parametro_item != 0 
				ORDER BY parametro_id DESC";
				$query = $this->db->query( $sql );
		if($query->num_rows() > 0 ) {
			return $query->result();
		}
	}
	
	 public function insert( $nombre , $tipo) {
		
		$query = $this->db->query( "SELECT * FROM platos WHERE Nombre = '".$nombre."' AND Tipo ='".$tipo."'" );
		$cant_item = $query->num_rows();
		if( $cant_item == 0 ){
			$data = array(
			'Nombre' => $nombre,
			'Tipo' => $tipo,
			'Estado' => 'S',
			'Creacion_Fecha' => date('Y/m/d', time())
			);
			return $this->db->insert('platos', $data);
		}
		else{
			return "ya existe plato";
		}
		
	 }
	
	 public function update( $id , $nombre , $nombre_sec, $tipo, $desc) {
	 $data = array( 
		 'Nombre' => $nombre,
		 'Nombre_Secundario' => $nombre_sec,
		 'Tipo' => $tipo,
		 'Descripcion_General' => $desc
	 );
	 $this->db->set( $data ); 
	 $this->db->where( 'IdPlato' , $id ); 
	 $this->db->update( 'platos', $data );
	 }
	
	 public function delete( $id ) {
		try{
			$sql = "SELECT * FROM menu_platos WHERE IdPlato = $id";
			$query = $this->db->query($sql);
			if($query->num_rows() < 0){
				 $this->db->where( 'IdPlato' , $id );
				 $this->db->delete( 'platos' );
				 return "0";
			}
			else{
				throw new Exception("1");
			}
		}
		catch(Exception $ex){
			return $ex;
		}
	 
	 }
	 
	 public function deleteDeMenu( $id ){
		try{
			 $this->db->where( 'IdPlato' , $id );
			 $this->db->delete( 'menu_platos' );
			 return "0";
		 }
		 catch(Exception $ex){
			return $ex;
		 }
	 }
	 
	 public function activar( $id ) {
		$data = array( 
			'Estado' => 'S'
		);
		$this->db->set( $data ); 
		$this->db->where( 'IdPlato' , $id ); 
		$this->db->update( 'platos', $data );
	}
	
	public function desactivar( $id ) {
		$data = array( 
			'Estado' => 'N'
		);
		$this->db->set( $data ); 
		$this->db->where( 'IdPlato' , $id ); 
		$this->db->update( 'platos', $data );
	}
}