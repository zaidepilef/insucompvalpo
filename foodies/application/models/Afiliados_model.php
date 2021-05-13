<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class afiliados_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	
	public function get_afiliados( $afiliado_id ) {
		if( $afiliado_id == null ){
			$sql = "
				SELECT * 
				FROM 
					afiliados 
				ORDER BY IdAfiliado DESC";
		}
		else if( $afiliado_id > 0 ){
			$sql = "
				SELECT * 
				FROM 
					afiliados 
				WHERE
					IdAfiliado = ".$afiliado_id." 
				ORDER BY IdAfiliado DESC";
		} 
		else if( $afiliado_id == 0 ) {
			$sql = "
				SELECT * 
				FROM 
					afiliados 
				ORDER BY IdAfiliado DESC";
		}
		$query = $this->db->query( $sql );
		//$query = $this->db->get_where('cl_parametro', array( 'parametro_clase' => $parametro_clase_id ) );
		if($query->num_rows() > 0 ) {
			return $query->result();
		} else {
			return FALSE;
		}
	}
	
	public function insert( $nombres , $apellidos, $password, $email) {
		
		$query = $this->db->query( "SELECT * FROM afiliados WHERE Email = '".$email."'" );
		$cant_item = $query->num_rows();
		if( $cant_item == 0 ){
			$data = array(
			'Nombres' => $nombres,
			'Apellidos' => $apellidos,
			'Password' => $password,
			'Email' => $email,
			'Estado' => 'S'
			);
			return $this->db->insert('afiliados', $data);
		}
		else{
			return "ya existe correo";
		}
		
	}
	
	public function update( $id , $nombres , $apellidos, $fecha_nacimiento, $genero, $nick, $email) {
		$data = array( 
			'Nombres' => $nombres,
			'Apellidos' => $apellidos,
			'Fecha_Nacimiento' => $fecha_nacimiento,
			'Genero' => $genero,
			'Nick' => $nick,
			'Email' => $email
		);
		$this->db->set( $data ); 
		$this->db->where( 'IdAfiliado' , $id ); 
		$this->db->update( 'afiliados', $data );
	}
	
	public function delete( $id ) {
		$this->db->where( 'IdAfiliado' , $id );
		return $this->db->delete( 'afiliados' );
	}
}