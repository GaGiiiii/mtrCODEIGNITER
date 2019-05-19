<?php

	class Posts extends CI_Controller{

		public function index(){

			// $data - what we are sending to view file

			$data['title'] = 'Menadzment Tehnologije i Razvoja';

			// uzimamo postove iz post_modela i saljemo ovaj data u view

			$data['posts'] = $this->post_model->get_posts();

			// loading views

			// function below automatically looks into views folder 

			$this->load->view('templates/header');

			// go to folder pages and file $page and send the $data

			$this->load->view('posts/index', $data);


			$this->load->view('templates/footer');


		}

		public function view($slug = NULL){

      $slug = urldecode($slug);

			$this->post_model->show_edited_posts_test();
			$this->post_model->delete_all_test_posts();
			$this->post_model->retrieve_test_deleted_posts();
			$this->category_model->retrieve_test_deleted_categories();
			$this->category_model->delete_all_test_categories();

			$data['post'] = $this->post_model->get_posts($slug);

			if($data['post']['deleted']){
				redirect('/');
			}

			if(empty($data['post'])){
				show_404();
			}

			$data['title'] = $data['post']['title'];

			$this->load->view('templates/header');
			$this->load->view('posts/view', $data);
			$this->load->view('templates/footer');
		}

		public function create(){

			$this->category_model->retrieve_test_deleted_categories();
			$this->category_model->delete_all_test_categories();

			$data['title'] = "Dodaj Novu Vest";

			// uzimamo kategorije iz database

			$data['categories'] = $this->post_model->get_categories();

			$this->form_validation->set_error_delimiters('<div class="error-input"><i class="fa fa-times-circle"></i>&nbsp;', '</div>');

			$this->form_validation->set_rules('title', "Title", 'trim|required|htmlspecialchars', array('required' => "Potrebno je uneti naslov."));
			$this->form_validation->set_rules('body', "Body", 'trim|required', array('required' => 'Potrebno je uneti sadrzaj.'));

			if($this->session->userdata('logged_in')){

				// ulogovan je admin

				if($this->form_validation->run() === false){
					$this->load->view('templates/header');
					$this->load->view('posts/create', $data);
					$this->load->view('templates/footerCKE');
				}else{
					// upload files
					$config['upload_path'] = "./assets/files";
					$config['allowed_types'] = "pdf";
					$config['max_size'] = "2048";

					$this->load->library('upload', $config);

					if(!$this->upload->do_upload()){
						$error = array('error' => $this->upload->display_errors());
						$post_file = "";
					}else{
						$data = array('upload_data' => $this->upload->data());
						$post_file = $_FILES['userfile']['name'];
						// print_r($this->upload->data());
					}

					$this->post_model->create_post($post_file);

					$this->session->set_flashdata('post_created', 'Uspesno ste dodali novi post.');

					redirect('/');
				}
			}else{

				// nije ulogovan

				if($this->form_validation->run() === false){
					$this->load->view('templates/header');
					$this->load->view('posts/create', $data);
					$this->load->view('templates/footerCKE');
				}else{
					// upload files
					$config['upload_path'] = "./assets/files";
					$config['allowed_types'] = "pdf";
					$config['max_size'] = "2048";

					$this->load->library('upload', $config);

					if(!$this->upload->do_upload()){
						$error = array('error' => $this->upload->display_errors());
						$post_file = "";
					}else{
						$data = array('upload_data' => $this->upload->data());
						$post_file = $_FILES['userfile']['name'];
						// print_r($this->upload->data());
					}

					$this->post_model->create_post_test($post_file);

					$this->session->set_flashdata('post_created_test', 'Uspesno ste dodali novi post.<br><strong>NAPOMENA: </strong> Ovo je test verzija i post ce biti automatski obrisan nakon 2 minuta, da bi post ostao sacuvan morate biti ulogovani kao Admin.');

					redirect('/');
				}
			}	
		}

		public function delete($id){

			if($this->session->userdata('logged_in')){

				// ulogovan je admin

				$this->post_model->delete_post($id);
				$this->session->set_flashdata('post_deleted', 'Uspesno ste obrisali post.');
				redirect('/');
			}else{

				// nije ulogovan

				$this->post_model->delete_post_test($id);
				$this->session->set_flashdata('post_deleted_test', 'Uspesno ste obrisali post.<br><strong>NAPOMENA: </strong> Ovo je test verzija i post ce biti automatski vracen nakon 30 sekundi, da bi post ostao obrisan morate biti ulogovani kao Admin.');
				redirect('/');
			}

		}

		public function edit($slug){

      $slug = urldecode($slug);

			$this->category_model->retrieve_test_deleted_categories();
			$this->category_model->delete_all_test_categories();

			$data['post'] = $this->post_model->get_posts($slug);
			$data['categories'] = $this->post_model->get_categories();

			if($data['post']['deleted']){
				redirect('/');
			}

			if(empty($data['post'])){
				show_404();
			}

			$data['title'] = "Azuriraj Vest";

			$this->load->view('templates/header');
			$this->load->view('posts/edit', $data);
			$this->load->view('templates/footerCKE');
		}

		public function update(){

			$slug = $this->input->post('slug');

      $data['post'] = $this->post_model->get_posts($slug);
			$data['title'] = "Azuriraj Vest";
			$data['categories'] = $this->post_model->get_categories();

			$this->form_validation->set_error_delimiters('<div class="error-input"><i class="fa fa-times-circle"></i>&nbsp;', '</div>');

			$this->form_validation->set_rules('title', "Title", 'trim|required|htmlspecialchars', array('required' => "Potrebno je uneti naslov."));
      $this->form_validation->set_rules('body', "Body", 'trim|required', array('required' => 'Potrebno je uneti sadrzaj.'));
      
      

			if($this->session->userdata('logged_in')){

				// logged in**********************************

				if($this->form_validation->run() === false){
					$this->load->view('templates/header');
					$this->load->view('posts/edit', $data);
					$this->load->view('templates/footerCKE');
				}else{
					// upload files
					$config['upload_path'] = "./assets/files";
					$config['allowed_types'] = "pdf";
					$config['max_size'] = "2048";

          $this->load->library('upload', $config);
          
          if ($_FILES AND $_FILES['userfile']['name']){
            if(!$this->upload->do_upload()){
              $error = array('error' => $this->upload->display_errors());
              print_r($error);
              $post_file = "";
              //exit("3");
            }else{
              $data = array('upload_data' => $this->upload->data());
              if($_FILES['userfile']['name'] == ''){
                $post_file = $data['post']['post_file'];
                //exit("1");
              }else{
                $post_file = $_FILES['userfile']['name'];
                //exit("2");
              }
              // print_r($this->upload->data());
            }
          }else{
            $post_file = $data['post']['post_file'];
          }

					$this->post_model->update_post($post_file);

					$this->session->set_flashdata('post_updated', 'Uspesno ste azurirali post.');

					redirect('/');
				}
			}else{
				
				// logged out*********************************************************************

				if($this->form_validation->run() === false){
					$this->load->view('templates/header');
					$this->load->view('posts/edit', $data);
					$this->load->view('templates/footerCKE');
				}else{
					// upload files
					$config['upload_path'] = "./assets/files";
					$config['allowed_types'] = "pdf";
					$config['max_size'] = "2048";

					$this->load->library('upload', $config);

					if ($_FILES AND $_FILES['userfile']['name']){
            if(!$this->upload->do_upload()){
              $error = array('error' => $this->upload->display_errors());
              print_r($error);
              $post_file = "";
              exit("3");
            }else{
              $data = array('upload_data' => $this->upload->data());
              if($_FILES['userfile']['name'] == ''){
                $post_file = $data['post']['post_file'];
                exit("1");
              }else{
                $post_file = $_FILES['userfile']['name'];
                exit("2");
              }
              // print_r($this->upload->data());
            }
          }else{
            $post_file = $data['post']['post_file'];
          }
          
					$this->post_model->update_post_test($post_file);

					$this->session->set_flashdata('post_updated_test', 'Uspesno ste azurirali post.<br><strong>NAPOMENA: </strong> Ovo je test verzija i post ce biti automatski vracen na staro nakon 30 sekundi, da bi post ostao azuriran morate biti ulogovani kao Admin.');

					redirect('/');
				}
			}

			

		}

	}






?>