<?php
	defined('BASEPATH') OR exit('No direct script access allowed');	
	
	class Sign extends CI_Controller{
		function login( ){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->load->model('user_model');
			$logs = $this->user_model->getUser($username , $password);
			$this->load->library('session');
			if( $logs != NULL ){
				$this->load->view('test');
			}else{
				$this->load->view('Login');
			}
		}
	}

?>