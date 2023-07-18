<?php

	defined('BASEPATH') or exit("No direct script allowed");

	class User extends CI_Controller{
		
		public function __construct(){
			parent::__construct();
			$this->load->model("User_model", "user");
		}

		public function login(){
			$username = $this->input->post("username");
			$password = $this->input->post("password");
			$response = $this->user->login( $username, $password );
			if( $response != NULL ){
				$this->session->set_userdata("user" , $response);
				redirect( site_url('acceuil/index') );
			}
		}
	}
?>