<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servicios_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	
	function get_servicios() {
		$this->db->from('servicios');
		$query = $this->db->get();
		if($query->num_rows() > 0 ) {
			return $query->result();
		} else {
			return FALSE;
		}
	}
	
	function get_servicios_active() {
		$this->db->from('servicios');
		$this->db->where('Estado', 'S');
		$query = $this->db->get();
		if($query->num_rows() > 0 ) {
			return $query->result();
		} else {
			return FALSE;
		}
	}
	
	function get_servicios_planes_active() {
		$this->db->from('servicios');
		$this->db->where('Estado', 'S');
		$this->db->where('Tipo_Servicio', 'planes');
		$query = $this->db->get();
		if($query->num_rows() > 0 ) {
			return $query->result();
		} else {
			return FALSE;
		}
	}
	
	public function insert() {
	
	
	}
	
	public function update() {
	
	
	}
	
	public function delete( $id ) {
	
	
	}
}