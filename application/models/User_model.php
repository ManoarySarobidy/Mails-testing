<?php
	
	defined('BASEPATH') or exit("No direct access allowed");

	class User_model extends CI_Model{

		public function login( $username, $password ){
			$query = "select * from users where nom = %s and pass = %s";
			$query = sprintf( $query, $this->db->escape($username), $this->db->escape($password) );
			$query = $this->db->query($query);
			$result = $query->row();
			if( isset($result) ){
				return $result;
			}
			return null;
		}

		public function get_all_users(){
			$users = $this->db->get("users");
			$results = $users->result_array();
			return $results;
		}

	}
?>
