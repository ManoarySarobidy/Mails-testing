<?php
	
	defined('BASEPATH') or exit("Can't access with direct script");

	class Mail_model extends CI_Model{

		public function get_all_mails(){
			$mails = $this->db->get("mails");
			// Okey azo ny mails rehetra
			// Averina ilay izy
			$mails = $mails->result_array();
			return $mails;
		}

		public function get_spam_mails(){
			$mails = $this->db->get("spams");
			$mails = $mails->result_array();
			return $mails;
		}

		public function get_received_mails(){
			$mails = $this->db->get('non_spams');
			$mails = $mails->result_array();
			return $mails;
		}

		public function get_received_mail( $iduser ){
			$query = "select * from not_spams where idreceiver = %s";
			$query = sprintf( $query, $this->db->escape($iduser) );
			$query = $this->db->query( $query );
			$results = $query->result_array();
			return $results;
		}

		public function get_last_insert(){
			$mails = $this->db->get('mail');
			$mails = $mails->result_array();
			return $mails[count($mails)-1];
		}

		public function insert_mail( $content ){
			$query = "insert into mail (contenu, dateEnvoie, read) values (%s , now(), false)";
			$query = sprintf( $query, $this->db->escape($content) );
			$this->db->query($query);
		}

		public function send_mail( $idSender, $idReceiver, $contenu ){
			$this->insert_mail( $contenu );
			$last = $this->get_last_insert();
			$this->insert_send_mail( $idSender, $idReceiver, $last['idmail'] );
		}

		public function insert_send_mail( $idSender, $idReceiver, $idMail ){
			$query = "insert into send_mail (idSender, idReceiver, idMail) values (%s , %s, %s)";
			$query = sprintf( $query, $this->db->escape($idSender), $this->db->escape($idReceiver), $this->db->escape($idMail) );
			$this->db->query($query);
		}

		public function set_read( $idMail ){
			$query = "update mail set read = true where idMail = %s";
			$query = sprintf( $query, $this->db->escape($idMail) );
			$this->db->query( $query );
		}

		public function set_to_spam( $idMail ){
			$query = "insert into spam (idMail) values (%s)";
			$query = sprintf( $query, $this->db->escape($idMail) );
			$this->db->query( $query );	
		}

		public function set_to_not_spam( $idMail ){
			$query = "delete from spam where idmail = %s";
			$query = sprintf( $query, $this->db->escape($idMail) );
			$this->db->query( $query );	
		}

		public function get_send_mail( $idUser ){
			$query = "select * from mails where idsender = %s";
			$query = sprintf( $query, $this->db->escape($idUser) );
			$query = $this->db->query( $query );
			$results = $query->result_array();
			return $results;
		}

		public function get_mail( $idMail ){
			$query = "select * from mails where idMail = %s";
			$query = sprintf( $query, $this->db->escape($idMail) );
			$query = $this->db->query( $query );
			return $query->result_array();
		}

		public function get_spams( $iduser ){
			$query = "select * from spams where idreceiver = %s";
			$query = sprintf( $query, $this->db->escape($iduser) );
			$query = $this->db->query( $query );
			return $query->result_array();
		}

	}


?>