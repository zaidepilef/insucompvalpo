<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {
	
	function __construct() {
		parent:: __construct();
	}
	
	public function index() {
		if(session_destroy()) {
			$this->session->unset_userdata('user_id');
			redirect( 'login' , 'refresh');
		}
	}
	
}




