<?php
	
	defined('BASEPATH') or exit("Tsy azo idirana eh");

	class Reception extends CI_Controller{

		public function __construct(){
			parent::__construct();
			if( !$this->session->has_userdata("user") ){
				redirect(base_url());
			}

			$this->load->model('Mail_model', 'mail');
			$this->load->model('User_model', 'users');
			$this->user = $this->session->userdata("user");
		}

		public function index(){
			$sends = $this->mail->get_received_mail( $this->user->iduser );
			$data['receiveds'] = $sends;
			$this->load->view('acceuil/reception', $data);
		}

		public function spam(){
			$spams = $this->mail->get_spams( $this->user->iduser );
			$data['spams'] = $spams;
			$this->load->view('acceuil/spam', $data);
		}
	}
?>