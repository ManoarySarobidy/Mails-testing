<?php
	
	defined('BASEPATH') or exit("Tsy azo idirana eh");

	class Acceuil extends CI_Controller{

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
			// var_dump($this->user);
			$sends = $this->mail->get_send_mail( $this->user->iduser );
			$data['sends'] = $sends;
			$this->load->view('acceuil/index', $data);
		}

		public function new_mail(){
			$users = $this->users->get_all_users();
			$data['users'] = $users;
			$this->load->view('acceuil/send_mail', $data);
		}

		public function send(){
			$receiver = $this->input->post('user');
			$message = $this->input->post('contenu');
			$this->mail->send_mail( $this->user->iduser, $receiver, $message );
			redirect( site_url('acceuil/index') );
		}

		public function see( $idMail ){
			// Okey eto no asiana hoe vu eh
			$this->mail->set_read( $idMail );
			$mail = $this->mail->get_mail($idMail);
			$data['mails'] = $mail;
			$this->load->view('acceuil/reply_mail', $data);
		}

		public function move_to_span( $idMail ){
			$this->mail->set_to_spam($idMail);	
			redirect( site_url('reception/index') );
		}

		public function remove_from_span( $idMail ){
			$this->mail->set_to_not_spam($idMail);
			redirect( site_url('reception/index') );
		}


		public function reply(){
			$user = $this->user->iduser;
			$receiver = $this->input->post('receiver');
			$contenu = $this->input->post('contenu');
			$this->mail->send_mail( $this->user->iduser, $receiver, $contenu );
			redirect( site_url('acceuil/index') );
		}

	}

?>