<?php 

	class Users extends CI_Controller{

		public function login(){

			$data['title'] = "Uloguj Se";

			$this->form_validation->set_error_delimiters('<div class="error-input"><i class="fa fa-times-circle"></i>&nbsp;', '</div>');

			$this->form_validation->set_rules('username', "Username", 'trim|required|htmlspecialchars', array('required' => "Potrebno je uneti username."));
			$this->form_validation->set_rules('password', "Password", 'trim|required', array('required' => 'Potrebno je uneti sifru.'));

			if($this->form_validation->run() === FALSE){
				$this->load->view("templates/header");
				$this->load->view("users/login", $data);
				$this->load->view("templates/footer");
			}else{
				// get username
				$username = $this->input->post('username');
				// get and encrypt password
				$password = md5($this->input->post('password'));

				// Login user
				$user_id = $this->user_model->login($username, $password);

				if($user_id){
					// create session
					$user_data = array(
						'user_id' => $user_id,
						'username' => $username,
						'logged_in' => true
					);

					$this->session->set_userdata($user_data);

					$this->session->set_flashdata('user_loggedin', 'Uspesno ste se ulogovali.');
					redirect('/');
				}else{
					$this->session->set_flashdata('login_failed', 'Pogresna kombinacija.');
					$this->load->view("templates/header");
					$this->load->view("users/login", $data);
					$this->load->view("templates/footer");
				}	
			}
		}

		public function logout(){
			// uset user data
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');

			$this->session->set_flashdata('user_logged_out', 'Uspesan logout.');

			redirect('/');
		}


	}





?>