<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	
	public function get( $id ) {
		if( $id == null ){
			$sql = "
				SELECT * 
				FROM 
					cl_usuario_admin 
				ORDER BY usuario_admin_id DESC";
		}
		else if( $id > 0 ){
			$sql = "
				SELECT * 
				FROM 
					cl_usuario_admin 
				WHERE
					usuario_admin_id = ".$id." 
				ORDER BY usuario_admin_id DESC";
		} 
		else if( $id == 0 ) {
			$sql = "
				SELECT * 
				FROM 
					cl_usuario_admin 
				ORDER BY usuario_admin_id DESC";
		}
		$query = $this->db->query( $sql );
		if($query->num_rows() > 0 ) {
			return $query->result();
		} else {
			return FALSE;
		}
	}
	
	public function get_roles(){
		$sql = "
				SELECT * 
				FROM 
					cl_parametro 
				WHERE parametro_clase = 7
				AND parametro_item != 0 
				ORDER BY parametro_id DESC";
				$query = $this->db->query( $sql );
		if($query->num_rows() > 0 ) {
			return $query->result();
		}
	}
	
	public function get_rol_especifico($rol){
		$sql = "
				SELECT * 
				FROM 
					cl_usuario_admin
				WHERE usuario_admin_rol = $rol";
				$query = $this->db->query( $sql );
		if($query->num_rows() > 0 ) {
			return $query->result();
		}
	}
	
	public function insert( $parameer_nick, $parameter_nombre, $parameter_password, $parameter_email, $parameter_tipo ) {
		
		$query = $this->db->query( "SELECT * FROM cl_usuario_admin WHERE usuario_admin_email = '".$parameter_email."'" );
		$cant_item = $query->num_rows();
		if( $cant_item == 0 ){
			$data = array(
			'usuario_admin_nick' => $parameer_nick,
			'usuario_admin_nombre' => $parameter_nombre,
			'usuario_admin_password' => $parameter_password,
			'usuario_admin_email' => $parameter_email,
			'usuario_admin_rol' => $parameter_tipo,
			'usuario_admin_estado' => 'NUEVO'
			);
			return $this->db->insert('cl_usuario_admin', $data);
		}
		else{
			return "ya existe correo";
		}
		
	}
	
	public function update( $parametro_id , $parametro_nick, $parametro_nombre, $parametro_apellido, 
							$parametro_email, $parametro_rol) {
		$data = array( 
			'usuario_admin_nick' => $parametro_nick,
			'usuario_admin_nombre' => $parametro_nombre,
			'usuario_admin_apellido' => $parametro_apellido,
			'usuario_admin_rol' => $parametro_rol,
			'usuario_admin_email' => $parametro_email
		);
		$this->db->set( $data ); 
		$this->db->where( 'usuario_admin_id' , $parametro_id ); 
		$this->db->update( 'cl_usuario_admin', $data );
	}
	
	public function delete( $id ) {
		$this->db->where( 'usuario_admin_id' , $id );
		return $this->db->delete( 'cl_usuario_admin' );
	}
}