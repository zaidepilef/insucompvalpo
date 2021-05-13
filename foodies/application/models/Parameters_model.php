<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class parameters_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function get_parameter_dependiente( $parametro_clase_id ) {
		if( $parametro_clase_id == null ){
			$sql = "
				SELECT * 
				FROM 
					cl_parametro 
				ORDER BY parametro_item DESC";
		} else if( $parametro_clase_id > 0 ){
			$sql = "
				SELECT * 
				FROM 
					cl_parametro 
				WHERE 
					parametro_item != 0 
				AND 
					parametro_clase = ".$parametro_clase_id." 
				ORDER BY parametro_item DESC";
		} else if( $parametro_clase_id == 0 ) {
			$sql = "
				SELECT * 
				FROM 
					cl_parametro 
				WHERE 
					parametro_item = 0
				ORDER BY parametro_item DESC";
		}
		$query = $this->db->query( $sql );
		//$query = $this->db->get_where('cl_parametro', array( 'parametro_clase' => $parametro_clase_id ) );
		if($query->num_rows() > 0 ) {
			return $query->result();
		} else {
			return FALSE;
		}
	}
	
	function get_parametro_clases_droplist() {
	
		$this->db->from('cl_parametro');
		$this->db->where('parametro_item', 0 );
		$result = $this->db->get();
		
		$return = array();
		
		$return[''] = 'todos los registros';
		$return['0'] = 'Clase Padre';
		if( $result->num_rows() > 0 ) {
			foreach( $result->result_array() as $row ) {
				$return[ $row[ 'parametro_clase' ] ] = $row[ 'parametro_nombre' ];
			}
		}
		return $return;
	}
	
	public function parameter_new( $clase , $nombre  ) {
		if( $clase == 0 ) {
			$query = $this->db->query('SELECT * FROM cl_parametro WHERE parametro_item = 0');
			$cant_padres = $query->num_rows();
			if( $cant_padres == 0 ){
				$nuevo_clase = 1;
			} else {
				$nuevo_clase = $cant_padres+1;
			}
			$data = array(
				'parametro_clase' => $nuevo_clase,
				'parametro_item' => 0,
				'parametro_nombre' => $nombre
			);
		} else {
			$query = $this->db->query( 'SELECT * FROM cl_parametro WHERE parametro_clase = '.$clase );
			$cant_item = $query->num_rows();
			if( $cant_item == 0 ){
				$nuevo_item = 1;
			} else if( $cant_item == 0 ) {
				$nuevo_item = $cant_item;
			}else{
				$nuevo_item = $cant_item+1;
			}
			$data = array(
				'parametro_clase' => $clase,
				'parametro_item' => $nuevo_item,
				'parametro_nombre' => $nombre,
				'parametro_estado' => 'S'
			);
		}
		return $this->db->insert('cl_parametro', $data);
	}
	
	public function parameter_update( $id , $nombre , $descripcion  ) {
		$data = array( 
			'parametro_nombre' => $nombre,
			'parametro_descripcion' => $descripcion
		);
		$this->db->set( $data ); 
		$this->db->where( 'parametro_id' , $id ); 
		$this->db->update( 'cl_parametro', $data );
	}
	
	public function parameter_delete( $id ) {
		$this->db->where( 'parametro_id' , $id );
		return $this->db->delete( 'cl_parametro' );
	}
	
	public function parameter_active( $id ) {
		$data = array( 
			'parametro_estado' => 'S'
		);
		$this->db->set( $data ); 
		$this->db->where( 'parametro_id' , $id ); 
		$this->db->update( 'cl_parametro', $data );
	}
	
	public function parameter_desactive( $id ) {
		$data = array( 
			'parametro_estado' => 'N'
		);
		$this->db->set( $data ); 
		$this->db->where( 'parametro_id' , $id ); 
		$this->db->update( 'cl_parametro', $data );
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