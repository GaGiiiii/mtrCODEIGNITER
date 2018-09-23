<?php 

	class Categories extends CI_Controller{

		public function index(){

			$this->category_model->retrieve_test_deleted_categories();
			$this->category_model->delete_all_test_categories();

			$data['title'] = "Kategorije";
			$data['categories'] = $this->category_model->get_categories();

			$this->load->view('templates/header');
			$this->load->view('categories/index', $data);
			$this->load->view('templates/footer');
		}

		public function create(){
			$data['title'] = "Napravi Kategoriju";

			$this->form_validation->set_error_delimiters('<div class="error-input"><i class="fa fa-times-circle"></i>&nbsp;', '</div>');

			$this->form_validation->set_rules('name', "Name", 'trim|required|htmlspecialchars', array('required' => "Potrebno je uneti ime."));

			if($this->session->userdata('logged_in')){

				// ulogovan je

				if($this->form_validation->run() === false){
					$this->load->view('templates/header');
					$this->load->view('categories/create', $data);
					$this->load->view('templates/footer');
				}else{
					$this->category_model->create_category();

					$this->session->set_flashdata('category_created', 'Uspesno ste dodali novu kategoriju.');

					redirect('kategorije');
				}
			}else{

				// nije ulogovan

				if($this->form_validation->run() === false){
					$this->load->view('templates/header');
					$this->load->view('categories/create', $data);
					$this->load->view('templates/footer');
				}else{
					$this->category_model->create_category_test();

					$this->session->set_flashdata('category_created_test', 'Uspesno ste dodali novu kategoriju.<br><strong>NAPOMENA: </strong> Ovo je test verzija i kategorija ce biti automatski obrisana nakon 1 minuta, da bi kategorija ostala sacuvana morate biti ulogovani kao Admin.');

					redirect('kategorije');
				}
			}
		}

		public function delete($id){

			if($this->session->userdata('logged_in')){

				// ulogovan je admin

				$this->category_model->delete_category($id);
				$this->session->set_flashdata('category_deleted', 'Uspesno ste obrisali kategoriju.');
				redirect('kategorije');
			}else{

				// nije ulogovan

				$this->category_model->delete_category_test($id);
				$this->session->set_flashdata('category_deleted_test', 'Uspesno ste obrisali kategoriju.<br><strong>NAPOMENA: </strong> Ovo je test verzija i kategorija ce biti automatski vracena nakon 30 sekundi, da bi kategorija ostala obrisana morate biti ulogovani kao Admin.');
				redirect('kategorije');
			}

		}

		public function posts($name){

			$this->post_model->show_edited_posts_test();
			$this->post_model->delete_all_test_posts();
			$this->post_model->retrieve_test_deleted_posts();
			$this->category_model->delete_all_test_categories();
			$this->category_model->retrieve_test_deleted_categories();



			// 4 klp prima ovaj $name parametar kroz url
			// ovaj name dolazi iz treceg dela url-a
			// ono sto je u routes (:any) i $1 je taj $name
			// 24:07

			if($name == 'uncategorised'){
				$data['posts'] = $this->post_model->get_uncategorised_posts();
				$data['category_name'] = 'Uncategorised';
			}else{
				if($this->category_model->get_category($name) == null){
					$data['category_name'] = "invalid";
				}else{
					$data['category_name'] = $this->category_model->get_category($name)->name;
					$data['posts'] = $this->post_model->get_posts_by_category($name);
				}
			}	

			$this->load->view('templates/header');
			$this->load->view('pages/home', $data);
			$this->load->view('templates/footer');
		}



	}




?>