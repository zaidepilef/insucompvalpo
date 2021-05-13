<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function user_login( $nick , $password ) {
		$password_md5 	= md5($password); 
		$this->db->from('cl_usuario_admin');
		$this->db->where('usuario_admin_nick', $nick);
		$this->db->where('usuario_admin_password', $password_md5);
		$query = $this->db->get();
		if($query->num_rows() > 0 ) {
			return $query->result();
		} else {
			return FALSE;
		}
	}

	public function user_new( $nombre , $apellido , $correo , $password ) {
		$password_md5 	= md5( $password ); 
		$this->load->helper( 'string' );
		$token = strtolower( random_string( 'alnum' , 10 ) );
		$data = array(
			'usuario_admin_nombre' => $nombre,
			'usuario_admin_apellido' => $apellido,
			'usuario_admin_email' => $correo,
			'usuario_admin_password' => $password_md5,
			'usuario_admin_token' => $token,
			'usuario_admin_estado' => 'NUEVO'
		);
		
		return $this->db->insert('cl_usuario_admin', $data);  
	}

	
	
	public function user_exist( $user_nick ) {
		$this->db->from('cl_usuario_admin');
		$this->db->where('usuario_admin_nick', $user_nick);
		$query = $this->db->get();
		if($query->num_rows() > 0 ) {
			return true;
		} else {
			return false;
		}
	}
	
	public function user_email_existe( $email ) {
		
		$this->db->from('cl_usuario_admin');
		$this->db->where('usuario_admin_email', $email);
		$query = $this->db->get();
		if($query->num_rows() > 0 ) {
			return true;
		} else {
			return false;
		}
	}
	
	public function user_nick_existe( $nick ) {
		
		$this->db->from('cl_usuario_admin');
		$this->db->where('usuario_admin_nick', $nick);
		$query = $this->db->get();
		if($query->num_rows() > 0 ) {
			return true;
		} else {
			return false;
		}
	}
	
	public function user_data( $user_id ) {
		
		$this->db->from('cl_usuario_admin');
		$this->db->where('usuario_admin_id', $user_id);
		$query = $this->db->get();
		if($query->num_rows() > 0 ) {
			return $query->result();
		} else {
			return FALSE;
		}
		
	}
	
	public function user_datos_email( $usuario_email ) {
		
		$this->db->from('cl_usuario_admin');
		$this->db->where('usuario_admin_email', $usuario_email);
		$query = $this->db->get();
		if($query->num_rows() > 0 ) {
			return $query->result();
		} else {
			return FALSE;
		}
		
	}
	
	public function user_update_password( $usuario_id , $usuario_password_new ) {
		$usuario_password_new_md5 = md5( $usuario_password_new );
		$data = array( 
			'usuario_admin_password' => $usuario_password_new_md5
		);
		
		$this->db->set( $data ); 
		$this->db->where( 'usuario_admin_id' , $usuario_id ); 
		$this->db->update( 'cl_usuario_admin', $data );
		
	}
	
	
	
}